<?php
class Kandidat_model extends CI_Model
{
    private $_table = "kandidat";

    public function get_all()
    {
        return $this->db->get($this->_table)->result_array();
    }

    public function jumlah_kandidat() {
        return $this->db->count_all($this->_table);
    }

    public function get($id)
    {
        return $this->db->get_where($this->_table, ['id' => $id])->row_array();
    }

    public function pilih_kandidat($user_id, $kandidat_id)
    {
        // Simpan pemilihan kandidat ke dalam tabel pemilihan (Anda perlu membuat tabel ini)
        $data = [
            'user_id' => $user_id,
            'kandidat_id' => $kandidat_id,
            'tanggal_pemilihan' => date('Y-m-d H:i:s'),
        ];

        $this->db->insert('pemilihan', $data);
    }

    public function create($data)
    {
        return $this->db->insert($this->_table, $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->_table, $data);
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, ['id' => $id]);
    }

    public function hapus_semua_data()
    {
        $this->db->empty_table('kandidat');
        return true;
    }

    public function cari_kandidat($limit, $offset)
    {
        $q = html_escape($this->input->get('q'));
        $this->db->like('nisn', $q);
        $this->db->or_like('nama', $q);
        $this->db->or_like('kelas', $q);
        $this->db->or_like('foto', $q);
        $this->db->limit($limit, $offset);
        $query = $this->db->get($this->_table);
        return $query->result();
    }

    public function get_kandidat($limit, $offset)
    {
        $this->db->limit($limit, $offset);
        return $this->db->get($this->_table)->result();
    }

    public function import_data($table)
    {
        $jumlah = count($table);
        if ($jumlah > 0) {
            $this->db->replace($this->_table, $table);
        }
    }
}


