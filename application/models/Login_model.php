<?php


class Login_model extends CI_Model{

    public function __construct() {
        // constructor de la clase
    }

    // USUARIOS
    public function check_user($email = FALSE){
        if($email){
            $this->db->from(TABLE_USERS);
            $this->db->where(TABLE_USERS.'.email', $email);
            $query = $this->db->get();
            if($query->num_rows() > 0){
                return TRUE;
            }
        }
        return FALSE;
    }

    public function login_user($username = FALSE, $password = FALSE){
        if($username && $password){
            $this->db->select(TABLE_USERS.'.idUser,
							'.TABLE_SCHOOL.'.idSchool,
							'.TABLE_SCHOOL.'.name as schoolName,
							'.TABLE_USERS.'.name,
							'.TABLE_USERS.'.surname,
							'.TABLE_USERS.'.email,
							'.TABLE_USERS.'.role'
            );
            $this->db->from(TABLE_USERS);
            $this->db->join(TABLE_SCHOOL, TABLE_USERS.'.idSchool = '.TABLE_SCHOOL.'.idSchool', 'left');
            $this->db->where(TABLE_USERS.'.username', $username);
            $this->db->where(TABLE_USERS.'.password', $password);

            $query = $this->db->get();

            if($query->num_rows() > 0){
                return $query->result();

            }
        }
        return FALSE;
    }
}