<?php
include "config.php";
session_start();

    $type1 = $_SESSION["type"];
    $username1 = $_SESSION["username"];
    $sql = "SELECT name FROM " . $type1 . " WHERE mail = '$username1'";
    $res = mysqli_query($conn, $sql);
    if ($res == true) {
        while ($row = mysqli_fetch_array($res)) {
            $dbname = $row['name'];
        }
    }
    //Add Quiz
    if (isset($_POST['submit'])) {
        $qname = strtolower($_POST['quizname']);
        $_SESSION["qname"] = $qname;
        $sql1 = "INSERT INTO quiz(quizname, mail, date_created) VALUES ('$qname', '$username1', NOW())";
        $res1 = mysqli_query($conn, $sql1);
        if ($res1 == true) {
            $sql = "SELECT quizid FROM quiz WHERE quizname = '$qname';";
            $res = mysqli_query($conn, $sql);
            if ($res == true) {
                header("location: addqs.php");
            } else {
                echo "<script>alert(\"Some error occurred\");</script>";
            }
        } else {
            echo "<script>alert(\"Quiz name already exists\");</script>";
        }
    }
    //Delete Quiz
    if (isset($_POST['submit1'])) {
        $qid1 = $_POST['quizid'];
        $sql1 = "DELETE FROM quiz WHERE quizid = '$qid1'";
        $res1 = mysqli_query($conn, $sql1);
        if ($res1 == true) {
            echo "<script>alert(\"Quiz successfully deleted\");</script>";
        } else {
            echo "<script>alert(\"Unknown error occurred during deletion of quiz\");</script>";
        }
    }
    //View Quiz
    if (isset($_POST['submit2'])) {
        $qid1 = $_POST['quizid'];
        $sql1 = "SELECT quizid FROM quiz WHERE quizid = '$qid1'";
        $res1 = mysqli_query($conn, $sql1);
        if ($res1 == true) {
            echo "<script>window.location.replace(\"viewq.php?qid=" . $qid1 . "\");</script>";
        } else {
            echo "<script>alert(\"Unknown error occurred during viewing of quiz\");</script>";
        }
    }
?>


<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/styleh.css">
  <link rel="stylesheet" type="text/css" href="css/homeexaminer.css">
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
<center>
        <section class ="welc">Welcome to <b>Examee.net</b>&nbsp;<?php echo $dbname ?></section>
    </center>
    
    <section class="dash">
        <center>
            <h1 style = font-size:2vw;>DASHBOARD</h1>
        </center>
        <!-- Buttons for actions -->
        <center> <button onclick="addquiz()">Add Quiz</button> <button onclick="delquiz()">Delete Quiz</button> <button onclick="viewq()">View Quiz</button></center>
        <!-- Add Quiz form -->
        <center>
            <section id="addq" style="display:none; ">
                <form style="width: 30vw" method="post">
                    <h1 style="color:#000;">Add quiz</h1>
                    <label for="quizname">Quiz name</label><br><br>
                    <input type="text" name="quizname" placeholder="Enter quiz name" required><br><br>
                    <input type="submit" name="submit" value="submit" class="addquiz">
                </form>
            </section>
        </center>
        <!-- Delete Quiz form -->
        <center>
            <section id="delq" style="display:none;">
                <form style="margin: 1vw;width: 30vw; color:#000" method="post">
                    <h1>Delete Quiz</h1>
                    <label for="quizid">Quiz Id</label><br><br>
                    <input type="number" name="quizid" placeholder="Enter quiz id" required><br><br>
                    <input type="submit" name="submit1" value="submit" class="delquiz">
                </form>
            </section>
        </center>
        <!-- View Quiz form -->
        <center>
            <section id="viewq" style="display:none;">
                <form style="margin: 1vw;width: 30vw; color:#000" method="post">
                    <h1>View Quiz</h1>
                    <label for="quizid">Quiz Id</label><br><br>
                    <input type="number" name="quizid" placeholder="Enter quiz id" required><br><br>
                    <input type="submit" name="submit2" value="submit" class="viewquiz">
                </form>
            </section>
        </center>
        
        
    </section>

    <br><br><br><br><br>

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







