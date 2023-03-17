<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class My_Controller extends CI_Controller {

	public $data = array();

	function __construct(){
		parent::__construct();
	}
}


/**
 * for Backend develop
 */
class Backend extends My_Controller{

	function __construct(){
		parent::__construct();

		// Load helpers
        $this->load->helper(['url','form', 'ip', 'notification', 'methods', 'sms']);

        // Load libraries
        $this->load->library(['form_validation', 'session']);

        // Load models
        $this->load->model('action');

        // Login check
        $exception_uris = array(
            'Common/login',
        );

        //print_r(uri_string());


        if(in_array(uri_string(), $exception_uris) == FALSE) {
            if($this->session->userdata('loggedIn') != true) {
                redirect('Common/login', 'refresh');
            }
        }

        set_error_handler(array($this, "myErrorHandler"));

        $this->data['title'] = 'home';

	}



    /**
     * constuct full template page
     * @param  [string] $page [path]
     * @return [type]       [description]
     */
    function load_page($page){

        $this->load->view('includes/header', $this->data, FALSE);
        //$this->load->view('includes/header_menu', $this->data, FALSE);
        $this->load->view('includes/sidebar', $this->data, FALSE);
        $this->load->view(''.$page, $this->data, FALSE);
        $this->load->view('includes/footer', $this->data, FALSE);
    }


    /**
     * Error handling
     * @param  [type] $errno   [description]
     * @param  [type] $errstr  [description]
     * @param  [type] $errfile [description]
     * @param  [type] $errline [description]
     * @return [type]          [description]
     */
    function myErrorHandler($errno, $errstr, $errfile, $errline) {
		$this->data['severity'] = $errno;
		$this->data['message'] = $errstr;
		$this->data['filepath'] = $errfile;
		$this->data['line'] = $errline;
		//print_r(ENVIRONMENT);
		$this->load->view('errors/custom.php', $this->data);
		//$this->load_page('errors/custom', $this->data);
        // echo "ERR\n";
        // echo $errno . "\n";
        // echo $errstr;
        // echo "\n";
        // echo $errline;
        // echo "\n";
        // echo $errfile;
        //die();
    }

}




/**
 * For web part
 */
class Frontend extends My_Controller{


    function __construct(){
        parent::__construct();

        // Load helpers
        $this->load->helper(['ip', 'notification']);

        // Load libraries
        $this->load->library(['form_validation', 'session']);

        // Load models
        $this->load->model('action');

        $this->data['title'] = 'home';

        set_error_handler(array($this, "myErrorHandler"));

    }


    /**
     * constuct full template page
     * @param  [string] $page [path]
     * @return [type]       [description]
     */
    function load_page($page){

        $this->load->view('web/includes/header', $this->data, FALSE);
        $this->load->view('web/includes/banner', $this->data, FALSE);
        $this->load->view(''.$page, $this->data, FALSE);
        $this->load->view('web/includes/footer', $this->data, FALSE);
    }



    function myErrorHandler($errno, $errstr, $errfile, $errline) {
        $this->data['severity'] = $errno;
        $this->data['message'] = $errstr;
        $this->data['filepath'] = $errfile;
        $this->data['line'] = $errline;
        //print_r(ENVIRONMENT);
        $this->load->view('errors/custom.php', $this->data);
        //$this->load_page('errors/custom', $this->data);
        // echo "ERR\n";
        // echo $errno . "\n";
        // echo $errstr;
        // echo "\n";
        // echo $errline;
        // echo "\n";
        // echo $errfile;
        //die();
    }

}

/* End of file My_Controller.php */
/* Location: ./application/core/My_Controller.php */
