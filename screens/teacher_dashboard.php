<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher | Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Sen&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../public/icons/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../public/css/dashboard.css?<?php echo time(); ?>">
</head>

<body style="font-family: 'Sen', sans-serif;">

    <div class="std_container">

        <nav class="bg-white p-4 shadow-md">
            <div class="flex justify-between items-center my-0 mx-auto" style="max-width: 1424px;">
                <img src="../public/img/attendance-logo.png" class="w-40" alt="logo">
                <div class="flex items-center">
                    <img src="../public/icons/user.png" id="teacher_profile" class="w-8 h-8 cursor-pointer rounded-full" alt="user">
                    <a href="../index.php" class="ml-4 block bg-red-400 text-white py-1 px-4 rounded" id="logout">Logout</a>
                </div>
            </div>
        </nav>

        <div id="teacher_profile_box" ></div>

        <div class="max-w-screen-xl my-0 mx-auto px-4 ">
            <h1 class="text-3xl font-bold uppercase my-10">
                students lists
            </h1>

        
            <div class="border-gray-200 mb-10">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400">
                    <li class="mr-2">
                        <a href="#" class="inline-flex p-4 text-blue-600 rounded-t-lg border-b-2 border-blue-600">Students
                        </a>
                    </li>
                    <li class="mr-2">
                        <a href="./teacher_attendance.php" class="inline-flex p-4  rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300">Attendance</a>
                    </li>
                    <li class="mr-2">
                        <a href="./teacher_attendance_report.php" class="inline-flex p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 group">Attendance Report
                        </a>
                    </li>
                </ul>
            </div>

        

    
            <div class="overflow-x-auto overflow-y-auto relative shadow-md sm:rounded-lg " style="height:400px;">
                <table class="w-full text-sm text-left text-gray-700">
                    <thead class="text-xs text-black uppercase bg-[#0082CD]">
                        <tr>
                            <th class="py-3 px-6">ID</th>
                            <th class="py-3 px-6">NAME</th>
                            <th class="py-3 px-6">REGISTER NO</th>
                            <th class="py-3 px-6">CLASS</th>
                            <th class="py-3 px-6">GENDER</th>
                            <th class="py-3 px-6">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody id="tbody" ></tbody>
                </table>
            </div>

            <div id="student__details_model">
                <div class="model__box">  
                    <h2 class="font-bold uppercase text-lg mb-6">Student Details</h2>  		
                    <table id="student__details_data" class="border-2 w-full "></table>  		
                </div>
            </div>
        </div>
    </div>


    <script src="../public/js/tailwindcss.js"></script>

    <script>

        const tbody = document.getElementById("tbody");

        const student__details_model  = document.getElementById('student__details_model');
        const student__details_data  = document.getElementById('student__details_data');


        getRequest();


        student__details_model.addEventListener('click', () => {
            student__details_model.classList.remove("active")
        })

        // GET REQUEST
        function getRequest(){

            var xmlhttp = new XMLHttpRequest();

            xmlhttp.open("GET", "../controllers/student_list.php", true);

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {

                    tbody.innerHTML= this.responseText; 

                }
            };

            xmlhttp.send();
        }

        function getStudentById(id) {

            var xmlhttp = new XMLHttpRequest();

            xmlhttp.open("GET", "../controllers/student_details.php?id="+id, true);
            xmlhttp.setRequestHeader('Content-type','x-www-form-urlencoded')

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    student__details_data.innerHTML = this.responseText;
                    student__details_model.classList.add("active")
                }
            };

            xmlhttp.send();
        }
        
        const logout  = document.getElementById('logout');
        const teacher_profile  = document.getElementById('teacher_profile');
        const teacher_profile_box  = document.getElementById('teacher_profile_box');

        teacher_profile.addEventListener('click', () => {
            teacher_profile_box.classList.add("active")
        })

        teacher_profile_box.addEventListener('click', () => {
            teacher_profile_box.classList.remove("active")
        })


        function getProfile(){
            
            const id = localStorage.getItem('teacher_id');

            if (id !== '') {

                var xmlhttp = new XMLHttpRequest();

                xmlhttp.open("GET", "../controllers/teacher_profile.php?id="+id, true);
                xmlhttp.setRequestHeader('Content-type','x-www-form-urlencoded')

                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        if(this.responseText === "err"){
                            location.href = '../index.php';
                        }

                        teacher_profile_box.innerHTML = this.responseText;
                    }
                };

                xmlhttp.send();
            }else{
                window.location.reload();

            }
        }

        getProfile()

        logout.addEventListener('click', () => {
            localStorage.removeItem('teacher_id');
            window.location.reload();
        })

    </script>
</body>
</html>