<?php 

include '../config/config.php';
include '../public/lib/fpdf/fpdf.php';

$pdf=new FPDF();


if (isset($_POST['downloadPdf'])) {
    
    $id = $_POST['student_hidden_id'];

    $sql = "SELECT * FROM students WHERE id= $id";
    $query = mysqli_query($conn , $sql);
    $count = mysqli_num_rows($query);

    if ($count > 0 ) {
        
        while($row = $query->fetch_assoc()){

            $reg_no[] = $row['reg_no'];
            $name[] = $row['name'];
            $dob[] = $row['dob'];
            $class = $row['class_id'];

            $sql2 = "SELECT name FROM classes WHERE id = $class";
            $query2 = mysqli_query($conn,$sql2);
            $count2 = mysqli_num_rows($query2);
    
            if ($count2 > 0) {
    
                while($row2 = mysqli_fetch_assoc($query2)){
                    $class_name[] = $row2['name'];
                }

            }

            

        }
    }

    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 10);

    // Move to the right
    $pdf->Cell(80);

    // Title
    $pdf->Cell(30,10,'Hall Ticket','C');

    // Line breakha
    $pdf->Ln(20);

    $pdf->Cell(100,15,"REGISTER NUMBER",1, 0);
    $pdf->Cell(90,15, implode($reg_no) ,1, 1);


    $pdf->Cell(100,15,"NAME OF THE CANDIDATE",1, 0);
    $pdf->Cell(90,15, implode($name) ,1, 1);

    $pdf->Cell(100,15,"DATE OF BIRTH",1, 0);
    $pdf->Cell(90,15, implode($dob) ,1, 1);

    $pdf->Cell(100,15,"BRANCH OF STUDY",1, 0);
    $pdf->Cell(90,15, implode($class_name) ,1, 1);

    $pdf->Cell(100,15,"SIGNATURE OF THE CANDIDATE",1, 0);
    $pdf->Cell(90,15,"",1, 1);

    $pdf->Ln(40);
    $pdf->Cell(30,10,'Signature of the HOD/Principal with Seal');


    $pdf->Output();
}





//         



?>