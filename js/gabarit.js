document.addEventListener('DOMContentLoaded',init);
function init() {
    Connect.addEventListener('click',ConnectDisconnect);
    Disconnect.addEventListener('click',DisconnectConnect);
}
function ConnectDisconnect() {
    Connect.classList.add('d-none');
    Disconnect.classList.remove('d-none');
}
function DisconnectConnect() {
    Disconnect.classList.add('d-none');
    Connect.classList.remove('d-none');
}