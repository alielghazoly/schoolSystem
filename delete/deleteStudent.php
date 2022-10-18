<?php 
if (isset($_GET['id'])) {
    require '../configuration/connect.php';
    $id =$_GET['id'];
    $seat =$_GET['seat'];

    $delete = "DELETE FROM students WHERE student_id='$id'";
    $deleteResult = "DELETE FROM results WHERE result_seat_number='$seat'";

    $query=mysqli_query($dbconnection,$delete);
    $queryResult=mysqli_query($dbconnection,$deleteResult);

    if ($query && $queryResult) {
        header("location:../admins/students.php");
    }
    
} else {
    header("location:../admins/students.php");
}

?>