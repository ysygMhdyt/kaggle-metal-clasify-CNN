<?php
    include_once "conn.php";

    $ID = $_GET['ID'];

    //执行sql
    $sql = "DELETE FROM `data` WHERE `data`.`ID` = '$ID'";
    $conn->query($sql);

    //返回首页
    header("Location:main03.php");
    
?>