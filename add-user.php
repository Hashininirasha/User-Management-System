<?php session_start(); ?>
<?php require_once('inc/conn.php'); ?>
<?php require_once('inc/functions.php'); ?>

<?php 

  $errors = array();

  $fn='';
  $ln='';
  $email='';
  $pw='';

  if(isset($_POST['submit'])){

  $fn=$_POST['fn'];
  $ln=$_POST['ln'];
  $email=$_POST['email'];
  $pw=$_POST['pw'];

//cheaking required field 
    $req_fields = array('fn','ln','email','pw');

    foreach ($req_fields as $field){
      if(empty(trim($_POST[$field]))){
      $errors[] = $field.'is Required';
    }
    }
    
    //checking max length


    $max_len = array('fn' => 15,'ln' => 15,'email' => 50,'pw' => 10);

    foreach ($max_len  as $field => $max_len){
      if(strlen(trim($_POST[$field])) > $max_len ){
      $errors[] = $field.'must be less than'.$max_len.'characters';
    }
    }
    
    //cheacking email address
    if(is_email($_POST['email'])){
      $errors = 'Email address is invalid';
    }
    //cheacking of email address already exits
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $query = "SELECT * FROM user WHERE email = '{$email}' LIMIT 1";

    $result = mysqli_query($con, $query);
    if($result){
      if(mysqli_num_rows($result) ==1){
        $errors[] = 'Email address is already exists';
      }
    }
    if(empty($errors)){
      //no errors found..adding new reccord
      $fn = mysqli_real_escape_string($con, $_POST['fn']);
      $ln = mysqli_real_escape_string($con, $_POST['ln']);
      $pw = mysqli_real_escape_string($con, $_POST['pw']);

      $query = "INSERT INTO user (";
      $query .= "First_Name,Last_Name,Email,Is_Deleted,password";
      $query .= ") VALUES (";
      $query .= "'{$fn}','{$ln}','{$email}',0,'{$pw}'";
      $query .= ")";

      $result = mysqli_query($con, $query);
      if($result){
        //query successfull.....redirctiong to user page
        header('Location:users.php?user_added=true');

      }else{
        $errors = "failed to add new record.";
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add New User</title>
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

<div class="container text-center">

          <div class="p-3 mb-2 bg-danger text-white">
  <!-- Navbar content -->
<nav class="navbar navbar-expand-lg navbar-light bg-danger">
  <a class="navbar-brand" >Welcome to User Management system 👧🧑 <?php echo $_SESSION['first_name']; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active"  href="index.php" >Home</a>
      
      <a class="nav-item nav-link active" href="logout.php">Logout </a>
    </div>
  </div>

</nav>

 </div>
 <h1>Add New User </h1>
 <button type="submit" name="login" class="btn btn-danger"><a href="users.php"> Back to user list</a> </button> <br><br>
 
        </div>

        <?php
          if (!empty($errors)){
            echo '<div class="errmsg">';
            echo 'There were error(s) on your form';
            
            foreach ($errors as $error){
              echo $error;
            }
            echo '</div>';
          }
            


        ?>
        <form>
  	<div class="container text-center">
	<div class="input-group mb-5">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default"><i class="fa fa-user" aria-hidden="true"></i> | First Name</span>
  </div>
  <input type="text" class="form-control" name="fn"  placeholder="Enter your First Name" aria-label="Default" aria-describedby="inputGroup-sizing-default" required <?php echo 'value="'.$fn.'"'; ?>>
</div></div>

<div class="container text-center">
  <div class="input-group mb-5">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default"><i class="fa fa-user" aria-hidden="true"></i> | Last Name</span>
  </div>
  <input type="text" class="form-control" name="ln" placeholder="Enter Last Name" aria-label="Default" aria-describedby="inputGroup-sizing-default" <?php echo 'value="'.$ln.'"'; ?>>
</div></div>

<div class="container text-center">
  <div class="input-group mb-5">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default"><i class="fa fa-envelope" aria-hidden="true"></i>| Email Address</span>
  </div>
  <input type="text" class="form-control" name="email" placeholder="Enter Email Address" aria-label="Default" aria-describedby="inputGroup-sizing-default" <?php echo 'value="'.$email.'"'; ?>>
</div></div>




<div class="container text-center">
	<div class="input-group mb-5">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default"><i class="fa fa-key" aria-hidden="true"></i> | New Password</span>
  </div>
    <input type="password" id="inputPassword5" name="pw" class="form-control" aria-describedby="passwordHelpBlock" placeholder="Enter New Password" >

</div>

   
  <button type="submit" name="submit" class="btn btn-danger">Save</button>
  </div>
  
  </fieldset>
</form>
</div>


</body>
</html>