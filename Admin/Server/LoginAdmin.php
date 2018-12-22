<?php
    session_start();
    include("../../Servers/connect.php");
    $email = $_POST['email'];
    $password = $_POST['password'];
    $pass_encode = md5($password);
    $sql = "SELECT * FROM `admin_list` WHERE `Username` = \"$email\" AND `Password` = \"$pass_encode\"";
    $query = mysqli_query($con,$sql);
    while($d = mysqli_fetch_array($query)){
        echo "OK";
        $_SESSION['Adminid'] = $d[0];
        $_SESSION['Adminname'] = $d[1];
    }
    $sql = "UPDATE `admin_list` SET `Status` = \"ON\" , `times` = `times` + 1 WHERE `Id` =" . $_SESSION['Adminid'];
    $query = mysqli_query($con,$sql);
?>