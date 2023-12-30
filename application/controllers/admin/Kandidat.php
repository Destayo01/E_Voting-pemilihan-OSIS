<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Kandidat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('users_model');
        $this->load->model('kandidat_model');
        $this->load->model('auth_model');
        $this->load->model('kelas_model');
        $this->load->library('pagination');
    }

    public function index()
    {
        $config['base_url'] = site_url('/admin/kandidat');
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->kandidat_model->jumlah_kandidat();
        $config['per_page'] = 5;

        $this->pagination->initialize($config);

        $limit = $config['per_page'];
        $offset = html_escape($this->input->get('per_page'));

        $data['kandidat'] = $this->kandidat_model->get_kandidat($limit, $offset);
        $data['offset'] = $offset;

        $data['current_user'] = $this->auth_model->current_user();
        $this->load->view('admin/kandidat', $data);
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = array(
                'nisn' => $this->input->post('nisn'),
                'nama' => $this->input->post('nama'),
                'kelas' => $this->input->post('kelas'),
                'visi' => $this->input->post('visi'),
                'misi' => $this->input->post('misi'),
            );

            $upload_result = $this->_upload_foto();
            if ($upload_result['error']) {
                $data['error'] = $upload_result['error'];
                $this->load->view('admin/tambah_kandidat.php', $data);
            } else {
                $data['foto'] = $upload_result['upload_data']['file_name'];

                $inserted = $this->kandidat_model->create($data);

                if ($inserted) {
                    redirect('admin/kandidat');
                } else {
                    $data['error'] = 'Failed to create kandidat.';
                    $this->load->view('admin/tambah_kandidat.php', $data);
                }
            }
        } else {
            $data['current_user'] = $this->auth_model->current_user();
            $data['data_kelas'] = $this->kelas_model->get_kelass();
            $this->load->view('admin/tambah_kandidat.php', $data);
        }
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = array(
                'nisn' => $this->input->post('nisn'),
                'nama' => $this->input->post('nama'),
                'kelas' => $this->input->post('kelas'),
                'visi' => $this->input->post('visi'),
                'misi' => $this->input->post('misi'),
            );

            $upload_result = $this->_upload_foto();
            if (!$upload_result['error']) {
                $data['foto'] = $upload_result['upload_data']['file_name'];
            }

            $updated = $this->kandidat_model->update($id, $data);

            if ($updated) {
                redirect('admin/kandidat');
            } else {
                $data['error'] = 'Failed to update kandidat.';
                $this->load->view('admin/edit_kandidat.php', $data);
            }
        } else {
            $data['current_user'] = $this->auth_model->current_user();
            $data['data_kelas'] = $this->kelas_model->get_kelass();
            $data['kandidat'] = $this->kandidat_model->get($id);
            $this->load->view('admin/edit_kandidat.php', $data);
        }
    }

    private function _upload_foto()
    {
        $config['upload_path'] = FCPATH . 'upload/avatar/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = 1024;
        $config['max_width'] = 1080;
        $config['max_height'] = 1080;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            $error = $this->upload->display_errors();
            return ['error' => $error];
        } else {
            return ['upload_data' => $this->upload->data()];
        }
    }

    public function hapus_semua()
    {
        $this->kandidat_model->hapus_semua_data();
        redirect('admin/kandidat');
    }

    public function cari()
    {
        $config['base_url'] = site_url('/admin/kandidat');
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->kandidat_model->jumlah_kandidat();
        $config['per_page'] = 5;

        $this->pagination->initialize($config);

        $limit = $config['per_page'];
        $offset = html_escape($this->input->get('per_page'));

        $data['kandidat'] = $this->kandidat_model->cari_kandidat($limit, $offset);
        $data['offset'] = $offset;

        $data['current_user'] = $this->auth_model->current_user();
        $this->load->view('admin/kandidat.php', $data);
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
                            'visi'  => $row->getCellAtIndex(4),
                            'misi'  => $row->getCellAtIndex(5),
                        );
                        $this->kandidat_model->import_data($table);
                    }
                    $numRow++;
                }
                $reader->close();
                unlink('upload/importexcel/' . $file['file_name']);
                $this->session->set_flashdata('pesan', 'Import Data Berhasil');
                redirect('admin/kandidat');
            }
        } else {
            echo "Error :" . $this->upload->display_errors();
        };
    }

    public function delete($id)
    {
        $this->kandidat_model->delete($id);
        redirect('admin/kandidat');
    }
}
