<?php
class Dashboard_model extends CI_Model
{
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
                $percentage = ($row->jumlah_suara / total_suara()) * 100;
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
}
