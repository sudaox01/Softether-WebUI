<?php
session_start();
require("functions.php");
if(!isset($_SESSION['pass'])) {
    header("Location: ?f=login");
    die();
}
session_destroy();
header("Location: ?f=login");