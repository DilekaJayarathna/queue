<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function index()
    {
        $this->load->view('login');
    }

    public  function login(){
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password','Password','required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('login.php');

        } else {
            $enc_password = md5($this->input->post('password'));
            $this->employee_login->login($enc_password);
            //set message
            $this->session->set_flashdata('User logged', 'User is now logged successfully!');

            redirect('login/login');
        }

    }

}