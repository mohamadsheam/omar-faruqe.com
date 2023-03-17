<?php

/**
 * Custom methods/functions are define here
 */

//Function for Dynamic Language Start
function lang($index){
    $CI = & get_instance();
    // load model
    $CI->load->model('action');
    // use model method
    $val = $CI->action->read('theme_setting');

    $label_lang = config_item('label_lang');


    return $label_lang[$index][$val[0]->language];

}
//Function for Dynamic Language End


// check field check or not
function moduleCheck($con, $id){
    // get class instance
    $CI = & get_instance();
    $CI->load->model('action');

    // read user data from database table
    $where = array('id' =>$id);
    $user_info = $CI->action->read('users', $where);

    $permissionList = json_decode($user_info[0]->permission);
    $status = '';
    if( count($permissionList) > 0){
        foreach ($permissionList as $key => $value) {
            if($con == $value->module_name){
                $status = 'checked';
            }
        }
    }

    return $status;
}


/**
 * check action permission of a module
 * @param  [string] $con  [module name]
 * @param  [int] $id   [user id]
 * @param  [string] $type [action type]
 * @return [string]       [variable]
 */
function permissionCheck($con, $id, $type){
    // get class instance
    $CI = & get_instance();
    $CI->load->model('action');

    // read user data from database table
    $where = array('id' =>$id);
    $user_info = $CI->action->read('users', $where);

    $permissionList = json_decode($user_info[0]->permission);

    $status = '';
    if( count($permissionList) > 0){
        foreach ($permissionList as $key => $value) {
            if($con == $value->module_name){
                if($value->$type == true){
                    $status = 'checked';
                }
            }
        }
    }


    return $status;
}

/**
 * Upload image only for clients
 * @return string upload path
 */
function uploadImage($dir, $table, $resize=false){
    // load libraries
    $CI = & get_instance();

    $CI->load->library('upload');
    $CI->load->library('image_lib');

    $dirpath ='./assets/images/'.$dir;

    if ( !file_exists( $dirpath ) ){
        mkdir($dirpath, 0777, true);
    }

    $config['upload_path'] = $dirpath;
    $config['allowed_types'] = 'png|jpeg|jpg|gif';
    $config['max_size'] = '5106';
    $config['max_width'] = '5000'; /* max width of the image file */
    $config['max_height'] = '5000';
    $config['file_name'] = $table."_".generate_id($table);
    $config['overwrite']=true;

    $CI->upload->initialize($config);

    if($resize){
        $resizer = [];
        $resizer['maintain_ratio'] = FALSE;
        $resizer['width'] = 215;
        $resizer['height'] = 215;

        $CI->image_lib->clear();
        $CI->image_lib->initialize($resizer);
        $CI->image_lib->resize();
    }

    $path = "";
    if ($CI->upload->do_upload("image_file")){
        $upload_data = $CI->upload->data();
        $path= 'assets/images/'.$dir.'/'.$upload_data['file_name'];
    }

    return $path;
}


/**
 * Upload Nid image for employee
 * @return string upload path
 */
function uploadTeamImage(){
    // load libraries
    $CI = & get_instance();

    $CI->load->library('upload');
    $CI->load->library('image_lib');

    $dirpath ='./public/assets/images/team/';

    if ( !file_exists( $dirpath ) ){
        mkdir($dirpath, 0777, true);
    }

    $config['upload_path'] = $dirpath;
    $config['allowed_types'] = 'png|jpeg|jpg|gif';
    $config['allowed_types'] = '*';
    $config['max_size'] = '10106';
    //$config['max_width'] = '5000'; /* max width of the image file */
    //$config['max_height'] = '5000';
    $config['file_name'] = "team_member_".generate_id('team_member');
    $config['overwrite']=true;

    $CI->upload->initialize($config);

    $path = "";
    if ($CI->upload->do_upload("team_image")){
        $upload_data = $CI->upload->data();
        $path= 'public/assets/images/team/'.$upload_data['file_name'];
    }

    return $path;
}


/**
 * Upload Nid image for employee
 * @return string upload path
 */
function uploadSliderImage(){
    // load libraries
    $CI = & get_instance();

    $CI->load->library('upload');
    $CI->load->library('image_lib');

    $dirpath ='./public/assets/images/slider/';

    if ( !file_exists( $dirpath ) ){
        mkdir($dirpath, 0777, true);
    }

    $config['upload_path'] = $dirpath;
    $config['allowed_types'] = 'png|jpeg|jpg|gif';
    $config['allowed_types'] = '*';
    $config['max_size'] = '10106';
    //$config['max_width'] = '5000'; /* max width of the image file */
    //$config['max_height'] = '5000';
    $config['file_name'] = "slider_".generate_id('slider');
    $config['overwrite']=true;

    $CI->upload->initialize($config);

    $path = "";
    if ($CI->upload->do_upload("slider_image")){
        $upload_data = $CI->upload->data();
        $path= 'public/assets/images/slider/'.$upload_data['file_name'];
    }

    return $path;
}


