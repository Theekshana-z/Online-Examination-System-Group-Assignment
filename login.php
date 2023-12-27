<?php 
session_start(); ?>
<?php
    // Include the configuration file
    include("config.php");

    if (isset($_POST['login'])) {
      if (isset($_POST['usertype']) && isset($_POST['username']) && isset($_POST['pass'])) {
          $conn = mysqli_connect('localhost', 'root', '', 'oesfe');
          if (!$conn) {
              echo "<script>alert(\"Database error retry after some time !\")</script>";
          }
          $type = mysqli_real_escape_string($conn, $_POST['usertype']);
          $username = mysqli_real_escape_string($conn, $_POST['username']);
          $password = mysqli_real_escape_string($conn, $_POST['pass']);
          $sql = "select * from " . $type . " where mail='{$username}'";
          $res =   mysqli_query($conn, $sql);
          if ($res == true) {
              global $dbmail, $dbpw;
              while ($row = mysqli_fetch_array($res)) {
                  $dbpw = $row['pw'];
                  $dbmail = $row['mail'];
                  $_SESSION["name"] = $row['name'];
                  $_SESSION["type"]=$type;
                  $_SESSION["username"]=$dbmail;
              }
              if ($dbpw === $password) {
                  if($type==='employee'){
                      header("location:homeemployee.php");
                  }elseif($type==='examiner'){
                      header("Location: homeexaminer.php");
                  }
              } elseif ($dbpw !== $password && $dbmail === $username) {
                  echo "<script>alert('password is wrong');</script>";
              } elseif ($dbpw !== $password && $dbmail !== $username) {
                  echo "<script>alert('username name not found sign up');</script>";
              }
          }
      }
  }



?>




<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/styleh.css">
  <link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
  <header>
    <a href="index.php"><div><img class = "logo" src = "images/Examee Logo.png" alt = "This is a logo" height = "50px" width = "225px"></div></a>
    <nav>
        
        </div>
        
      </ul>
    </nav>
    <div class="login-signup">
      <a href="login.php"><button class="login">Login</button></a>
      <a href="signup.php"><button class="signup">Sign up</button></a>
    </div>
  </header>
  <!-- Rest of the page content -->


  <div class="bg">
    <center>
        <h1 style=" color:#fff;text-transform: uppercase;width: auto;background:#000;padding: 1vw;">Examee.net Examination System</h1>
    </center>
    <br><br>
    <center>
        <div>
            <form class="form" method="POST">
                <div class="seluser">
                    <input type="radio" name="usertype" value="employee" required>EMPLOYEE
                    <input type="radio" name="usertype" value="examiner" required>EXAMINER
                </div><br><br>
                <div class="signin">

                    <label for="username" style="text-transform: uppercase;">Username</label><br><br>
                    <input type="email" name="username" placeholder=" Email" class="inp" required>
                    <br><br>
                    <label for="password" style="text-transform: uppercase;">Password</label><br><br>
                    <input type="password" name="pass" placeholder="********" class="inp" required>
                    <br><br>
                    <input name="login" class="sub" type="submit" value="Login"><br>

            </form><br>
           <div style="color:#000"> <a href="reset.php" style="color:#2385fc;">Forgot password?</a> &nbsp; New user! <a href="signup.php" style="color:#2385fc;">SIGN UP</a></div>
        </div>
</div>
</center>
</div>


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
