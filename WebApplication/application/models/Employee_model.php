<?php

class Employee_model extends CI_Model
{
    // Insert into user table
    function insert_employee($data)
    {
        return $this->db->insert('user', $data);
    }

    // Send verification email to user's email id
    function send_email($to_email)
    {
        $from_email = 'oshan.ivantha@gmail.com';
        $subject = 'Queue : Verify your email address';
        $message = 'Dear user,<br/><br/>Please click on the below activation link to verify your email address.<br /><br /> http://www.mydomain.com/user/verify/' . md5($to_email) . '<br /><br /><br />Thanks<br />Mydomain Team';

        // Configure email settings
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.mydomain.com'; // smtp host name
        $config['smtp_port'] = '465'; // smtp port number
        $config['smtp_user'] = $from_email;
        $config['smtp_pass'] = '********'; // $from_email password
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
    function verify_email($key)
    {
        $data = array('status' => 1);
        $this->db->where('md5(email)', $key);
        return $this->db->update('user', $data);
    }
}