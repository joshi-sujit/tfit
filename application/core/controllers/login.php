<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index() {

        $username = $this->input->post('username');
        $group = '1';
        $password = $this->input->post('password');
        
		$password = mysql_real_escape_string($password);
        $salt = "oijahsfdapsf80efdjnsdjp";
        $salt .= $password;
        $password = $salt;
        $password = md5($password);
       $username = mysql_real_escape_string($username);


        $query_user = $this->db->query("SELECT * FROM super_user WHERE username='$username' and password='$password' and `group`='$group'");
        if ($query_user->num_rows() > 0) {
            foreach ($query_user->result() as $rowUser) {
                if ($password == $rowUser->password) {

                    $result = $query_user->row();
                    $this->session->set_userdata('admin_user_id', $result->Id);
                    $this->session->set_userdata('group', $result->group);
                    //password is correct user logged in
                    $this->session->set_userdata('username', $username);
                    $redirect = base_url() . "admin";
                    redirect($redirect);
                }
            }
        } else {
            $this->session->set_userdata('Errormsg', 'Incorrect username and password');
            $redirect = base_url() . "_cpanel";
            redirect($redirect);
        }
    }

}