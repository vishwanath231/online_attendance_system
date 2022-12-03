<?php

include '../config/config.php';


$id = $_REQUEST['id'];


$sql = "SELECT * FROM students WHERE id=$id";
$query = mysqli_query($conn , $sql);
$count = mysqli_num_rows($query);


if ($count > 0) {
    
    while($row = mysqli_fetch_assoc($query)){

        $id = $row['id'];
        $reg_no = $row['reg_no'];
        $class = $row['class_id'];
        $name = $row['name'];
        $mobile = $row['mobile'];
        $gender = $row['gender'];


        echo
            "<tr class='border-b-2'>
                <th class='text-left p-2 border-r-2'>ID:</th>
                <td class='p-2'>$id</td>
            </tr>
            <tr class='border-b-2 '>
                <th class='text-left p-2 border-r-2'>Name:</th>
                <td class='p-2'>$name</td>
            </tr>
            <tr class='border-b-2'>
                <th class='text-left p-2 border-r-2'>Reg No:</th>
                <td class='p-2'>$reg_no</td>
            </tr>
            <tr class='border-b-2'>
                <th class='text-left p-2 border-r-2'>Class:</th>
                <td class='p-2'>$class</td>
            </tr>
            <tr class='border-b-2'>
                <th class='text-left p-2 border-r-2'>Mobile:</th>
                <td class='p-2'>$mobile</td>
            </tr>
            <tr class=''>
                <th class='text-left p-2 border-r-2'>Gender:</th>
                <td class='p-2'>$gender</td>
            </tr>"
        ;
    }
}


$conn->close();


?>