<!DOCTYPE html>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Student</title>
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
                                <h2>Insert Student</h2>
                            </div>
                            <form  class="signup-form"  action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST" enctype="multipart/form-data">
                            
                            <input type="text" name="student_name" required placeholder="STUDENT-NAME" id="">
                            <input type="text" name="student_seat_number" required placeholder="STUDENT-SEAT-NUMBER" id="">
                            <input type="text" name="student_level" placeholder="STUDENT-LEVEL" required id="" > 
                            <input type="submit" name="insert"  value="Insert Student"  class="site-btn">
                            </form>
                        </div>
                    </div>
                  
                </div>
            </div>
        </section>
</body>
</html>
<?php
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $student_name = $_POST["student_name"];
            $student_seat_number = $_POST["student_seat_number"];
            $student_level = $_POST["student_level"];
            
               
            require '../configuration/connect.php';
            $select = "SELECT * FROM students WHERE student_name='$student_name'";
            $queryselect=mysqli_query($dbconnection,$select);
            if (mysqli_num_rows($queryselect) > 0 ) {
                ?>
                 <script>
                     document.getElementById("thetext").innerHTML+="<div style=text-align:center;color:white;margin:20px>STUDENT EXISTS</div>"
                 </script>
                <?php
            } 
            else {
                $insert = "INSERT INTO 
                students( student_name, student_seat_number,student_level) 
                VALUES ('$student_name','$student_seat_number','$student_level')";
    
                $query=mysqli_query($dbconnection,$insert);
                if ($query) {
                    ?>
                    <script>
                        document.getElementById("thetext").innerHTML+="<div style=text-align:center;color:white;margin:20px>STUDENT CREATED</div>"
                    </script>
                   <?php
                } 
                else{
                    ?>
                    <script>
                        document.getElementById("thetext").innerHTML+="<div style=text-align:center;color:white;margin:20px>TRY AGAIN</div>"
                    </script>
                   <?php
                }  
    
            }
         
      
        }
        
?>