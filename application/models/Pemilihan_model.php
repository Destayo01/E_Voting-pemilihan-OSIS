<?php
class Pemilihan_model extends CI_Model
{
    private $table = 'pemilihan';

    public function get_pilihan_data()
    {
        return $this->db->get($this->table)->result();
    }

    public function count_total_pemilih()
    {
        return $this->db->count_all($this->table);
    }

    public function insert_pemilihan($nisn, $kandidat_id)
    {
        $data = array(
            'pemilih_id' => $nisn,
            'kandidat_id' => $kandidat_id,
            'tanggal_pemilihan' => date('Y-m-d H:i:s')
        );

        $this->db->insert($this->table, $data);
    }

}
