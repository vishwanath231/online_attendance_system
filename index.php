<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance |  Login</title>
    <link rel="shortcut icon" href="./public/icons/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./public/css/login.css?<?php echo time(); ?>">
</head>
<body>

    <div class="container">
        <div class="container__box">
            <div class="login_img">
                <img src="./public/img/login.jpg" alt="login" id="banner">
            </div>
            <div class="form_container">
                
                <div class="role_form">
                    <p>Choose Your Role</p>
                    <form action="" id="role_form">
                        <div class="role_form_div">
                            <input type="radio" name="role" value="admin" id="admin">
                            <label for="admin">Admin</label>
                        </div>
                        <div class="role_form_div">
                            <input type="radio" name="role" value="teacher" id="teacher">
                            <label for="teacher">Teacher</label>
                        </div>
                        <div class="role_form_div">
                            <input type="radio" name="role" value="student" id="student">
                            <label for="student">Student</label>
                        </div>
                    </form>
                </div>
                

                <div class="form__box" id="admin_login">
                    <h2>Admin Login</h2>
                    <div id="admin_err_msg"></div>
                    <form action="" method="POST" id="admin_login_form">
                        <div class="form__div">
                            <label for="admin_email">Email <span>*</span></label>
                            <input type="email" name="admin_email" id="admin_email" placeholder="example@support.com">
                        </div>
                        <div class="form__div">
                            <label for="admin_password">Password <span>*</span></label>
                            <input type="password" name="admin_password" id="admin_password" placeholder="*****">
                        </div>
                        <button type="submit" name="admin_login" class="login_btn">Login</button>
                    </form>
                    <div class="info">
                        <div class="info_div">
                            <h2>Administrator 1</h2>
                            <div><span>Email:</span> burahul@gmail.com</div>
                            <div><span>Password:</span> burahul123</div>
                        </div>
                        <div class="info_div">
                            <h2>Administrator 2</h2>
                            <div><span>Email:</span> bualex@gmail.com</div>
                            <div><span>Password:</span> bualex123</div>
                        </div>
                    </div>
                </div>


                <div class="form__box" id="teacher_login">
                    <h2>Teacher Login</h2>
                    <div id="teacher_err_msg"></div>
                    <form action="" method="POST" id="teacher_login_form">
                        <div class="form__div">
                            <label for="teacher_email">Email <span>*</span></label>
                            <input type="email" name="teacher_email" id="teacher_email" placeholder="example@support.com">
                        </div>
                        <div class="form__div">
                            <label for="teacher_password">Password <span>*</span></label>
                            <input type="password" name="teacher_password" id="teacher_password" placeholder="*****">
                        </div>
                        <button type="submit" name="teacher_login" class="login_btn">Login</button>
                    </form>
                    <div class="info">
                        <div class="info_div">
                            <h2>Teacher 1</h2>
                            <div><span>Email:</span> karthick@gmail.com</div>
                            <div><span>Password:</span> karthick123</div>
                        </div>
                        <div class="info_div">
                            <h2>Teacher 2</h2>
                            <div><span>Email:</span> reshma@gmail.com</div>
                            <div><span>Password:</span> reshma123</div>
                        </div>
                    </div>
                </div>


                <div class="form__box" id="student_login">
                    <h2>Student Login</h2>
                    <div id="student_err_msg"></div>
                    <form action="" method="POST" id="student_login_form">
                        <div class="form__div">
                            <label for="reg_no">Register No <span>*</span> Lowercase</label>
                            <input type="text" name="reg_no" id="reg_no" placeholder="21csea**">
                        </div>
                        <div class="form__div">
                            <label for="dob">Date of Birth <span>*</span></label>
                            <input type="date" name="dob" id="dob" placeholder="*****">
                        </div>
                        <button type="submit" name="student_login" class="login_btn">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- <script type="text/javascript" src="./public/js/login.js"></script> -->

    <script>
        
        const role = document.getElementsByName('role');
        const role_form = document.getElementById('role_form');
        const admin_login = document.getElementById('admin_login');
        const teacher_login = document.getElementById('teacher_login');
        const student_login = document.getElementById('student_login');


        const admin_login_form = document.getElementById('admin_login_form');
        const admin_err_msg = document.getElementById('admin_err_msg');


        const teacher_login_form = document.getElementById('teacher_login_form');
        const teacher_err_msg = document.getElementById('teacher_err_msg');


        const student_login_form = document.getElementById('student_login_form');
        const student_err_msg = document.getElementById('student_err_msg');


        const banner = document.getElementById('banner');



    


        role_form.addEventListener('change', () => {

            let role_name;

            for(i = 0; i < role.length; i++) {
                if(role[i].checked){

                    role_name = role[i].value;
                }
            }

            if (role_name === 'admin') {
                admin_login.classList.add('active');
                teacher_login.classList.remove('active');
                student_login.classList.remove('active');
                banner.src = "./public/img/admin.jpg";
            }else if(role_name === 'teacher'){
                teacher_login.classList.add('active');
                admin_login.classList.remove('active');
                student_login.classList.remove('active');
                banner.src = "./public/img/teacher.jpg";
            }else if(role_name === 'student'){
                student_login.classList.add('active');
                admin_login.classList.remove('active');
                teacher_login.classList.remove('active');
                banner.src = "./public/img/register.jpg";
            }else{
                admin_login.classList.remove('active');
                teacher_login.classList.remove('active');
                student_login.classList.remove('active');
            }
            
        })


        admin_login_form.addEventListener('submit', (e) => {
            e.preventDefault();

            const admin_email = document.getElementById('admin_email');
            const admin_password = document.getElementById('admin_password');


            const data = {
                email: admin_email.value,
                password: admin_password.value
            }

            var xhttp = new XMLHttpRequest()
            
            xhttp.open('POST', 'controllers/admin_login.php', true)
            xhttp.setRequestHeader('Content-type', 'application/json')
            
            xhttp.onload = function () {

                if (this.responseText === 'err') {
                    admin_err_msg.innerHTML = '<div class="errMsg">Invalid <strong>Email</strong> or <strong>Password</strong></div>';
                    admin_err_msg.classList.add('active');
                }else{
                    localStorage.setItem('admin_id', this.responseText)
                    location.href = "screens/admin_dashboard.php";
                }
            }
            
            xhttp.send(JSON.stringify(data))

            admin_email.value = "";
            admin_password.value = "";

        })



        teacher_login_form.addEventListener('submit', (e) => {
            e.preventDefault();

            const teacher_email = document.getElementById('teacher_email');
            const teacher_password = document.getElementById('teacher_password');


            const data = {
                email: teacher_email.value,
                password: teacher_password.value
            }

            var xhttp = new XMLHttpRequest()
            
            xhttp.open('POST', 'controllers/teacher_login.php', true)
            xhttp.setRequestHeader('Content-type', 'application/json')
            
            xhttp.onload = function () {
                if (this.responseText === 'err') {
                    teacher_err_msg.innerHTML = '<div class="errMsg">Invalid <strong>Email</strong> or <strong>Password</strong></div>';
                    teacher_err_msg.classList.add('active');
                }else{
                    localStorage.setItem('teacher_id', this.responseText)
                    location.href = "screens/teacher_dashboard.php";
                }
            }
            
            xhttp.send(JSON.stringify(data))

            teacher_email.value = "";
            teacher_password.value = "";

        })


        student_login_form.addEventListener('submit', (e) => {
            e.preventDefault();

            const reg_no = document.getElementById('reg_no');
            const dob = document.getElementById('dob');


            const data = {
                reg_no: reg_no.value,
                dob: dob.value
            }

            var xhttp = new XMLHttpRequest()
            
            xhttp.open('POST', 'controllers/student_login.php', true)
            xhttp.setRequestHeader('Content-type', 'application/json')
            
            xhttp.onload = function () {
                
                if (this.responseText === 'err') {
                    student_err_msg.innerHTML = '<div class="errMsg">Invalid <strong>Reg no</strong> or <strong>DOB</strong></div>';
                    student_err_msg.classList.add('active');
                }else{
                    localStorage.setItem('student_id', this.responseText)
                    location.href = "screens/student_dashboard.php";
                }
            }
            
            xhttp.send(JSON.stringify(data))

            reg_no.value = "";
            dob.value = "";

        })



    </script>

</body>
</html>