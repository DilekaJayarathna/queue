<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class New_patient extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form'));
        $this->load->library(array('session', 'form_validation', 'email'));
        $this->load->database();
        $this->load->model('Patient_model');
    }

    public function index()
    {
        $this->load->view('new_patient');
    }

    function register()
    {
        // Set validation rules
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[100]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[100]|md5');
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[1]|max_length[100]');
        $this->form_validation->set_rules('middle_name', 'Middle Name', 'trim|min_length[1]|max_length[100]');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|min_length[1]|max_length[100]');
        $this->form_validation->set_rules('dob', 'Date Of Birth', 'required');
        $this->form_validation->set_rules('nic', 'NIC', 'trim|required|exact_length[10]|regex_match[/\d{9}[vV]/]');
        $this->form_validation->set_rules('telephone', 'Telephone', 'trim|required|exact_length[10]|numeric');
        $this->form_validation->set_rules('address', 'Address', 'trim|required|min_length[1]|max_length[100]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        // Validate form input
//        if ($this->form_validation->run() == FALSE)
        if(FALSE)
        {
            $this->load->view('new_patient');
        } else {
            // Insert the user registration details into database
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'first_name' => $this->input->post('firstName'),
                'middle_name' => $this->input->post('middleName'),
                'last_name' => $this->input->post('lastName'),
                'dob' => $this->input->post('dob'),
                'gender' => $this->input->post('gender'),
                'nic' => $this->input->post('nic'),
                'telephone' => $this->input->post('telephone'),
                'address' => $this->input->post('address'),
                'email' => $this->input->post('email'),
                'role' => $this->input->post('role')
            );

            // Insert form data into database
            if ($this->Patient_model->insert_patient($data)) {
                // Send email
                if ($this->Patient_model->send_email($this->input->post('email'))) {
                    // Successfully sent mail
                    $this->session->set_flashdata('emp_reg_msg', '<div class="alert alert-success text-center">Account successfully registered! Please confirm the mail sent to your email address.</div>');
                    redirect('Manage_patients/index');
                } else {
                    // Error
                    $this->session->set_flashdata('emp_reg_msg', '<div class="alert alert-danger text-center">Ops! Something bad happened when sending the confirmation email. Please try again!</div>');
                    redirect('Manage_patients/index');
                }
            } else {
                // Error
                $this->session->set_flashdata('emp_reg_msg', '<div class="alert alert-danger text-center">Ops! Something bad happened when registering the account. Please try again!</div>');
                redirect('Manage_patients/index');
            }
        }
    }

    function verify($hash = NULL)
    {
        if ($this->Patient_model->verify_email($hash)) {
            $this->session->set_flashdata('email_verify_msg', '<div class="alert alert-success text-center">Your email address is successfully verified! Please login to access your account.</div>');
            redirect('Manage_patients/index');
        } else {
            $this->session->set_flashdata('email_verify_msg', '<div class="alert alert-danger text-center">Sorry! There is an error verifying your email address.</div>');
            redirect('Manage_patients/index');
        }
    }
}