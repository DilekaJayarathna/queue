<?php

class Patient_model extends CI_Model
{
    // Insert into user table
    function insert_patient($data)
    {
        $pat_array = array(
            'first_name' => $data['first_name'],
            'middle_name' => $data['middle_name'],
            'last_name' => $data['last_name'],
            'nic' => $data['nic'],
            'dob' => $data['dob'],
            'gender' => $data['gender'],
            'telephone' => $data['telephone'],
            'address' => $data['address'],
            'email' => $data['email'],
            'profile_picture' => 'profile_picture'
        );
        $this->db->insert('patient', $pat_array);

        $pat_login_arr = array(
            'patient_id' => $this->db->insert_id(),
            'username' => $data['username'],
            'password' => $data['password']
        );
        return $this->db->insert('patient_login', $pat_login_arr);
    }

    // Send verification email to user's email id
    function send_email($to_email)
    {
        $from_email = 'queue.ivantha';
        $subject = 'Queue : Verify your email address';
        $message = 'Dear user,<br/><br/>Please click on the below activation link to verify your email address.<br /><br />'
            . site_url('New_patient/verify/') . md5($to_email) . '<br/><br/>Thanks!<br/>Queue Team';

        // Configure email settings
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.gmail.com';
        $config['smtp_port'] = '465';
        $config['smtp_user'] = $from_email;
        $config['smtp_pass'] = 'queue@ivantha';
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['newline'] = "\r\n";
        $this->email->initialize($config);

        // Send mail
        $this->email->from($from_email, 'Queue');
        $this->email->to($to_email);
        $this->email->subject($subject);
        $this->email->message($message);
        return $this->email->send();
    }

    // Activate user account
    public function verify_email()
    {
        $data = array(
            'verified' => 1
        );
        $this->db->where('md5(email)', $this->uri->segment(3));
        return $this->db->update('patient', $data);
    }
}