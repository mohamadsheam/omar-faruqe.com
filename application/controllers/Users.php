<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends Backend {

	public function __construct(){
		parent::__construct();
        $this->data['active'] = 'data-menu="setting"';
        $this->data['title'] = 'Setting';

	}

	public function index(){

        $this->data['submenu'] = 'data-submenu="users"';

        $where = array('trash' => 0);
        $this->data['users'] = $this->action->read('users', $where);

        if($this->input->post('submit')){
            $data = array(
                'date'      => date('Y-m-d'),
                'fullname'  => $this->input->post('fullname'),
                'username'  => str_replace(" ", "_", $this->input->post('fullname') ),
                'email'     => $this->input->post('email'),
                'password'  => md5($this->input->post('password')),
                'contact'   => $this->input->post('contact'),
                'privilege' => $this->input->post('user_role'),
            );

            if(isset($_FILES)){
                $data['image'] = uploadImage('users', 'users', true);
            }

            $this->action->add('users', $data);
            $msg = message('success', 'User successfully created', 'Done');

            $this->session->set_flashdata('notification', $msg);
            redirect('Users','refresh');
        }

		$this->load_page('users/users', $this->data);

	}

    public function profile($id){

        $this->data['submenu'] = 'data-submenu="users"';

        $this->data['activity'] = '';
        $this->data['setting'] = 'active';
        // read data from database
        $where = array('id' => $id);
        $this->data['records'] = $this->action->read('users', $where);

		if($this->input->post('submit')){
			$data = array(
                'date'      => date('Y-m-d'),
                'fullname'  => $this->input->post('fullname'),
                'username'  => str_replace(" ", "_", $this->input->post('fullname') ),
                'email'     => $this->input->post('email'),
                //'password'  => md5($this->input->post('password')),
                'contact'   => $this->input->post('contact'),
                'address'   => $this->input->post('address'),
                'privilege' => $this->input->post('user_role'),
            );

			if( !empty($this->input->post('password')) ){
				$data['password'] = md5($this->input->post('password'));
			}

			//print_r($data); die();

			$this->action->update('users', $data, $where);

			$msg = message('success', 'User\'s\ profile updated', 'Done');

            $this->session->set_flashdata('notification', $msg);
            redirect('Users/profile/'.$id,'refresh');

		}


        $this->load_page('users/profile', $this->data);

    }

    public function editUser($id){
        $this->data['submenu'] = 'data-submenu="users"';
        $this->data['activity'] = '';
        $this->data['setting'] = 'active';
        // read data from database
        $where = array('id' => $id);
        $this->data['records'] = $this->action->read('users', $where);

        $this->load_page('users/profile', $this->data);

    }

    public function delete($id=null){
        if($id !=null){

            $data = array('trash' => 1);
            $where = array('id' => $id);
            $this->action->update('users',$data, $where);

            $msg = message('success', 'User successfully deleted', 'Done');

            $this->session->set_flashdata('notification', $msg);
            redirect('Users','refresh');
        }
    }


	public function permissions(){
		$this->data['submenu'] = 'data-submenu="permissions"';

		$this->data['menus'] = config_item('menus');
		$this->data['userPermissions'] = null;
		$this->data['modules'] = null;

		$where = array('trash' => 0);
		$this->data['users'] = $this->action->read('users', $where);

		if ($this->input->post('search')) {
			$where = array('id' => $this->input->post('user_id'));
			$records = $this->action->read('users', $where);

			$permissions = json_decode($records[0]->permission);
			if($permissions){
				$this->data['access'] = $permissions->access;
				$this->data['modules'] = $permissions->module;
			}else{
				$this->data['modules'] = [];
				$this->data['access'] = [];
			}

			$this->data['users_id'] = $this->input->post('user_id');
			$this->data['fullname'] = $records[0]->fullname;
		}

		if ($this->input->post('update')) {
			if(!array_key_exists('checked_key', $this->input->post())){
				$msg = message('error', 'Please check checkbox, try again', 'Error!');

				$this->session->set_flashdata('notification', $msg);
				redirect('Users/permissions','refresh');
			}

			$post = $this->input->post();
			//print_r($post);

			$module = array();
			foreach ($post['checked_key'] as $key => $menu) {
				array_push($module, trim($menu));
			}

			$users = $this->input->post('users_id');

			unset($post['checked_key']);
			unset($post['update']);
			unset($post['users_id']);

			$temp = array(
				'module' => $module,
				'access' => $post
			);

			$this->action->update('users', ['permission' => json_encode($temp)], ['id' => $users]);
			$msg = message('success', 'successfully', 'Success!');

			$this->session->set_flashdata('notification', $msg);
			redirect('Users/permissions','refresh');

		}


		$this->load_page('users/permissions', $this->data);

	}

}
