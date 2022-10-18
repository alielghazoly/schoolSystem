<?php 
if (isset($_GET['id'])) {
    require '../configuration/connect.php';
    $id =$_GET['id'];
    $seat =$_GET['seat'];

    $select = "SELECT * FROM students WHERE student_id='$id'";
    $query=mysqli_query($dbconnection,$select);
    $row =mysqli_fetch_array($query);
} 
else {
    header("location:../admins/students.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
   

    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
	<link rel="stylesheet" href="../css/font-awesome.min.css"/>
	<link rel="stylesheet" href="../css/style.css"/>
</head>
<body >
    <section class="signup-section spad">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="signup-warp" id="thetext">
                            <div class="section-title text-white text-left">
                                <h2>Edit Student</h2>
                            </div>
                           
                            <form  class="signup-form"  action="edit.php?seat=<?php echo $seat ;?>" method="POST" enctype="multipart/form-data">                      
                                <input type="text" name="student_name" value="<?php echo $row["student_name"] ?>" required placeholder="STUDENT-NAME" id="">
                                <input type="text" name="student_seat_number" value="<?php echo $row["student_seat_number"] ?>" required placeholder="STUDENT-SEAT-NUMBER" id="">
                                <input type="text" name="student_level" value="<?php echo $row["student_level"] ?>"   placeholder="STUDENT-LEVEL" required id="" > 
                                <input type="hidden" name="student_id" value="<?php echo $row["student_id"] ?>"   placeholder="STUDENT-LEVEL" required id="" > 
                                <input type="submit" name="edit"  value="Edit"  class="site-btn">
                            </form>

                        </div>
                    </div>
                  
                </div>
            </div>
        </section>
</body>





</html>




