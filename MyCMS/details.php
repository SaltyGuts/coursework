<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>A CG news platform</title>
<link rel="stylesheet" href="styles/style.css" media="all" />
</head>

<body>
<div class="container">
					  
	<div class="head">
		<a href="index.php"><img id="logo" src='images/banner.png' /></a>				 
	</div>

	<?php include("includes/navbar.php"); ?>

	<div class="post_area"> 
	
	<?php

	if(isset($_GET['post'])){

		$post_id = $_GET['post'];
	

	$get_posts = "select * from posts where post_id='$post_id'";

	$run_posts = mysqli_query($con, $get_posts);

	while ($row_posts = mysqli_fetch_array($run_posts))

	{
		$post_title = $row_posts['post_title'];
		$post_date = $row_posts['post_date'];
		$post_author = $row_posts['post_author'];
		$post_image = $row_posts['post_image'];
		$post_content = $row_posts['post_content'];

		echo "<h2>$post_title</h2>

		<span><i>Posted by</i> <b>$post_author</b> &nbsp; On <b>$post_date</b></span>
		<img src='admin/news_images/$post_image' width='400' height='400'/>
		<div>$post_content </div>";
	}
}
	?>
	</div>	

	<?php include("includes/sidebar.php"); ?>

	<div class="footer_area"> 
	<h1 style="padding:20px; text-align:center">&copy; All Right Reserved 2021 - Me3eh.</h1>

	</div> 				  
					  
</div>					 					  
</body>
</html>