<?php
    session_start();
    include("../../Servers/connect.php");
    $RoomNumber = array("101","102","103","104","105",
                    "201","202","203","204","205","206","207","208","209","210",
                    "301","302","303","304","305","306","307","308","309","310",
                    "401","402","403","404","405","406","407","408","409","410",
                    "501","502","503","504","505");

    $room = $_POST['room'];
    $couch = $_POST['couch'];
    
    $dateCheckIn = $_POST['dateCheckIn'];
    $dateCheckInSTR=strtotime($dateCheckIn);
    $dateCheckInFormat =  date("Y-m-d",$dateCheckInSTR);
    $dateCheckInFormat2 =  date("Y-m-d",$dateCheckInSTR);

    $dateCheckOut = $_POST['dateCheckOut'];
    $dateCheckOutSTR=strtotime($dateCheckOut);
    $dateCheckOutFormat =  date("Y-m-d",$dateCheckOutSTR);
    $dateCheckOutFormat2 =  date("Y-m-d",$dateCheckOutSTR);

    $adult = $_POST['adult'];
    $child = $_POST['child'];
    if(isset($_SESSION['Userid'])){
        $id_users = $_SESSION['Userid'];
    }else{
        $id_users = 0;
    }
    
    // foreach ($RoomNumber as $value) {
        
    // }
    $diffDay =  diff($dateCheckOutSTR,$dateCheckInSTR);
    $DaySum =array();
    for ($i = 1; $i <= $diffDay; $i++) { 
        array_push($DaySum,$dateCheckInFormat);
        $dateCheckInSTR=strtotime("+1 days",$dateCheckInSTR);
        $dateCheckInFormat =  date("Y-m-d",$dateCheckInSTR);
    }
    // print_r($DaySum);

    // $sql = "INSERT INTO `status_room`(`Date`, `ID_User`) VALUES (\"$dateCheckInFormat\",\"  $id_users\")";
    // $query = mysqli_query($con,$sql);
    //echo $dateCheckInFormat;

     foreach ($RoomNumber as $value) {
        $sql = "SELECT * FROM `status_room` WHERE `Number_Room` = $value AND `Date` = \"$DaySum[0]\"";
        $query = mysqli_query($con,$sql);
        $num_rows = mysqli_num_rows($query);
        if($num_rows >= 1){
            continue;
            // echo($num_rows);
        }else{
            $Str = " ";
            $T = " ";
            for ($p = 0; $p < sizeof($DaySum); $p++) { 
                $T .= "0";
                $sqlRoom = "SELECT * FROM `status_room` WHERE `Number_Room` = $value AND `Date` = \"$DaySum[$p]\"";
                $queryRoom = mysqli_query($con,$sqlRoom);
                $num_rowsRoom = mysqli_num_rows($queryRoom);
                if($num_rowsRoom >= 1){
                    // echo("1");
                    $Str .= "1";
                }else{
                    // echo("0");
                    $Str .= "0";
                }
            }
            if($Str == $T){
                $sizeDay = sizeof($DaySum);
                $sql = "INSERT INTO `status_bookroom`(`RAmount`, `BAmount`, `CheckIn`, `CheckOut`, `Adult`, `Child`, `Status_Check`,`NumRoom`,`Day`,`ID_Users`) VALUES (\"$room\",\"$couch\",\"$dateCheckInFormat2\",\"$dateCheckOutFormat2\",\"$adult\",\"$child\",\"กรุณาชำระเงิน\",\"$value\",\"$sizeDay\",\"$id_users\")";
                $query = mysqli_query($con,$sql);
                $idItem  = mysqli_insert_id($con);
                for ($i=0; $i < sizeof($DaySum); $i++) { 
                    $sql = "INSERT INTO `status_room`(`Number_Room`, `Date`,`idItem`,`ID_User`) VALUES (\"$value\",\"$DaySum[$i]\",\"$idItem\",\"$id_users\")";
                    $query = mysqli_query($con,$sql);
                }
                if($query){
                    echo "OK";
                }
                exit();
            }
            // echo("Kay ==> ".$value. " ".$T);
            // continue;
        }
     }


    function diff($CheckOut,$CheckIn){
        $beet =  $CheckOut - $CheckIn;
        $y_sec = 60 * 60 * 24;
        $age  = intval($beet/$y_sec + 1);
        return $age;
    }
?>