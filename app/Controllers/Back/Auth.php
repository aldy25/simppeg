<?php

namespace App\Controllers\back;

use App\Controllers\BaseController;
use Config\Services;

class Auth extends BaseController
{


	public function login()
	{
		$data = ['title' => 'Halaman Login'];
		return view('Auth/Login', $data);
	}
	public function cekuser()
	{
		$this->db = \config\Database::connect();
		if ($this->request->isAJAX()) {
			$username = $this->request->getVar('username');
			$password = $this->request->getVar('password');
			$validation = \config\Services::validation();
			$valid = $this->validate([
				'username' => [
					'label' => 'Username',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong'

					]
				],
				'password' => [
					'label' => 'password',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} wajib diisi'
					]
				]
			]);

			if (!$valid) {
				$msg = [
					'error' => [
						'username' => $validation->getError('username'),
						'password' => $validation->getError('password')
					]
				];
			} else {

				$query_cekuser = $this->db->query("SELECT * from tbl_user  WHERE username='$username'");
				$result = $query_cekuser->getResult();

				if (count($result) > 0) {
					$row = $query_cekuser->getRow();
					$password_user = $row->password;
					if (password_verify($password, $password_user)) {
						$status = $row->status;
						if ($status === 'off') {
							$msg = [
								'error' => [
									'pesan' => "Mohon maaf, Akun ini sudah tidak  aktif Lagi!"
								]
							];
						} else {

							$simpan_session = [
								'login' => 'true',
								'username' => $username,
								'nama' => $row->nama,
								'role' => $row->role,
								'status' => $row->status,
								'id_user' => $row->id_user,
							];
							session()->set($simpan_session);
							$msg = [
								'sukses' => [
									'link' => '/Beranda'
								]
							];
						}
					} else {
						$msg = [
							'error' => [
								'password' => "Password salah!!"
							]
						];
					}
				} else {
					$msg = [
						'error' => [
							'username' => 'maaf username tidak ditemukan'
						]
					];
				}
			}
			echo json_encode($msg);
		} else {
			exit('Maaf Data Tidak di Temukan');
		}
	}
	public function logout()
	{
		session()->destroy();
		return redirect()->to('/');
	}


	public function register()
	{
		$data = ['title' => 'Halaman Registrasi'];
		return view('Auth/Register', $data);
	}
	public function Post_Regis()
	{
		if ($this->request->isAJAX()) {
			$validation = \config\Services::validation();
			$valid = $this->validate([
				'nama' => [
					'label' => 'Nama',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus di isi'

					]
				],
				'jenkel' => [
					'label' => 'Jenkel ',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong'

					]
				],

				'username' => [
					'label' => 'username',
					'rules' => 'required|is_unique[tbl_user.username]',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
						'is_unique' => '{field}vtidak boleh ada yang sama'

					]
				],
				'password' => [
					'label' => 'Password',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong'

					]
				],
				'password2' => [
					'label' => 'Password',
					'rules' => 'required|matches[password]',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
						'matches' => '{field} tidak sama!!'
					]
				],


			]);
			if (!$valid) {
				$msg = [
					'error' => [
						'nama' => $validation->getError('nama'),
						'jenkel' => $validation->getError('jenkel'),
						'username' => $validation->getError('username'),
						'password' => $validation->getError('password'),
						'password2' => $validation->getError('password2'),

					]
				];
			} else {
				$pw = $this->request->getPost('password');
				$username = $this->request->getPost('username');
				$password = password_hash($pw, PASSWORD_DEFAULT);
				$simpandata = [
					'username' => $this->request->getPost('username'),
					'password' => $password,
					'role' => 'Pelamar',
					'nama' => $this->request->getPost('nama'),
					'jk' => $this->request->getPost('jenkel'),
					'foto' => '',
					'status' => 'ON',
				];
				// var_dump($simpandata);
				// die();
				$this->Akun->insert($simpandata);
				$this->db = \config\Database::connect();
				$query_cekuser = $this->db->query("SELECT * from tbl_user  WHERE username='$username'");
				$row = $query_cekuser->getRow();
				$insertpelamar = [
					'user' => $row->id_user
				];
				$this->Pelamar->insert($insertpelamar);
				$msg = [
					'sukses' => 'Registrasi Berhasil Silahkan Kembali Ke Halaman Login'
				];
			}
			echo json_encode($msg);
		} else {
			exit('Maaf Data Tidak di Temukan');
		}
	}
}