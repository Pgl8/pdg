<?php

class Staff extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('Staff_model');

    }

    function index()    {
        if($this->session->has_userdata('username')){
            $this->load->view('header');
            $this->load->view('staff/index');
            $this->load->view('footer');
        }else{
            redirect(base_url());
        }

    }

    function details($idStaff){
        if($this->session->has_userdata('username')){
            //$data['policy'] = $this->Staff_model->getStaff($idStaff);

            $this->load->view('header');
            $this->load->view('staff/details');
            $this->load->view('footer');
        }else{
            redirect(base_url());
        }

    }

    public function getStaffAjax(){
        $staffs = $this->Staff_model->getDatatableStaff();
        $data = array();
        $no = $_POST['start'];
        foreach ($staffs as $staff) {
            $no++;
            $row = array();

            $row[] = $staff->name . ' ' . $staff->lastname;
            $row[] = $staff->email;
            $row[] = date ("d-m-Y", strtotime($staff->last_connected));

            if($staff->status == 'active') {
                $status = "<span class='label label-success'>Active</span>";
            } elseif ($staff->status == 'sent') {
                $status = "<span class='label label-info'>Invitation sent</span>";
            }

            $row[] = $status;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Staff_model->count_filtered(),
            "recordsFiltered" => $this->Staff_model->count_filtered(),
            "aaData" => $data,
        );
        //output to json format

        echo json_encode($output);
    }
}