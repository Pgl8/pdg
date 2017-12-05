<?php

class Policies_model extends CI_Model{

    public function getPolicies($idPolicy = FALSE){
        $this->db->from(TABLE_POLICIES);
        if($idPolicy){
            $this->db->where(TABLE_POLICIES.'.idPolicy', $idPolicy);
            $query = $this->db->get();
            return $query->row_array();
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getUserPolicies($idUser){
        $this->db->select(TABLE_POLICIES.'.idPolicy,
                        '.TABLE_POLICIES.'.code,
                        '.TABLE_POLICIES.'.plan_reference,
                        '.TABLE_POLICIES.'.first_name,
                        '.TABLE_POLICIES.'.last_name,
                        '.TABLE_POLICIES.'.investment_house,
                        '.TABLE_POLICIES.'.last_operation');
        $this->db->from(TABLE_POLICIES);
        $this->db->join(TABLE_USERS_POLICIES, TABLE_POLICIES.'.idPolicy = '.TABLE_USERS_POLICIES.'.idPolicy');
        $this->db->join(TABLE_USERS, TABLE_USERS.'.idUser = '.TABLE_USERS_POLICIES.'.idUser');
        $this->db->where(TABLE_USERS.'.idUser', $idUser);

        return $this->db->get()->result();
    }

    private function _get_datatables_query(){
        $this->db->select(TABLE_POLICIES.'.code,
                        '.TABLE_POLICIES.'.plan_reference,
                        '.TABLE_POLICIES.'.first_name,
                        '.TABLE_POLICIES.'.last_name,
                        '.TABLE_POLICIES.'.investment_house,
                        '.TABLE_POLICIES.'.last_operation');
        $this->db->from(TABLE_POLICIES);
        $this->db->where(TABLE_POLICIES.'.role', 'staff');

        $i = 0;

        $column_order = array('name', 'email', 'last_connected', 'status'); //set column field database for datatable orderable
        $column_search = array('name', 'email', 'last_connected', 'status'); //set column field database for datatable searchable
        $order = array('name' => 'asc');

        if($_POST['search']['value']){ // if datatable send POST for search
            $this->db->where('(name LIKE "%'.$_POST['search']['value'].'%" OR lastname LIKE "%'.$_POST['search']['value'].'%" 
                             OR email LIKE "%'.$_POST['search']['value'].'%" OR status LIKE "%'.$_POST['search']['value'].'%" 
                             OR last_connected LIKE "%'.$_POST['search']['value'].'%")', NULL, FALSE);
        }

        if(isset($_POST['order'])){ // here order processing
            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if(isset($order)){
            //$order = $order;
            $this->db->order_by(key($order), $order[key($order)]);
        }

    }

    function getDatatableStaff(){
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        // return $this->db->last_query();
        return $query->result();
    }

    function count_filtered(){
        $query = $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all(){
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

}