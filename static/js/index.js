// Softether WebUI JS
// Ava E. Begley and Lucy E. Zukor

function ParseSEDate(date_str) {
    // Parse softether date
    const date = new Date(date_str);
    const formattedDate = date.toLocaleString();
    return formattedDate;
}
function ConvertLittleEndian(value) {
    // Convert to a hex string
    let hex = value.toString(16).padStart(8, '0'); // Ensure 8 characters
    // Reverse byte order (little-endian to big-endian)
    let reorderedHex = hex.match(/../g).reverse().join('');
    // Convert back to decimal
    return parseInt(reorderedHex, 16);
}
function GetHubFromUrl() {
    const params = new URLSearchParams(window.location.search); 
    const hub = params.get("hub");
    return hub;
}
function ShowHub(hub) {
    // Show hub in a new tab
    let popup = window.open("?f=show_hub&hub=" + hub, "PopupWindow", "width=600,height=400");
}
function ShowHubSessions(hub) {
    // Show hub in a new tab
    let popup = window.open("?f=show_hub_sessions&hub=" + hub, "PopupWindowSessions", "width=800,height=400");
}
function ShowHubUsers(hub) {
    let popup = window.open("?f=show_hub_users&hub=" + hub, "PopupWindowUsers", "width=800,height=400");
}
function ShowHubSessionInfo(host, port, user, pass, hub, session) {
    const xhr = new XMLHttpRequest();
    const url = 'api.php?f=get_session_info';
    xhr.open('POST', url, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        if (xhr.status >= 200 && xhr.status < 300) {
            // Parse the JSON response
            const responseData = JSON.parse(xhr.responseText);
            console.log(Object.keys(responseData).length);
            if(Object.keys(responseData).length > 1) {
                // Parse dates and numbers
                const connected_time = ParseSEDate(responseData['CurrentConnectionEstablishTime_dt']);
                const client_buildnum = ConvertLittleEndian(responseData['ClientProductBuild_u32']);
                const client_prodver = ConvertLittleEndian(responseData['ClientProductVer_u32']);
                const client_port = ConvertLittleEndian(responseData['ClientPort_u32']);
                // Make text for span
                const alertText = "Cipher: " + responseData['CipherName_str'] + "<br>Hostname: " + responseData['ClientHostname_str'] + "<br>Client IP: " + responseData['ClientIpAddress_ip'] + "<br>Client OS Name: " + responseData['ClientOsName_str'] + "<br>Client OS Product ID: " + responseData['ClientOsProductId_str'] + "<br>Client OS Version: " + responseData['ClientOsVer_str'] + "<br>Client Product Build Number: " + client_buildnum + "<br>Client Product Version: " + client_prodver + "<br>Client Product Name: " + responseData['ClientProductName_str'] + "<br>Client IP: " + responseData['Client_Ip_Address_ip'] + "<br>Client Port: " + client_port + "<br>Current Connection Established: " + connected_time;
                // Set attributes of dialog
                document.getElementById("SessionInfoDialog").style.display = "block";
                document.getElementById("SessionInfoSpan").innerHTML = alertText;
                console.log(responseData);
            }
            else {
                window.alert("Object not found");
            }
        } else {
            console.error('Error:', xhr.status, xhr.statusText);
        }
    };
    xhr.onerror = function () {
        console.error('Request failed.');
    };
    const params = new URLSearchParams();
    params.append('host', host);
    params.append('port', port);
    params.append('user', user);
    params.append('pass', pass);
    params.append('hub', hub);
    params.append('session', session);
    xhr.send(params.toString());
}
function CloseSessionInfoDialog() {
    document.getElementById("SessionInfoDialog").style.display = "none";
    document.getElementById("SessionInfoSpan").innerHTML = "";
}