<?php
    include("../../Servers/connect.php");
    $name = $_POST["name"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $passCon = $_POST["passCon"];
    $phone = $_POST["phone"];
    $pass_encode = md5($pass);
    if($pass == $passCon){
        $sql = "SELECT * FROM `users_list` WHERE `Email` = \"$email\"";
        $queryEmail = mysqli_query($con,$sql);
        $numRow = mysqli_num_rows($queryEmail);
        if($numRow  == 0){
            $sql = "INSERT INTO `users_list`(`Name`, `Email`, `Password`, `Phone`) VALUES (\"$name\",\"$email\",\"$pass_encode\",\"$phone\")";
            $query = mysqli_query($con,$sql);
            if($query){
                echo "OK";
            }else{
                echo "NOT";
            }
        }else{
            echo "Email";
        }
    }else{
        echo "Equal";
    }

    ?>
