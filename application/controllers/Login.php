<?php

class Login extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('Login_model');

    }

    function index(){
//        if($this->session->has_userdata('username') && $this->session->userdata('role') == 'admin') {
//            $data['menu'] = 'school';
//            $data['submenu'] = 'users';
//            $this->load->view('header', $data);
//            $this->load->view('login/index');
//            $this->load->view('footer');
////        }else if($this->session->has_userdata('username') && $this->session->userdata('role') == 'teacher'){
////            $data['menu'] = 'attendance';
////            $this->load->view('header', $data);
////            $this->load->view('attendance/index');
////            $this->load->view('scripts');
//        }else{
            $this->load->view('header');
            $this->load->view('login/index');
            $this->load->view('footer');
//        }

        //$this->session->unset_userdata('status');
    }

    function auth (){
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        //set validations
        $this->form_validation->set_rules("username", "Username", "trim|required");
        $this->form_validation->set_rules("password", "Password", "trim|required");

        if($this->session->has_userdata('username')){
            $data['menu'] = 'school';
            $data['submenu'] = 'users';
            $this->load->view('header', $data);
            $this->load->view('users/index');
        }else{

            if($result = $this->Login_model->login_user($username, sha1($password))){

                //set the session variables
                $sessiondata = array(
                    'idSchool' => $result[0]->idSchool,
                    'idUser' => $result[0]->idUser,
                    'username' => $username,
                    'school' => $result[0]->schoolName,
                    'email' => $result[0]->email,
                    'role' => $result[0]->role,
                    'loginuser' => TRUE
                );

                $this->session->set_userdata($sessiondata);

                if($this->session->userdata('role') == 'teacher') {
                    $data['menu'] = 'attendance';
                    $this->load->view('header', $data);
                    $this->load->view('attendance/index');
                    $this->load->view('scripts');
                }else{
                    $data['menu'] = 'school';
                    $data['submenu'] = 'users';
                    $this->load->view('header', $data);
                    $this->load->view('users/index');
                    $this->load->view('scripts');
                }

            }else{
                $data['error'] = '<div class="alert alert-danger">Username or password invalid.</div>';
                $this->load->view('header');
                $this->load->view('login/index', $data);
                $this->load->view('scripts');
            }
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        $this->load->view('header');
        $this->load->view('login/index');
        $this->load->view('scripts');
    }
}