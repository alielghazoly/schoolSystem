
<?php
if(isset($_POST["edit"])){
    $student_name = $_POST["student_name"];
    $student_seat_number = $_POST["student_seat_number"];
    $student_level = $_POST["student_level"];
    $student_id = $_POST["student_id"];
    $old_seat =$_GET['seat'];

    
    require '../configuration/connect.php';
    $select2 = "SELECT * FROM students WHERE student_seat_number='$student_seat_number'";
    $queryselect2=mysqli_query($dbconnection,$select2);

    if (mysqli_num_rows($queryselect2) > 0) {
       echo "SEAT NUMBER EXISTS RETURN AND TRY ANOTHER NUMBER";
    } else {
        $updateSeatInResult = "UPDATE results  SET result_seat_number='$student_seat_number' WHERE result_seat_number='$old_seat'";
        
        $update = "UPDATE students SET student_name='$student_name',student_seat_number='$student_seat_number'
            ,student_level='$student_level' WHERE student_id='$student_id'";
    
                $queryupdateSeatInResult=mysqli_query($dbconnection,$updateSeatInResult);
                $queryupdate=mysqli_query($dbconnection,$update);
                if ($queryupdate && $queryupdateSeatInResult) {      
                    header("location:../admins/students.php");
                }
        }
  
    

   
 }
 ?>