<?php
session_start();

session_destroy();

echo "<script>window.open('login.php?logout=You Succesfully Logged Out!','_self')</script>";



?>