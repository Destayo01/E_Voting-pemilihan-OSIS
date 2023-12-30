<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
    public function index()
    {
        $this->load->library('form_validation');
        $this->load->view('login_pemilih');
    }

    public function login()
    {
        $this->load->model('Users_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    
        $rules = $this->Users_model->rules();
        $this->form_validation->set_rules($rules);
    
        if ($this->form_validation->run() == FALSE) {
            return $this->load->view('login_pemilih');
        }
    
        $nisn = $this->input->post('nisn');
    
        if ($this->Users_model->login($nisn)) {
            // Set session data for the user
            $this->session->set_userdata('nisn', $nisn);
    
            // Jika login berhasil, ambil data pemilih
            $data['pemilih_data'] = $this->Users_model->get_pemilih_by_nisn($nisn);
    
            // Tampilkan kembali halaman login dengan data pemilih
            $this->load->view('login_pemilih', $data);
        } else {
            $this->session->set_flashdata('message_login_error', 'NISN yang Anda masukkan tidak valid.');
            $this->load->view('login_pemilih');
        }
    }
    

    public function logout()
    {
        $this->load->model('Users_model');
        $this->load->library('session'); // Load the session library
        $this->Users_model->logout();
        
        // Destroy the user session
        $this->session->sess_destroy();

        redirect(site_url());
    }
}
