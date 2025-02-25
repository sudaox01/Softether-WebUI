<?php 
session_start();
require("functions.php");
if(!isset($_SESSION['pass'])) {
    header("Location: ?f=login");
    die();
}
$users = GetVirtualHubUsers($_SESSION['host'], $_SESSION['port'], $_SESSION['user'], $_SESSION['pass'], $_GET['hub']);
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Softether Server Manager</title>
        <link rel="stylesheet" href="static/css/index.css">
        <script>
            const h_host = "<?php echo($_SESSION['host']); ?>";
            const h_port = "<?php echo($_SESSION['port']); ?>";
            const h_user = "<?php echo($_SESSION['user']); ?>";
            const h_pass = "<?php echo($_SESSION['pass']); ?>";
        </script>
        <script src="static/js/index.js"></script>
    </head>
    <body>
        <div id="hub">
            <!-- Virtual Hub Sessions -->
            <table style="width: 100%;">
            <tr>
                <th>Name</th>
                <th>Group Name</th>
                <th>Real Name</th>
                <th># Of Logins</th>
            </tr>
            <?php 
                foreach($users as $user) {
                    echo('<td>' . $user['Name_str'] . '</td>');
                    echo('<td>' . $user['GroupName_str'] . '</td>'); 
                    echo('<td>' . $user['Realname_utf'] . '</td>'); 
                    echo('<td>' . $user['NumLogin_u32'] . '</td>');
                    echo('</tr>');
                }
            ?>
            </table>
        </div>
    </body>
</html>