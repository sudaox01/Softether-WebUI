// Server Saver script

function GetSavedServers() {
    // Get saved servers
    if(localStorage.SoftetherWebUI_Servers == null) {
        // Localstorage database does not exist, create and return.
        console.log("LocalStorage database does not exist. Created");
        localStorage.SoftetherWebUI_Servers = JSON.stringify({});
        return {};
    }
    else {
        const SavedServers = JSON.parse(localStorage.SoftetherWebUI_Servers);
        console.log("There are " + Object.keys(SavedServers).length + " servers saved");
        return SavedServers;
    }
}
function SaveServer(host, port, user, pass) {
    const SavedServers = JSON.parse(localStorage.SoftetherWebUI_Servers);
    const nextIndex = Object.keys(SavedServers).length;
    const ServerSaveData = {"host":host,"port":port,"user":user,"pass":pass};
    SavedServers[nextIndex] = ServerSaveData;
    console.log("Saved server to index " + nextIndex);
    localStorage.SoftetherWebUI_Servers = JSON.stringify(SavedServers);
}
function DeleteServer(index) {
    const SavedServers = JSON.parse(localStorage.SoftetherWebUI_Servers);
    if (!(index in SavedServers)) {
        console.error("Server not found:", index);
        return;
    }
    delete SavedServers[index];
    let newSavedServers = {};
    let newIndex = 0;
    Object.keys(SavedServers).sort().forEach((key) => {
        newSavedServers[newIndex] = SavedServers[key];
        newIndex++;
    });
    localStorage.SoftetherWebUI_Servers = JSON.stringify(newSavedServers);
    console.log("Deleted server: " + index);
}