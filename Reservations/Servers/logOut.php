<?php
    session_start();
    session_destroy();
    include("../../Servers/connect.php");
    header('Location: ../login.php');
?>