<<<<<<< HEAD
<?php 
// Fragments Main
// if no fragment is selected
if(!isset($_GET['f'])) {
    header("HTTP/1.1 400 Bad Request");
}
// fragments
// admin
if($_GET['f'] == "get_session_info") {
    require("fragments/api/get_session_info.php");
    die();
=======
<?php 
// Fragments Main
// if no fragment is selected
if(!isset($_GET['f'])) {
    header("HTTP/1.1 400 Bad Request");
}
// fragments
// admin
if($_GET['f'] == "get_session_info") {
    require("fragments/api/get_session_info.php");
    die();
>>>>>>> 26b8f4e921bf54ba1ab4248fe78457aa8bb234dd
}