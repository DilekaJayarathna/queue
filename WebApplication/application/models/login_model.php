<?php
class login_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function register($enc_password)
    {
        //user data array
        $data = array(
            'username' => $this->input->post('username'),
            'password' => $enc_password

        );
        //insert data
        return $this->db->insert('employee_login', $data);
    }

}