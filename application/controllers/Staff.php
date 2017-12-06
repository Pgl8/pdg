<?php

class Staff extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('Staff_model');
        $this->load->model('Policies_model');
    }

    public function index(){
        if($this->session->has_userdata('username')){
            $this->load->view('header');
            $this->load->view('staff/index');
            $this->load->view('footer');
        }else{
            redirect(base_url());
        }

    }

    public function details($idStaff){
        if($this->session->has_userdata('username')){
            $data['user'] = $this->Staff_model->getStaff($idStaff);
            $data['assigned_policies'] = $this->Policies_model->getUserPolicies($idStaff);
            $data['unassigned_policies'] = $this->Policies_model->getUnassignedPolicies();

            $this->load->view('header');
            $this->load->view('staff/details', $data);
            $this->load->view('footer');
        }else{
            redirect(base_url());
        }

    }

    public function newStaff(){
        if($this->session->has_userdata('username')){

            $this->form_validation->set_rules('firstname', 'firstname', 'required|trim');
            $this->form_validation->set_rules('username', 'firstname', 'required|trim');
            $this->form_validation->set_rules('lastname', 'firstname', 'required|trim');
            $this->form_validation->set_rules('email', 'email', 'required|trim');

            if($this->form_validation->run() == FALSE){
                redirect(base_url());
            }else{

                foreach ($this->input->post() as $key => $value) {
                    $data[$key] = $value;
                }

                if($this->Staff_model->addStaff($data)){
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>User added successfully.</div>');
                }else{
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>There was a problem adding the user details.</div>');
                }
            }
        }else{
            redirect(site_url(), 'location');
        }
    }

    public function editStaff($idStaff){
        if($idStaff){
            if($this->session->has_userdata('username')){
                $data['user'] = $this->Staff_model->getStaff($idStaff);
                $data['assigned_policies'] = $this->Policies_model->getUserPolicies($idStaff);
                $data['unassigned_policies'] = $this->Policies_model->getUnassignedPolicies();

                $this->form_validation->set_rules('firstname', 'firstname', 'required|trim');

                if($this->form_validation->run() == FALSE){

                    $this->load->view('header');
                    $this->load->view('staff/details', $data);
                    $this->load->view('footer');

                }else{
                    unset($data);

                    $data['firstname'] = $this->input->post('firstname');

                    if($this->Staff_model->editStaff($idStaff, $data)){
                        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>User edited successfully.</div>');
                    }else{
                        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>There was a problem editing the user details.</div>');
                    }

                    redirect('Staff/details/'.$idStaff);

                }
            }else{
                redirect(base_url());
            }
        }
    }

    public function deleteStaff($idStaff){
        if($idStaff){
            if($this->session->has_userdata('username')){

                if($this->Staff_model->deleteStaff($idStaff)){
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>User deleted successfully.</div>');
                }else{
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>There was a problem deleting the user.</div>');
                }

                redirect('Staff/index');
            }else{
                redirect(site_url(), 'location');
            }
        }
    }

    public function assignPolicy($idStaff, $idPolicy){
        if($this->session->has_userdata('username')){

            if($this->Staff_model->assignPolicy($idStaff, $idPolicy)){
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Policy assigned successfully.</div>');
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>There was a problem assigning the policy.</div>');
            }

            redirect('Staff/details/'.$idStaff);
        }

    }

    public function unassignPolicy($idStaff, $idPolicy){
        if($this->session->has_userdata('username')){

            if($this->Staff_model->unassignPolicy($idStaff, $idPolicy)){
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Policy unassigned successfully.</div>');
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>There was a problem unassigning the policy.</div>');
            }

            redirect('Staff/details/'.$idStaff);
        }

    }

    public function getStaffAjax(){
        $staffs = $this->Staff_model->getDatatableStaff();
        $data = array();
        $no = $_POST['start'];
        foreach ($staffs as $staff) {
            $no++;
            $row = array();

            $row[] = '<a href="'.base_url('Staff/details/') . $staff->idUser . '">' . $staff->firstname . ' ' . $staff->lastname . '</a>';
            $row[] = '<a href="'.base_url('Staff/details/') . $staff->idUser . '">' . $staff->email . '</a>';
            if($staff->last_connected == '0000-00-00'){
                $row[] = '<a href="'.base_url('Staff/details/') . $staff->idUser . '"> - </a>';
            }else{
                $row[] = '<a href="'.base_url('Staff/details/') . $staff->idUser . '">' . date ("d-m-Y", strtotime($staff->last_connected)) . '</a>';
            }


            if($staff->status == 'active') {
                $status = "<span class='label label-success'>Active</span>";
            } elseif ($staff->status == 'sent') {
                $status = "<span class='label label-info'>Invitation sent</span>";
            }

            $row[] = '<a href="'.base_url('Staff/details/') . $staff->idUser . '">' . $status . '</a>';

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