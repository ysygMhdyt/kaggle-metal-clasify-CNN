<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>金属表面缺陷识别管理系统</title>

		<link rel="stylesheet" type="text/css" href="../static/top04.css" />
        <link rel="stylesheet" type="text/css" href="../static/style.css" />
		<link rel="stylesheet" type="text/css" href="../static/one01.css" />

</head>
<body>
		<div id="top">
			<div id="top-one">
				<dl>
					<dd><img src="../static/logo.png"></dd>
					<dd><a href="main02.php">数据库</a></dd>
					<dd><a href="main03.php">数据管理</a></dd>
					<dd><small>尊敬的用户，您好！</small></dd>
				</dl>
                <div class="container">
                    <div class="loader">
                    <div style="--i:1;--color:#FD79A8"></div>
                    <div style="--i:2;--color:#0984E3"></div>
                    <div style="--i:3;--color:#00B894"></div>
                    <div style="--i:4;--color:#FDCB6E"></div>
                </div>
			</div>
		</div>

	    <div id="one">
            <table class="mtable mtable-bordered">
                <dd><h2>搜索结果</h2></dd>
				<thead>
					<tr>
						<th scope="col">序号</th>
                        <th>钢材图片</th>
						<th>表面缺陷类别</th>
                        <th scope="col">操作</th>
					</tr>
				</thead>
                <?php
                    include_once "conn.php";
                    $sel=$_POST['sel'];
	                $sql="select * from data where target like '%".$sel."%'";
	                $res=mysqli_query($conn,$sql);
	                if(!$res){
		                die('无法读取数据,请联系管理员修复:'.mysqli_error($conn));
                    }
                    else{
                    }
                    for($i=1;$row=$res->fetch_assoc();$i++){
                ?>
                    <tr>
                        <th scope="row"><?php echo $row['ID']?></th>
                        <td><?php echo "<img src={$row['image']} />";?></td>
                        <td><?php echo $row['target'];?></td>
                        <td><a href="edit.php?ID=<?php echo $row['ID'];?>">编辑</a>
                        <a href="dele.php?ID=<?php echo $row['ID'];?>">删除</a></td>
                    </tr>
                <?php
                }
                ?>

			</table>
		</div>
</body>
</html>

<?php
    mysqli_close($conn);
?>