<?php
include 'connector.php';
mysqli_select_db($con, "myproject");
$email=$_POST['email'];//电子邮箱
$pass = $_POST['psw'];//密码
$sql = "select * from users where email='$email'" ;
$result= mysqli_query($con,$sql);
$row = mysqli_fetch_all($result,MYSQLI_BOTH);
mysqli_error($con);
$password = $row[0]["passWord"];
if($pass == $password){
    $name=$row[0]["userName"];
    echo json_encode($row);
}
else{
    echo "用户名或密码错误";
    echo '<br/>';
}
mysqli_close($con);
?>