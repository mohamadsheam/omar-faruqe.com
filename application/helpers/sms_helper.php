<?php


function sendMsg($num, $msg){

    $CI =& get_instance();
    $CI->load->config('my_custom');
    $userID = $CI->config->item('userID');
    $passwd = $CI->config->item('passwd');
    $sender = $CI->config->item('sender');
    $url = $CI->config->item('url');

    // set post fields
    $post = [
        'userID'  => $userID,
        'passwd'  => $passwd,
        'msisdn'  => $num,
        'message' => $msg,
        'sender'  => $sender,
    ];

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $post);

    // execute!
    $response = curl_exec($curl);

    // close the connection, release resources used
    curl_close($curl);

    // save records to db table
    $explode = explode(" and ", $response);

    $status = "Failed";

    if($explode[0] != "Success Count : 0"){
        $status = 'Success';
    }

    $data = array(
        'recipient_name'   => '',
        'recipient_number' => $num,
        'message_body'     => $msg,
        'message_status'   => $status,
        'created_by'       => $CI->session->userdata('user_id'),
    );

    $r = $CI->db->insert('sms_records', $data);

    return $r;

}
