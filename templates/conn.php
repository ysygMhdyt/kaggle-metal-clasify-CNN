<?php
    error_reporting(0);
	$mydbhost = "localhost";
	$mydbuser = "root";
	$mydbpass = '123456';
	$dbname = "metal";

	$conn = mysqli_connect($mydbhost, $mydbuser, $mydbpass, $dbname);
	if(! $conn){
		die("连接失败: " . mysqli_error($conn));
	}
	else
    {
    }	
?>
