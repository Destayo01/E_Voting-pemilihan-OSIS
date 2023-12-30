<?php

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pemilih_model');
		$this->load->model('kandidat_model');
		$this->load->model('hasil_model');
		$this->load->model('auth_model');
		if(!$this->auth_model->current_user()){
			redirect('auth/login');
		}
	}

	public function index()
	{
		$data = [
			"current_user" => $this->auth_model->current_user(),
			"jumlah_pemilih" => $this->pemilih_model->jumlah_pemilih(),
			"jumlah_pemilih_sudah" => $this->pemilih_model->jumlah_pemilih_sudah(),
			"jumlah_pemilih_belum" => $this->pemilih_model->jumlah_pemilih_belum(),
			"jumlah_kandidat" => $this->kandidat_model->jumlah_kandidat(),
		];
		
		
        $data['kandidat'] = $this->kandidat_model->get_all();
		$data['percentage_votes'] = $this->hasil_model->get_percentage_votes();
		$data['current_user'] = $this->auth_model->current_user();
		$this->load->view('admin/dashboard.php', $data);
	}


}
