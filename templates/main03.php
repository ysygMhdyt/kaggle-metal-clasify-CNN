<?php
    error_reporting(0);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>金属表面缺陷识别管理系统</title>

		<link rel="stylesheet" type="text/css" href="../static/top03.css" />
		<link rel="stylesheet" type="text/css" href="../static/one.css" />
        <link rel="stylesheet" type="text/css" href="../static/changepage.css" />
        <link rel="stylesheet" type="text/css" href="../static/foot.css" />
</head>
<body>
		<div id="top">
			<div id="top-one">
				<dl>
					<dd><img src="../static/logo.png"></dd>
					<dd><a href="main02.php">数据库</a></dd>
					<dd><a href="main03.php">数据管理</a></dd>
					<dd><small>尊敬的用户，您好！</small></dd>
					<dd>
                        <form id= "findform" action="main04.php" method="post">
                            <input type="text" name="sel" id="search" value="" placeholder="请输入金属表面缺陷类别名" />
						    <input type="submit" name="selsub" id="btn" value=""/>
                        </form>
					</dd>
                    <dd><a href="result.php"><input type="button" name="" id="btn"></a></dd>
				</dl>
			</div>
		</div>

	    <div id="one">
            <table class="mtable mtable-bordered">
				<thead>
					<tr>
                        <th>序号</th>
						<th>钢材图片</th>
						<th>表面缺陷类别</th>
                        <th scope="col">操作</th>
					</tr>
				</thead>
                <?php
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
        
                    //limit要求参数
                    $length=30;
                    $pagenum=@$_GET['page']?$_GET['page']:1;
        
                    //数据总行数
                    $sqltot="select count(*) from data";
                    $arrtot=mysqli_fetch_row(mysqli_query($conn, $sqltot));
                    $pagetot=ceil($arrtot[0]/$length);
     
                    //限制页数
                    if($pagenum>=$pagetot){
                        $pagenum=$pagetot;
                    }
                    $offset=($pagenum-1)*$length;
        
                    //从数据库获取数据
                    $sql="select * from data limit {$offset},{$length}";
     
                    $result=mysqli_query($conn, $sql);
                    $prevpage=$pagenum-1;
	                $nextpage=$pagenum+1;

                    for($i=1;$row=$result->fetch_assoc();$i++){
                ?>
            
                <tr>
                    <th scope="row"><?php echo $row['ID']?></th>
                    <td><?php echo "<img src={$row['image']} />";?></td>
                    <td><?php echo $row['target'];?></td>
                    <td>
                        <a href="edit.php?ID=<?php echo $row['ID'];?>">编辑</a>
                    
                        <a href="dele.php?ID=<?php echo $row['ID'];?>">删除</a>
                    </td>
                </tr>
                <?php
                }
                ?>   
			</table>
		</div>
        <div class="footer" id="changepage">
            <dd><a href='main03.php?page=<?php echo $prevpage;?>'>上一页</a>
            <a href='main03.php?page=<?php echo $nextpage;?>'> 下一页</a></dd>
            <dd>共<?php echo $arrtot[0];?>条数据</dd>
        </div> 
        <div id="foot">
            <div id='footer'>
                <div id='one'>
                    <dd><h2>小组成员信息：</h2></dd>
                    <dd><h2>1952697 黄茜</h2></dd>
                    <dd><h2>1953888 郑苈洋</h2></dd>
                    <dd><h2>1952287 章依澜</h2></dd>
                    <dd><h2>此项目仅供2019级智能建造专业数据挖掘综合性大作业使用</h2></dd>
                    <dd><h2>Copyright © 2022.6 同济大学2019级智能建造专业 版权所有</h2></dd>
                </div> 
            </div>
		</div>
</body>
</html>

<?php
    mysqli_close($conn);
?>