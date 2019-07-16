<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index() {

        $username = mysql_real_escape_string($this->input->post('username'));
        $password = mysql_real_escape_string($this->input->post('password'));

        $salt = "ewu$%9@sf8@$&^sxrq2";
        $salt .= $password;
        $password = $salt;
        $password = md5($password);

        //$query_user = $this->db->query("SELECT * FROM tbl_admin WHERE username='$username' and password='$password' and `group`='$group'");
		$query_user = $this->db->query("SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'");
		
        if($query_user->num_rows() > 0) {
            foreach($query_user->result() as $rowUser) {
                if ($password == $rowUser->password) {
                    $result = $query_user->row();
                    $this->session->set_userdata('id_admin', $result->admin_id);
                   	$this->session->set_userdata('tfit_user',$username);
					$redirect = base_url()."admin";
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