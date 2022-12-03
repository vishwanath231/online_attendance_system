<?php 



include '../config/config.php';

$class_name = $_REQUEST['class'];
$date = $_REQUEST['date'];



$sql = "SELECT id FROM classes WHERE name = '$class_name'";
$query = mysqli_query($conn ,$sql);
$count = mysqli_num_rows($query);


if ($count > 0) {
    
    while($row = mysqli_fetch_assoc($query)){

        
        $cls_id = $row['id'];

        $sql2 = "SELECT * FROM attendance WHERE class_id = '$cls_id' AND attendance_date = '$date'";
        $query2 = mysqli_query($conn ,$sql2);
        $count2 = mysqli_num_rows($query2);

        if ($count2 > 0) {

            while($row2 = mysqli_fetch_assoc($query2)){

                $attendance_status = $row2['status'];
                $student_id = $row2['student_id'];
                
                $sql3 = "SELECT * FROM students WHERE id = '$student_id'";
                $query3 = mysqli_query($conn, $sql3);
                $count3 = mysqli_num_rows($query3);


                if ($count3 > 0) {
                    while($row3 = mysqli_fetch_assoc($query3)){
    
                        $reg_no = $row3['reg_no'];
                        $name = $row3['name'];
                        $gender = $row3['gender'];
                        $mobile = $row3['mobile'];

                        echo "<tr class='bg-white border-b hover:bg-gray-200'>";
                        echo "<td class='py-4 px-6 uppercase font-bold'>$reg_no</td>";       
                        echo "<td class='py-4 px-6 uppercase font-bold'>$name</td>";       
                        echo "<td class='py-4 px-6 uppercase'>$gender</td>"; 
                        echo "<td class='py-4 px-6 uppercase'>$mobile</td>"; 
                        if ($attendance_status === 'present') {
                            echo "<td>
                               <div class='py-2 px-4 rounded text-white bg-green-500 w-fit h-fit capitalize'>$attendance_status</div>
                            </td>";       
                        }else if ($attendance_status === 'absent'){
                            echo "<td>
                                <div class='py-2 px-4 rounded text-white bg-red-500 w-fit h-fit capitalize'>$attendance_status</div>
                            </td>";
                        }else if($attendance_status === 'late'){
                            echo "<td>
                                <div class='py-2 px-4 rounded text-white bg-orange-500 w-fit h-fit capitalize'>$attendance_status</div>
                            </td>";
                        }else if($attendance_status === 'half_day'){
                            echo "<td>
                                <div class='py-2 px-4 rounded text-white bg-blue-500 w-fit h-fit capitalize'>Half Day</div>
                            </td>";
                        }     
                        echo "</tr>";       
                    }

                }else {

                    echo "<div class='m-5 text-md font-bold uppercase text-red-500'>No records</div>";
                }

                
            }


        }else{

            echo "<div class='m-5 text-md font-bold uppercase text-red-500'>No records</div>";
        }
    }
}


$conn->close();
?>