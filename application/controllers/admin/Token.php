<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Token extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Load model Token_model
        $this->load->model('Token_model');
        $this->load->model('Auth_model');
    }

    public function index()
    {
        // Load the Voter_model in the controller
        $this->load->model('Token_model');

        // Use the model to retrieve data
        $data['tokens'] = $this->Token_model->get_tokens();

        $data['current_user'] = $this->Auth_model->current_user();

        // Load the view and pass the data
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/navside');
        $this->load->view('admin/templates/navtop', $data);
        $this->load->view('admin/t-token', $data);
        $this->load->view('admin/templates/footer');    
    }

    public function create_token()
    {
        $data['current_user'] = $this->Auth_model->current_user();

        // Fungsi untuk menampilkan formulir penambahan token
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/navside');
        $this->load->view('admin/templates/navtop', $data);
        $this->load->view('admin/t-token_new_form');
        $this->load->view('admin/templates/footer');
    }

    public function add_token()
    {
        $token_value = $this->input->post('token_value');

        // Set status default, misalnya 'unused'
        $status = 'used';

        $this->Token_model->insert_token($token_value, $status);

        $this->session->set_flashdata('message', 'token berhasil ditambahkan!');
        redirect('admin/token');
    }

    public function update_status($token_id)
    {
        // Fungsi untuk mengubah status token
        $token = $this->Token_model->get_token_by_id($token_id);
        $new_status = ($token->status == 'used') ? 'unused' : 'used';
        $this->Token_model->update_status($token_id, $new_status);

        $this->session->set_flashdata('message', 'token berhasil diperbarui!');
        redirect('admin/token');
    }

    public function toggle_status($token_id, $current_status)
    {
        // Toggle status
        $new_status = ($current_status == 'used') ? 'unused' : 'used';

        // Update status
        $this->Token_model->update_status($token_id, $new_status);

        redirect('admin/token');
    }

    public function delete_token($token_id)
    {
        // Hapus token berdasarkan ID
        $this->Token_model->delete_token($token_id);

        $this->session->set_flashdata('message', 'token berhasil dihapus!');
        redirect('admin/token');
    }
}