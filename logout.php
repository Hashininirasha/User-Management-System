<?php

session_start();
$_SESSION=array():

//erase cookey
if(isset($_COOKIE[session_name()])){
	setcookie(session_name(), " ", time()-86400, '/');

}


//session destory

	session_destory();

	header('Location: index.php');









?>