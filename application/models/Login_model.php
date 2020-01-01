<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
	public function check_admin($email,$password)
	{
		return $this->db->query("SELECT * FROM admin WHERE email='$email' AND password='$password' LIMIT 1 ");
	}
}
