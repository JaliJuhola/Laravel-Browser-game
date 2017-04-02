function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    var d = today.getDate();
    var month = today.getMonth() + 1;
    var year = today.getFullYear();
    var j = today.
        m = checkTime(m);
    s = checkTime(s);
    document.getElementById('clock').innerHTML =
        d + "." + month + "." + year + ": " + checkTime(h) + ":" + checkTime(m) + ":" + checkTime(s);
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};
    return i;
}
