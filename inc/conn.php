<? php

	$host='localhost';
	$user='root';
	$password='';
	$db='ums';
	$con=mysqli_connect('localhost','root','','ums');

	//checking connection
	if(mysqli_connect_errno()){
		die('Database connection failed'.mysqli_connect_errno());
	}else{
		echo "can't Access";
	}





?>