<<<<<<< HEAD
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
=======
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
>>>>>>> 26b8f4e921bf54ba1ab4248fe78457aa8bb234dd
}