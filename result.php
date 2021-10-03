<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Results Form</title>
    <link rel="stylesheet" href="SMR.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
<body>
<header>
    <nav>
      <ul>
        <li><a href=""></a></li>
      <li class="ho"><a href="SMR1.html">HOME</a></li>
     </ul> 
    </nav>
</header>

<?php
// session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "smr";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(isset($_GET['submit2'])){
  $sems=$_GET['semread'];
  $uname= $_GET['username'];
  // $uname = $_SESSION['uname'];

  // echo $uname;
  $sql = "SELECT uname, sem, sub1, sub2, sub3, sub4, sub5, sub6, sub7, sub8 FROM marks WHERE uname='$uname' AND sem='$sems'";

  $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = mysqli_fetch_assoc($result))
        {
            $un = $row['uname'];
            $sem = $row['sem'];
            $s1 = $row['sub1'];
            $s2 = $row['sub2'];
            $s3 = $row['sub3'];
            $s4 = $row['sub4'];
            $s5 = $row['sub5'];
            $s6 = $row['sub6'];
            $s7 = $row['sub7'];
            $s8 = $row['sub8'];
            
        }
        $total=$s1+$s2+$s3+$s4+$s5+$s6+$s7+$s8;
        $percent=($total/800)*100;
        if(mysqli_num_rows($result)==0){
            echo "no result";
            exit();
        
  } 

}
}


$conn->close();

?>
<div class="container">
        <div class="details">
            <span>Name:</span> <?php echo $un ?> <br>
            <span>Semester:</span> <?php echo $sem; ?> <br>
        </div>

        <div class="main">
            <div class="s1">
                <p>Subjects</p>
                <p>Subject 1: <?php echo $s1;?> </p>
                <p>Subject 2: <?php echo $s2;?>  </p>
                <p>Subject 3: <?php echo $s3;?> </p>
                <p>Subject 4: <?php echo $s4;?>  </p>
                <p>Subject 5: <?php echo $s5;?> </p>
                <p>Subject 6: <?php echo $s6;?>  </p>
                <p>Subject 7: <?php echo $s7;?> </p>
                <p>Subject 8: <?php echo $s8;?>  </p>
                
              </div>
        </div>
        <div class="result">
            <?php echo '<p>Total Marks:&nbsp'.$total.'</p>';?>
            <?php echo '<p>Percentage:&nbsp'.$percent.'%</p>';?>
        </div>


        <div class="button">
            <button name="submit3" onclick="window.print()">Print Result</button>
        </div>
    </div>
</body>
</html>
