<?php

    include '../config/config.php';

    $data = json_decode(file_get_contents("php://input"));

    $email = $data->email;
    $pass = $data->password;
    $hash = md5($pass);

    $sql= "SELECT * FROM  teachers WHERE email = '$email' and password = '$hash'";
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