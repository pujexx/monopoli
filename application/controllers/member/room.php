<?php

class Room extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("m_main");
    }

    function s($select="") {
        if ($select != "") {
            if ($this->m_main->toroom($select) == true) {
                $data['user_in_room'] = $this->m_main->getuser($select);
                $data['js'] = "js_main";
                $data['content'] = "main";
                $this->load->view("template", $data);
            } else {
                $data['user_in_room'] = $this->m_main->getuser($select);
                $data['js'] = "js_main";
                $data['content'] = "main";
                $this->load->view("template", $data);
            }
        }
    }

}
?>
