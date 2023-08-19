<?php

namespace App\Controllers\back;

use App\Controllers\BaseController;
use Config\Services;
use App\Models\Modeldatapelamar;

class Pelamar extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'SISTEM INFORMASI PENERIMAAN PEGAWAI BARU | DATA PELAMAR',
			'page' => 'PELAMAR'
		];
		return view('Page/Pelamar/Viewdata', $data);
	}
	public function ambildata()
	{
		if ($this->request->isAJAX()) {
			$data = [
				'tampildata' => $this->Pelamar->findAll()
			];
			$msg = [
				'data' => view('Page/Pelamar/Data', $data)
			];
			echo json_encode($msg);
		} else {
			exit('Maaf Data Tidak di Temukan');
		}
	}
	public function listdata()
	{
		$request = Services::request();
		$datamodel = new Modeldatapelamar($request);
		if ($request->getMethod(true) == 'POST') {
			$lists = $datamodel->get_datatables();
			$data = [];
			$no = $request->getPost("start");
			foreach ($lists as $list) {


				$no++;
				$row = [];

				$tomboldetail = "<button type=\"button\" title=\"Detail \"  class=\"btn btn-info btn-sm\" onclick=\"detail('" . $list->id_pelamar .
					"')\"><i class=\"mdi mdi-transcribe\"></i></button>";
				$row[] = $no;
				$row[] = $list->nama_lengkap;
				$row[] = $list->tanggal_lahir;
				$row[] = $list->no_hp;
				$row[] = $list->alamat_domisili;
				$row[] = $list->pendidikan_terakhir;
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
				'data' => view('Page/Keahlian/modaltambah')
			];
			echo json_encode($msg);
		} else {
			exit('Maaf Data Tidak di Temukan');
		}
	}
	public function formdetail()
	{
		if ($this->request->isAJAX()) {
			$id_pelamar = $this->request->getVar('id_pelamar');
			$row = $this->Pelamar->find($id_pelamar);
			$data = [
				'id_pelamar' => $row['id_pelamar'],
				'user' => $row['user'],
				'profile' => $row['profile'],
				'nama_lengkap' => $row['nama_lengkap'],
				'nama_panggilan' => $row['nama_panggilan'],
				'tanggal_lahir' => $row['tanggal_lahir'],
				'no_hp' => $row['no_hp'],
				'alamat_domisili' => $row['alamat_domisili'],
				'hobi' => $row['hobi'],
				'pendidikan_terakhir' => $row['pendidikan_terakhir'],
				'nama_sekola' => $row['nama_sekola'],
				'pengalaman_organisasi' => $row['pengalaman_organisasi'],
				'pengalaman_kerja' => $row['pengalaman_kerja'],
				'ijazah_terakhir' => $row['ijazah_terakhir'],
				'cv' => $row['cv'],
				'portofolio' => $row['portofolio'],
				'sertifikat' => $row['sertifikat'],
			];

			$msg = [
				'sukses' => view('Page/Pelamar/modaldetail', $data)
			];
			echo json_encode($msg);
		}
	}
	public function detail()
	{
		if ($this->request->isAJAX()) {
			$id_pelamar = $this->request->getVar('id_pelamar');
			$row = $this->Pelamar->find($id_pelamar);
			$data = [
				'id_pelamar' => $row['id_pelamar'],
				'profile' => $row['profile'],
				'nama_lengkap' => $row['nama_lengkap'],
				'nama_panggilan' => $row['nama_panggilan'],
				'tanggal_lahir' => $row['tanggal_lahir'],
				'umur' => $row['umur'],
				'jenkel' => $row['jenkel'],
				'deskripsi_lowongan' => $row['deskripsi_lowongan'],
				'gaji' => $row['gaji'],
			];

			$msg = [
				'sukses' => view('Page/Lowongan/modaldetail', $data)
			];
			echo json_encode($msg);
		}
	}
	public function formupload()
	{
		if ($this->request->isAJAX()) {
			$msg = [
				'data' => view('Page/Pelamar/modalupload')
			];
			echo json_encode($msg);
		} else {
			exit('Maaf Data Tidak di Temukan');
		}
	}

	public function download($file)
	{
		return	$this->response->download('assets/images/syarat/' . $file, NULL);
	}
	public function updatefoto()
	{
		$session = \config\services::session();
		$id = $session->get('id_user');
		if ($this->request->isAJAX()) {
			$validation = \config\Services::validation();


			$valid = $this->validate([
				'foto' => [
					'label' => 'Foto',
					'rules' => 'uploaded[foto]|mime_in[foto,image/png,image/jpeg]|is_image[foto]',
					'errors' => [
						'uploaded' => '{field} wajib diisi',
						'mime_in' => 'Harus dalam bentuk gambar, jangan file yang lain'
					]
				]
			]);

			if (!$valid) {
				$msg = [
					'error' => [
						'foto' => $validation->getError('foto'),

					]
				];
			} else {
				$file = $this->request->getFile('foto');
				$namafoto = $file->getRandomName();
				$file->move('assets/images/profil/', $namafoto);
				$simpandata = [
					'foto' => $namafoto,
				];
				$this->Akun->update($id, $simpandata);
				$msg = [
					'sukses' => 'Foto Profile Berhasil di Upload'
				];
			}
			echo json_encode($msg);
		} else {
			exit('Maaf Data Tidak di Temukan');
		}
	}
	public function Profile()
	{
		$data = [
			'title' => 'SISTEM INFORMASI PENERIMAAN PEGAWAI BARU | PROFILE',
			'page' => 'PROFILE'
		];
		return view('Page/Pelamar/Profile', $data);
	}
	public function simpanprofile()
	{

		if ($this->request->isAJAX()) {

			$validation = \config\Services::validation();
			$valid = $this->validate([
				'profile' => [
					'label' => 'Profile Singkat ',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} Tidak Boleh Kosong'

					]
				],
				'nama_lengkap' => [
					'label' => 'Nama Lengkap',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} Tidak Boleh Kosong'

					]
				],
				'nama_panggilan' => [
					'label' => 'Nama Panggilan ',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} Tidak Boleh Kosong'

					]
				],
				'tanggal_lahir' => [
					'label' => 'Tanggal Lahir ',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} Tidak Boleh Kosong'

					]
				],
				'no_hp' => [
					'label' => 'Nomor Hp ',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} Tidak Boleh Kosong'

					]
				],
				'alamat_domisili' => [
					'label' => 'Alamat Domisili ',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} Tidak Boleh Kosong'

					]
				],
				'hobi' => [
					'label' => 'Hobi ',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} Tidak Boleh Kosong'

					]
				],
				'pendidikan_terakhir' => [
					'label' => 'Pendidikan Terakhir ',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} Tidak Boleh Kosong'

					]
				],
				'nama_sekola' => [
					'label' => 'Nama Sekolah ',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} Tidak Boleh Kosong'

					]
				],
				'pengalaman_organisasi' => [
					'label' => 'Pengalaman Organisasi ',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} Tidak Boleh Kosong'

					]
				],
				'pengalaman_kerja' => [
					'label' => 'Pengalaman Kerja ',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} Tidak Boleh Kosong'

					]
				],
				'ijazah_terakhir' => [
					'label' => 'ijazah_terakhir',
					'rules' => 'uploaded[ijazah_terakhir]|mime_in[ijazah_terakhir,application/pdf]',
					'errors' => [
						'uploaded' => '{field} wajib diisi',
						'mime_in' => 'Harus dalam bentuk pdf, jangan file yang lain'
					]
				],
				'cv' => [
					'label' => 'CV ',
					'rules' => 'uploaded[cv]|mime_in[cv,application/pdf]',
					'errors' => [
						'uploaded' => '{field} wajib diisi',
						'mime_in' => 'Harus dalam bentuk pdf, jangan file yang lain'

					]
				],
				'portofolio' => [
					'label' => 'Portofolio ',
					'rules' => 'uploaded[portofolio]|mime_in[portofolio,application/pdf]',
					'errors' => [
						'uploaded' => '{field} wajib diisi',
						'mime_in' => 'Harus dalam bentuk pdf, jangan file yang lain'

					]
				],
				'sertifikat' => [
					'label' => 'sertifikat ',
					'rules' => 'uploaded[sertifikat]|mime_in[sertifikat,application/pdf]',
					'errors' => [
						'uploaded' => '{field} wajib diisi',
						'mime_in' => 'Harus dalam bentuk pdf, jangan file yang lain'

					]
				],
			]);
			if (!$valid) {
				$msg = [
					'error' => [
						'profile' => $validation->getError('profile'),
						'nama_lengkap' => $validation->getError('nama_lengkap'),
						'nama_panggilan' => $validation->getError('nama_panggilan'),
						'tanggal_lahir' => $validation->getError('tanggal_lahir'),
						'no_hp' => $validation->getError('no_hp'),
						'alamat_domisili' => $validation->getError('alamat_domisili'),
						'hobi' => $validation->getError('hobi'),
						'pendidikan_terakhir' => $validation->getError('pendidikan_terakhir'),
						'nama_sekola' => $validation->getError('nama_sekola'),
						'pengalaman_organisasi' => $validation->getError('pengalaman_organisasi'),
						'pengalaman_kerja' => $validation->getError('pengalaman_kerja'),
						'ijazah_terakhir' => $validation->getError('ijazah_terakhir'),
						'cv' => $validation->getError('cv'),
						'portofolio' => $validation->getError('portofolio'),
						'sertifikat' => $validation->getError('sertifikat'),
					]
				];
			} else {

				$fileijazah_terakhir = $this->request->getFile('ijazah_terakhir');
				$namaijazah_terakhir = $fileijazah_terakhir->getRandomName();
				$fileijazah_terakhir->move('assets/images/syarat/', $namaijazah_terakhir);
				$filecv = $this->request->getFile('cv');
				$namacv = $filecv->getRandomName();
				$filecv->move('assets/images/syarat/', $namacv);
				$fileportofolio = $this->request->getFile('portofolio');
				$namaportofolio = $fileportofolio->getRandomName();
				$fileportofolio->move('assets/images/syarat/', $namaportofolio);
				$filesertifikat = $this->request->getFile('sertifikat');
				$namasertifikat = $filesertifikat->getRandomName();
				$filesertifikat->move('assets/images/syarat/', $namasertifikat);
				$simpandata = [
					'profile' => $this->request->getPost('profile'),
					'nama_lengkap' => $this->request->getPost('nama_lengkap'),
					'nama_panggilan' => $this->request->getPost('nama_panggilan'),
					'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
					'no_hp' => $this->request->getPost('no_hp'),
					'alamat_domisili' => $this->request->getPost('alamat_domisili'),
					'hobi' => $this->request->getPost('hobi'),
					'pendidikan_terakhir' => $this->request->getPost('pendidikan_terakhir'),
					'nama_sekola' => $this->request->getPost('nama_sekola'),
					'pengalaman_organisasi' => $this->request->getPost('pengalaman_organisasi'),
					'pengalaman_kerja' => $this->request->getPost('pengalaman_kerja'),
					'ijazah_terakhir' => $namaijazah_terakhir,
					'cv' => $namacv,
					'portofolio' => $namaportofolio,
					'sertifikat' => $namasertifikat,
				];
				$id = $this->request->getPost('id_pelamar');
				$id_user = $this->request->getPost('id_user');
				$this->Pelamar->update($id, $simpandata);
				$keahlian = $this->request->getVar('keahlian');
				$jmldata = count($keahlian);
				for ($i = 0; $i < $jmldata; $i++) {
					$this->Skil->insert([
						'user' => $id_user,
						'keahlian' => $keahlian[$i],
					]);
				}
				$msg = [
					'sukses' => 'Data Profile Berhasil Disimpan'
				];
			}
			echo json_encode($msg);
		} else {
			exit('Maaf Data Tidak di Temukan');
		}
	}
}
