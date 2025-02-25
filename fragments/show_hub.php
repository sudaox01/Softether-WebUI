<<<<<<< HEAD
<?php 
session_start();
require("functions.php");
if(!isset($_SESSION['pass'])) {
    header("Location: ?f=login");
    die();
}
$hubinfo = GetVirtualHubStatus($_SESSION['host'], $_SESSION['port'], $_SESSION['user'], $_SESSION['pass'], $_GET['hub']);
//print_r($hubinfo);
// Get hub status
if($hubinfo['Online_bool']) {
    $online = "Online";
}
else {
    $online = "Offline";
}
$name = $hubinfo['HubName_str'];
$numusers = $hubinfo['NumUsers_u32'];
$numgroups = $hubinfo['NumGroups_u32'];
$numac = $hubinfo['NumAccessLists_u32'];
$numsessions = $hubinfo['NumSessions_u32'];
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Softether Server Manager</title>
        <link rel="stylesheet" href="static/css/index.css">
        <script src="static/js/index.js"></script>
    </head>
    <body>
        <div id="hub">
            <!-- Virtual Hub -->
            <span>Name: <?php echo($name); ?></span><br>
            <span>Status: <?php echo($online); ?></span><br>
            <span>Users: <?php echo($numusers); ?></span><br>
            <span>Groups: <?php echo($numgroups); ?></span><br>
            <span>Access Lists: <?php echo($numac); ?></span><br>
            <span><a href="javascript:ShowHubSessions(GetHubFromUrl());">Sessions: <?php echo($numsessions); ?></a></span><br>
        </div>
    </body>
=======
<?php 
session_start();
require("functions.php");
if(!isset($_SESSION['pass'])) {
    header("Location: ?f=login");
    die();
}
$hubinfo = GetVirtualHubStatus($_SESSION['host'], $_SESSION['port'], $_SESSION['user'], $_SESSION['pass'], $_GET['hub']);
//print_r($hubinfo);
// Get hub status
if($hubinfo['Online_bool']) {
    $online = "Online";
}
else {
    $online = "Offline";
}
$name = $hubinfo['HubName_str'];
$numusers = $hubinfo['NumUsers_u32'];
$numgroups = $hubinfo['NumGroups_u32'];
$numac = $hubinfo['NumAccessLists_u32'];
$numsessions = $hubinfo['NumSessions_u32'];
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Softether Server Manager</title>
        <link rel="stylesheet" href="static/css/index.css">
        <script src="static/js/index.js"></script>
    </head>
    <body>
        <div id="hub">
            <!-- Virtual Hub -->
            <span>Name: <?php echo($name); ?></span><br>
            <span>Status: <?php echo($online); ?></span><br>
            <span>Users: <?php echo($numusers); ?></span><br>
            <span>Groups: <?php echo($numgroups); ?></span><br>
            <span>Access Lists: <?php echo($numac); ?></span><br>
            <span><a href="javascript:ShowHubSessions(GetHubFromUrl());">Sessions: <?php echo($numsessions); ?></a></span><br>
        </div>
    </body>
>>>>>>> 26b8f4e921bf54ba1ab4248fe78457aa8bb234dd
</html>