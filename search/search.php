<!DOCTYPE html>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>search</title>
   
	<link rel="stylesheet" href="../css/bootstrap.min.css"/>
	<link rel="stylesheet" href="../css/font-awesome.min.css"/>
	<link rel="stylesheet" href="../css/style.css"/>
</head>
<body >
    <section class="search-section ">
            <div class="container-fluid ">
                <div class="search-warp" id="thetext">
                    <div class="section-title text-white">
                        <h2>Search Your Result</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <!-- search form -->
                            <form class="course-search-form" action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST">
                                <input type="text"  name="seat_number" required placeholder="SEAT-NUMBER" id="">
                                <input type="submit" class="site-btn" name="search"  value="SEARCH RESULT" >
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
       

  

        </html>
<?php
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $seat_number = $_POST["seat_number"];

            require '../configuration/connect.php';

            $select = "SELECT * FROM results WHERE result_seat_number='$seat_number'";
            $queryselect=mysqli_query($dbconnection,$select);
            if (!mysqli_num_rows($queryselect) > 0 ) {
                ?>
                <script>
                    document.getElementById("thetext").innerHTML+="<div style=text-align:center;color:white;margin:20px>RESULT DOES NOT EXIST</div>"
                </script>
               <?php            } 
            else {
                $selectstudent = "SELECT * FROM students WHERE student_seat_number='$seat_number'";
                $queryselectstudent=mysqli_query($dbconnection,$selectstudent);
                $rowStudent =mysqli_fetch_array($queryselectstudent);
                $rowResult =mysqli_fetch_array($queryselect);
                ?>
                <div class="container-fluid ">
                    <div class="row">
                        <div class="col-lg-6 offset-md-3"  >
                    <?php
                echo '
                <table class="table " >
                <thead>
                  <tr>
                    <th scope="col">SEAT NUMBER</th>
                    <th scope="col">'.$rowResult["result_seat_number"].'</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">STUDENT NAME </th>
                    <td>'.$rowStudent["student_name"].'</td>
                  </tr>
                  <tr>
                    <th scope="row">STUDENT LEVEL</th>
                    <td>'.$rowStudent["student_level"].'</td>
                 
                  </tr>
                  <tr>
                    <th scope="row">MATH RESULT</th>
                    <td>'.$rowResult["result_math"].' </td>
                  
                  </tr>
                  <tr>
                  <th scope="row">ARABIC RESULT</th>
                  <td>'.$rowResult["result_arabic"].' </td>
                
                </tr>
                <tr>
                <th scope="row">ENGLISH RESULT</th>
                <td>'.$rowResult["result_english"].' </td>
              
              </tr>
                </tbody>
              </table>
                
                ';
                ?>
                     </div>
                    </div>
                </div>
                <?php
                    
                    
                
            }
         
      
        }
        
?>