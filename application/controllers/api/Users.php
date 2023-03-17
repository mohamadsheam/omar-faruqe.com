<?php

require APPPATH.'libraries/REST_Controller.php';

class Users extends REST_Controller {
    function __construct() {
        parent::__construct();
        // load necessary files
        $this->load->model('action');
    }

    public function index_get(){
        $where = array('trash' => 0);
        $data = $this->action->read('users', $where);

        $response = array(
            'status'  => 1,
            'data'    => $data
        );

        $this->response($response, REST_Controller::HTTP_OK);
    }

}
