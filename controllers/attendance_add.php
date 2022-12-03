<?php 


include '../config/config.php';

$id = $_REQUEST['id'];
$date= $_REQUEST['date'];
$status = $_REQUEST['status'];


$sql = "SELECT * FROM attendance WHERE student_id = '$id' AND attendance_date = '$date'";
$query = mysqli_query($conn , $sql);
$count = mysqli_num_rows($query);



if($count > 0){

    $sql2 = "SELECT name FROM students WHERE id = '$id'";
    $query2 = mysqli_query($conn , $sql2);
    $count2 = mysqli_num_rows($query2);

    if ($count2 > 0) {
        while ($row = $query2->fetch_assoc()) {
            $name = $row['name'];

            $sql1 = "UPDATE attendance SET status = '$status' WHERE student_id = '$id' AND attendance_date = '$date'";
            $query1 = mysqli_query($conn, $sql1);
            echo "<div class='suc_msg'>$name attendance status updated </div>";

        }
    }
   

}else{


    $sql2 = "SELECT class_id, name FROM students WHERE id = '$id'";
    $query2 = mysqli_query($conn, $sql2);
    $count2 = mysqli_num_rows($query2);

    if ($count2 > 0) {
        while ($row = $query2->fetch_assoc()) {
            $class_id = $row['class_id'];
            $name = $row['name'];


            $sql3 = "INSERT INTO attendance (student_id,class_id,status,attendance_date) VALUES('$id','$class_id','$status','$date')";
            $query3 = mysqli_query($conn, $sql3);
            echo "<div class='suc_msg'>$name attendance status inserted </div>";
        }
    }
    
    
}




$conn->close();
?>