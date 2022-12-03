<?php

    include '../config/config.php';

    $id = $_REQUEST['id'];

    $sql= "SELECT * FROM students WHERE id = '$id'";
    $query = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($query);

    if ($count > 0) {
        while($row = $query->fetch_assoc()){
            $name = $row['name'];
            $reg_no = $row['reg_no'];
            echo "
            <div id='student_profile_info'>
                <p></p>
                <div class='bg-white rounded w-fit h-fit shadow-lg'>
                    <div class='pt-4 pr-4 pl-4'>
                        <div class='text-lg mb-2 font-bold'>Student</div>
                        <div class='font-bold'>$reg_no</div>
                        <div class='mb-2'>$name</div>
                    </div>
                </div>
            </div>
            ";
        }
    } else {
       echo "err";
    }


?>