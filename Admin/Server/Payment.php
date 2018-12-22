<?php
    include("../../Servers/connect.php");
    $idItem =  $_GET['idItemURL'];
    $sql = "UPDATE `status_bookroom` SET  `Status_Check` = 'ชำระเงินแล้ว' WHERE `ID` = $idItem";
    mysqli_query($con,$sql);
    header('Location: ../index.php');
?>