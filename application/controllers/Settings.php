<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends Backend {
	public function __construct(){
		parent::__construct();
        $this->data['active'] = 'data-menu="settings"';
        $this->data['title'] = 'Page Setting';

	}

	public function configuration(){

        $this->data['submenu'] = 'data-submenu="configuration"';
        $this->data['social_icons'] = $this->action->read('social_icons');


        $this->data['sliders'] = $this->action->read('slider', ['trash' => 0]);

		$this->load_page('settings/configuration', $this->data);

	}


	public function delete_slider($id){
		$this->action->update('slider', ['trash' => 1], ['id' => $id]);
		$msg = message('success', 'Slider successfully deleted', 'Done');

        $this->session->set_flashdata('notification', $msg);

        redirect('Settings/configuration','refresh');
	}


	public function add_slider(){
		$data = array(
			'title' => $this->input->post('slider_title'),
		);

		if ($_FILES['slider_image']['name'] != null){
            $data['image_path'] = uploadSliderImage();
        }else{
			$data['image_path'] = 'assets/dist/img/avatar5.png';
		}

		$this->action->add('slider', $data);

		$msg = message('success', 'Slider successfully added', 'Done');

        $this->session->set_flashdata('notification', $msg);

        redirect('Settings/configuration','refresh');
	}

	public function update_slider(){
		$data = array(
			'title' => $this->input->post('slider_title'),
		);

		if ($_FILES['slider_image']['name'] != null){
            $data['image_path'] = uploadSliderImage();
            unlink($_POST['old_image']);
        }

		$this->action->update('slider', $data, ['id' => $this->input->post('id')]);

		$msg = message('success', 'Slider successfully updated', 'Done');

        $this->session->set_flashdata('notification', $msg);

        redirect('Settings/configuration','refresh');
	}


	public function about(){

		$this->data['submenu'] = 'data-submenu="about"';

		$this->data['info'] = $this->action->read('about_us');

		if($this->input->post('submit')){

			$data = array(
				'text' => $this->input->post('text'),
				'about_video' => $this->input->post('about_video'),
			);

			$this->action->update('about_us', $data);
			$msg = message('success', 'About us info successfully updated', 'Done');

            $this->session->set_flashdata('notification', $msg);

            redirect('Settings/about','refresh');
		}


		$this->load_page('settings/about', $this->data);
	}

	public function product(){

		$this->data['submenu'] = 'data-submenu="product"';

		$this->data['products'] = $this->action->read('products');


		$this->load_page('settings/product', $this->data);
	}

	public function add_product(){

		$data = array(
			'product_name' => $this->input->post('product_title'),
			'product_desc' => $this->input->post('product_desc'),
		);

		if ($_FILES['product_image']['name'] != null){
            $data['image'] = uploadProductImage();
        }else{
			$data['image'] = 'assets/dist/img/avatar5.png';
		}

		$this->action->add('products', $data);

		$msg = message('success', 'Product successfully added', 'Done');

        $this->session->set_flashdata('notification', $msg);

        redirect('Settings/product','refresh');

	}

	public function fetch_single_info(){
		$id = $this->input->post('id');
		$data = $this->action->readCols('product_name, product_desc,image,id','products', ['id' => $id]);

		echo json_encode($data);
	}


	public function edit_product(){
		$data = array(
			'product_name' => $this->input->post('product_title'),
			'product_desc' => $this->input->post('product_desc'),
		);

		if ($_FILES['product_image']['name'] != null){
            $data['image'] = uploadProductImage();
            unlink($_POST['old_image']);
        }

		$this->action->update('products', $data, ['id' => $this->input->post('id')]);

		$msg = message('success', 'Product successfully added', 'Done');

        $this->session->set_flashdata('notification', $msg);

        redirect('Settings/product','refresh');
	}

	public function delete_product($id){
		$this->action->delete('products', ['id' => $id]);
		$msg = message('success', 'Product successfully deleted', 'Done');

        $this->session->set_flashdata('notification', $msg);

        redirect('Settings/product','refresh');
	}



	public function delete_team_member($id){
		$this->action->delete('team_member', ['id' => $id]);
		$msg = message('success', 'Team Member info successfully deleted', 'Done');

        $this->session->set_flashdata('notification', $msg);

        redirect('Settings/teams','refresh');
	}

	public function teams(){

		$this->data['submenu'] = 'data-submenu="teams"';

		$this->data['team_members'] = $this->action->read('team_member');

		$this->load_page('settings/teams', $this->data);
	}


	public function add_team_member(){
		$data = array(
			'name'        => $this->input->post('team_name'),
			'designation' => $this->input->post('designation'),
			'fb'          => $this->input->post('fb_link'),
			'mobile'      => $this->input->post('contact_no'),
		);

		if ($_FILES['team_image']['name'] != null){
            $data['image'] = uploadTeamImage();
        }else{
			$data['image'] = 'assets/dist/img/avatar5.png';
		}

		$this->action->add('team_member', $data);

		$msg = message('success', 'Team member successfully added', 'Done');

        $this->session->set_flashdata('notification', $msg);

        redirect('Settings/teams','refresh');
	}



	public function fetch_single_info_teams(){
		$id = $this->input->post('id');
		$data = $this->action->readCols('*','team_member', ['id' => $id]);

		echo json_encode($data);
	}

	public function fetch_single_info_slider(){
		$id = $this->input->post('id');
		$data = $this->action->readCols('id, image_path, title','slider', ['id' => $id]);

		echo json_encode($data);
	}


	public function update_team_member(){

		$data = array(
			'name'        => $this->input->post('team_name'),
			'designation' => $this->input->post('designation'),
			'fb'          => $this->input->post('fb_link'),
			'mobile'      => $this->input->post('contact_no'),
		);

		if ($_FILES['team_image']['name'] != null){
            $data['image'] = uploadTeamImage();
        }

		$this->action->update('team_member', $data, ['id' => $this->input->post('id')]);

		$msg = message('success', 'Team member successfully updated', 'Done');

        $this->session->set_flashdata('notification', $msg);

        redirect('Settings/teams','refresh');

	}


	public function contact(){

		$this->data['submenu'] = 'data-submenu="contact"';

		$this->data['info'] = $this->action->read('contact');


		if($this->input->post('submit')){

			$data = array(
				'mobile' => $this->input->post('mobile'),
				'emails' => $this->input->post('emails'),
				'contact_header' => $this->input->post('contact_header'),
				'contact_text' => $this->input->post('contact_text'),
			);

			$this->action->update('contact', $data);
			$msg = message('success', 'Contact us info successfully updated', 'Done');

            $this->session->set_flashdata('notification', $msg);

            redirect('Settings/contact','refresh');
		}


		$this->load_page('settings/contact', $this->data);
	}


}
