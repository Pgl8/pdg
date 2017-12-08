<?php

/**
 * Class Staff_model
 */
class Staff_model extends CI_Model{

    /**
     * Gets Staff
     * @param bool $idUser
     * @return mixed
     */
    public function getStaff($idUser = FALSE){
        $this->db->from(TABLE_USERS);
        $this->db->where(TABLE_USERS.'.status != ', 'deleted');
        if($idUser){
            $this->db->where(TABLE_USERS.'.idUser', $idUser);
            $query = $this->db->get();
            return $query->row_array();
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    /**
     * Gets staff by email
     * @param bool $email
     * @return mixed
     */
    public function getStaffByEmail($email = FALSE){
        if($email){
            $this->db->from(TABLE_USERS);
            $this->db->where(TABLE_USERS.'.email', $email);

            $query = $this->db->get();
            return $query->result();
        }
    }

    /**
     * Adds staff
     * @param $data
     * @return mixed
     */
    public function addStaff($data){
        if($data){
            // Sets a predefined pass
            $data['password'] = sha1(DEFAULT_PASSWORD);
            $data['role'] = 'staff';
            $data['status'] = 'sent';

            return $this->db->insert(TABLE_USERS, $data);
        }
    }

    /**
     * Activates staff
     * @param $data
     * @return mixed
     */
    public function activateStaff($data){
        if($data){
            $data['password'] = sha1($data['password']);
            $data['status'] = 'active';

            $this->db->where(TABLE_USERS.'.email', $data['email']);
            return $this->db->update(TABLE_USERS, $data);
        }
    }

    /**
     * Adds verification code for a user
     * @param $data
     * @return mixed
     */
    public function addCode($data){
        if($data){
            return $this->db->insert(TABLE_USERS_CODES, $data);
        }
    }

    /**
     * Edits staff details
     * @param $idUser
     * @param $data
     * @return mixed
     */
    public function editStaff($idUser, $data){
        if($idUser && $data){
            $this->db->where(TABLE_USERS.'.idUser', $idUser);
            return $this->db->update(TABLE_USERS, $data);
        }
    }

    /**
     * Soft deletes user
     * @param $idUser
     * @return mixed
     */
    public function deleteStaff($idUser){
        if($idUser){
            $data = array(
                'status' => 'deleted'
            );
            $this->db->where(TABLE_USERS.'.idUser', $idUser);
            if($this->db->update(TABLE_USERS, $data)){
                $this->db->where(TABLE_USERS_POLICIES.'.idUser', $idUser);
                return $this->db->delete(TABLE_USERS_POLICIES);
            }
        }
    }

    /**
     * Assign policy to a user
     * @param $idUser
     * @param $idPolicy
     * @return mixed
     */
    public function assignPolicy($idUser, $idPolicy){
        $data = array(
            'idUser' => $idUser,
            'idPolicy' => $idPolicy
        );

        return $this->db->insert(TABLE_USERS_POLICIES, $data);
    }

    /**
     * Unassigns policy to a user
     * @param $idUser
     * @param $idPolicy
     * @return mixed
     */
    public function unassignPolicy($idUser, $idPolicy){
        $this->db->where(TABLE_USERS_POLICIES.'.idUser', $idUser);
        $this->db->where(TABLE_USERS_POLICIES.'.idPolicy', $idPolicy);
        return $this->db->delete(TABLE_USERS_POLICIES);
    }

    /**
     * Gets query for datatable
     */
    private function _get_datatables_query(){
        $this->db->select(TABLE_USERS.'.idUser,
                        '.TABLE_USERS.'.firstname,
                        '.TABLE_USERS.'.lastname,
                        '.TABLE_USERS.'.email,
                        '.TABLE_USERS.'.last_connected,
                        '.TABLE_USERS.'.status');
        $this->db->from(TABLE_USERS);
        $this->db->where(TABLE_USERS.'.role', 'staff');
        $this->db->where(TABLE_USERS.'.status != ', 'deleted');

        $i = 0;

        $column_order = array('firstname', 'email', 'last_connected', 'status'); //set column field database for datatable orderable
        $column_search = array('firstname', 'email', 'last_connected', 'status'); //set column field database for datatable searchable
        $order = array('firstname' => 'asc');

        if($_POST['search']['value']){ // if datatable send POST for search
            $this->db->where('(firstname LIKE "%'.$_POST['search']['value'].'%" OR lastname LIKE "%'.$_POST['search']['value'].'%" 
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