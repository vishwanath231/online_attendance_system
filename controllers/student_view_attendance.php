<?php

    include '../config/config.php';

    $id = $_REQUEST['id'];
    $date = $_REQUEST['date'];

    $sql= "SELECT * FROM students WHERE id = '$id'";
    $query = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($query);

    if ($count > 0) {
        while($row = $query->fetch_assoc()){
            $name = $row['name'];
            $reg_no = $row['reg_no'];

            $attendance_sql = "SELECT * FROM attendance WHERE student_id = '$id' AND attendance_date = '$date'";
            $attendance_query = mysqli_query($conn, $attendance_sql);
            $attendance_check = mysqli_num_rows($attendance_query);

            if ($attendance_check > 0) {
                while ($attendance_row = $attendance_query->fetch_assoc()) {
                    
                    $std_attendance_date = $attendance_row['attendance_date'];
                    $std_attendance_status = $attendance_row['status'];

                    echo    "<tr class='bg-white border-b hover:bg-gray-200'>";
                    echo        "<td class='py-4 px-6 uppercase font-bold'>$name</td>";
                    echo        "<td class='py-4 px-6 uppercase font-bold'>". $reg_no ."</td>";
                    echo        "<td class='py-4 px-6 uppercase'>". $std_attendance_date ."</td>";
                                if ($std_attendance_status === 'present') {
                                    echo "<td>
                                    <div class='py-2 px-4 rounded text-white bg-green-500 w-fit h-fit capitalize'>$std_attendance_status</div>
                                    </td>";       
                                }else if ($std_attendance_status === 'absent'){
                                    echo "<td>
                                        <div class='py-2 px-4 rounded text-white bg-red-500 w-fit h-fit capitalize''>$std_attendance_status</div>
                                    </td>";
                                }else if($std_attendance_status === 'late'){
                                    echo "<td>
                                        <div class='py-2 px-4 rounded text-white bg-orange-500 w-fit h-fit capitalize'>$std_attendance_status</div>
                                    </td>";
                                }else if($std_attendance_status === 'half_day'){
                                    echo "<td>
                                        <div class='py-2 px-4 rounded text-white bg-blue-500 w-fit h-fit capitalize'>Half Day</div>
                                    </td>";
                                }
                    echo    "</tr>";
                }
            }else {
                echo "<div class='m-5 text-md font-bold uppercase text-red-500'>No records selected on this date</div>";
            }
        }
    } else {
       echo "err";
    }

?>