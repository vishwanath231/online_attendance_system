<?php 


include '../config/config.php';


$sql = "SELECT * FROM students";
$query = mysqli_query($conn ,$sql);
$count = mysqli_num_rows($query);



if ($count > 0) {
    
    while($row = mysqli_fetch_assoc($query)){

        
        $id = $row['id'];
        $name = $row['name'];
        $reg_no = $row['reg_no'];
        $class = $row['class_id'];
        $gender = $row['gender'];


        $sql2 = "SELECT name FROM classes WHERE id = $class";
        $query2 = mysqli_query($conn,$sql2);
        $count2 = mysqli_num_rows($query2);

        if ($count2 > 0) {

            while($row2 = mysqli_fetch_assoc($query2)){
                $class_name = $row2['name'];


                echo    "<tr class='bg-white border-b hover:bg-gray-200'>";
                echo        "<td class='py-4 px-6 uppercase'>". $id ."</td>";
                echo        "<td class='py-4 px-6 uppercase font-bold'>". $name ."</td>";
                echo        "<td class='py-4 px-6 uppercase'>". $reg_no ."</td>";
                echo        "<td class='py-4 px-6 uppercase'>". $class_name ."</td>";
                echo        "<td class='py-4 px-6 uppercase'>". $gender ."</td>";
                echo        "<td>
                                <button onClick='getStudentById($id)' class='bg-green-400 p-2 rounded mr-3'>
                                    <svg width='23' fill='#ffffff' viewBox='0 0 512 512' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><g><g><path d='M447.1,256.2C401.8,204,339.2,144,256,144c-33.6,0-64.4,9.5-96.9,29.8C131.7,191,103.6,215.2,65,255l-1,1l6.7,6.9    C125.8,319.3,173.4,368,256,368c36.5,0,71.9-11.9,108.2-36.4c30.9-20.9,57.2-47.4,78.3-68.8l5.5-5.5L447.1,256.2z M256,160    c33.1,0,64.9,9.5,97.2,30.6c23.9,15.6,47.4,36.7,73.7,66.1C388.6,295.4,331.1,352,256,352c-34.2,0-64.2-8.4-94.2-28.2    c-27.5-18.1-52.3-43.3-76.2-67.8C144.7,196.3,194,160,256,160z'/><path d='M256,336c44.1,0,80-35.9,80-80c0-44.1-35.9-80-80-80c-44.1,0-80,35.9-80,80C176,300.1,211.9,336,256,336z M256,192.3    c35.2,0,64,28.6,64,63.7c0,35.1-28.8,63.7-64,63.7c-35.2,0-63.9-28.6-63.9-63.7C192.1,220.9,220.8,192.3,256,192.3z'/></g><path d='M288,256L288,256c0,17.5-14.4,32-31.8,32S224,272.8,224,255.3s15.8-31.3,32-31.3l0-16c-26.5,0-47.9,21.6-47.9,48.2   c0,26.6,21.5,48.1,47.9,48.1s48-21.6,48-48.1V256H288z'/></g></svg>
                                </button>
                                <button onClick='deleteStudentById($id)' class='bg-red-400 p-2 rounded'>
                                    <svg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg' fill='#ffffff' width='23'><path d='M20,29H12a5,5,0,0,1-5-5V12a1,1,0,0,1,2,0V24a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V12a1,1,0,0,1,2,0V24A5,5,0,0,1,20,29Z'/><path d='M26,9H6A1,1,0,0,1,6,7H26a1,1,0,0,1,0,2Z'/><path d='M20,9H12a1,1,0,0,1-1-1V6a3,3,0,0,1,3-3h4a3,3,0,0,1,3,3V8A1,1,0,0,1,20,9ZM13,7h6V6a1,1,0,0,0-1-1H14a1,1,0,0,0-1,1Z'/><path d='M14,23a1,1,0,0,1-1-1V15a1,1,0,0,1,2,0v7A1,1,0,0,1,14,23Z'/><path d='M18,23a1,1,0,0,1-1-1V15a1,1,0,0,1,2,0v7A1,1,0,0,1,18,23Z'/></g></svg>
                                </button>
                            </td>";
                echo    "</tr>";
            }
        }


        
        

    }
}


$conn->close();
?>