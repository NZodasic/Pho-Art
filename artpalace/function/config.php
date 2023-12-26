<?php 
	//Connect to database

	$servername = 'localhost';
	$username = 'root';
	$password = '';
	$dbname = 'test';

	//connect database
	$conn = mysqli_connect($servername, $username, $password, $dbname);
 
	//check
	if(!$conn){
		echo 'Connection Error' . mysqli_connect_error(); 
	}


	//thanh toan VNPAY
		date_default_timezone_set('Asia/Ho_Chi_Minh');

		$vnp_TmnCode = "1ZTXEO8D";
		$vnp_HashSecret = "ZBZGTCIBGWKFPDYXJWGTOXYXVQYTKZSG";
		$vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
		$vnp_Returnurl = "http://localhost:8333/artpalace/index.php?page=vnpay_return";
		$vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
		
		
		
		//Config input format
		//Expire
		$startTime = date("YmdHis");
		$expire = date('YmdHis',strtotime('+15 minutes',strtotime($startTime)));

?>