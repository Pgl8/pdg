<?php

/**
 * Class Policies
 */
class Policies extends CI_Controller{

    /**
     * Policies constructor.
     */
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('Policies_model');

    }

    /**
     * Main view
     */
    function index()    {
        if($this->session->has_userdata('username')){
            $data['policies'] = $this->Policies_model->getUserPolicies($this->session->userdata('idUser'));
            $this->load->view('header');
            $this->load->view('policies/index', $data);
            $this->load->view('footer');
        }else{
            redirect(base_url());
        }

    }

    /**
     * Shows policy details
     * @param $idPolicy
     */
    function details($idPolicy){
        if($this->session->has_userdata('username')){
            $data['policy'] = $this->Policies_model->getPolicies($idPolicy);

            $this->load->view('header');
            $this->load->view('policies/details', $data);
            $this->load->view('footer');
        }else{
            redirect(base_url());
        }

    }

    /**
     * Ajax petition to get Policies
     */
    public function getPoliciesAjax(){
        $staffs = $this->Policies_model->getDatatableStaff();
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
            "recordsTotal" => $this->Policies_model->count_filtered(),
            "recordsFiltered" => $this->Policies_model->count_filtered(),
            "aaData" => $data,
        );

        //output to json format
        echo json_encode($output);
    }

}