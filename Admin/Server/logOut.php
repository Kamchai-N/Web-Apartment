<?php
    session_start();
    session_destroy();
    include("../../Servers/connect.php");
    $sql = "UPDATE `admin_list` SET `Status` = \"OFF\" WHERE `Id` = 1";
    $query = mysqli_query($con,$sql);
    header('Location: ../login.php');
?>