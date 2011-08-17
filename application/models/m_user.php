<?php

class M_user extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function user_exist($username) {
        $this->db->select('id_user');
        $this->db->where('username', $username);
        $result = $this->db->get('user');
        if ($result->num_rows() == 1) {
            return "exist";
        } else {
            return "noexist";
        }
    }

    function save($data) {
        $this->db->insert("user", $data);
    }

    function ceklogin($username, $password) {
        $this->db->select("id_user")->from("user");
        $this->db->where("username", $username);
        $this->db->where("password", md5($password));
        $result = $this->db->get();
        if ($result->num_rows() == 1) {
            return true;
        }
    }

    function proseslogin($username, $password) {
        $this->db->select("*")->from("user");
        $this->db->where("username", $username);
        $this->db->where("password", md5($password));
        $result = $this->db->get();
        if ($result->num_rows() == 1) {
            return $result->row_array();
        }
    }

}
?>
