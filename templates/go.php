<?php

    $ID = $_POST["ID"];
    $target = $_POST["target"];
    require_once "conn.php";

    // 更新语句
    $sql = "UPDATE `data` SET `target` = '$target' WHERE `data`.`ID` ='$ID';";

    $conn->query($sql);
    header("Location:main03.php");
?>