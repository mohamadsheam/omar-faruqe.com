<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'libraries/REST_Controller.php';

class Auth extends REST_Controller{
    function __construct(){
        parent::__construct();
        // load necessary files
        $this->load->model('action');
        $this->load->helper(["security", "methods",'ip','notification']);
        $this->load->library(['encryption','form_validation','session']);

    }


    public function index_post(){
        // receive params
        $useremail = $this->post('email');
        $userpass = $this->post('password');

        if(empty($useremail) || empty($userpass)){
            $response = array(
                "status" => 0,
                "msg" => "Field must not be empty",
            );

            return $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        }

        // check developer access
        $this->load->config('my_access');
        $super = config_item('developer');

        if($super['username'] == $useremail && $super['password'] == $userpass){
            $data = array(
                'user_id'      => 69,
                'username'     => 'developer',
                'email'        => 'developer',
                'contact'      => 'developer',
                'address'      => 'developer',
                'fullname'     => 'Sunnah Soft',
                'privilege'    => 'super',
                'image'        => 'assets/dist/img/avatar5.png',
                'login_period' => date('Y-m-d H:i:s a'),
                'loggedIn'     => true
            );

            $this->session->set_userdata($data);

            $response = array(
                'status' => 1,
                'msg' => 'success'
            );

            $msg = message('success', 'Welcome to Dashboard!', 'Welcome Sunnah Soft');
            $this->session->set_flashdata('notification', $msg);

            return $this->response($response, REST_Controller::HTTP_OK);

        }else{

            // read info from database
            $where = array('email' => $useremail, 'password' => md5($userpass), 'trash' => 0);
            $info = $this->action->read('users', $where);
            if($info){

                $permissions = json_decode($info[0]->permission);
    			if($permissions){
    				$access = isset($permissions->access) ? $permissions->access:[];
    				$modules = isset($permissions->module) ? $permissions->module:[];

    			}else{
    				$access  = [];
    				$modules  = [];
    			}

                $data = array(
                    'user_id'      => $info[0]->id,
                    'username'     => $info[0]->username,
                    'email'        => $info[0]->email,
                    'contact'      => $info[0]->contact,
                    'address'      => $info[0]->address,
                    'fullname'     => $info[0]->fullname,
                    'privilege'    => $info[0]->privilege,
                    'image'        => $info[0]->image,
                    'access'       => $access,
                    'modules'      => $modules,
                    'login_period' => date('Y-m-d H:i:s a'),
                    'loggedIn'     => true
                );

                $this->session->set_userdata($data);

                // store access information
                $ip = get_client_ip();
                $os = getOS();
                $browser = getBrowser();
                $device = getDevice();

                $data = array(
                    'date'       => date('Y-m-d'),
                    'username'   => $this->session->userdata('username'),
                    'browser'    => $browser,
                    'os'         => $os,
                    'ip'         => $ip,
                    'device'     => $device,
                    'user_id'    => $info[0]->id,
                    'login_time' => $this->session->userdata('login_period')
                );

                activityLog($info[0]->id, 'Login', 'login');

                $this->db->insert("access_info", $data);

                $response = array(
                    'status' => 1,
                    'msg' => 'success'
                );

                $msg = message('success', 'Welcome to Dashboard!', 'Welcome '.$info[0]->fullname);
                $this->session->set_flashdata('notification', $msg);
                return $this->response($response, REST_Controller::HTTP_OK);


            }else{
                $response = array(
                    'status' => 0,
                    'msg' => 'Email or Password not matched'
                );

                return $this->response($response, REST_Controller::HTTP_OK);
            }
        }
    }

}
