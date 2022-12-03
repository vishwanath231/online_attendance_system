<?php

    include '../config/config.php';

    $data = json_decode(file_get_contents("php://input"));

    $register_no = $data->reg_no;
    $date_birth = $data->dob;

    $sql= "SELECT * FROM  students WHERE reg_no = '$register_no' and dob = '$date_birth'";
    $query = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($query);

    if ($count > 0) {
        while($row = $query->fetch_assoc()){
            $id = $row['id'];
            echo $id;
        }
    } else {
       echo "err";
    }


?>