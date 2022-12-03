const attendance_report_form = document.getElementById('form1');
const attendanceDate = document.getElementById('attendanceDate');
const classid = document.getElementById('classid');
const attendance_report_tbody = document.getElementById('attendance_report_tbody');

const attendance_report = document.getElementById('attendance_report');

attendance_report_form.addEventListener('submit', (e) => {
    e.preventDefault();


    var xmlhttp = new XMLHttpRequest();

    xmlhttp.open("GET", `../controllers/attendance_report.php?class=${classid.value}&date=${attendanceDate.value}`, true);
    xmlhttp.setRequestHeader('Content-type','x-www-form-urlencoded')

    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            attendance_report.classList.add('active');
            attendance_report_tbody.innerHTML = this.responseText;
            
        }
    };

    xmlhttp.send();
})