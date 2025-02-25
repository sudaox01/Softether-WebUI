<<<<<<< HEAD
<?php
session_start();
require("functions.php");
if(!isset($_SESSION['pass'])) {
    header("Location: ?f=login");
    die();
}
session_destroy();
=======
<?php
session_start();
require("functions.php");
if(!isset($_SESSION['pass'])) {
    header("Location: ?f=login");
    die();
}
session_destroy();
>>>>>>> 26b8f4e921bf54ba1ab4248fe78457aa8bb234dd
header("Location: ?f=login");