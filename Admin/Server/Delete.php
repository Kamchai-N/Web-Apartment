<?php
    include("../../Servers/connect.php");
    $IdItem = $_GET['idItemURL'];
    // echo $IdItem;
    $sql = "UPDATE `status_bookroom` SET  `Status_Check` = 'Delete' WHERE `ID` = $IdItem";
    mysqli_query($con,$sql);
    // header('Location: ../index.php');
    $sql = "SELECT * FROM `status_bookroom` WHERE `ID` = $IdItem";
    $query = mysqli_query($con,$sql);
    while($d = mysqli_fetch_array($query)){
        $sqlBackup = "INSERT INTO `backup_bookroom`(`ID`, `RAmount`, `BAmount`, `CheckIn`, `CheckOut`, `Adult`, `Child`, `Status_Check`, `NumRoom`, `Day`, `ID_Users`) VALUES ('$d[0]','$d[1]','$d[2]','$d[3]','$d[4]','$d[5]','$d[6]','$d[7]','$d[8]','$d[9]','$d[10]')";
        // echo $sqlBackup;
        mysqli_query($con,$sqlBackup);
    }
    $sqlDele = "DELETE FROM `status_bookroom` WHERE `ID` = $IdItem";
    mysqli_query($con,$sqlDele);
    $sqlSDele = "DELETE FROM `status_room` WHERE `idItem` = $IdItem";
    mysqli_query($con,$sqlSDele);
    header('Location: ../index.php');
?>