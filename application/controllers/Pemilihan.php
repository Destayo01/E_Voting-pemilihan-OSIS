<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemilihan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pemilih_model');
        $this->load->model('kandidat_model');
        $this->load->model('pemilihan_model');
        $this->load->model('users_model');
    }

    public function proses_pemilihan()
    {
        $nisn = $this->session->userdata('nisn');

        if (empty($nisn)) {
            redirect('users');
        }

        // Loop melalui kandidat dan simpan pilihan masing-masing pemilih
        foreach ($this->kandidat_model->get_all() as $kandidat) {
            $kandidat_id = $this->input->post('kandidat_id_' . $kandidat['id']);

            // Periksa apakah kandidat_id tidak NULL sebelum disimpan
            if ($kandidat_id !== null) {
                // Simpan hasil pemilihan ke dalam tabel pemilihan
                $this->pemilihan_model->insert_pemilihan($nisn, $kandidat_id);
            }
        }

        $this->pemilih_model->update_status($nisn);
        redirect('page/selesai');
    }

    public function grafik_pemilihan()
    {
        $pilihan_data = $this->Pemilihan_model->get_pilihan_data();

        $percentage_votes = [];
        $total_votes = $this->Pemilihan_model->count_total_pemilih();

        foreach ($pilihan_data as $pilihan) {
            $kandidat_id = $pilihan->kandidat_id;

            if (isset($percentage_votes[$kandidat_id])) {
                $percentage_votes[$kandidat_id]++;
            } else {
                $percentage_votes[$kandidat_id] = 1;
            }
        }

        foreach ($percentage_votes as $kandidat_id => $count) {
            $percentage_votes[$kandidat_id] = ($count / $total_votes) * 100;
        }

        $data['percentage_votes'] = $percentage_votes;
        $this->load->view('grafik_pemilihan', $data);
    }

}
