<?php

namespace App\Controllers\back;

use App\Controllers\BaseController;
use Config\Services;
use App\Models\Modeldatakeahlian;

class Keahlian extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'SISTEM INFORMASI PENERIMAAN PEGAWAI BARU | DATA KEAHLIAN',
            'page' => 'KEAHLIAN'
        ];
        return view('Page/Keahlian/Viewdata', $data);
    }
    public function ambildata()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'tampildata' => $this->Keahlian->findAll()
            ];
            $msg = [
                'data' => view('Page/Keahlian/Data', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf Data Tidak di Temukan');
        }
    }
    public function listdata()
    {
        $request = Services::request();
        $datamodel = new Modeldatakeahlian($request);
        if ($request->getMethod(true) == 'POST') {
            $lists = $datamodel->get_datatables();
            $data = [];
            $no = $request->getPost("start");
            foreach ($lists as $list) {


                $no++;
                $row = [];
                $tomboledit = "<button type=\"button\" title=\"Edit \"  class=\"btn btn-info btn-sm\" onclick=\"edit('" . $list->id_keahlian .
                    "')\"><i class=\"mdi mdi-transcribe\"></i></button>";
                $tombolhapus = " <button type=\"button\" title=\"Hapus \"  class=\"btn btn-danger btn-sm\" onclick=\"hapus('" . $list->id_keahlian .
                    "')\"><i class=\"fa fa-trash\"></i></button>";

                $row[] = $no;
                $row[] = $list->keahlian;

                $row[] = $tomboledit . " " . $tombolhapus;
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
                'data' => view('Page/Keahlian/modaltambah')
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf Data Tidak di Temukan');
        }
    }

    public function simpandata()
    {
        if ($this->request->isAJAX()) {
            $validation = \config\Services::validation();
            $valid = $this->validate([
                'keahlian' => [
                    'label' => 'Keahlian ',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus di pilih'

                    ]
                ],

            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'keahlian' => $validation->getError('keahlian'),


                    ]
                ];
            } else {



                $simpandata = [
                    'keahlian' => $this->request->getPost('keahlian'),

                ];
                $this->Keahlian->insert($simpandata);
                $msg = [
                    'sukses' => 'Jenis Keahlian baru Berhasil di Tambahkan'
                ];
            }
            echo json_encode($msg);
        } else {
            exit('Maaf Data Tidak di Temukan');
        }
    }

    public function formedit()
    {
        if ($this->request->isAJAX()) {
            $id_keahlian = $this->request->getVar('id_keahlian');
            $row = $this->Keahlian->find($id_keahlian);
            $data = [
                'id_keahlian' => $row['id_keahlian'],
                'keahlian' => $row['keahlian'],

            ];

            $msg = [
                'sukses' => view('Page/Keahlian/modaledit', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function updatedata()
    {

        if ($this->request->isAJAX()) {
            $validation = \config\Services::validation();
            $valid = $this->validate([
                'keahlian' => [
                    'label' => 'Keahlian',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Tidak Boleh Kosong'

                    ]
                ],
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'keahlian' => $validation->getError('keahlian'),
                    ]
                ];
            } else {
                $simpandata = [
                    'keahlian' => $this->request->getPost('keahlian'),
                ];

                $id =  $this->request->getPost('id');
                $this->Keahlian->update($id, $simpandata);
                $msg = [
                    'sukses' => 'Jenis Keahlian Berhasil di Edit'
                ];
            }
            echo json_encode($msg);
        } else {
            exit('Maaf Data Tidak di Temukan');
        }
    }

    public function hapus()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id_keahlian');
            $this->Keahlian->delete($id);
            $msg = [
                'sukses' => "Jenis Keahlian ini Berhasil di Hapus"
            ];
            echo json_encode($msg);
        } else {
            exit('maaf data tidak ditemukan');
        }
    }
}
