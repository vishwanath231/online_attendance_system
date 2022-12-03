<?php 


include '../config/config.php';


$class_name = $_REQUEST['class'];

$sql = "SELECT id FROM classes WHERE name = '$class_name'";
$query = mysqli_query($conn ,$sql);
$count = mysqli_num_rows($query);



if ($count > 0) {
    
    while($row = mysqli_fetch_assoc($query)){

        
        $id = $row['id'];

        
        $sql2 = "SELECT * FROM students WHERE class_id = $id";
        $query2 = mysqli_query($conn ,$sql2);
        $count2 = mysqli_num_rows($query2);

        if ($count2 > 0) {

            while($row2 = mysqli_fetch_assoc($query2)){


                $student_id = $row2['id'];
                $student_name = $row2['name'];
                $student_reg_no = $row2['reg_no'];
                $student_gender = $row2['gender'];


                echo"
                    <tr class='bg-white border-b hover:bg-gray-200'>
                        <td class='py-4 px-6 uppercase'>$student_id</td>
                        <td class='py-4 px-6 uppercase'>$student_name</td>
                        <td class='py-4 px-6 uppercase font-bold'>$student_reg_no</td>
                        <td class='py-4 px-6 uppercase'>$student_gender</td>
                        <td class='py-4 px-6 uppercase'>
                            <form>
                                <input type='hidden' name='student_id' id='std_id' value='$student_id' />

                                <div style='display: flex; justify-content: space-around; align-items: center;'>
                                    <select id='status$student_id' class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-60 mr-10 p-2.5' required>
                                        <option value=''>choose status</option>
                                        <option value='present'>present</option>
                                        <option value='absent'>absent</option>
                                        <option value='late'>late</option>
                                        <option value='half_day'>half_day</option>
                                    </select>
                                    <button type='button' onClick='attendance_save($student_id)' class='bg-green-500 py-2 px-4 text-white rounded w-fit h-fit'>Save Attendance</button> 
                                </div>
                            </form>
                        </td>
                    </tr>"
                ;
            }
        }else{
            echo "<div class='m-5 text-md font-bold uppercase text-red-500'>No records</div>";
        }
    }
}


$conn->close();
?>