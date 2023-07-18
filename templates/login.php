<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>登录验证</title>
</head>
<body>
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

			$id = $_POST['id'];
			$password = $_POST['password'];

			$sql="SELECT * FROM user WHERE id = '{$id}' AND password = '{$password}'";			
			$res = mysqli_query($conn, $sql);
			    
			if($row = mysqli_fetch_array($res)){
				$url='http://localhost:3000/templates/main02.php';
				echo "<script>location.href='$url'</script>";
			}
			else{
				$url = 'http://localhost:3000/templates/login.html';
				echo "<script> alert('用户名或密码输入有误！'); </script>"; 
				echo "<meta http-equiv='Refresh' content='0;URL=$url'>";  
			}		
		
		
        $result ->free();   
		mysqli_close($conn);
	?>
</body>
</html>