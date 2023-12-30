<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemilih_model extends CI_Model
{
    private $table = 'pemilih';

    public function update_status($nisn) {
        $this->db->where('nisn', $nisn);
        $this->db->update($this->table, array('status' => 'Sudah Memilih'));
    }

    public function reset_status($id) {

        $table = array('status' => 'Belum Memilih');
        $this->db->where('id', $id);
        return $this->db->update('pemilih', $table);
    }

    public function jumlah_pemilih() {
        return $this->db->count_all($this->table);
    }           

    public function jumlah_pemilih_belum() {
        $this->db->where('status','Belum Memilih');
        return $this->db->count_all_results($this->table);
    }

    public function jumlah_pemilih_sudah() {
        $this->db->where('status','Sudah Memilih');
        return $this->db->count_all_results($this->table);
    }

    public function import_data($table)
    {
        $jumlah = count($table);
        if ($jumlah > 0) {
            $this->db->replace($this->table, $table);
        }
    }

    public function get_pemilih($limit, $offset)
    {
        $this->db->limit($limit, $offset);
        return $this->db->get($this->table)->result();
    }

    public function get_pemilih_by_id($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    public function insert_pemilih($data)
    {
        $this->db->insert($this->table, $data);
    }

    public function update_pemilih($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }

    public function delete_pemilih($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }

    public function cari_pemilih($limit, $offset)
    {
        $q = html_escape($this->input->get('q'));
        $this->db->like('nisn', $q);
        $this->db->or_like('Nama', $q);
        $this->db->or_like('Kelas', $q);
        $this->db->limit($limit, $offset);
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function hapus_semua_data()
    {
        $this->db->empty_table('pemilih');
        return true;
    }
}
