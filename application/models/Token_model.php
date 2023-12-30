<?php

class Token_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database(); // Memuat library database
    }

    public function get_tokens() {
        // Fungsi untuk mendapatkan data token dari tabel tokens
        return $this->db->get('token')->result();
    }

    public function get_token_by_id($token_id) {
        // Ambil data token berdasarkan ID
        $this->db->where('id', $token_id);
        $result = $this->db->get('token')->row();

        // Periksa apakah token ditemukan
        if ($result) {
            return $result;
        } else {
            // Jika tidak ditemukan, kembalikan nilai kosong atau sesuaikan dengan kebutuhan aplikasi Anda
            return null;
        }
    }
    
    public function get_token_by_value($token_value) {
        
        $this->db->where('token_value', $token_value);
        return $this->db->get('token')->row();
    }
    
    public function get_first_token_value() {
        $query = $this->db->get('token');
        $result = $query->first_row();
        
        if ($result) {
            return $result->token_value;
        } else {
            return null; // atau sesuaikan dengan kebutuhan aplikasi Anda
        }
    }

    public function get_token_by_value_and_status($token_value, $status) {
        $this->db->where('token_value', $token_value);
        $this->db->where('status', $status);
        return $this->db->get('token')->row();
    }
            
    public function update_status($token_id, $new_status) {
        // Ambil data token berdasarkan ID
        $token = $this->get_token_by_id($token_id);
        
        if ($token) {
            // Toggle status
            $new_status = ($token->status == 'used') ? 'unused' : 'used';
            
            // Update status
            $this->toggle_status_directly($token_id, $new_status);
        } else {
            echo "error blok!!";
        }
            
        redirect('admin/token');
    }

    public function toggle_status_directly($token_id, $new_status) {
        // Update status langsung di database
        $this->db->where('id', $token_id);
        $this->db->update('token', array('status' => $new_status));
    }    
    
    public function insert_token($token_value, $status) {
        $data = array(
            'token_value' => $token_value,
            'status'      => $status
        );
        $this->db->insert('token', $data);
    }    

    public function delete_token($token_id) {
        // Hapus token berdasarkan ID
        $this->db->where('id', $token_id);
        $this->db->delete('token');
    }    
}