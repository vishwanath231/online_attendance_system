<?php

    include '../config/config.php';

    $id = $_REQUEST['id'];

    $sql= "SELECT * FROM  teachers WHERE id = '$id'";
    $query = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($query);

    if ($count > 0) {
        while($row = $query->fetch_assoc()){
            $name = $row['name'];
            $email = $row['email'];
            echo "
            <div id='teacher_profile_info'>
                <p></p>
                <div class='bg-white rounded w-fit h-fit shadow-lg'>
                    <div class='pt-4 pr-4 pl-4'>
                        <div class='text-lg mb-2 font-bold'>Teacher</div>
                        <div class='font-bold'>$name</div>
                        <div class='mb-2'>$email</div>
                    </div>
                </div>
            </div>
            ";
        }
    } else {
       echo "err";
    }


?>