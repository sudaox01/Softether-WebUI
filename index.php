<?php 
// Fragments Main
// if no fragment is selected
if(!isset($_GET['f'])) {
    header("Location: ?f=admin");
}
// fragments
// admin
if($_GET['f'] == "admin") {
    require("fragments/admin.php");
    die();
}
// login
if($_GET['f'] == "login") {
    require("fragments/login.php");
    require("fragments/login_page.html");
    die();
}
// logout
if($_GET['f'] == "logout") {
    require("fragments/logout.php");
    die();
}
// show_hub
if($_GET['f'] == "show_hub") {
    require("fragments/show_hub.php");
    die();
}
// show_hub_sessions
if($_GET['f'] == "show_hub_sessions") {
    require("fragments/show_hub_sessions.php");
    die();
}
// show_hub_users
if($_GET['f'] == "show_hub_users") {
    require("fragments/show_hub_users.php");
    die();
}