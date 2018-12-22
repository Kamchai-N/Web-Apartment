<?php
    session_start();
    include("../../Servers/connect.php");
    $Username = $_POST["Username"];
    $Password = $_POST["Password"];
    $Passencode = md5($Password);
    $sql = "SELECT * FROM `users_list` WHERE `Email` = \"$Username\" AND `Password` = \"$Passencode\"";
    $query = mysqli_query($con,$sql);
    while($d = mysqli_fetch_array($query)){
        echo "OK";
        $_SESSION['Userid'] = $d[0];
        $_SESSION['Username'] = $d[1];
    }
?>