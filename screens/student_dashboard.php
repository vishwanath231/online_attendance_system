<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student | Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Sen&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../public/icons/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../public/css/dashboard.css?<?php echo time(); ?>">
    <style>
        #student_attendance,
        #downloadPdf{
            display: none;
        }

        #student_attendance.active,
        #downloadPdf.active{
            display: block;
        }
    </style>
</head>
<body style="font-family: 'Sen', sans-serif;">

    <div class="std_container">

        

        <nav class="bg-white p-4 shadow-md dark:">
            <div class="flex justify-between items-center my-0 mx-auto" style="max-width: 1424px;">
                <img src="../public/img/attendance-logo.png" class="w-40" alt="logo">
                <div class="flex items-center">
                    <img src="../public/icons/user.png" id="student_profile" class="w-8 h-8 cursor-pointer rounded-full" alt="user">
                    <a href="../index.php" class="ml-4 block bg-red-400 text-white py-1 px-4 rounded" id="logout">Logout</a>
                </div>
            </div>
        </nav>

        <div id="student_profile_box" ></div>

       

        <div class="max-w-screen-xl my-0 mx-auto px-4 ">
            <h1 class="text-3xl font-bold uppercase my-5">
                Attendance Dashboard
            </h1>
            <p class="text-red-400">Your attendance percentage must be above 70% to download the Hall ticket</p>
            <div class="flex justify-between items-center mb-5">
                <p></p>
                <form action="../controllers/pdf_view.php" method="POST" target="_blank">
                    <input type="hidden" name="student_hidden_id" id="student_hidden_id">
                    <button type="submit" name="downloadPdf" id="downloadPdf" class="p-2 rounded bg-green-300" >Hall Ticket</button>
                </form>
            </div>

            <div class="overflow-x-auto overflow-y-auto relative shadow-md sm:rounded-lg " >
                <table class="w-full text-sm text-left text-gray-700">
                    <thead class="text-xs text-black uppercase bg-[#0082CD]">
                        <tr>
                            <th class="py-3 px-6">NAME</th>
                            <th class="py-3 px-6">REGISTER NO</th>
                            <th class="py-3 px-6">PRESENT</th>
                            <th class="py-3 px-6">ABSENT</th>
                            <th class="py-3 px-6">LATE</th>
                            <th class="py-3 px-6">HALF DAY</th>
                            <th class="py-3 px-6">WORKING DAY</th>
                            <th class="py-3 px-6">PERCENTAGE</th>
                        </tr>
                    </thead>
                    <tbody id="tbody"></tbody>
                </table>
            </div>

            <div class="mt-16 mb-7">
                <h1 class="text-3xl font-bold uppercase mt-4 mb-5">
                    Attendance View
                </h1>
                <form action="" id="form1" method="post" accept-charset="utf-8" class="flex items-center">
                    <div>
                        <label for="class" class="block mb-2 text-md font-medium text-black">Date <span class="text-red-400">*</span></label>
                        <input type="date" name="attendance_date" id="attendance_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-60 mr-5 p-2.5" required>
                    </div>
                    <button type="submit" class="bg-black py-2 px-4 text-white rounded w-fit h-fit mt-7">search</button>
                </form>
            </div>


            <div id="student_attendance">
                <div  class="overflow-x-auto overflow-y-auto relative shadow-md sm:rounded-lg " >
                    <table class="w-full text-sm text-left text-gray-700">
                        <thead class="text-xs text-black uppercase bg-[#0082CD]">
                            <tr>
                                <th class="py-3 px-6">NAME</th>
                                <th class="py-3 px-6">REGISTER NO</th>
                                <th class="py-3 px-6">PRESENT DATE</th>
                                <th class="py-3 px-6">STATUS</th>
                            </tr>
                        </thead>
                        <tbody id="student_attendance_tbody" ></tbody>
                    </table>
                </div>
            </div>

        </div>




    </div>


    <script src="../public/js/tailwindcss.js"></script>

    <script>

        const logout  = document.getElementById('logout');
        const student_profile  = document.getElementById('student_profile');
        const student_profile_box  = document.getElementById('student_profile_box');

        
        const student_attendance  = document.getElementById('form1');
        const attendance_date  = document.getElementById('attendance_date');

        const student_attendance_table  = document.getElementById('student_attendance');
        const student_attendance_tbody  = document.getElementById('student_attendance_tbody');




        student_attendance.addEventListener('submit', (e) => {
            e.preventDefault();

            const id = localStorage.getItem('student_id');

            if (id !== '') {

                var xmlhttp = new XMLHttpRequest();

                xmlhttp.open("GET", `../controllers/student_view_attendance.php?id=${id}&date=${attendance_date.value}`, true);
                xmlhttp.setRequestHeader('Content-type','x-www-form-urlencoded')

                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        student_attendance_table.classList.add('active');
                        student_attendance_tbody.innerHTML = this.responseText;
                    }
                };

                xmlhttp.send();

            }else{

                window.location.reload();
            }

            
        })

      

        student_profile.addEventListener('click', () => {
            student_profile_box.classList.add("active")
        })

        student_profile_box.addEventListener('click', () => {
            student_profile_box.classList.remove("active")
        })


        function getProfile(){

            
            const id = localStorage.getItem('student_id');

            if (id !== '') {

                var xmlhttp = new XMLHttpRequest();

                xmlhttp.open("GET", "../controllers/student_profile.php?id="+id, true);
                xmlhttp.setRequestHeader('Content-type','x-www-form-urlencoded')

                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        if(this.responseText === "err"){
                            location.href = '../index.php';
                        }
                        student_profile_box.innerHTML = this.responseText;
                        document.querySelector('input[name="student_hidden_id"]').value = id;
                    }
                };

                xmlhttp.send();
            }else{

                window.location.reload();
            }
        }

        getProfile()
 
        const tbody = document.getElementById('tbody');

        function studentAttendanceStatus(){
            const id = localStorage.getItem('student_id');

            if (id !== '') {

                var xmlhttp = new XMLHttpRequest();

                xmlhttp.open("GET", "../controllers/student_attendance_status.php?id="+id, true);
                xmlhttp.setRequestHeader('Content-type','x-www-form-urlencoded')

                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        if(this.responseText === "err"){
                            location.href = '../index.php';
                        }
                        tbody.innerHTML = this.responseText;
                    }
                };

                xmlhttp.send();

            }else{

                window.location.reload();
            }
        }

        studentAttendanceStatus();

        
        logout.addEventListener('click', () => {
            localStorage.removeItem('student_id');
            window.location.reload();
        })


        function getHallTicket(){

            
        const id = localStorage.getItem('student_id');

        if (id !== '') {

            var xmlhttp = new XMLHttpRequest();

            xmlhttp.open("GET", "../controllers/student_hall_ticket.php?id="+id, true);
            xmlhttp.setRequestHeader('Content-type','x-www-form-urlencoded')

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if(this.responseText === "err"){
                        location.href = '../index.php';
                    }
                    
                    if  ( Number(this.responseText)  > 70) {
                        document.getElementById('downloadPdf').classList.add('active');
                    }else{
                        document.getElementById('downloadPdf').classList.remove('active');
                    }
                }
            };

            xmlhttp.send();
        }else{

            window.location.reload();
        }
}

getHallTicket()
    </script>

</body>
</html>