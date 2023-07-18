<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>金属表面缺损识别分类</title>
    <link href="../static/add.css" rel="stylesheet">
    <script type="text/javascript" src="http://pv.sohu.com/cityjson?ie=utf-8"></script>  
    <script src="https://static.runoob.com/assets/jquery-validation-1.14.0/lib/jquery.js"></script>
    <script src="https://static.runoob.com/assets/jquery-validation-1.14.0/dist/jquery.validate.min.js"></script>
    <script src="https://static.runoob.com/assets/jquery-validation-1.14.0/dist/localization/messages_zh.js"></script>	
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
                    <h2>金属表面缺损识别分类</h2>
                    <div class="box">
                        <input type="file" id="pic"><br><img src="" height="200" alt="图片预览">
                    </div>
                    <script type="text/javascript">
                        var fileInput = document.querySelector('input[type=file]'),previewImg = document.querySelector('img');
                        fileInput.addEventListener('change', function () {
                            var file = this.files[0];
                            var reader = new FileReader();
                            // 监听reader对象的的onload事件，当图片加载完成时，把base64编码赋值给预览图片
                            reader.addEventListener("load", function () {
                                previewImg.src = reader.result;
                            }, false);
                            // 调用reader.readAsDataURL()方法，把图片转成base64
                            reader.readAsDataURL(file);
                        }, false);
                        function gotFileName(){
                            var files = document.getElementById("pic").files;
                            var fileNameAll = "";
                            for(var i = 0; i < files.length; i++){
                                fileNameAll += files[i].name + ";";
                            }
                            fileNameAll = fileNameAll.substr(0, fileNameAll.length - 1);
                            $image="../pic/"+fileNameAll;
                            return $image
                        }
                    </script>
                    
                    <?php
                        include_once "conn.php";
                        $sqltot="select count(*) from data";
                        $arrtot=mysqli_fetch_row(mysqli_query($conn, $sqltot));
                        $ID=$arrtot[0]+1;
                        echo "<script type='text/javascript' >gotFileName();</script>";
                        $target="";
                        $sql="INSERT INTO `data` (`ID`, `image`, `target`) VALUES ('$ID', '$image', '$target');";
                        $res=mysqli_query($conn,$sql);
                        $row=$res->fetch_assoc();
                    ?>

                    <div class="form-control">
                        <input type="button" value="开始分类" onclick="return alert(<?php echo $row['target']?>">
                    </div> 

                    <dd><a href='main03.php;?>'>返回主页</a></dd>               

                </div>
            </div>
        </div>
    
    </div>

</body>
</html>