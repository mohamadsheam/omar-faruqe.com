<?php

	$config['api_key'] = 'pharmacy_store@sunnahsoft';

	$config['field_types'] = array(
		'text'     => 'text',
		'number'   => 'number',
		'checkbox' => 'checkbox',
		'file'     => 'file',
		'radio'    => 'radio',
	);

	$config['col_types'] = array(
		'VARCHAR' => 'varchar',
		'TEXT'    => 'text',
		'INT'     => 'int',
	);
	// for sidebar control
	$config['controllers'] = ['Dashboard', 'Auth', 'Myerror', 'Ajax', ];

    //unit
    $config['unit'] = array("Pcs", "Box", "Carton");

    // payment methods
    $config['payment_method'] = array('Cash','Bank');

	// all months
	$config['months_index'] = array(
	    '01' => 'January',
	    '02' => 'February',
	    '03' => 'March',
	    '04' => 'April',
	    '05' => 'May',
	    '06' =>'June',
	    '07' =>'July',
	    '08' => 'August',
	    '09' => 'September',
	    '10' =>'October',
	    '11' =>'November',
	    '12' => 'December'
	);


	$config['address'] = array(
		'place' => 'Shyamolipara, Ullapara, Sirajgonj',
		'phone'    => '+880 1710-454519',
		'web'     => 'omar-faruqe.com',
	);

	$config['menus'] = array(
		'Dashboard'       => 'dashboard',
		'Employee'        => 'marketer',array('all_Employee', 'balance_stats', 'transactions'),
		'Salary'          => array('Bouns', 'Incentive', 'Advanced', 'Payment_Generate', 'Give_Payment', 'Paid_Records'),
		'Claim'           => array('All_Claim'),
		'Chalan'          => array('New_Chalan', 'All_Chalan'),
		'Company_Invoice' => array('Invoice'),
		'Banking'         => array('Accounts', 'Transactions'),
		'Cost'            => array('Field_of_Cost', 'All_Cost'),
		'Logbook'         => array('Vehicle', 'Records'),
		'Sale'            => array('Sale\'s\_Representative', 'Spot Sale', 'Payments', 'Gifts'),
		'Loan'            => array('Sale\'s\_Representative', 'Spot Sale', 'Payments', 'Gifts'),
	);


	$config['leave_limit'] = 20;


	// sms config
	$config['url'] = 'https://vas.banglalink.net/sendSMS/sendSMS';
	$config['userID'] = 'nakand';
	$config['passwd'] = 'nakand@Prp192';
	$config['sender'] = 'SAGOR TRDRS';
