<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>adminLogin</title>
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
                                <h2>Login</h2>
                            </div>
                            <!-- signup form -->
                            <form class="signup-form" action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST">
                            <input type="text" name="admin_email" required placeholder="ADMIN-EMAIL" id=""><br>
                            <input type="text" name="admin_password" required placeholder="ADMIN-PASSWORD" id=""><br>
                            <input type="submit" name="login"  value="LOGIN" class="site-btn">
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
            $admin_email = $_POST["admin_email"];
            $admin_password = $_POST["admin_password"];
            require '../configuration/connect.php';

            $select = "SELECT * FROM admins WHERE admin_email='$admin_email'";
            $queryselect=mysqli_query($dbconnection,$select);
            if (mysqli_num_rows($queryselect) > 0 ) {
                $row = mysqli_fetch_array($queryselect);
                if ($row["admin_password"] == $admin_password) {
                    echo "<script>window.location.assign('adminHome.php')</script>";
                } else {
                    ?>
                    <script>
                    document.getElementById("thetext").innerHTML+="<div style=text-align:center;color:white;margin:20px>WRONG PASSWORD</div>"
                    </script>
                   <?php                }  
            } 
            else {
                ?>
                <script>
                document.getElementById("thetext").innerHTML+="<div style=text-align:center;color:white;margin:20px>WRONG EMAIL</div>"
                </script>
               <?php                 }
     }
        
?>
