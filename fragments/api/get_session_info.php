<<<<<<< HEAD
<?php 
header("Content-Type: application/json");
require("functions.php");
$sessioninfo = GetVirtualHubSessionStatus($_POST['host'], $_POST['port'], $_POST['user'], $_POST['pass'], $_POST['hub'], $_POST['session']);
=======
<?php 
header("Content-Type: application/json");
require("functions.php");
$sessioninfo = GetVirtualHubSessionStatus($_POST['host'], $_POST['port'], $_POST['user'], $_POST['pass'], $_POST['hub'], $_POST['session']);
>>>>>>> 26b8f4e921bf54ba1ab4248fe78457aa8bb234dd
die(json_encode($sessioninfo, JSON_PRETTY_PRINT));