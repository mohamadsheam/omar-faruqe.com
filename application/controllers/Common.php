<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends Backend {

    function __construct(){
        parent::__construct();
    }

    public function login() {

        $this->data = [];

        $this->load->view('login', $this->data, FALSE);
    }


    public function logout() {

        $where = array(
            'user_id'    => $this->session->userdata('user_id'),
            'login_time' => $this->session->userdata('login_period')
        );

        $this->db->set(array('logout_time' => date('Y-m-d H:i:s a')));
        $this->db->where($where);
        $this->db->update("access_info");

        $this->session->sess_destroy();

        redirect('login', 'refresh');
    }

}
