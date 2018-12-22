<?php
    include("../../Servers/connect.php");
    $IdItem = $_GET['idItemURL'];
    $sql = "UPDATE `status_bookroom` SET  `Status_Check` = 'Check In' WHERE `ID` = $IdItem";
    mysqli_query($con,$sql);
    header('Location: ../index.php');
    // header('Location: #/allroom')
?>