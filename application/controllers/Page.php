<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
        $this->load->model('kandidat_model');
	}

	public function index()
	{
		redirect('page/mulai', $data);
	}

	public function token()
    {
        $this->load->view('page/form_token');

        $this->load->model('Token_model'); // Memuat model yang mengambil data token
        $error_message = ''; // Pesan kesalahan awalnya kosong

        if ($this->input->post()) {
            $input_token = $this->input->post('id');

            $token_data = $this->Token_model->get_token_by_value_and_status($input_token, 'used');

            if ($token_data) {
                // Token valid, Anda dapat mengambil data token lebih lanjut jika diperlukan
                $token_value = $token_data->token_value;
                $token_status = $token_data->status;

                // Redirect ke halaman login atau halaman berikutnya
                redirect('page/login_pemilih');
            } else {
                // Token tidak valid, Anda dapat menampilkan pesan kesalahan atau mengarahkan ke halaman lain
                $this->session->set_flashdata('error', 'Token Salah.');
                redirect('page/token');
            }
        }

        return;
    }

	public function login_pemilih()
	{
		$data['meta'] = [
			'title' => 'About BeritaCoding',
		];

		$this->load->view('login_pemilih', $data);
	}

	public function mulai()
	{
		$data['meta'] = [
			'title' => 'BeritaCoding',
		];
	
		$this->load->view('page/mulai', $data);
	}

	public function selesai()
	{
		$data['meta'] = [
			'title' => 'About BeritaCoding',
		];

		$this->load->view('page/selesai', $data);
	}

	public function home()
	{
		if (!$this->users_model->current_user()) {
			redirect('users/login');
		}

		$data['meta'] = [
			'title' => 'About BeritaCoding',
		];

		$this->load->model('kandidat_model'); // Load model Kandidat_model
    	$data['kandidat_data'] = $this->kandidat_model->get_all(); // Mengambil semua data kandidat
    	$this->load->view('page/home', $data);
	}
}
