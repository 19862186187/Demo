<?php
include 'connector.php';
$sql = "CREATE DATABASE myproject";
if (mysqli_query($con, $sql)) {
    echo "<br/>数据库创建成功...";
} else {
    echo "<br/>创建数据库错误: " . mysqli_error($con).'...';
}

mysqli_select_db($con,"myproject");
//创建数据表users
$sql = "CREATE TABLE users(
        id int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT'主键',
        trueName varchar(100) NOT NULL COMMENT'姓名',
        gender varchar(16) NOT NULL COMMENT'性别',
        userName varchar(100) NOT NULL COMMENT'用户名',
        passWord varchar(200) NOT NULL COMMENT'密码',
        grade varchar(200) NOT NULL COMMENT'年级',
        major varchar(200) NOT NULL COMMENT'专业',
        email varchar(100) NOT NULL COMMENT'电子邮箱',
        university varchar(100) NOT NULL COMMENT'大学',
        headImage longblob COMMENT'头像',
        headImageType varchar(20) COMMENT'头像类型',
        downloadHistory varchar(200)  COMMENT'下载历史'
    )";
if (mysqli_query($con, $sql)) {
    echo "<br/>数据表users创建成功...";
} else {
    echo "<br/>创建users数据表错误: " . mysqli_error($con).'...';
}


//创建数据表books
$sql = "CREATE TABLE books(
        id int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT'主键',
        bookName varchar(100) NOT NULL COMMENT'书名',
        author varchar(200) NOT NULL COMMENT'作者',
        majorType varchar(200) NOT NULL COMMENT'专业类型',
        coverImgType varchar(20) not null  comment'图片类型',
        coverImg longblob COMMENT'封面',
        downloadCount varchar(200) NOT NULL COMMENT'下载次数',
        source varchar(100) NOT NULL COMMENT '来源',
        localPath varchar (200) NOT NULL COMMENT'存放地址',
        publishTime date DEFAULT NULL COMMENT'出版时间'
    )ENGINE=InnoDB DEFAULT CHARSET=utf8";
if (mysqli_query($con, $sql)) {
    echo "<br/>数据表books创建成功...";
} else {
    echo "<br/>创建books数据表错误: " . mysqli_error($con).'...';
}

//创建数据表videos
$sql = "CREATE TABLE videos(
        id int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT'主键',
        videoName varchar(100) NOT NULL COMMENT'视频名',
        author varchar(200) NOT NULL COMMENT'up主',
         source varchar(100) NOT NULL COMMENT '来源',
        majorType varchar(200) NOT NULL COMMENT'专业类型',
        coverImg longblob COMMENT'封面',
        sourceAV varchar (100) NOT NULL COMMENT 'AV号',
        updateState varchar (20) default null comment '更新状态'
    )ENGINE=InnoDB DEFAULT CHARSET=utf8";
if (mysqli_query($con, $sql)) {
    echo "<br/>数据表videos创建成功...";
} else {
    echo "<br/>创建videos数据表错误: " . mysqli_error($con).'...';
}
mysqli_close($con);
?>