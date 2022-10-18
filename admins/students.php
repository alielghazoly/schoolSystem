<!DOCTYPE html>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
	<link rel="stylesheet" href="../css/font-awesome.min.css"/>
	<link rel="stylesheet" href="../css/ss.css"/>

</head>
<body >
<div class="sidebar-container">
  <div class="sidebar-logo">
    School
  </div>
  <ul class="sidebar-navigation">
    <li class="header">Level</li>
    <li>
      <a href="?level=1">
        <i class="fa fa-home" aria-hidden="true"></i>First Level
      </a>
    </li>
    <li>
      <a href="?level=2">
        <i class="fa fa-tachometer" aria-hidden="true"></i> Second Level
      </a>
    </li>
    <li>
      <a href="?level=3">
        <i class="fa fa-users" aria-hidden="true"></i> Third Level
      </a>
    </li>
    <li>
      <a href="?level=4">
        <i class="fa fa-cog" aria-hidden="true"></i> Fourth Level
      </a>
    </li>
    <li>
      <a href="?level=5">
        <i class="fa fa-info-circle" aria-hidden="true"></i> Fifth Level
      </a>
    </li>
  </ul>
</div>

<div class="content-container">

  <div class="container-fluid">
      

    <!-- Main component for a primary marketing message or call to action -->
    <table class="table table-dark">

  <thead>
    <tr>
        <th scope="col">Name</th>
      <th scope="col">Delete</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>



  <tbody>
  <?php 
    if (isset($_GET['level'])) {
        require '../configuration/connect.php';
        $level =$_GET['level'];

        $select = "SELECT * FROM students WHERE student_level=$level";
        $query=mysqli_query($dbconnection,$select);

        if (mysqli_num_rows($query) > 0 ) {
            while ($row =mysqli_fetch_array($query)) {
                echo "<tbody>";
                echo "<tr>";
                echo "<th>".$row["student_name"]."</th>";
                echo "<td ><a class=delete href=../delete/deleteStudent.php?id=".$row["student_id"]."&seat=".$row["student_seat_number"].">Delete</a> </td>";
                echo "<td ><a class=Edit href=../edit/editStudent.php?id=".$row["student_id"]."&seat=".$row["student_seat_number"].">Edit</a> </td>";
                echo "</tr>";
                echo "</tbody>";
               }
        } 
        else {
            echo "<tbody>";
            echo "<tr>";
            echo "<th>No Student In Level $level</th>";
            echo "</tr>";
            echo "</tbody>";

        }
    }  else {
        echo "<tbody>";
        echo "<tr>";
        echo "<th>Choose The Level";
        echo "</tr>";
        echo "</tbody>";

    }
    ?>
    
  </tbody>
</table>

  </div>
</div>
</body >
    </html>
    