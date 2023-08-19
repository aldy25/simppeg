<?php

namespace App\Controllers\back;

use App\Controllers\BaseController;
use Config\Services;
use App\Models\Modeldatalowonganbuka;

class Lowbuka extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'SISTEM INFORMASI PENERIMAAN PEGAWAI BARU | LOWONGAN TERSEDIA',
            'page' => 'LOWONGAN'
        ];
        return view('Page/Lowbuka/Viewdata', $data);
    }
    public function ambildata()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'tampildata' => $this->Lowongan->findAll()
            ];
            $msg = [
                'data' => view('Page/Lowbuka/Data', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf Data Tidak di Temukan');
        }
    }
    public function listdata()
    {
        $request = Services::request();
        $datamodel = new Modeldatalowonganbuka($request);
        if ($request->getMethod(true) == 'POST') {
            $lists = $datamodel->get_datatables();
            $data = [];
            $no = $request->getPost("start");
            foreach ($lists as $list) {


                $no++;
                $row = [];


                $tomboldetail = "<button type=\"button\" title=\"Detail \"  class=\"btn btn-info btn-sm\" onclick=\"detail('" . $list->id_lowongan .
                    "')\"><i class=\"mdi mdi-transcribe\"></i></button>";

                $status = $list->status_lowongan;
                if ($status == 'Close') {
                    $tombolstatus = "<button type=\"button\"   class=\"btn btn-danger btn-sm\" onclick=\"Status('" . $list->id_lowongan .
                        "')\">$status</button>";
                } else {
                    $tombolstatus = "<button type=\"button\"   class=\"btn btn-primary btn-sm\" onclick=\"Status('" . $list->id_lowongan .
                        "')\">$status</button>";
                }

                $row[] = $no;
                $row[] = $list->nama_lowongan;
                $row[] = $tombolstatus;
                $row[] = $list->pendidikan;
                $row[] = $list->gaji;
                $row[] = $tomboldetail;
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
            $id_lowongan = $this->request->getVar('id_lowongan');
            $row = $this->Lowongan->find($id_lowongan);
            $data = [
                'id_lowongan' => $row['id_lowongan'],
                'nama_lowongan' => $row['nama_lowongan'],
                'status_lowongan' => $row['status_lowongan'],
                'kriteria' => $row['kriteria'],
                'pendidikan' => $row['pendidikan'],
                'umur' => $row['umur'],
                'jenkel' => $row['jenkel'],
                'deskripsi_lowongan' => $row['deskripsi_lowongan'],
                'gaji' => $row['gaji'],
            ];

            $msg = [
                'sukses' => view('Page/Lowbuka/modaldetail', $data)
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
