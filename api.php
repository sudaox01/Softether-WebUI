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
}