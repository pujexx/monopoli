<?php

/* name field
 * id_room
  name_room
  status
  play
  place_category_id
  user_id_use
 */

class Dashboard extends CI_Controller {

    function __construct() {
        parent::__construct();
        if ($this->session->userdata("login_user") != true) {
            redirect("home");
        }
        $this->load->model('m_room');
    }

    function index() {
        $data['title'] = "Pilih Ruangan";
        $data['categorys'] = $this->m_room->getcategory();
        $data['js'] = "js_room";
        $data['content'] = "room";
        $data['rooms'] = $this->m_room->get_room(20);
        $this->load->view("template", $data);
    }

    function more($id="") {
        if ($id != "") {
            $data['categorys'] = $this->m_room->getcategory();
            $data['title'] = "Pilih Ruangan";
            $data['js'] = "js_room";
            $data['content'] = "room";
            $data['rooms'] = $this->m_room->get_room($id);
            $this->load->view("template", $data);
        } else if ($this->input->post("ajax") == 1) {
            
        }
    }

    function newroom() {
        $this->form_validation->set_rules("namaroom", "namaroom", "required");
        $this->form_validation->set_rules("category", "category", "required");
        if ($this->form_validation->run() == true) {
            $data['name_room'] = $this->input->post("namaroom", true);
            $data['place_category_id'] = $this->input->post("category", true);
            $data['user_id_user'] = $this->session->userdata("id_user");
            $this->m_room->save($data);
            redirect("member/dashboard/more/" . $_POST['current']);
        }
    }

    function deleteroom() {
        // $this->m_room->deleteuser(12);
        if (isset($_POST)) {
            $id = $_POST["id_room"];
            $this->m_room->deleteuser($id);
        }
    }

    function search() {
        $key = $this->input->get("key");
        $data['title'] = "Pencarian";
        $data['categorys'] = $this->m_room->getcategory();
        $data['js'] = "js_room";
        $data['content'] = "room";
        $data['rooms'] = $this->m_room->search($key);
        $this->load->view("template", $data);
    }

}
?>
