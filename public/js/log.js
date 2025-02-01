function valjenis() {
    var jenis = document.getElementById('jenis').value;
    if (jenis == '1') {
        document.getElementById('kebaikan').style.display = "none";
        document.getElementById('pelanggaran').style.display = "block";
    } else if (jenis == '2') {
        document.getElementById('kebaikan').style.display = "block";
        document.getElementById('pelanggaran').style.display = "none";
    }
}


// date time in absent
function time() {
    var date = new Date();
    var time = date.toLocaleTimeString();
    var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    var day = date.toLocaleDateString('en-US', options);
    document.getElementById('time').innerHTML = time;
    document.getElementById('day').innerHTML = day;
}
setInterval(function () {
    time();
}, 1);
