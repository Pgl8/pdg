<?php

class Login extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('Login_model');

    }

    function index(){
        if($this->session->has_userdata('username') && $this->session->userdata('role') == 'admin'){
            redirect('Staff/index');
        }else if($this->session->has_userdata('username') && $this->session->userdata('role') == 'staff'){
            redirect('Policies/index');
        }else{
            $this->load->view('header');
            $this->load->view('login/index');
            $this->load->view('footer');
        }
    }

    function auth (){
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        //set validations
        $this->form_validation->set_rules("username", "Username", "trim|required");
        $this->form_validation->set_rules("password", "Password", "trim|required");

        if($result = $this->Login_model->login_user($username, sha1($password))){

            //set the session variables
            $sessiondata = array(
                'idUser' => $result[0]->idUser,
                'username' => $result[0]->username,
                'email' => $result[0]->email,
                'role' => $result[0]->role
            );

            $this->session->set_userdata($sessiondata);
            redirect(base_url());
//            if($this->session->userdata('role') == 'admin') {
//                redirect((base_url()));
//
//            }else{
//
//                $this->load->view('header');
//                $this->load->view('staff/index');
//                $this->load->view('footer');
//            }

        }else{
            $data['error'] = '<div class="alert alert-danger">Username or password invalid.</div>';
            $this->load->view('header');
            $this->load->view('login/index', $data);
            $this->load->view('footer');
        }

    }

    function logout(){
        $this->session->sess_destroy();
        redirect(base_url());
    }
}