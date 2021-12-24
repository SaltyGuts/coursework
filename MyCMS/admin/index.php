<?php
   session_start();
   
   if(!isset($_SESSION['user_name'])){

        echo "<script>window.open('login.php?not_authorize=You are not Authorize to access!','_self')</script>";
    }
else {

?>

<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>A CG news platform</title>
<link rel="stylesheet" href="style.css" />
</head>

<body>
    <div class="wrapper">

        <a href="index.php"> <div class="header"></div>

        <div class="left">
            <h3 style="padding: 5px;">Manage Content</h3>

            <a href="index.php?insert_post">Insert New Post</a>
            <a href="index.php?view_posts">View all Posts</a>
            <a href="logout.php">Admin Logout</a>

        </div>

        <div class="right">

    

        <?php
    if(isset($_GET['insert_post'])){

        include("includes/insert_post.php");
    }
    if(isset($_GET['view_posts'])){

        include("includes/view_posts.php");
    }
    ?>
    
    
    </div>


</div>
</body>
</html>

<?php } ?>