<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher | Attendance Report</title>
    <link href="https://fonts.googleapis.com/css2?family=Sen&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../public/icons/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../public/css/dashboard.css?<?php echo time(); ?>">
    <style>
        #attendance_report{
            display: none;
        }

        #attendance_report.active{
            display: block;
        }
        .err_msg{
            background-color: #F8D7DA;
            color: #9D1C24;
            padding: .7rem;
            margin: .5rem 0;
            border-radius: 3px;
            text-align: center;
        }
        .suc_msg{
            background: #D4EDDA;
            color: #525759;
            padding: .7rem;
            margin: .5rem 0;
            border-radius: 3px;
            text-align: center;
        }
    </style>
</head>
<body style="font-family: 'Sen', sans-serif;">

    <?php
    
        include '../config/config.php';
        $sql = "SELECT name FROM classes";
		$query = mysqli_query($conn, $sql);
		$count = mysqli_num_rows($query);
   
    ?>

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
                Search Class Attendance Report By Date
            </h1>

        
            <div class="border-gray-200 mb-10">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400">
                    <li class="mr-2">
                        <a href="./teacher_dashboard.php" class="inline-flex p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300">Students
                        </a>
                    </li>
                    <li class="mr-2">
                        <a href="./teacher_attendance.php" class="inline-flex p-4  rounded-t-lg border-b-2  border-transparent hover:text-gray-600 hover:border-gray-300 group ">Attendance</a>
                    </li>
                    <li class="mr-2">
                        <a href="#" class="inline-flex p-4 rounded-t-lg border-b-2 text-blue-600 border-blue-600 ">Attendance Report
                        </a>
                    </li>
                </ul>
            </div>


            <div class="mb-7">
                <form action="" id="form1" method="post" accept-charset="utf-8" >
                    <div class="flex items-center">
                        <div>
                            <label for="class" class="block mb-2 text-md font-medium text-black">Class <span class="text-red-400">*</span></label>
                            <select name="classid" id="classid" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-60 mr-5 p-2.5" required>
                                <option value="">Select</option>
                                <?php

                                    if ($count > 0) {
                                        while ($row = $query->fetch_assoc()) {
                                            $class_name = $row['name'];
                                ?>
                                    <option value="<?php echo $class_name; ?>"><?php echo $class_name; ?></option>
                                <?php

                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="flex flex-col">
                            <label for="attendanceDate">Attendance Date <span class="text-red-400">*</span></label>
                            <input type="date" id="attendanceDate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-60 mr-5 p-2.5" required>
                        </div>
                        <button type="submit" class="bg-black py-2 px-4 text-white rounded w-fit h-fit mt-5">search</button>
                    </div>
                </form>
            </div>

            <div id='err_message'></div>
            <div id='suc_message'></div>

        
            <div id="attendance_report">
                <div  class="overflow-x-auto overflow-y-auto relative shadow-md sm:rounded-lg " >
                    <table class="w-full text-sm text-left text-gray-700">
                        <thead class="text-xs text-black uppercase bg-[#0082CD]">
                            <tr>
                                <th class="py-3 px-6">REGISTER NO</th>
                                <th class="py-3 px-6">NAME</th>
                                <th class="py-3 px-6">GENDER</th>
                                <th class="py-3 px-6">MOBILE</th>
                                <th class="py-3 px-6">ATTENDANCE</th>
                            </tr>
                        </thead>
                        <tbody id="attendance_report_tbody" ></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    


    <script src="../public/js/tailwindcss.js"></script>
    <script src="../public/js/attendance_report.js"></script>

    <script>
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