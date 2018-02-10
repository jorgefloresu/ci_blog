<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }

    public function create()
	{
        $data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password'))
        );
		$this->db->insert('users', $data);
        return $this->db->insert_id();
	}

    public function check()
	{
		$query = $this->db->select('id')
                          ->where('email', $this->input->post('email'))
                          ->where('password', md5($this->input->post('password')))
                          ->get('users');
        $row = $query->row();
        if ($row == false) {
            return false;
        } else {
            return $row->id;
        }
	}
}
