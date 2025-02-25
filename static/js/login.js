function PrintSavedServers() {
    // Print saved servers
    console.log("Printing saved servers to table...");
    const table = document.createElement("table");
    const headings = document.createElement("tr");
    const heading_addr = document.createElement("th");
    const heading_user = document.createElement("th");
    const heading_actions = document.createElement("th");
    // Add attributes to elements
    heading_addr.innerText = "Address";
    heading_user.innerText = "Username";
    // Add headings to table 
    table.appendChild(heading_addr);
    table.appendChild(heading_user);
    // Loop through saved servers
    const SavedServers = GetSavedServers();
    for(i = 0; i < Object.keys(SavedServers).length; i++) {
        // Create elements
        var server_item = document.createElement("tr");
        var addr_item = document.createElement("td");
        var user_item = document.createElement("td");
        var autofill_btn_item = document.createElement("td");
        var autofill_btn = document.createElement("button");
        // Set element attributes
        addr_item.innerText = SavedServers[i]['host'];
        user_item.innerText = SavedServers[i]['user'];
        autofill_btn.innerText = "Use";
        autofill_btn.setAttribute("onclick", "FillSavedServer(" + i + ");");
        // Add elements into the tr
        server_item.appendChild(addr_item);
        server_item.appendChild(user_item);
        autofill_btn_item.appendChild(autofill_btn);
        server_item.appendChild(autofill_btn_item);
        // Add tr to table
        table.appendChild(server_item);
        console.log("Added server " + SavedServers[i]['host']);
    }
    // Add table to div
    document.getElementById("SavedServersDiv").appendChild(table);
}
function SaveServer2() {
    const host = document.querySelector("[name=host]").value;
    const port = document.querySelector("[name=port]").value;
    const user = document.querySelector("[name=user]").value;
    const pass = document.querySelector("[name=pass]").value;
    SaveServer(host, port, user, btoa(pass));
    window.alert("Saved successfully");
    window.location.reload();
}
function FillSavedServer(index) {
    const SavedServers = GetSavedServers();
    if (!(index in SavedServers)) {
        console.error("Server not found:", index);
        return;
    }
    document.querySelector("[name=host]").value = SavedServers[index]['host'];
    document.querySelector("[name=port]").value = SavedServers[index]['port'];
    document.querySelector("[name=user]").value = SavedServers[index]['user'];
    document.querySelector("[name=pass]").value = atob(SavedServers[index]['pass']);
}