<?php require_once('inc/conn.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	
	<title>User Management System</title>
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
	<div class="container text-center">
	<div class="input-group mb-5">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default"><i class="fa fa-user" aria-hidden="true"></i> | Name With Initial</span>
  </div>
  <input type="text" class="form-control" placeholder="Enter your Name" aria-label="Default" aria-describedby="inputGroup-sizing-default">
</div></div>
  	<div class="container text-center">
	<div class="input-group mb-5">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default"><i class="fa fa-envelope" aria-hidden="true"></i> | E-mail Address</span>
  </div>
  <input type="text" class="form-control" placeholder="Enter your E-mail Address" aria-label="Default" aria-describedby="inputGroup-sizing-default">
</div></div>
<div class="container text-center">
	<div class="input-group mb-5">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default"><i class="fa fa-key" aria-hidden="true"></i> | Password</span>
  </div>
  <input type="text" class="form-control" placeholder="Enter your Password" aria-label="Default" aria-describedby="inputGroup-sizing-default">
</div>

   
  <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>

</body>
</html>

<?php mysqli_close($con); ?>