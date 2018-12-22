<?php 
    include("../../Servers/connect.php");
    if(isset($_POST["name"]) && $_POST["name"] != null && $_POST["email"] != null && $_POST["password"] != null){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $password_Confirm = $_POST["password_Confirm"];
        $position = $_POST["position"];
        $pass_encode = md5($password);
        $sql = "INSERT INTO `admin_list`(`Name`, `Username`, `Password`, `Position`) VALUES ('".$name."','".$email."','".$pass_encode."','".$position."')";
        $query = mysqli_query($con,$sql);
        if($query){
            echo "OK";
        }
    }
?>