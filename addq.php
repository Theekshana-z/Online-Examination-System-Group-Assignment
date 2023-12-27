<?php
session_start();
include "config.php";

    $type1 = $_SESSION["type"];
    $username1 = $_SESSION["username"];

    $qid=$_GET["qid"];
    if (isset($_POST['submit'])) {
        $qs = $_POST["qs"];
        $op1 = $_POST["op1"];
        $op2 = $_POST["op2"];
        $op3 = $_POST["op3"];
        $ans = $_POST["ans"];
        $sql = "insert into questions(qs,op1,op2,op3,answer,quizid) values('$qs','$op1','$op2','$op3','$ans','$qid');";
        $res =   mysqli_query($conn, $sql);
        if ($res == true) {
            echo '<script>history.pushState({}, "", "");</script>';
        } elseif ($res != true) {
            echo '<script>alert("Question already exsits");</script>';
        }
    }
    if (isset($_POST['submit1'])) {
        $qs = $_POST["qs"];
        $op1 = $_POST["op1"];
        $op2 = $_POST["op2"];
        $op3 = $_POST["op3"];
        $ans = $_POST["ans"];
        $sql = "insert into questions(qs,op1,op2,op3,answer,quizid) values('$qs','$op1','$op2','$op3','$ans','$qid');";
        $res =   mysqli_query($conn, $sql);
        if ($res == true) {
            header("Location: homeexaminer.php");
        } elseif ($res != true) {
            echo '<script>alert("Question already exsits");</script>';
        }
    }
?>


<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/styleh.css">
  <link rel="stylesheet" type="text/css" href="css/addq.css">
  <script src="js/homeexaminer.js"></script>
</head>
<body>
  <header>
    <div><img class = "logo" src = "images/Examee Logo.png" alt = "Examee.net logo" height = "50px" width = "225px"></div>
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

  <section class="dash" style="margin-top:3vw">
            <section id="ans">
                <center>
                    <form style="margin: 0vw;width: 100vw" method="post">

                        <label for="quizname">Add Questions</label><br><br>
                        <div id="QS">
                            <label for="qs">Question</label>
                            <input type="text" name="qs" placeholder="enter question " required><br><br>
                            <label for="op1">Option 1</label>
                            <input type="text" name="op1" placeholder="option1" required><br><br>
                            <label for="op2">Option 2</label>
                            <input type="text" name="op2" placeholder="option2" required><br><br>
                            <label for="op3">Option 3</label>
                            <input type="text" name="op3" placeholder="option3" required><br><br>
                            <label for="ans">Answer &nbsp;</label>
                            <input type="text" name="ans" placeholder="answer" required><br><br>
                        </div>
                        <input type="submit" name="submit" value="add 1 more question" >
                        <input type="submit" name="submit1" value="Done">
                    </form>
                </center>
            </section>
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
