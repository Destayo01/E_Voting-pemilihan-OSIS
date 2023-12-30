<?php

class Auth extends CI_Controller
{
	public function index()
	{
		show_404();
	}

	public function login()
	{
		$this->load->model('auth_model');
		$this->load->library('form_validation');

		$rules = $this->auth_model->rules();
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run() == FALSE){
			return $this->load->view('login_form');
		}

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if($this->auth_model->login($username, $password)){
			redirect('admin');
		} else {
			$this->session->set_flashdata('message_login_error', 'Login Gagal, pastikan username dan passwrod benar!');
		}

		$this->load->view('login_form');
	}

	public function logout()
	{
		$this->load->model('auth_model');
		$this->auth_model->logout();
		redirect(site_url());
	}

	public function register()
	{
		$this->load->model('auth_model');

		if ($this->input->method() === 'post') {
			// Ambil data dari form
			$user = [
				'id' => uniqid('', true),
				'name' => $this->input->post('name'),
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			];

			// Simpan data ke database
			$user_saved = $this->auth_model->insert_user($user);

			if ($user_saved) {
				// Jika berhasil disimpan, arahkan ke halaman login
				$this->session->set_flashdata('success', 'Pendaftaran berhasil! Silakan login.');
				redirect('auth/login');
			} else {
				// Jika gagal disimpan, tampilkan pesan kesalahan
				$this->session->set_flashdata('message_login_error', 'Gagal menyimpan data. Silakan coba lagi.');
				redirect('register');
			}
		} else {
			$this->load->view('register');
		}
	}
}