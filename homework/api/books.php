<?php
    include 'connector.php';
    $majorType=$_POST["majorType"];
    mysqli_select_db($con,"myproject");
    $sql = "select * from books where majorType='$majorType' order by id";
    $result= mysqli_query($con,$sql);
    $row = mysqli_fetch_all($result,MYSQLI_BOTH);
    echo mysqli_error($con);
    echo json_encode($row);
?>