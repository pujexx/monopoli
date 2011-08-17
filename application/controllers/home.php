<?php

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('gravatar');
        $this->load->model('m_user');
    }

    function index() {
        $this->load->view('front');
    }

    function register() {
        $this->form_validation->set_rules('nama', "nama", "required");
        $this->form_validation->set_rules('email', "email", "required");
        $this->form_validation->set_rules('username_register', "username", "required");
        $this->form_validation->set_rules('password_register', "password", "required");
        $this->form_validation->set_rules('date', "date", "required");
        $this->form_validation->set_rules('jenis', "jenis", "required");
        $this->form_validation->set_rules('alamat', "alamat", "required");
        if ($this->form_validation->run() == true) {
            $data['nama'] = $this->input->post("nama", true);
            $data['email'] = $this->input->post("email", true);
            $data['username'] = $this->input->post("username_register", true);
            $data['password'] = md5($this->input->post("password_register", true));
            $data['tanggal_lahir'] = str_replace("/", "-", $this->input->post("date", true));
            $data['kelamin'] = $this->input->post("jenis", true);
            $data['alamat'] = $this->input->post("alamat", true);
            $data['date_registered'] = date("Y-m-d H:i:s");
            $data['status'] = 1;
            $this->m_user->save($data);
            redirect("home");
        }
    }

    function username() {

        $username = $_POST['username_register'];
        echo $this->m_user->user_exist($username);
    }

    function gravatar() {
        $email = $_POST['email'];
        echo gravatar_img($email, 100);
    }

    function login() {
        $this->form_validation->set_rules("username_login", "Username", "required");
        $this->form_validation->set_rules("password_login", "Password", "required");
        if ($this->form_validation->run() == true) {
            $username = $this->input->post("username_login", true);
            $password = $this->input->post("password_login", true);
            if ($this->m_user->ceklogin($username, $password) == true) {
                $ses = $this->m_user->proseslogin($username, $password);
                $session['id_user'] = $ses["id_user"];
                $session['login_user'] = true;
            }
            else{
                $this->session->set_flashdata("notif","Gagal Login");
                redirect("home/loginform");
            }
        }
    }
    function loginform(){
        $this->load->view("login");
    }

}
?>
