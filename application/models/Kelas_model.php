<?php
class Kelas_model extends CI_Model {

    public function get_kelas_by_id($id) {
        return $this->db->get_where('kelas', array('id' => $id))->row();
    }

    public function jumlah_kelas() {
        return $this->db->count_all('kelas');
    }

    public function insert_kelas($data) {
        return $this->db->insert('kelas', $data);
    }

    public function update_kelas($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('kelas', $data);
    }

    public function delete_kelas($id) {
        $this->db->where('id', $id);
        return $this->db->delete('kelas');
    }

    public function get_kelas($limit, $offset)
    {
        $this->db->limit($limit, $offset);
        return $this->db->get('kelas')->result(); // Gunakan $_table di sini
    }

    public function get_kelass()
    {
        return $this->db->get('kelas')->result(); // Gunakan $_table di sini
    }

    public function cari_kelas($limit, $offset)
    {
        $q = html_escape($this->input->get('q'));
        $this->db->like('id', $q);
        $this->db->or_like('nama_kelas', $q);
        $this->db->limit($limit, $offset);
        $query = $this->db->get('kelas');
        return $query->result();
    }

    public function import_data($table)
    {
        $jumlah = count($table);
        if ($jumlah > 0) {
            $this->db->replace('kelas', $table);
        }
    }

    public function hapus_semua_data()
    {
        $this->db->empty_table('kelas');
        return true;
    }
}
?>
