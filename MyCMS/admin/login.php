<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Slide Navbar</title>
	<link rel="stylesheet" type="text/css" href="slide navbar style.css">

</head>

<link rel="stylesheet" href="style_login.css" media="all" />

<body>

    <div class="wrapper fadeInDown">
  <div id="formContent">

    
    <form method="post" action="login.php">
      <input type="text" name="user_name" placeholder="Username" required="required" />
      <input type="password" name="user_pass" placeholder="Password" required="required" />
      <input type="submit" class="btn btn-ptimary btn-block btn-large" name="login" value="Admin Login" />
    </form>

  </div>
</div>
</body>
</html>

<?php

include("includes/database.php");

    if(isset($_POST['login'])){

        $user_name = mysqli_real_escape_string($con, $_POST['user_name']);
        $user_pass = mysqli_real_escape_string($con, $_POST['user_pass']);


        $select_user = "select * from users where user_name='$user_name' AND user_password='$user_pass'";
        $run_user = mysqli_query ($con, $select_user);
        if ($user_name=='' OR $user_pass=='') {

        echo "<script>alert('Please Enter your User Name & Password!') </script>";

        }

        if (mysqli_num_rows ($run_user) >0) {

          $_SESSION['user_name']=$user_name;

          echo "<script>window.open('index.php?logged=You have Successfully Logged In!','_self')</script>";

        }
        else {
          echo "<script>alert('User Name or Password is incorrect')</script>";}
}
?>