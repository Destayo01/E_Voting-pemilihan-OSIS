<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hasil_model extends CI_Model
{
    private $table = 'pemilihan';

    public function get_hasil($limit, $offset)
    {
        $this->db->limit($limit, $offset);
        return $this->db->get($this->table)->result();
    }

    public function delete_hasil($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }

    public function get_percentage_votes()
    {
        $this->db->select('kandidat_id, COUNT(*) as jumlah_suara');
        $this->db->group_by('kandidat_id');
        $query = $this->db->get('pemilihan');

        if ($query->num_rows() > 0) {
            $result = $query->result();

            $percentage_votes = [];

            foreach ($result as $row) {
                // Hitung persentase pemilihan
                $percentage = ($row->jumlah_suara / $this->total_suara()) * 100;
                $percentage_votes['Kandidat ' . $row->kandidat_id] = $percentage;
            }

            return $percentage_votes;
        }

        return [];
    }

    // Fungsi untuk menghitung total suara
    private function total_suara()
    {
        $this->db->from('pemilihan');
        return $this->db->count_all_results();
    }

    public function hapus_semua_data()
    {
        $this->db->empty_table('pemilihan');
        return true;
    }

    public function cari_hasil($limit, $offset)
    {
        $q = html_escape($this->input->get('q'));
        $this->db->like('pemilih_id', $q);
        $this->db->or_like('kandidat_id', $q);
        $this->db->limit($limit, $offset);
        $query = $this->db->get('pemilihan');
        return $query->result();
    }

    public function jumlah_hasil() {
        return $this->db->count_all('pemilihan');
    }    

}