/**
 * Upload Nid image for employee
 * @return string upload path
 */
function uploadProductImage(){
    // load libraries
    $CI = & get_instance();

    $CI->load->library('upload');
    $CI->load->library('image_lib');

    $dirpath ='./public/assets/images/product/';

    if ( !file_exists( $dirpath ) ){
        mkdir($dirpath, 0777, true);
    }

    $config['upload_path'] = $dirpath;
    $config['allowed_types'] = 'png|jpeg|jpg|gif';
    $config['allowed_types'] = '*';
    $config['max_size'] = '10106';
    //$config['max_width'] = '5000'; /* max width of the image file */
    //$config['max_height'] = '5000';
    $config['file_name'] = "products_".generate_id('products');
    $config['overwrite']=true;

    $CI->upload->initialize($config);

    $path = "";
    if ($CI->upload->do_upload("product_image")){
        $upload_data = $CI->upload->data();
        $path= 'public/assets/images/product/'.$upload_data['file_name'];
    }

    return $path;
}


/**
 * Upload image only for clients
 * @return string upload path
 */
function uploadFile($dir, $table, $resize=false){
    // load libraries
    $CI = & get_instance();

    $CI->load->library('upload');
    $CI->load->library('image_lib');

    $dirpath ='./assets/'.$dir;

    if ( !file_exists( $dirpath ) ){
        mkdir($dirpath, 0777, true);
    }

    $config['upload_path'] = $dirpath;
    $config['allowed_types'] = '*';
    $config['max_size'] = '5106';
    $config['max_width'] = '5000'; /* max width of the image file */
    $config['max_height'] = '5000';
    $config['file_name'] = $table."_".generate_id($table);
    $config['overwrite']=true;

    $CI->upload->initialize($config);

    if($resize){
        $resizer = [];
        $resizer['maintain_ratio'] = FALSE;
        $resizer['width'] = 215;
        $resizer['height'] = 215;

        $CI->image_lib->clear();
        $CI->image_lib->initialize($resizer);
        $CI->image_lib->resize();
    }

    $path = "";
    if ($CI->upload->do_upload("image_file")){
        $upload_data = $CI->upload->data();
        $path= 'assets/'.$dir.'/'.$upload_data['file_name'];
    }

    return $path;
}




/**
 * Upload image only for clients
 * @return string upload path
 */
function uploadExcel($dir, $table){
    // load libraries
    $CI = & get_instance();

    $CI->load->library('upload');

    $dirpath ='./assets/'.$dir;

    if ( !file_exists( $dirpath ) ){
        mkdir($dirpath, 0777, true);
    }

    $config['upload_path'] = $dirpath;
    $config['allowed_types'] = 'xlsx|csv|xls';
    $config['max_size'] = '5106';
    //$config['max_width'] = '5000'; /* max width of the image file */
    //$config['max_height'] = '5000';
    $config['file_name'] = $table."_".generate_id($table);
    $config['overwrite']=true;

    $CI->upload->initialize($config);


    $path = "";
    if ($CI->upload->do_upload("excel_file")){
        $upload_data = $CI->upload->data();
        $path= 'assets/'.$dir.'/'.$upload_data['file_name'];
    }

    return $path;
}


/**
 * Auto generate Id
 */
function generate_id($table){

    $ci = & get_instance();
    $ci->load->model('action');
    $data = $ci->action->read_limit($table);
    if(count($data) > 0){
        $counter = intval($data[0]->id) + 1;
    } else {
        $counter = 1;
    }
    $code = date('m').date('d').str_pad($counter, 3, '0', STR_PAD_LEFT);
    return $code;
}

// genetate chalan no
function generate_chalan() {
    $code = '';
    $counter = 1;
    $CI = & get_instance();
    $CI->load->model('action');
    // use model method
    $data = $CI->action->read_limit('chalan');
    if(count($data) > 0){
        $counter = intval($data[0]->id) + 1;
    } else {
        $counter = 1;
    }

    $counter = str_pad($counter,5,0,STR_PAD_LEFT);

    $code = date('y') . date('m') .$counter;
    return $code;
}

