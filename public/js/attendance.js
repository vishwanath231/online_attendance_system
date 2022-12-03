const form = document.getElementById('form1');
const classId = document.getElementById('classid');


const class_attendance = document.getElementById('class_attendance');
const tbody_attendance = document.getElementById('tbody_attendance');



form.addEventListener('submit', (e) => {
    e.preventDefault();

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.open("GET", "../controllers/attendance.php?class="+classId.value, true);
    xmlhttp.setRequestHeader('Content-type','x-www-form-urlencoded')

    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            tbody_attendance.innerHTML = this.responseText;
            class_attendance.classList.add("active")
        }
    };
    xmlhttp.send();

})



function attendance_save(val) {


    console.log(val);
    const status = document.getElementById(`status${val}`);

    if (status.value === "") {
        document.getElementById('err_message').innerHTML = "<div class='err_msg'>please choose attendance status</div>";
    }else{

        document.getElementById('err_message').innerHTML = "";

        const now = new Date()
        let day = now.getDate();
        let month = now.getMonth() + 1;
        let year = now.getFullYear();

        let date = year+"-"+month+"-"+day;

        // console.log(date);
        var xmlhttp = new XMLHttpRequest();

        xmlhttp.open("GET", `../controllers/attendance_add.php?id=${val}&status=${status.value}&date=${date}`, true);
        xmlhttp.setRequestHeader('Content-type','x-www-form-urlencoded')

        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('suc_message').innerHTML = this.response;
                document.getElementById(`status${val}`).value = ""
            }
        };

        xmlhttp.send();
    }

}