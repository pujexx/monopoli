<?php

class M_room extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_room($limit="") {
        $this->db->select("r.id_room,r.name_room,r.play,r.place_category_id,r.user_id_user , p.name, u.nama, u.email")->from("room r, place_category p , user u");
        $this->db->join("room", "r.place_category_id = p.id and r.user_id_user = u.id_user", "inner");
        $this->db->group_by("r.id_room");

        $this->db->limit($limit);

        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            return $result->result_array();
        }
    }

    function save($data) {
        $this->db->insert("room", $data);
    }

    function deleteuser($id) {
        $current_id = $this->session->userdata("id_user");
        $this->db->where("user_id_user", $current_id);
        $this->db->where("id_room", $id);
        $this->db->delete("room");
    }

    function getcategory() {
        $this->db->select("id,name")->from("place_category");
        $this->db->order_by("name", "asc");
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            return $result->result_array();
        }
    }

    function search($like) {
        $this->db->select("r.id_room,r.name_room,r.play,r.place_category_id,r.user_id_user , p.name, u.nama, u.email")->from("room r, place_category p , user u");
        $this->db->join("room", "r.place_category_id = p.id and r.user_id_user = u.id_user", "inner");
        $this->db->group_by("r.id_room");
        $this->db->like("r.name_room",$like);
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            return $result->result_array();
        }
    }

}
?>
