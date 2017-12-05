<?php

class Staff_model extends CI_Model{

    private function _get_datatables_query(){
        $this->db->select(TABLE_USERS.'.name,
                        '.TABLE_USERS.'.lastname,
                        '.TABLE_USERS.'.email,
                        '.TABLE_USERS.'.last_connected,
                        '.TABLE_USERS.'.status');
        $this->db->from(TABLE_USERS);
        $this->db->where(TABLE_USERS.'.role', 'staff');

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