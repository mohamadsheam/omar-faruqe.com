<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends Frontend {

	public function __construct(){
		parent::__construct();

        $this->data['title'] = 'Home';

        //counter-----------------------------
		$ip      =get_client_ip();
		$os      =getOS();
		$browser =getBrowser();
		$device  =getDevice();

        $date=date("Y-m-d");

        $data=array(
            "date"              => $date,
            "ip"                => $ip,
            "operating_system"  => $os,
            "browser"           => $browser,
            "device"            => $device
         );

        if ($this->action->existance('visitors', array('ip'=>$ip,'date'=>$date))==false) {
            $this->action->add('visitors',$data);
        }
	}

	public function index(){


		$this->data['submenu'] = '';

		// read products
        $this->data['products'] = $this->action->read('products');

        // read about us text
        $this->data['about_us'] = $this->action->read('about_us');

        // read team member
        $this->data['members'] = $this->action->read('team_member');

        // read contact info
        $this->data['contact'] = $this->action->read('contact');

        // read slider
        $this->data['sliders'] = $this->action->read('slider', array('trash' => 0));

        // read footer
        $this->data['footer'] = $this->action->read('site_setting');
        $this->data['social_icons'] = $this->action->read('social_icons');

        // read last send message  by ip
        $this->db->select('*');
		$this->db->where('date BETWEEN DATE_SUB(NOW(), INTERVAL 1 DAY) AND NOW()');
		$this->db->where(array('ip_address' => get_client_ip()));
		$query = $this->db->get('message');

        $this->data['lastMeassge'] = $query->result();



        if($this->input->post('submit')){

        	//print_r($_POST);

        	$config = Array(
			'protocol' => 'smtp',
	        'smtp_host' => 'ssl://mail.omar-faruqe.com',
	        'smtp_port' => 465,
	        'smtp_user' => 'info@omar-faruqe.com',
	        'smtp_pass' => 'ed8)5{,n}1.=',
	        'mailtype'  => 'html',
	        'charset' => 'utf-8',
	        'wordwrap' => TRUE

	    );
	    $this->load->library('email', $config);
			        	// load email library
			//$this->load->library('email');

			// prepare email
			$this->email
			    ->from($this->input->post('email'), $this->input->post('name'))
			    ->to('info@omar-faruqe.com')
			    ->subject('Website Message')
			    ->message(trim($this->input->post('message')));

			// save records to
			$data = array(
				'date'        => date('Y-m-d H:i:s'),
				'name'        => $this->input->post('name'),
				'email'       => $this->input->post('email'),
				'description' => $this->input->post('message'),
				'ip_address'  => get_client_ip(),
				'ip_details'  => json_encode($this->ipInfo),
			);

			$this->action->add('message',$data);

			if ($this->email->send()) {
            	//echo 'Your Email has successfully been sent.';
            	$type = 'success';
            	$msg = 'We shall reply you very soon.';
            	$title = "Thanks you, the message has received.";
	        } else {
	        	$type = 'error';
	        	$msg = 'Please try again later.';
            	$title = "Opps!Something went wrong";
	            //show_error($this->email->print_debugger());
	        }

	        $msg = swal_message($type, $msg, $title);
			$this->session->set_flashdata('notification', $msg);

			redirect('','refresh');
        }


		$this->load_page('web/web', $this->data);

	}



	private function ipInfo(){

		// IP address
		$userIP = get_client_ip();

		// API end URL
		$apiURL = 'https://api.ipbase.com/v2/info?ip='.$userIP.'&apikey=VMXZcvlFP8AQvarIaAqiBJSg2V3kjTG5ohLqfE2Y';

		// Create a new cURL resource with URL
		$ch = curl_init($apiURL);

		// Return response instead of outputting
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		// Execute API request
		$apiResponse = curl_exec($ch);

		// Close cURL resource
		curl_close($ch);

		// Retrieve IP data from API response
		$ipData = json_decode($apiResponse, true);

		//print_r($ipData);


		$info= array();

		if($ipData){
			$info = array(
				'ip'               => $ipData['data']['ip'],
				'isp'              => $ipData['data']['connection']['isp'],
				'isp_organization' => $ipData['data']['connection']['organization'],
				'country'          => $ipData['data']['location']['country']['name'],
				'region'           => $ipData['data']['location']['region']['name'],
			);
		}

		return $info;

	}




}
