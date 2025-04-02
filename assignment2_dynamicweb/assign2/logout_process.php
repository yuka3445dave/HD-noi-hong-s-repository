<?php
    require_once "check_session.php";
    session_destroy();
    sleep(3);
    header("location: login.php");
    exit();
?>