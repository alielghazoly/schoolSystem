<!DOCTYPE html>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Result</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
	<link rel="stylesheet" href="../css/style.css"/>
</head>
<body >
    <section class="signup-section spad">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <div class="signup-warp" id="thetext">
                            <div class="section-title text-white text-left">
                                <h2>Insert Result</h2>
                            </div>
                            <!-- signup form -->
                            <form  class="signup-form"action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST" enctype="multipart/form-data">
                            
                                <input type="text" name="result_seat_number" required placeholder="RESULT-SEAT-NUMBER" id=""><br>
                                <input type="text" name="result_math" required placeholder="RESULT-MATH" id=""><br>
                                <input type="text" name="result_arabic" placeholder="RESULT-ARABIC" required id="" > <br>
                                <input type="text" name="result_english" placeholder="RESULT-ENGLISH" required id="" > <br>
                                <input type="submit" name="insert"  value="Insert Result"  class="site-btn">
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
            $result_seat_number = $_POST["result_seat_number"];
            $result_math = $_POST["result_math"];
            $result_arabic = $_POST["result_arabic"];
            $result_english = $_POST["result_english"];
            
               
            require '../configuration/connect.php';
            $select = "SELECT * FROM students WHERE student_seat_number='$result_seat_number'";
            $queryselect=mysqli_query($dbconnection,$select);
            if (!mysqli_num_rows($queryselect) > 0 ) {
                ?>
                <script>
                document.getElementById("thetext").innerHTML+="<div style=text-align:center;color:white;margin:20px>STUDENT DOES NOT EXIST</div>"
                </script>
               <?php
            } 
            else {
                $select2 = "SELECT * FROM results WHERE result_seat_number='$result_seat_number'";
                $queryselect2=mysqli_query($dbconnection,$select);

                if (mysqli_num_rows($queryselect2) > 0) {
                    ?>
                    <script>
                    document.getElementById("thetext").innerHTML+="<div style=text-align:center;color:white;margin:20px>RESULT EXISTS</div>"
                    </script>
                   <?php
                } else {
                    $insert = "INSERT INTO 
                    results( result_seat_number, result_math,result_arabic,result_english) 
                    VALUES ('$result_seat_number','$result_math','$result_arabic','$result_english')";
        
                    $query=mysqli_query($dbconnection,$insert);
                    if ($query) {
                        ?>
                        <script>
                        document.getElementById("thetext").innerHTML+="<div style=text-align:center;color:white;margin:20px>RESULT CREATED</div>"
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
         
      
        }
        
?>