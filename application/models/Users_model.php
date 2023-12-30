<?php
class Users_model extends CI_Model
{
    private $_table = "pemilih";
    const SESSION_KEY = 'pemilih_id';

    public function rules()
    {
        return [
            [
                'field' => 'nisn',
                'label' => 'NISN',
                'rules' => 'required|exact_length[10]'
            ]
        ];
    }

        public function get_pemilih_by_nisn($nisn)
    {
        return $this->db->get_where('pemilih', ['nisn' => $nisn])->row_array();
    }

    public function login($nisn)
    {
        $query = $this->db->get_where($this->_table, ['nisn' => $nisn]);
        $pemilih = $query->row();

        // cek apakah NISN sudah terdaftar?
        if (!$pemilih) {
            return FALSE;
        }

        // buat sesi
        $this->session->set_userdata([self::SESSION_KEY => $pemilih->id]);

        return $this->session->has_userdata(self::SESSION_KEY);
    }

    public function logout()
    {
        $this->session->unset_userdata(self::SESSION_KEY);
        return !$this->session->has_userdata(self::SESSION_KEY);
    }

    
	public function current_user()
	{
		if (!$this->session->has_userdata(self::SESSION_KEY)) {
			return null;
		}

		$user_id = $this->session->userdata(self::SESSION_KEY);
		$query = $this->db->get_where($this->_table, ['id' => $user_id]);
		return $query->row();
	}
}
