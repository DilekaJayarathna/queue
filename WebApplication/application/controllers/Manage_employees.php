<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_employees extends CI_Controller
{
    public function index()
    {
        $this->load->view('manage_employees');
    }
}