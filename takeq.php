<?php
include "config.php";
session_start();
error_reporting(E_ERROR | E_PARSE);
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
        <li><a href="#">Payemnt</a></li>
        <li><a href="viewscore.php">Score</a></li>
        <li><a href="#">Feedback Page</a></li>
        <li><a href="Contact.php">Contact Us</a></li>
        
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
  <br><br><br>
  <?php
if (isset($_GET["qid"])) {
    $qid = $_GET["qid"];
    $sql = "select * from questions where quizid='{$qid}'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        $count = mysqli_num_rows($res);
        if (mysqli_num_rows($res) == 0) {
            echo "No questions found under this quiz. Please come back later.";
        } else {
            $i = 1;
            $j = 0;
            echo "<form method=\"POST\">";
            echo '<link rel="stylesheet" type="text/css" href="css/takeq.css">';
            while ($row = mysqli_fetch_assoc($res)) {
                echo "<div class=\"question\">";
                echo $i . ". " . $row["qs"] . "<br>";
                echo "</div>";
                echo "<div class=\"options\">";
                echo "<input type=\"radio\" value=\"" . $j . "\" name=\"ans" . $i . $j . "\">" . $row["op1"] . "<br>";
                echo "<input type=\"radio\" value=\"" . ($j + 1) . "\" name=\"ans" . $i . $j . "\">" . $row["op2"] . "<br>";
                echo "<input type=\"radio\" value=\"" . ($j + 2) . "\" name=\"ans" . $i . $j . "\">" . $row["op3"] . "<br>";
                echo "<input type=\"radio\" value=\"" . ($j + 3) . "\" name=\"ans" . $i . $j . "\">" . $row["answer"] . "<br><br>";
                echo "</div>";
                $i++;
            }
            echo "<input class=\"submit-button\" type=\"submit\" name=\"submit\" value=\"Submit\"><br><br><br>";
            echo "</form><br><br>";
        }
    } else {
        echo "Error: " . mysqli_error($conn) . ".";
    }
    if (isset($_POST["submit"])) {
        global $score;
        for ($i = 1; $i <= $count; $i++) {
            if (isset($_POST["ans" . $i . $j]) && $_POST["ans" . $i . $j] == 3) {
                $score++;
            }
        }
        echo "<script>alert(\"You scored " . $score . " out of " . $count . "\");</script>";
        $sql = "insert into score(score,mail,quizid,totalscore) values('$score','$dbmail','$qid','$count');";
        $res = mysqli_query($conn, $sql);
        if ($res) {
            echo '<script>history.pushState({}, "", "");</script>';
            echo "<script>window.location.replace(\"homeemployee.php\");</script>";
        } else {
            echo "<script>alert(\"Error occurred while updating the score in the database: " . mysqli_error($conn) . "\");</script>";
        }
    }
}
?>



  <br>
  <footer>
    <div class="social-media">
      <a href="#" target="_blank"><img src="images/facebook.png" alt="Facebook"></a>
      <a href="#" target="_blank"><img src="images/instagram.png" alt="Instagram"></a>
      <a href="#" target="_blank"><img src="images/twitter.png" alt="Twitter"></a>
    </div>
    <br>
    <div class="footer-links">
      <a href="Contact.php">Contact Us</a>
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
