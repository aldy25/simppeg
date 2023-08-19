<?php

namespace App\Controllers\back;

use App\Controllers\BaseController;
use Config\Services;
use App\Models\Modaldatahistori;

class Histori extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'SISTEM INFORMASI PENERIMAAN PEGAWAI BARU | RIWAYAT LAMARAN',
            'page' => 'RIWAYAT LAMARAN'
        ];
        return view('Page/Histori/Viewdata', $data);
    }
    public function ambildata()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'tampildata' => $this->Riwayat->findAll()
            ];
            $msg = [
                'data' => view('Page/Histori/Data', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf Data Tidak di Temukan');
        }
    }
    public function listdata()
    {
        $request = Services::request();
        $datamodel = new Modaldatahistori($request);
        if ($request->getMethod(true) == 'POST') {
            $lists = $datamodel->get_datatables();
            $data = [];
            $no = $request->getPost("start");
            foreach ($lists as $list) {
                $no++;
                $row = [];
                $tombolpesan = "<button type=\"button\" title=\"Pesan \"  class=\"btn btn-info btn-sm\" onclick=\"detail('" . $list->id_lamaran .
                    "')\"><i class=\"mdi mdi-transcribe\"></i></button>";

                $status = $list->status;
                if ($status == 'Terkirim') {
                    $tombolstatus = "<button type=\"button\"   class=\"btn btn-warning  btn-sm\">$status</button>";
                } elseif ($status == 'Diproses') {
                    $tombolstatus = "<button type=\"button\"   class=\"btn  btn-warning btn-sm\">$status</button>";
                } elseif ($status == 'Ditolak') {
                    $tombolstatus = "<button type=\"button\"   class=\"btn btn-danger btn-sm\">$status</button>";
                } else {
                    $tombolstatus = "<button type=\"button\"   class=\"btn btn-success btn-sm\">$status</button>";
                }
                $row[] = $no;
                $row[] = $list->nama_lowongan;
                $row[] = $tombolstatus;
                $row[] = $tombolpesan;
                $data[] = $row;
            }
            $output = [
                "draw" => $request->getPost('draw'),
                "recordsTotal" => $datamodel->count_all(),
                "recordsFiltered" => $datamodel->count_filtered(),
                "data" => $data
            ];
            echo json_encode($output);
        }
    }

    public function formtambah()
    {
        if ($this->request->isAJAX()) {
            $msg = [
                'data' => view('Page/Lowongan/modaltambah')
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf Data Tidak di Temukan');
        }
    }

    public function simpandata()
    {
        $this->db = \config\Database::connect();
        if ($this->request->isAJAX()) {
            $validation = \config\Services::validation();
            $valid = $this->validate([
                'nama_lowongan' => [
                    'label' => 'Nama Lowongan ',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Tidak Boleh Kosong'

                    ]
                ],
                'status_lowongan' => [
                    'label' => 'Status Lowongan ',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Tidak Boleh Kosong'

                    ]
                ],
                'kriterialowongan' => [
                    'label' => 'Kriteria Lowongan ',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Tidak Boleh Kosong'

                    ]
                ],
                'pendidikan' => [
                    'label' => 'Minimial Pendidikan ',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Tidak Boleh Kosong'

                    ]
                ],
                'umur' => [
                    'label' => 'Umur Maksimal ',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Tidak Boleh Kosong'

                    ]
                ],
                'jenkel' => [
                    'label' => 'Jenis Kelamin ',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Tidak Boleh Kosong'

                    ]
                ],
                'deskripsi_lowongan' => [
                    'label' => 'Deskripsi Lowongan ',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Tidak Boleh Kosong'

                    ]
                ],
                'gaji' => [
                    'label' => 'Gaji ',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Tidak Boleh Kosong'

                    ]
                ],



            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama_lowongan' => $validation->getError('nama_lowongan'),
                        'status_lowongan' => $validation->getError('status_lowongan'),
                        'kriterialowongan' => $validation->getError('kriterialowongan'),
                        'pendidikan' => $validation->getError('pendidikan'),
                        'umur' => $validation->getError('umur'),
                        'jenkel' => $validation->getError('jenkel'),
                        'deskripsi_lowongan' => $validation->getError('deskripsi_lowongan'),
                        'gaji' => $validation->getError('gaji'),

                    ]
                ];
            } else {
                $simpandata = [
                    'nama_lowongan' => $this->request->getPost('nama_lowongan'),
                    'status_lowongan' => $this->request->getPost('status_lowongan'),
                    'kriteria' => $this->request->getPost('kriterialowongan'),
                    'pendidikan' => $this->request->getPost('pendidikan'),
                    'umur' => $this->request->getPost('umur'),
                    'jenkel' => $this->request->getPost('jenkel'),
                    'deskripsi_lowongan' => $this->request->getPost('deskripsi_lowongan'),
                    'gaji' => $this->request->getPost('gaji'),


                ];
                $this->Lowongan->insert($simpandata);
                $lowongan = $this->db->query("SELECT * FROM tbl_lowongan ORDER BY id_lowongan DESC LIMIT 1");
                $datalowongan = $lowongan->getRow();
                $id_lowongan = $datalowongan->id_lowongan;
                $keahlian = $this->request->getVar('keahlian');
                $jmldata = count($keahlian);
                for ($i = 0; $i < $jmldata; $i++) {
                    $this->Syarat->insert([
                        'lowongan' => $id_lowongan,
                        'keahlian' => $keahlian[$i],
                    ]);
                }
                $msg = [
                    'sukses' => 'Data Lowongan Berhasil Disimpan'
                ];
            }
            echo json_encode($msg);
        } else {
            exit('Maaf Data Tidak di Temukan');
        }
    }
    public function formdetail()
    {
        if ($this->request->isAJAX()) {
            $id_lamaran = $this->request->getVar('id_lamaran');
            $row = $this->Riwayat->find($id_lamaran);
            $data = [
                'pesan' => $row['pesan'],
            ];

            $msg = [
                'sukses' => view('Page/Riwayat/modaldetail', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function daftar()
    {
        $this->db = \config\Database::connect();
        if ($this->request->isAJAX()) {
            $lowongan = $this->request->getPost('id');
            $pelamar = $this->request->getPost('pelamar');
            $query_cekuser = $this->db->query("SELECT * from tbl_lamaran  WHERE lowongan='$lowongan' AND pelamar = '$pelamar'");
            $result = $query_cekuser->getResult();

            if (count($result) > 0) {
                $msg = [
                    'error' => 'Anda Sudah Pernah Melamar Lowongan ini'
                ];
            } else {
                $simpandata = [
                    'lowongan' => $this->request->getPost('id'),
                    'pelamar' => $this->request->getPost('pelamar'),
                    'status' => 'Terkirim',
                ];

                $this->Lamar->insert($simpandata);
                $msg = [
                    'sukses' => 'Berhasil Mendaftar Lowongan'
                ];
            }



            echo json_encode($msg);
        } else {
            exit('Maaf Data Tidak di Temukan');
        }
    }
}
