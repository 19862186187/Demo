<?php
$con = mysqli_connect("localhost","root","taozi2013");
if (mysqli_connect_errno($con))
{
    echo "连接 MySQL 失败: " . mysqli_connect_error().'...';
}else{
//    echo "MySQL连接成功...";
}
?>