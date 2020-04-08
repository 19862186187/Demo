<?php
include 'connector.php';
//$PATH="../../upload/"为设置保存路径
$PATH="../upload/";
//获取请求内容
$name=$_REQUEST["name"];
$author=$_REQUEST["author"];
$source=$_REQUEST["source"];
$publishTime=$_REQUEST["publishTime"];
$majorType=$_REQUEST["majorType"];
$fileName=$_FILES["file"]["type"];
$coverImgType=$_FILES["coverImg"]['type'];
$coverImg=base64_encode(file_get_contents( $_FILES["coverImg"]['tmp_name']));
$str= base64_encode($_FILES["file"]["name"]);
echo  $localPath = $PATH . $_FILES["file"]["name"];
//检验文件是否存在
mysqli_select_db($con, "myproject");
$sql = "SELECT id from books where bookName='$name' and author='$author'";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_all($result,MYSQLI_BOTH);
//echo json_encode($row);
//检验文件格式
if($fileName=="application/pdf" and $row == null) {
    //获取报错信息
    if ($_FILES["file"]["error"] > 0) {
        echo "Error: " . $_FILES["file"]["error"] . "<br />";
    }
    if (!$_FILES['file']['error']) {
        echo "上传成功" . "<br/>";
    }
    //上传并保存
    if (isset($_FILES["file"])) {
        if (move_uploaded_file($_FILES["file"]['tmp_name'], $localPath) == 1) {
            echo $_FILES["file"]["name"];
        } else {
            echo "上传失败，错误码" . move_uploaded_file($_FILES["file"]['tmp_name'], $PATH . $_FILES["file"]["name"]);
        }
    //    move_uploaded_file($_FILES["file"]["tmp_name"], "" . $_FILES["file"]["name"]);
    } else {
        echo 'no file';
    }
    //存入数据库
    mysqli_select_db($con, "myproject");
    $localPath = addslashes($localPath);
    $sql = "INSERT INTO books(bookName, author, majorType,coverImgType, coverImg, source, localPath, publishTime,downloadCount) " . "value(" . "'" . $name . "','" . $author . "','" . $majorType . "','" . $coverImgType . "','" . $coverImg . "','" . $source . "','" . $localPath . "','" . $publishTime . "'" . ",1)";
    mysqli_query($con, $sql);
    if ($con->query($sql) === TRUE) {
        echo "\n新记录插入成功";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}else if($fileName!="application/pdf"){
    echo "不支持".$fileName."文件";
}else{
    echo "上传失败，文件已存在";
}
?>