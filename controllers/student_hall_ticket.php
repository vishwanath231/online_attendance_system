<?php

    include '../config/config.php';

    $id = $_REQUEST['id'];

    $sql = "SELECT * FROM attendance WHERE student_id = '$id'";
    $query = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($query);
   

    if ($count > 0) {

        $student_sql = "SELECT * FROM students WHERE id = '$id'";
        $student_query = mysqli_query($conn, $student_sql);

        while ($student_row = $student_query->fetch_assoc()) {
            
            $name[] = $student_row['name'];
            $reg_no[] = $student_row['reg_no'];
        }

        
        $present_sql = "SELECT COUNT(status) FROM attendance WHERE student_id = '$id' AND status = 'present'";
        $present_query = mysqli_query($conn, $present_sql);
        $present_check = mysqli_num_rows($present_query);

        while ($present_row = $present_query->fetch_assoc()) {
            
            $present_count[] = $present_row['COUNT(status)'];
        }

       
        $absent_sql = "SELECT COUNT(status) FROM attendance WHERE student_id = '$id' AND status = 'absent'";
        $absent_query = mysqli_query($conn, $absent_sql);
        $absent_check = mysqli_num_rows($absent_query);

        while ($absent_row = $absent_query->fetch_assoc()) {

            $absent_count[] = $absent_row['COUNT(status)'];
        }


        $late_sql = "SELECT COUNT(status) FROM attendance WHERE student_id = '$id' AND status = 'late'";
        $late_query = mysqli_query($conn, $late_sql);
        $late_check = mysqli_num_rows($late_query);

        while ($late_row = $late_query->fetch_assoc()) {
            
            $late_count[] = $late_row['COUNT(status)'] * 0.7;
        }

        $half_day_sql = "SELECT COUNT(status) FROM attendance WHERE student_id = '$id' AND status = 'half_day'";
        $half_day_query = mysqli_query($conn, $half_day_sql);
        $half_day_check = mysqli_num_rows($half_day_query);

        while ($half_day_row = $half_day_query->fetch_assoc()) {
            
            $half_day_count[] = $half_day_row['COUNT(status)'] * 0.5;

        }


        $total_day_sql = "SELECT COUNT(DISTINCT(attendance_date)) FROM attendance WHERE student_id = '$id'";
        $total_day_query = mysqli_query($conn, $total_day_sql);
        $total_day_check = mysqli_num_rows($total_day_query);

        while ($total_day_row = $total_day_query->fetch_assoc()) {
            
            $total_day_count[] = $total_day_row['COUNT(DISTINCT(attendance_date))'];

        }


        $student_name = implode($name);
        $student_reg_no = implode($reg_no);
        $present = implode($present_count);
        $absent = implode($absent_count);
        $late =  implode($late_count);
        $half_day =  implode($half_day_count);
        $total_day =  implode($total_day_count);

        $working_days = $present + $late + $half_day;

        $percentage = ($working_days / intval($total_day)) * 100;


        echo  $percentage;

    }


?>