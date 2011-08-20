<?php

class M_main extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->user = $this->session->userdata("id_user");
    }

    function toroom($room) {
        $this->db->select("r.id_room,r.id_user")->from("in_room r");
        $this->db->where("r.id_user", $this->user);
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            $this->db->where("id_user", $this->user);
            if ($this->db->delete("in_room")) {
                $this->db->select("r.id_room,r.id_user")->from("in_room r");
                $this->db->where("r.id_room", $room);
                $result2 = $this->db->get();
                if ($result2->num_rows() > 20) {
                    return false;
                } else {
                    $this->db->select("r.id_room,r.id_user")->from("in_room r");
                    $this->db->where("r.id_room", $room);
                    $this->db->where("r.id_user", $this->user);
                    $result3 = $this->db->get();
                    if ($result3->num_rows() == 1) {
                        $this->db->where("id_user", $this->user);
                        $this->db->where("id_room", $room);
                        $this->db->update("in_room", array("id_room" => $room));
                        return true;
                    } else {

                        $this->db->insert("in_room", array("id_room" => $room, "id_user" => $this->user));
                        return true;
                    }
                }
            }
        }
    }

    function getuser($room) {
        $this->db->select("u.id_user as id,u.nama,u.email,r.name_room")->from("user u, room r, in_room i");
        $this->db->join("in_room", "u.id_user=i.id_user and i.id_room = $room", "inner");
        $this->db->group_by("i.id_user");
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            return $result->result_array();
        }
    }

}
?>
