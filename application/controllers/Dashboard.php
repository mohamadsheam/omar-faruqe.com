<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Backend {

	public function __construct(){
		parent::__construct();
		$this->data['active'] = 'data-menu="dashboard"';
        $this->data['title'] = 'Dashboard';
	}

	public function index(){
		$this->data['submenu'] = '';

		$visitorsData = $this->action->visitors_chart_data();
		$this->data['labels'] = array_column($visitorsData, 'browser');
		$this->data['data'] = array_column($visitorsData, 'num');

		$rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');

		$this->data['bgColor'] = [];
		foreach($this->data['labels'] as $label){
    		$color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
    		array_push($this->data['bgColor'], $color);
			//$this->data['bgColor'] = $color ;
		}


		$this->load_page('dashboard/dashboard', $this->data);

	}




}
