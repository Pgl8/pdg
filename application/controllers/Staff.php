<?php

/**
 * Class Staff
 */
class Staff extends CI_Controller {

    /**
     * Staff constructor.
     */
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('Staff_model');
        $this->load->model('Policies_model');
    }

    /**
     * Main view
     */
    public function index(){
        if($this->session->has_userdata('username')){
            $this->load->view('header');
            $this->load->view('staff/index');
            $this->load->view('footer');
        }else{
            redirect(base_url());
        }

    }

    /**
     * Shows staff details
     * @param $idStaff
     */
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

    /**
     * Adds new staff
     */
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

                    $data['code'] = $this->generateCode($data['email']);
                    if($this->sendVerificationEmail($data)){
                        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>User added successfully.</div>');
                    }else{
                        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>There was a problem sending the invitation.</div>');
                    }
                }else{
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>There was a problem adding the user details.</div>');
                }

                redirect(base_url());
            }
        }else{
            redirect(site_url(), 'location');
        }
    }

    /**
     * Generates verification code
     * @param $email
     * @return string
     */
    private function generateCode($email){
        $data['email'] = $email;
        $data['code'] = md5(uniqid(rand(),true));

        $this->Staff_model->addCode($data);

        return $data['code'];
    }

    /**
     * Sends verification email
     * @param $data
     */
    private function sendVerificationEmail($data){

        $this->load->library('email');  	//load email library
        $this->email->from('admin@ifabackend.com', 'IFA Backend platform'); //sender's email
        $address = $data['email'];	//receiver's email
        $subject= "Welcome to IFA Backend platform";	//subject

        /*-----------email body starts-----------*/
        $message=
        'Thanks for signing up, '.$data['firstname'].'!
      
        Your account has been created. 
        Here are your login details.
        -------------------------------------------------
        Email   : ' . $data['email'] . '
        Temporary Password: ' . DEFAULT_PASSWORD . '
        -------------------------------------------------
                        
        Please click this link to activate your account:
            
        ' . base_url() . 'Staff/verifyStaff?' .
            'email=' . $address . '&hash=' . $data['code'] ;
        /*-----------email body ends-----------*/

        $this->email->to($address);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();
    }

    /**
     * Verifies staff
     */
    public function verifyStaff(){
        $email = $this->input->get('email');
        $data['user'] = $this->Staff_model->getStaffByEmail($email);

        $this->load->view('header');
        $this->load->view('staff/verify', $data);
        $this->load->view('footer');

        $this->form_validation->set_rules('firstname', 'firstname', 'required|trim');
        $this->form_validation->set_rules('username', 'firstname', 'required|trim');
        $this->form_validation->set_rules('lastname', 'firstname', 'required|trim');
        $this->form_validation->set_rules('email', 'email', 'required|trim');
        $this->form_validation->set_rules('password', 'password', 'required|trim');

        if($this->input->post()){
            unset($data);
            foreach ($this->input->post() as $key => $value) {
                if($key != 'submit'){
                    $data[$key] = $value;
                }
            }
            //die(var_dump($data));
            if($this->Staff_model->activateStaff($data)){
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>User verified successfully.</div>');
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>There was a problem verifying the user details.</div>');
            }

            redirect(base_url());
        }
    }

    /**
     * Edits staff
     * @param $idStaff
     */
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

    /**
     * Deletes staff
     * @param $idStaff
     */
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

    /**
     * Assigns policy to staff member
     * @param $idStaff
     * @param $idPolicy
     */
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

    /**
     * Unassigns policy to staff member
     * @param $idStaff
     * @param $idPolicy
     */
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

    /**
     * Ajax petition to get Staff
     */
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