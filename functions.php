<?php
// Softether Manager Functions
function SendRequest($host, $port, $user, $pass, $rpc) {
    // Send request
    $url = "https://" . $host . ":" . $port . "/api/"; // API Url
    // Initalize Curl
    $ch = curl_init($url);
    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the response as a string
    curl_setopt($ch, CURLOPT_POST, true); // Use POST method
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($rpc)); // Set the POST data (JSON)
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'X-VPNADMIN-HUBNAME: ' . $user, 'X-VPNADMIN-PASSWORD: ' . $pass));
    // Allow self-signed certificates
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL peer verification
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); // Disable host verification
    // Execute the cURL request and get the response
    $response = curl_exec($ch);
    // Check for errors
    if (curl_errno($ch)) {
        $array = array('error' => true, 'msg' => curl_error($ch));
        return json_encode($array);
    } else {
        return $response;
    }
    // Close the cURL session
    curl_close($ch);
}
function LoginToSE($host, $port, $user, $pass) {
    // Test if login to Softether was successful
    $rpc = json_decode(file_get_contents("rpcs/Test.json"), true);
    $res = SendRequest($host, $port, $user, $pass, $rpc);
    try {
        $response = json_decode($res, true);
        if(isset($response['result'])) {
            // Login succcessful
            return true;
        }
        else {
            // Login failed
            return false;
        }
    }
    catch(Exception $e) {
        return false;
    }
}
function GetVirtualHubs($host, $port, $user, $pass) {
    // Get virtual hubs of sever
    $rpc = json_decode(file_get_contents("rpcs/EnumHub.json"), true);
    $res = SendRequest($host, $port, $user, $pass, $rpc);
    try {
        $response = json_decode($res, true);
        if(isset($response['result'])) {
            // Login succcessful, get hubs
            return $response['result']['HubList'];
        }
        else {
            // Login failed
            return array();
        }
    }
    catch(Exception $e) {
        return array("Exception" => $e);
    }
}
function GetVirtualHubStatus($host, $port, $user, $pass, $hub) {
    // Get virtual hub
    $rpc = json_decode(file_get_contents("rpcs/GetHubStatus.json"), true);
    $rpc['params']['HubName_str'] = $hub;
    $res = SendRequest($host, $port, $user, $pass, $rpc);
    try {
        $response = json_decode($res, true);
        if(isset($response['result'])) {
            // Login succcessful, get hubs
            return $response['result'];
        }
        else {
            // Login failed
            return array();
        }
    }
    catch(Exception $e) {
        return array("Exception" => $e);
    }
}
function GetVirtualHubSessions($host, $port, $user, $pass, $hub) {
    // Get virtual hub sessions
    $rpc = json_decode(file_get_contents("rpcs/EnumSession.json"), true);
    $rpc['params']['HubName_str'] = $hub;
    $res = SendRequest($host, $port, $user, $pass, $rpc);
    try {
        $response = json_decode($res, true);
        if(isset($response['result'])) {
            // Login succcessful, get hubs
            return $response['result']['SessionList'];
        }
        else {
            // Login failed
            return array();
        }
    }
    catch(Exception $e) {
        return array("Exception" => $e);
    }
}
function GetVirtualHubSessionStatus($host, $port, $user, $pass, $hub, $session) {
    // Get virtual hub sessions
    $rpc = json_decode(file_get_contents("rpcs/GetSessionStatus.json"), true);
    $rpc['params']['HubName_str'] = $hub;
    $rpc['params']['Name_str'] = $session;
    $res = SendRequest($host, $port, $user, $pass, $rpc);
    try {
        $response = json_decode($res, true);
        if(isset($response['result'])) {
            // Login succcessful, get hubs
            return $response['result'];
        }
        else {
            // Login failed
            return array();
        }
    }
    catch(Exception $e) {
        return array("Exception" => $e);
    }
}
function GetVirtualHubUsers($host, $port, $user, $pass, $hub) {
    // Get virtual hub sessions
    $rpc = json_decode(file_get_contents("rpcs/EnumUser.json"), true);
    $rpc['params']['HubName_str'] = $hub;
    $res = SendRequest($host, $port, $user, $pass, $rpc);
    try {
        $response = json_decode($res, true);
        if(isset($response['result'])) {
            // Login succcessful, get hubs
            return $response['result']['UserList'];
        }
        else {
            // Login failed
            return array();
        }
    }
    catch(Exception $e) {
        return array("Exception" => $e);
    }
}
function GetTcpListeners($host, $port, $user, $pass) {
    // Get TCP Listeners
    $rpc = json_decode(file_get_contents("rpcs/EnumListener.json"), true);
    $res = SendRequest($host, $port, $user, $pass, $rpc);
    try {
        $response = json_decode($res, true);
        if(isset($response['result'])) {
            // Login succcessful, get hubs
            return $response['result']['ListenerList'];
        }
        else {
            // Login failed
            return array();
        }
    }
    catch(Exception $e) {
        return array("Exception" => $e);
    }
}