<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class New_employee extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form'));
        $this->load->library(array('session', 'form_validation', 'email'));
        $this->load->database();
        $this->load->model('Employee_model');
    }

    public function index()
    {
        $this->load->view('new_employee');
    }

    function register()
    {
        // Set validation rules
//        $this->form_validation->set_rules('fname', 'First Name', 'trim|required|alpha|min_length[3]|max_length[30]|xss_clean');
//        $this->form_validation->set_rules('lname', 'Last Name', 'trim|required|alpha|min_length[3]|max_length[30]|xss_clean');
//        $this->form_validation->set_rules('email', 'Email ID', 'trim|required|valid_email|is_unique[user.email]');
//        $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[cpassword]|md5');
//        $this->form_validation->set_rules('cpassword', 'Confi    rm Password', 'trim|required');

        // Validate form input
//        if ($this->form_validation->run() == FALSE)
        if (FALSE) {
            $this->load->view('new_employee');
        } else {
            //insert the user registration details into database
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'first_name' => $this->input->post('first_name'),
                'middle_name' => $this->input->post('middle_name'),
                'last_name' => $this->input->post('last_name'),
                'dob' => $this->input->post('dob'),
                'gender' => $this->input->post('gender'),
                'nic' => $this->input->post('nic'),
                'telephone' => $this->input->post('telephone'),
                'address' => $this->input->post('address'),
                'email' => $this->input->post('email'),
                'role' => $this->input->post('role')
            );

            // Insert form data into database
            if ($this->user_model->insert_user($data)) {
                // Send email
                if ($this->user_model->sendEmail($this->input->post('email'))) {
                    // Successfully sent mail
                    $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Account successfully registered! Please confirm the mail sent to your email address.</div>');
                    redirect('New_employee/index');
                } else {
                    // Error
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Ops! Something bad happened when sending the confirmation email. Please try again!</div>');
                    redirect('New_employee/index');
                }
            } else {
                // Error
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Ops! Something bad happened when registering the account. Please try again!</div>');
                redirect('New_employee/index');
            }
        }
    }

    function verify($hash = NULL)
    {
        if ($this->user_model->verify_email($hash)) {
            $this->session->set_flashdata('verify_msg', '<div class="alert alert-success text-center">Your Email Address is successfully verified! Please login to access your account!</div>');
            redirect('user/register');
        } else {
            $this->session->set_flashdata('verify_msg', '<div class="alert alert-danger text-center">Sorry! There is error verifying your Email Address!</div>');
            redirect('user/register');
        }
    }
}