<?php

/**
 * Class Login_model
 */
class Login_model extends CI_Model{

    /**
     * Login_model constructor.
     */
    public function __construct() {

    }

    /**
     * Logins users
     * @param bool $username
     * @param bool $password
     * @return bool
     */
    public function login_user($username = FALSE, $password = FALSE){
        if($username && $password){
            $this->db->select(TABLE_USERS.'.idUser,
							'.TABLE_USERS.'.username,
							'.TABLE_USERS.'.email,
							'.TABLE_USERS.'.role'
            );
            $this->db->from(TABLE_USERS);
            $this->db->where(TABLE_USERS.'.username', $username);
            $this->db->where(TABLE_USERS.'.password', $password);
            $this->db->where(TABLE_USERS.'.status != ', 'deleted');

            $query = $this->db->get();

            if($query->num_rows() > 0){
                // Save final data to send later
                $result = $query->result();

                // Update last connected date in table
                $data = array(
                    'last_connected' => date("Y-m-d")
                );

                $this->db->where(TABLE_USERS.'.idUser', $result[0]->idUser);
                $this->db->update(TABLE_USERS, $data);

                return $result;
            }
        }
        return FALSE;
    }
}