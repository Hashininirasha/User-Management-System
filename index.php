<?php session_start(); ?>

<?php require_once('inc/conn.php'); ?>

<?php require_once('inc/functions.php'); ?>

<?php  
  //check form submission
  if (isset($_POST['login'])){

    $errors=array();
    
    //check user name and password
    if (!isset($_POST['email'])||strlen(trim($_POST['email']))<1){
      $errors[]='User Name is missing/invalid';
      
    }
    if (!isset($_POST['pw'])||strlen(trim($_POST['pw']))<1){
      $errors[]='Password is missing/invalid';
      
    }
    //save username and pw into variables
    if (empty($errors)){
      $email=mysqli_real_escape_string($con,$_POST['email']);
      $password=mysqli_real_escape_string($con,$_POST['pw']);
      $hashed_password=sha1($password);
    }
  

  //prepare db query
    $query="SELECT * FROM user
            WHERE Email='{$email}'
            AND password='{$password}'
            LIMIT 1";

    $result_set=mysqli_query($con,$query);
    
    verify_query($result_set);
      //query successfull
      if (mysqli_num_rows($result_set)==1){

        //valid user found
        $user=mysqli_fetch_assoc($result_set);
        $_SESSION['user_id']=$user['ID'];
        $_SESSION['first_name']=$user['First_Name'];
        //updating last login
        $query = "UPDATE user SET Last_login = NOW()";
        $query .= "WHERE id = {$_SESSION['user_id']} LIMIT 1";

        $result_set = mysqli_query($con, $query);

        verify_query(result_set);
         

        //redirect to users.php
          header('Location: users.php');
      }else{
        //user name and password invalid
        $errors[]='Invalid User Name/Password';
      }
    
}
}
       ?>

<!DOCTYPE html>
<html lang="en">
<head>
	
	<title>User Management System</title>
  <link rel="stylesheet" href="css.css" >
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
	<meta charset="UTF-8">

    <meta name="viewport"
    content="width=device-width,user-scalable=no,initial-scale=1.0,maximum-scale=1.0,minimun-scale=1.0">
    
    <meta http-equiv='X-UA-Compatible' content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>
<body>
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
		<!--header-->
		<div class="container text-center">
        	<div class="p-3 mb-2 bg-danger text-white">
            	<h1><i class="fas fa-swatchbook"></i>User Managment System 👦👧</h1>
            </div>
        </div>
        <!--header close-->

	<form action="index.php" method="post">
      <div class="login">

      <fieldset>
        <legend><h2>Log In</h2></legend>
        <?php 
          if(isset($errors) && !empty($errors)){
            echo '<p class="error">Invalid Username/password </p>';
          }
        ?>
        <?php

          if(isset($_GET['logout'])){
            echo '<p class="info">You are successfully logged from system. </p>';
          }

        ?>
        
  	<div class="container text-center">
	<div class="input-group mb-5">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default"><i class="fa fa-user" aria-hidden="true"></i> | User Name</span>
  </div>
  <input type="text" class="form-control" name="email" placeholder="Enter your Email" aria-label="Default" aria-describedby="inputGroup-sizing-default">
</div></div>
<div class="container text-center">
	<div class="input-group mb-5">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default"><i class="fa fa-key" aria-hidden="true"></i> | Password</span>
  </div>
  
  <input type="password" id="inputPassword5" name="pw" class="form-control" aria-describedby="passwordHelpBlock" placeholder="Enter your Password" >
</div>

   
  <button type="submit" name="login" class="btn btn-danger">Log In</button>
  </div>
  
  </fieldset>
</form>
</div>
</body>
</html>

<?php mysqli_close($con); ?>