<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>编辑</title>
    <link href="../static/edit.css" rel="stylesheet">

    <script type="text/javascript" src="http://pv.sohu.com/cityjson?ie=utf-8"></script>  
<script src="https://static.runoob.com/assets/jquery-validation-1.14.0/lib/jquery.js"></script>
<script src="https://static.runoob.com/assets/jquery-validation-1.14.0/dist/jquery.validate.min.js"></script>
<script src="https://static.runoob.com/assets/jquery-validation-1.14.0/dist/localization/messages_zh.js"></script>

<script type="text/javascript">
	function randoms()
	{
		document.getElementById("target").value = "";
	}
	
	$().ready(function() {
	    $("#edit").validate({
            rules: {
            target: {required: true},
            },
            
	        messages: {
            target: "请输入修改后的缺陷类别名",
            }
        });
	});
	
</script>

<style>
.error{
	color:red;
}
</style>

</head>
<body>
    <div id="section">
        <!-- 背景颜色 -->
        <div class="color"></div>
        <div class="color"></div>
        <div class="color"></div>
        <div class="box">
            <!-- 背景圆 -->
            <div class="circle" style="--x:0"></div>
            <div class="circle" style="--x:1"></div>
            <div class="circle" style="--x:2"></div>
            <div class="circle" style="--x:3"></div>
            <div class="circle" style="--x:4"></div>
			<div class="circle" style="--x:5"></div>
			<div class="circle" style="--x:6"></div>
            
            <div class="container">
                <div class="form">
                    <h2>编辑信息</h2>
                    <form id= "edit" action="go.php" method="POST" >
                    <?php
                        error_reporting(0);
                        $ID = $_GET["ID"];

                        require_once"conn.php";
                        $sql = "SELECT * FROM `data` WHERE `ID` = '$ID'";
                        $result = $conn->query($sql);

                        $res = $result->fetch_assoc();

                    ?>
                        <div class="inputBox">
                            <input hidden name="ID" type="text" value="<?php echo $res['ID'];?>">
                        </div>

                        <div class="inputBox">
                            <input name="target" type="text" placeholder="表面缺陷类别名" value="<?php echo $res['target'];?>">
                        </div>  
                          
                        <div class="inputBox">
                            <input type="submit" value="更新信息">
            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </form>
</body>
</html>

<?php
    mysqli_close($conn);
?>