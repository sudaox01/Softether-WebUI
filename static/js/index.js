<<<<<<< HEAD
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
    let popup = window.open("?f=show_hub_sessions&hub=" + hub, "PopupWindow2", "width=800,height=400");
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
                const connected_time = ParseSEDate(responseData['CurrentConnectionEstablishTime_dt']);
                const client_buildnum = ConvertLittleEndian(responseData['ClientProductBuild_u32']);
                const client_prodver = ConvertLittleEndian(responseData['ClientProductVer_u32']);
                const client_port = ConvertLittleEndian(responseData['ClientPort_u32']);
                const alertText = "Cipher: " + responseData['CipherName_str'] + "\nHostname: " + responseData['ClientHostname_str'] + "\nClient IP: " + responseData['ClientIpAddress_ip'] + "\nClient OS Name: " + responseData['ClientOsName_str'] + "\nClient OS Product ID: " + responseData['ClientOsProductId_str'] + "\nClient OS Version: " + responseData['ClientOsVer_str'] + "\nClient Product Build Number: " + client_buildnum + "\nClient Product Version: " + client_prodver + "\nClient Product Name: " + responseData['ClientProductName_str'] + "\nClient IP: " + responseData['Client_Ip_Address_ip'] + "\nClient Port: " + client_port + "\nCurrent Connection Established: " + connected_time;
                window.alert(alertText);
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
=======
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
    let popup = window.open("?f=show_hub_sessions&hub=" + hub, "PopupWindow2", "width=800,height=400");
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
                const connected_time = ParseSEDate(responseData['CurrentConnectionEstablishTime_dt']);
                const client_buildnum = ConvertLittleEndian(responseData['ClientProductBuild_u32']);
                const client_prodver = ConvertLittleEndian(responseData['ClientProductVer_u32']);
                const client_port = ConvertLittleEndian(responseData['ClientPort_u32']);
                const alertText = "Cipher: " + responseData['CipherName_str'] + "\nHostname: " + responseData['ClientHostname_str'] + "\nClient IP: " + responseData['ClientIpAddress_ip'] + "\nClient OS Name: " + responseData['ClientOsName_str'] + "\nClient OS Product ID: " + responseData['ClientOsProductId_str'] + "\nClient OS Version: " + responseData['ClientOsVer_str'] + "\nClient Product Build Number: " + client_buildnum + "\nClient Product Version: " + client_prodver + "\nClient Product Name: " + responseData['ClientProductName_str'] + "\nClient IP: " + responseData['Client_Ip_Address_ip'] + "\nClient Port: " + client_port + "\nCurrent Connection Established: " + connected_time;
                window.alert(alertText);
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
>>>>>>> 26b8f4e921bf54ba1ab4248fe78457aa8bb234dd
}