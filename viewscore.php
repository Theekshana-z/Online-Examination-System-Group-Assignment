<?php
include "config.php";
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/homeemployee.css">
</head>
<body>
  <header>
    <div><img class = "logo" src = "images/Examee Logo.png" alt = "This is a logo" height = "50px" width = "225px"></div>
    <nav>
      <ul>
        <li><a href="homeemployee.php">Dashboard</a></li>
        <li><a href="employeeprofile.php">Profile</a>
        <li><a href="Select Exam.php">Examination</a></li>
        <li><a href="payment.php">Payemnt</a></li>
        <li><a href="viewscore.php">Score</a></li>
        <li><a href="feedback.php">Feedback Page</a></li>
        <li><a href="support.php">Support<a></li>
        
      </ul>
    </nav>
    <div class="login-signup">
    <a href="index.php" class="signup">
    <button>Sign OUT</button>
    </a>
    </div>

  </header>
  <?php
        $type1 = $_SESSION["type"];
        $username1 = $_SESSION["username"];
        $sql = "select * from " . $type1 . " where mail='{$username1}'";
        $res =   mysqli_query($conn, $sql);
        if ($res == true) {
            global $dbmail, $dbpw;
            while ($row = mysqli_fetch_array($res)) {
                $dbmail = $row['mail'];
            }
        }
        ?>

 <br><br><br><br><br>
 <?php


$sql = "SELECT slno, score, quizid, mail, totalscore, remark FROM score WHERE mail='{$dbmail}'";


$result = $conn->query($sql);


if ($result->num_rows > 0) {
    echo "<center><table border='1'>";
    echo "<tr><th>Slno</th><th>Score</th><th>Quiz ID</th><th>Mail</th><th>Total Score</th><th>Remark</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["slno"] . "</td>";
        echo "<td>" . $row["score"] . "</td>";
        echo "<td>" . $row["quizid"] . "</td>";
        echo "<td>" . $row["mail"] . "</td>";
        echo "<td>" . $row["totalscore"] . "</td>";
        echo "<td>" . $row["remark"] . "</td>";
        echo "</tr>";
    }

    echo "</table></center>";
} else {
    echo "No records found";
}

// Close the database connection
$conn->close();
?>



  <br><br><br><br><br><br><br><br><br><br><br><br>
  <footer>
    <div class="social-media">
      <a href="#" target="_blank"><img src="images/facebook.png" alt="Facebook"></a>
      <a href="#" target="_blank"><img src="images/instagram.png" alt="Instagram"></a>
      <a href="#" target="_blank"><img src="images/twitter.png" alt="Twitter"></a>
    </div>
    <br>
    <div class="footer-links">
      <a href="contact.php">Contact Us</a>
      <a href="#">Terms and Conditions</a>
      <a href="#">Privacy Policy</a>
      <a href="#">FAQs</a>
    </div>
    <br>

    <div class="footer-bottom">
      <p>Copyright &copy; 2023 Designed by<span> M_L_B_01.01_02</span></p>
    </div>
  </footer>
  
</body>
</html>
