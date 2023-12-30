<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Pemilih extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pemilih_model');
        $this->load->model('kelas_model');
        $this->load->library('pagination');
        $this->load->model('auth_model');
    }

    public function index()
    {
        $config['base_url'] = site_url('/admin/pemilih');
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->pemilih_model->jumlah_pemilih();
        $config['per_page'] = 5; // <-kamu bisa ubah ini

        $this->pagination->initialize($config);

        $limit = $config['per_page'];
        $offset = html_escape($this->input->get('per_page'));

        $data['pemilih'] = $this->pemilih_model->get_pemilih($limit, $offset);
        $data['offset'] = $offset;

        $data['current_user'] = $this->auth_model->current_user();
        $this->load->view('admin/pemilih.php', $data);
    }

    public function tambah()
    {
        $data['current_user'] = $this->auth_model->current_user();
        $data['data_kelas'] = $this->kelas_model->get_kelass();
        $this->load->view('admin/tambah_pemilih', $data);
    }

    public function simpan()
    {
        $data = array(
            'nisn' => $this->input->post('nisn'),
            'nama' => $this->input->post('nama'),
            'kelas' => $this->input->post('kelas')
        );

        $data['current_user'] = $this->auth_model->current_user();
        $this->pemilih_model->insert_pemilih($data);
        redirect('admin/pemilih');
    }

    public function edit($id)
    {
        $data['current_user'] = $this->auth_model->current_user();
        $data['pemilih'] = $this->pemilih_model->get_pemilih_by_id($id);
        $data['data_kelas'] = $this->kelas_model->get_kelass();
        $this->load->view('admin/edit_pemilih', $data);
    }

    public function update($id)
    {
        $data = array(
            'nisn' => $this->input->post('nisn'),
            'nama' => $this->input->post('nama'),
            'kelas' => $this->input->post('kelas')
        );

        $this->pemilih_model->update_pemilih($id, $data);
        redirect('admin/pemilih');
    }

    public function hapus($id)
    {
        $this->pemilih_model->delete_pemilih($id);
        redirect('admin/pemilih');
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
                            'nisn'  => $row->getCellAtIndex(1),
                            'nama'  => $row->getCellAtIndex(2),
                            'kelas'  => $row->getCellAtIndex(3),
                            'status'  => $row->getCellAtIndex(4),
                        );
                        $this->pemilih_model->import_data($table);
                    }
                    $numRow++;
                }
                $reader->close();
                unlink('upload/importexcel/' . $file['file_name']);
                $this->session->set_flashdata('pesan', 'Import Data Berhasil');
                redirect('admin/pemilih');
            }
        } else {
            echo "Error :" . $this->upload->display_errors();
        };
    }

    public function cari()
    {
        $config['base_url'] = site_url('/admin/pemilih');
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->pemilih_model->jumlah_pemilih();
        $config['per_page'] = 5;

        $this->pagination->initialize($config);

        $limit = $config['per_page'];
        $offset = html_escape($this->input->get('per_page'));

        $data['pemilih'] = $this->pemilih_model->cari_pemilih($limit, $offset);
        $data['offset'] = $offset;

        $data['current_user'] = $this->auth_model->current_user();
        $this->load->view('admin/pemilih.php', $data);
    }
    
    public function reset_status($id)
    {
        $this->pemilih_model->reset_status($id);
        redirect('admin/pemilih');
    }

    public function hapus_semua()
    {
        $this->pemilih_model->hapus_semua_data();
        redirect('admin/pemilih');
    }
}
