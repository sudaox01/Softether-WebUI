<?php 
header("Content-Type: application/json");
require("functions.php");
$sessioninfo = GetVirtualHubSessionStatus($_POST['host'], $_POST['port'], $_POST['user'], $_POST['pass'], $_POST['hub'], $_POST['session']);
die(json_encode($sessioninfo, JSON_PRETTY_PRINT));