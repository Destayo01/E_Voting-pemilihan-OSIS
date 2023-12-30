<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Kelas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('kelas_model');
        $this->load->model('auth_model');
        $this->load->library('pagination');
    }

    public function index() {

        $config['base_url'] = site_url('/admin/kelas');
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->kelas_model->jumlah_kelas();
        $config['per_page'] = 5;

        $this->pagination->initialize($config);

        $limit = $config['per_page'];
        $offset = html_escape($this->input->get('per_page'));

        $data['kelas'] = $this->kelas_model->get_kelas($limit, $offset);
        $data['offset'] = $offset;

        $data['current_user'] = $this->auth_model->current_user();
        $this->load->view('admin/kelas', $data);
    }

    public function create() {
        // Handle form submission to create a new class
        if ($_POST) {
            $data = array(
                'nama_kelas' => $this->input->post('nama_kelas'),
                'tingkat' => $this->input->post('tingkat')
            );

            $this->kelas_model->insert_kelas($data);
            redirect('admin/kelas');
        }

        $data['current_user'] = $this->auth_model->current_user();
        $this->load->view('admin/tambah_kelas', $data);
    }

    public function edit($id) {
        // Handle form submission to update an existing class
        if ($_POST) {
            $data = array(
                'nama_kelas' => $this->input->post('nama_kelas'),
                'tingkat' => $this->input->post('tingkat')
            );

            $this->kelas_model->update_kelas($id, $data);
            redirect('admin/kelas');
        }

        $data['current_user'] = $this->auth_model->current_user();
        $data['kelas'] = $this->kelas_model->get_kelas_by_id($id);
        $this->load->view('admin/edit_kelas', $data);
    }

    public function delete($id) {
        $this->kelas_model->delete_kelas($id);
        redirect('admin/kelas');
    }

    public function cari()
    {
        $config['base_url'] = site_url('/admin/kelas');
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->kelas_model->jumlah_kelas();
        $config['per_page'] = 5;

        $this->pagination->initialize($config);

        $limit = $config['per_page'];
        $offset = html_escape($this->input->get('per_page'));

        $data['kelas'] = $this->kelas_model->cari_kelas($limit, $offset);
        $data['offset'] = $offset;

        $data['current_user'] = $this->auth_model->current_user();
        $this->load->view('admin/kelas.php', $data);
    }

    public function uploaddata()
    {
        $config['upload_path'] = './upload/importexcel/';
        $config['allowed_types'] = 'xlsx|xls';
        $config['file_name'] = 'doc' . time();
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('importexcel')) {
            $file = $this->upload->data();
            $reader = ReaderEntityFactory::createXLSXReader();

            $reader->open('upload/importexcel/' . $file['file_name']);
            foreach ($reader->getSheetIterator() as $sheet) {
                $numRow = 1;
                foreach ($sheet->getRowIterator() as $row) {
                    if ($numRow > 1) {
                        $table = array(
                            'id'  => $row->getCellAtIndex(0),
                            'nama_kelas'  => $row->getCellAtIndex(1),
                            'tingkat'  => $row->getCellAtIndex(2),
                        );
                        $this->kelas_model->import_data($table);
                    }
                    $numRow++;
                }
                $reader->close();
                unlink('upload/importexcel/' . $file['file_name']);
                $this->session->set_flashdata('pesan', 'Import Data Berhasil');
                redirect('admin/kelas');
            }
        } else {
            echo "Error :" . $this->upload->display_errors();
        };
    }

    public function hapus_semua()
    {
        $this->kelas_model->hapus_semua_data();
        redirect('admin/kelas');
    }
}
?>
