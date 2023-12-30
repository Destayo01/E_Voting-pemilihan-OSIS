<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Hasil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('hasil_model');
        $this->load->model('auth_model');
        $this->load->model('kandidat_model');
        $this->load->library('pagination');
    }

    public function index()
    {
        $config['base_url'] = site_url('/admin/hasil');
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->hasil_model->jumlah_hasil();
        $config['per_page'] = 5;

        $this->pagination->initialize($config);

        $limit = $config['per_page'];
        $offset = html_escape($this->input->get('per_page'));

        $data['hasil'] = $this->hasil_model->get_hasil($limit, $offset);
        $data['offset'] = $offset;

        $data['kandidat'] = $this->kandidat_model->get_all();
        $data['current_user'] = $this->auth_model->current_user();
        $data['percentage_votes'] = $this->hasil_model->get_percentage_votes();
        $this->load->view('admin/hasil_pemilihan', $data);
    }

    public function delete($id)
    {
        // Proses hapus data
        $this->hasil_model->delete_hasil($id);
        redirect('admin/hasil');
    }

    public function hapus_semua()
    {
        $this->hasil_model->hapus_semua_data();
        redirect('admin/hasil');
    }

    public function cari()
    {
        $config['base_url'] = site_url('/admin/hasil_pemilihan');
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->hasil_model->jumlah_hasil();
        $config['per_page'] = 5;

        $this->pagination->initialize($config);

        $limit = $config['per_page'];
        $offset = html_escape($this->input->get('per_page'));

        $data['hasil'] = $this->hasil_model->cari_hasil($limit, $offset);
        $data['offset'] = $offset;

        $data['current_user'] = $this->auth_model->current_user();
        $data['kandidat'] = $this->kandidat_model->get_all();
        $data['percentage_votes'] = $this->hasil_model->get_percentage_votes();
        $this->load->view('admin/hasil_pemilihan.php', $data);
    }
}