// generate voucher no
function generate_voucher($table=null){
    $counter = 1;
    if($table != null){
        $CI = & get_instance();
        $CI->load->model('action');
        // use model method
        $data = $CI->action->read_limit($table);
        if(count($data) > 0){
            $counter = intval($data[0]->id) + 1;
        }
    }

    $code = time() + $counter;
    return $code;
}


function balanceClass($balance){
    $class = ($balance < 0)? 'text-danger': 'text-success';
    return $class;
}

function activityLog($id=0,$module, $action, $relation=''){
    $data = array(
        'date' => date('Y-m-d'),
        'time' => date('h:i:s A'),
        'user_id' => $id,
        'module' => $module,
        'action' => $action,
        'relation' => $relation,
    );

    $ci = & get_instance();
    $ci->load->model('action');
    return $ci->action->add('activity', $data);
}

function f_number($data){
    return number_format($data, 2);
}

function getName($table, $where=array()){
    $ci = & get_instance();
    $ci->load->model('action');

    $info = $ci->action->read($table, $where);

    $name = ($info)? $info[0]->name:'N/A' ;
    return $name;
}

/**
 * Get database table column name
 * @param  string $table               table name
 * @param  int $id                  table id
 * @param  string $col                  table column name
 * @param  string  $cond_col               table condtion column
 * @return string $col        [description]
 */
function getTableColumn($table=null,$id=1, $col=null, $cond_col=null ){
    $ci = & get_instance();
    $ci->load->model('action');
    if($cond_col == null){
        $cond_col = 'id';
    }
    $where = array( $cond_col=> $id);
    if($table && $col){
        $info = $ci->action->read($table, $where);
        $col = ($info)? $info[0]->$col:'N/A' ;
    }else{
        $col = 'N/A';
    }
    return $col;
}


/**
 * [getTableCol description]
 * @param  string $table               [description]
 * @param  string $col                 [description]
 * @param  array $cond                [description]
 * @return [type]        [description]
 */
function getTableCol($table=null, $col=null, $cond){
    $ci = & get_instance();
    $ci->load->model('action');

    if($table && $col){
        $info = $ci->action->read($table, $cond);
        $col = ($info)? $info[0]->$col:'N/A' ;
    }else{
        $col = 'N/A';
    }
    return $col;
}


function auth_key($header_key){
	$api_key = config_item('api_key');
	if($api_key == $header_key){
		return true;
	}else{
		return false;
	}
}


function getTotalColumn($partyId, $col){
	$ci = & get_instance();
    $ci->load->model('action');

    $table = 'party_transaction';
    $where = array('trash' => 0, 'party_id' => $partyId);
    $data = $ci->action->read_sum($table, $col, $where);

    return ($data[0]->$col !='')? $data[0]->$col : 0.0;

}


function allBalance(){
    $result = [];
    $url = base_url().'api/Common/all_balance_stats';
    $curl_handle = curl_init();
    curl_setopt($curl_handle, CURLOPT_URL, $url);
    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);

    $buffer = curl_exec($curl_handle);
    curl_close($curl_handle);

    $result = json_decode($buffer);
    return $result;
}

/**
 * [updateSalary description]
 * @param  integer $amount               [description]
 * @param  [type]  $emp_id               [description]
 * @return [type]          [description]
 */
function updateSalary($amount=0, $emp_id=null){
    $ci = & get_instance();
    $ci->load->model('action');
    $table = 'balance_stats';
    if($emp_id){
        $where = array('emp_id ' => $emp_id);
        $ci->db->where($where);
        $ci->db->set('salary_balance', 'salary_balance + ' . $amount, FALSE);
        $ci->db->update($table);
        return true;
    }
    return false;
}

/**
 * Update Market Balance
 * @param  integer $amount               [description]
 * @param  [type]  $emp_id               [description]
 * @return [type]          [description]
 */
function updateBalance($amount=0, $emp_id=null){
    $ci = & get_instance();
    $ci->load->model('action');
    $table = 'balance_stats';
    if($emp_id){
        $where = array('emp_id' => $emp_id);
        $ci->db->where($where);
        $ci->db->set('market_balance', 'market_balance + ' . $amount, FALSE);
        $ci->db->update($table);
        return true;
    }

    return false;
}


/**
 * [saveTrxlog description]
 * @param  [type] $data               [description]
 * @return [type]       [description]
 */

function saveTrxlog($data=null){

    $ci = & get_instance();
    $table = 'employee_trx_log';
    $ci->db->insert($table, $data);

    return true;
}


function str_filter($str){
    $str = str_replace("_", " ", $str);
    return ucfirst($str);
}
