<<<<<<< HEAD
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
        echo("<center>Failed to connect/logn to server. Please check your server and credentials and try again");
    }
}
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Softether Server Manager</title>
        <link rel="stylesheet" href="static/css/index.css">
        <script src="static/js/server_saver.js"></script>
        <script src="static/js/login.js"></script>
    </head>
    <body onload="PrintSavedServers();">
        <div id="login">
            <!-- Login -->
             <center>
                <form method="POST">
                    <input type="text" placeholder="Server Address" name="host"><br>
                    <input type="number" placeholder="Server Port" name="port"><br>
                    <input type="text" placeholder="Username" name="user"><br>
                    <input type="password" placeholder="Password" name="pass"><br>
                    <input type="submit" value="Login">
                </form>
                <button onclick="SaveServer2();">Save</button>
                <h3>Saved Servers:</h3>
                <div id="SavedServersDiv">
                </div>
            </center>
        </div>
    </body>
=======
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
        echo("<center>Failed to connect/logn to server. Please check your server and credentials and try again");
    }
}
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Softether Server Manager</title>
        <link rel="stylesheet" href="static/css/index.css">
        <script src="static/js/server_saver.js"></script>
        <script src="static/js/login.js"></script>
    </head>
    <body onload="PrintSavedServers();">
        <div id="login">
            <!-- Login -->
             <center>
                <form method="POST">
                    <input type="text" placeholder="Server Address" name="host"><br>
                    <input type="number" placeholder="Server Port" name="port"><br>
                    <input type="text" placeholder="Username" name="user"><br>
                    <input type="password" placeholder="Password" name="pass"><br>
                    <input type="submit" value="Login">
                </form>
                <button onclick="SaveServer2();">Save</button>
                <h3>Saved Servers:</h3>
                <div id="SavedServersDiv">
                </div>
            </center>
        </div>
    </body>
>>>>>>> 26b8f4e921bf54ba1ab4248fe78457aa8bb234dd
</html>