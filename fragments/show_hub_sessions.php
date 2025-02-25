<?php 
session_start();
require("functions.php");
if(!isset($_SESSION['pass'])) {
    header("Location: ?f=login");
    die();
}
$sessions = GetVirtualHubSessions($_SESSION['host'], $_SESSION['port'], $_SESSION['user'], $_SESSION['pass'], $_GET['hub']);
//print_r($sessions);
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Softether Server Manager</title>
        <link rel="preload" href="static/font/Inter-VariableFont_opsz,wght.ttf" as="font" type="font/ttf" crossorigin="anonymous">
        <link rel="stylesheet" href="static/css/fonts.css">
        <link rel="stylesheet" href="static/css/index.css">
        <link rel="stylesheet" href="static/css/dialog.css">
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
            <div id="SessionInfoDialog" style="display: none;" dialog_id="SessionInfoDialog">
                <button onclick="CloseSessionInfoDialog();">X</button><br>
                <span id="SessionInfoSpan" style="font-weight: 300;"></span>
            </div>
            <table style="width:100%">
            <tr>
                <th>Name</th>
                <th>Hostname</th>
                <th>Username</th>
                <th>Transfer Bytes</th>
            </tr>
            <?php 
                foreach($sessions as $session) {
                    echo('<td><a href="javascript:ShowHubSessionInfo(h_host, h_port, h_user, h_pass, GetHubFromUrl(), \'' . $session['Name_str'] . '\');">' . $session['Name_str'] . "</a></td>");
                    echo('<td>' . $session['Hostname_str'] . '</td>'); // Hub Sessions
                    echo('<td>' . $session['Username_str'] . '</td>'); // Hub Users
                    echo('<td>' . number_format($session['PacketSize_u64']) . '</td>'); // Hub Users
                    echo('</tr>');
                }
            ?>
            </table>
        </div>
    </body>
</html>