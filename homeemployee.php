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
        <li><a href="homeemployee.php">Examination</a></li>
        <li><a href="payment.php">Payment</a></li>
        <li><a href="viewscore.php">Score</a></li>
        <li><a href="feedback.php">Feedback Page</a></li>
        <li><a href="support.php">Support</a></li>
        
      </ul>
    </nav>
    <div class="login-signup">
    <a href="index.php" class="signup"><button id="signOutButton">Sign OUT</button></a>
    </div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    
    const signOutButton = document.getElementById('signOutButton');

   
    signOutButton.addEventListener('click', function() {
        
        alert("Thank you for using Examee.net! See you soon...");
    });
});
</script>

  </header>
  <?php
        $type1 = $_SESSION["type"];
        $username1 = $_SESSION["username"];
        $sql = "select name from " . $type1 . " where mail='{$username1}'";
        $res =   mysqli_query($conn, $sql);
        if ($res == true) {
            global $dbmail, $dbpw;
            while ($row = mysqli_fetch_array($res)) {
                $dbname = $row['name'];
                
            }
        }
        ?>

<center><section class = "welmsg"><h2>Welcome to Examee.net&nbsp;<?php echo $dbname ?></h2></section></center>


<br><br><br>
<section style="color:#2385fc !important">
        <?php 
            $sql ="select * from quiz";
            $res=mysqli_query($conn,$sql);
            if($res)
            {
                
                echo "<center><table><thead><tr><td>Quiz Title</td><td>Created on</td><td>Created By</td><td>  </td></tr></thead>";
                while ($row = mysqli_fetch_assoc($res)) {                
                    echo "<tr><td>".$row["quizname"]."</td><td>".$row["date_created"]."</td><td>".$row["mail"]."</td><td><a id=\"tq\" href='takeq.php?qid=".$row['quizid']."'>Take Quiz</button></tr>"; 
                }
                echo "</table></center>";
            }
            ?>
        </section>
 



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
