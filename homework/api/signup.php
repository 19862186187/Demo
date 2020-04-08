<?php
header("Content-Type: text/html; charset=utf8");
// 定义变量并设置为空值

//注册信息验证
include 'connector.php';

$name = $_POST['name'];//姓名
$username = $_POST['nickName'];//昵称
$major=$_POST['major'];//专业
$grade=$_POST['grade'];//年级
$email=$_POST['email'];//电子邮箱
$pass = $_POST['psw'];//密码
$university=$_POST['university'];//大学
$gender=$_POST['gender'];//性别
$headImageType=$_FILES["headImage"]['type'];
$headImage=base64_encode(file_get_contents($_FILES["headImage"]['tmp_name']));
$sql = "SELECT id from users where email='$email'";
$result= mysqli_query($con,$sql);
$row = mysqli_fetch_all($result,MYSQLI_BOTH);
if($row == NULL){
    if($_FILES["file"]["error"] > 0){
        echo "Error:".$_FILES["file"]["error"]."<br/>";
    }
    if(!$_FILES['file']['error']){
        echo "上传成功"."<br/>";
    }
//头像
    echo '<br/>';
    echo '<br/>';
    $sql = "INSERT INTO users(trueName,gender,userName,passWord,grade,major,email,university,headImageType,headImage)"."VALUES("."'".$name."','".$gender."','".$username."','".$pass."','".$grade."','".$major."','".$email."','".$university."','".$headImageType."','".$headImage."')";
    echo $sql;
    echo '<br/>';
    echo $name;
    echo '<br/>';
    echo $username;
    echo '<br/>';
    echo $major;
    echo '<br/>';
    echo $grade;
    echo '<br/>';
    echo $email;
    echo '<br/>';
    echo $pass;
    echo '<br/>';
    echo $university;
    echo '<br/>';
    echo $gender;
    echo '<br/>';
    echo $headImageType;
    echo '<br/>';
//echo $headImage;
    echo '<br/>';
    $result = mysqli_query($con, $sql) or die("建立数据表失败".mysqli_error($con));
    echo $result;
    echo '<br/>';
    echo "注册成功";
}
else{
    echo "该邮箱已被注册";
    echo '<br/>';
}


?>