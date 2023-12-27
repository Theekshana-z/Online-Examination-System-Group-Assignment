<?php
session_start();
include "config.php";
?>


<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/styleh.css">
  <link rel="stylesheet" type="text/css" href="css/viewq.css">
  <script src="js/homeexaminer.js"></script>
</head>
<body>
  <header>
    <a href="homeexaminer.php"><div><img class = "logo" src = "images/Examee Logo.png" alt = "Examee.net logo" height = "50px" width = "225px"></div></a>
    <nav>
      <ul>
        <li><a href = "homeexaminer.php">DASHBOARD</a></li>
        <li><a href = "examinerprofile.php">PROFILE</a></li>
        <li onclick="score()"><a>QUIZ</a></li>
        <li onclick="lo()"><a>SIGN OUT</a></li>
       </ul>
      </div>
        
      </ul>
    </nav>
    
  </header>
  <!-- Rest of the page content -->

  <section> 
  <div class = "profile-container">
  <?php

  
  if (isset($_GET["qid"])) {
    $qid = $_GET["qid"];
    $sql = "SELECT * FROM questions WHERE quizid='{$qid}'";
    $res = mysqli_query($conn, $sql);

    if ($res) {
      $count = mysqli_num_rows($res);
      if ($count == 0) {
        echo "<h1>No questions found under this quiz. Please come back later. 😔</h1>";
      } else {
        $i = 1;
        echo "<form method=\"POST\">";
        echo "<input id=\"btn\" type=\"submit\" name=\"update\" value=\"Update Questions\"><br><br><br>";

        echo "<p>Quiz ID :</p>";
        echo "<input type=\"text\" name=\"qid\" value=\"{$qid}\" readonly><br><br>";


        while ($row = mysqli_fetch_assoc($res)) {
          echo "0" . $i . ". <input type=\"text\" name=\"qs{$i}\" value=\"{$row['qs']}\"><br>";
          echo "<a>a. </a><input type=\"text\" name=\"op1{$i}\" value=\"{$row['op1']}\"><br>";
          echo "<a>b. </a><input type=\"text\" name=\"op2{$i}\" value=\"{$row['op2']}\"><br>";
          echo "<a>c. </a><input type=\"text\" name=\"op3{$i}\" value=\"{$row['op3']}\"><br>";
          echo "<a>d. </a><input type=\"text\" name=\"answer{$i}\" value=\"{$row['answer']}\"><br><br>";
          $i++;
        }
        
        echo "</form><br><br>";
      }
    } else {
      echo "Error: " . mysqli_error($conn) . ".";
    }

    if (isset($_POST["update"])) {
      $qid = $_POST["qid"];

      for ($i = 1; $i <= $count; $i++) {
        $qs = $_POST["qs{$i}"];
        $op1 = $_POST["op1{$i}"];
        $op2 = $_POST["op2{$i}"];
        $op3 = $_POST["op3{$i}"];
        $answer = $_POST["answer{$i}"];

        
        $qs = mysqli_real_escape_string($conn, $qs);
        $op1 = mysqli_real_escape_string($conn, $op1);
        $op2 = mysqli_real_escape_string($conn, $op2);
        $op3 = mysqli_real_escape_string($conn, $op3);
        $answer = mysqli_real_escape_string($conn, $answer);

        $sql = "UPDATE questions SET qs='{$qs}', op1='{$op1}', op2='{$op2}', op3='{$op3}', answer='{$answer}' WHERE quizid={$qid}";
        $res = mysqli_query($conn, $sql);
        
      }
      
      header("Location: viewq.php?qid=" . $qid);
  }
}

  ?>
  </div>
  </section>



  <!--footer -->
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
