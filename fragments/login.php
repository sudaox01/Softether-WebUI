<?php
session_start();
require("functions.php");
if(isset($_SESSION['pass'])) {
    header("Location: ?f=admin");
    die();
}
if($_SERVER['REQUEST_METHOD'] == "POST") {
    // trying to login
    //echo("TRYING");
    //print_r($_POST);
    $host = $_POST['host'];
    $port = $_POST['port'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    if(LoginToSE($host, $port, $user, $pass)) {
        $_SESSION['host'] = $host;
        $_SESSION['port'] = $port;
        $_SESSION['user'] = $user;
        $_SESSION['pass'] = $pass;
        header("Location: ?f=login");
        die("Success");
    }
    else {
        echo("<center>Failed to connect/login to server. Please check your server and credentials and try again");
    }
}
?>