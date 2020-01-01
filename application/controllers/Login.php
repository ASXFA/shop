<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
    }

    public function index()
    {
        $this->load->view('admin/login');
    }

    public function action_login()
    {
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));

        if ($this->login_model->check_admin($email,$password)->num_rows() > 0) {
            $query['admin'] = $this->login_model->check_admin($email,$password)->row_array();
            $this->session->set_userdata('akses','masuk');
            $this->session->set_userdata('nama',$query['nama']);
            $this->session->set_userdata('email',$email);
            redirect('adm/admin');
        }else{
            $this->session->set_flashdata("message","Wrong Password or Email");
            redirect('Login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
