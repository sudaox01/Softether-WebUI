<<<<<<< HEAD
<?php
session_start();
require("functions.php");
if(!isset($_SESSION['pass'])) {
    header("Location: ?f=login");
    die();
}
$virthubs = GetVirtualHubs($_SESSION['host'], $_SESSION['port'], $_SESSION['user'], $_SESSION['pass']);
$tcplisteners = GetTcpListeners($_SESSION['host'], $_SESSION['port'], $_SESSION['user'], $_SESSION['pass']);
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Softether Server Manager</title>
        <link rel="stylesheet" href="static/css/index.css">
        <script src="static/js/index.js"></script>
    </head>
    <body>
        <div id="virtualhubs">
            <!-- Virtual Hubs -->
            <h3>Virtual Hubs:</h3>
            <table style="width:100%">
            <tr>
                <th>Name</th>
                <th>Sessions</th>
                <th>Users</th>
            </tr>
            <?php 
                foreach($virthubs as $hub) {
                    echo('<tr>');
                    echo('<td><a href="javascript:ShowHub(\'' . $hub['HubName_str'] . '\');">' . $hub['HubName_str'] . '</a></td>'); // Hub Name
                    echo('<td>' . $hub['NumSessions_u32'] . '</td>'); // Hub Sessions
                    echo('<td>' . $hub['NumUsers_u32'] . '</td></a>'); // Hub Users
                    echo('</tr>');
                }
            ?>
            </table>
        </div>
        <div id="tcplisteners">
            <h3>TCP Listeners:</h3>
            <table style="width:100%">
            <tr>
                <th>Status</th>
                <th>Port</th>
            </tr>
            <?php 
                foreach($tcplisteners as $tcp) {
                    echo('<tr>');
                    if($tcp['Errors_bool']) {
                        // Listen error 
                        echo('<td>Error</td>');
                    }
                    if($tcp['Enables_bool']) {
                        echo('<td>Listening</td>');
                    }
                    else {
                        echo('<td>Disabled</td>');
                    }
                    echo('<td>' . $tcp['Ports_u32'] . '</td>');
                    echo('</tr>');
                }
            ?>
            </table>
        </div>
        <a href="?f=logout"><button>Logout</button></a>
    </body>
=======
<?php
session_start();
require("functions.php");
if(!isset($_SESSION['pass'])) {
    header("Location: ?f=login");
    die();
}
$virthubs = GetVirtualHubs($_SESSION['host'], $_SESSION['port'], $_SESSION['user'], $_SESSION['pass']);
$tcplisteners = GetTcpListeners($_SESSION['host'], $_SESSION['port'], $_SESSION['user'], $_SESSION['pass']);
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Softether Server Manager</title>
        <link rel="stylesheet" href="static/css/index.css">
        <script src="static/js/index.js"></script>
    </head>
    <body>
        <div id="virtualhubs">
            <!-- Virtual Hubs -->
            <h3>Virtual Hubs:</h3>
            <table style="width:100%">
            <tr>
                <th>Name</th>
                <th>Sessions</th>
                <th>Users</th>
            </tr>
            <?php 
                foreach($virthubs as $hub) {
                    echo('<tr>');
                    echo('<td><a href="javascript:ShowHub(\'' . $hub['HubName_str'] . '\');">' . $hub['HubName_str'] . '</a></td>'); // Hub Name
                    echo('<td>' . $hub['NumSessions_u32'] . '</td>'); // Hub Sessions
                    echo('<td>' . $hub['NumUsers_u32'] . '</td></a>'); // Hub Users
                    echo('</tr>');
                }
            ?>
            </table>
        </div>
        <div id="tcplisteners">
            <h3>TCP Listeners:</h3>
            <table style="width:100%">
            <tr>
                <th>Status</th>
                <th>Port</th>
            </tr>
            <?php 
                foreach($tcplisteners as $tcp) {
                    echo('<tr>');
                    if($tcp['Errors_bool']) {
                        // Listen error 
                        echo('<td>Error</td>');
                    }
                    if($tcp['Enables_bool']) {
                        echo('<td>Listening</td>');
                    }
                    else {
                        echo('<td>Disabled</td>');
                    }
                    echo('<td>' . $tcp['Ports_u32'] . '</td>');
                    echo('</tr>');
                }
            ?>
            </table>
        </div>
        <a href="?f=logout"><button>Logout</button></a>
    </body>
>>>>>>> 26b8f4e921bf54ba1ab4248fe78457aa8bb234dd
</html>