<?php
   @session_start();
   
   if(!isset($_SESSION['user_name'])){

        echo "<script>window.open('login.php?not_authorize=You are not Authorize to access!','_self')</script>";
    }
else {

?>

<head>
<meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
<title>A CG news platform</title>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin">
    </script>
<script>
    tinymce.init({
      selector: '#mytextarea'
    });
  </script>


  
<script>tinymce.init({selector:'textarea'});</script>
<link rel="stylesheet" href="styles/style.css" media="all" />
</head>

<body >
    
    <form action="index.php?insert_post" method="post" enctype="multipart/form-data">

    <table width="795" height="500" align="center" bgcolor="#b8b8b8">

        <tr>
            <td colspan="6" align="center"><h1>Insert New Post</h1></td>
</tr>

        <tr>
            <td align="right"><strong>Post Title:</strong></td>
            <td><input type="text" name="post title" size="60"></rd>
</tr>

<tr>
            <td align="right" bgcolor="#b8b8b8"><strong>Post Category:</strong></td>
            <td>
                <select name="cat">
                    <option>Select a Category</option>
                    <?php
	include("includes/database.php");

	$get_cats = "select * from categories";

	$run_cats = mysqli_query($con, $get_cats);

	while ($cats_row=mysqli_fetch_array($run_cats)){
		$cat_id=$cats_row['cat_id'];
		$cat_title=$cats_row['cat_title'];
		echo "<option value='$cat_id'>$cat_title</option>";
		}
	                ?>
                </select>
            </td>
</tr>

<tr>
            <td align="right" bgcolor="#b8b8b8"><strong>Post Author:</strong></td>
            <td><input type="text" name="post_author" size="60"/></td>
</tr>

<tr>
            <td align="right" bgcolor="#b8b8b8"><strong>Post Keywords:</strong></td>
            <td><input type="text" name="post_keywords" size="60"/></td>
</tr>

<tr>
            <td align="right" bgcolor="#b8b8b8"><strong>Post Image:</strong></td>
            <td><input type="file" name="post_image" size="50"></td>
</tr>

<tr>
            <td align="right" bgcolor="#b8b8b8"><strong>Post Content:</strong></td>
            <td><textarea name="post_content" rows="15" cols="40"></textarea></td>
</tr>

<tr>           
            <td align="center" colspan="6"><input type="submit" name="submit" value="Publish now"/></td>
</tr>

    </body>
    </html>

<?php
if(isset($_POST['submit'])){

     $post_title = $_POST['post_title'];
     $post_date = date('m-d-y');
     $post_cat = $_POST['cat'];
     $post_author = $_POST['post_author'];
     $post_keywords = $_POST['post_keywords'];
     $post_image = $_FILES['post_image']['name'];
     $post_image_tmp =$_FILES['post_image']['tmp_name'];
     $post_content = $_POST['post_content'];

     if($post_title=='' OR $post_cat=='null' OR $post_author=='' OR $post_keywords=='' OR $post_image=='' OR $post_content==''){
         echo "<script>alert('Please fill in all the fields')</script>";
         exit();
     }
     else {

        move_uploaded_file($post_image_tmp,"news_images/$post_image");

        $insert_posts = "insert into posts (category_id,post_title,post_date,post_author,post_keywords,post_image,post_content) values ('$post_cat','$post_title','$post_date','$post_author','$post_keywords','$post_image','$post_content')";

        $run_posts = mysqli_query($con,$insert_posts);

        

           echo "<script>alert('Post Has Been Published!')</script>";

           echo "<script>window.open('index.php?insert_post','_self'</script>";
        }
        
    }


     












?>

<?php } ?>
