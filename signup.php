<?php
include "config.php";

if (isset($_POST['emplsu'])) {
    session_start();
    if (isset($_POST['name1']) && isset($_POST['usn1']) && isset($_POST['mail1']) && isset($_POST['phno1']) && isset($_POST['dept1']) && isset($_POST['dob1']) && isset($_POST['gender1']) && isset($_POST['password1']) && isset($_POST['cpassword1'])) {
    
        $name1 = mysqli_real_escape_string($conn, $_POST['name1']);
        $usn1 = mysqli_real_escape_string($conn, $_POST['usn1']);
        $mail1 = mysqli_real_escape_string($conn, $_POST['mail1']);
        $phno1 = mysqli_real_escape_string($conn, $_POST['phno1']);
        $dept1 = mysqli_real_escape_string($conn, $_POST['dept1']);
        $dob1 = mysqli_real_escape_string($conn, $_POST['dob1']);
        $gender1 = mysqli_real_escape_string($conn, $_POST['gender1']);
        $password1 = mysqli_real_escape_string($conn, $_POST['password1']);
        $cpassword1 = mysqli_real_escape_string($conn, $_POST['cpassword1']);
        if ($password1 == $cpassword1) {
            $sql = "insert into employee (usn,name,mail,phno,dept,gender,DOB,pw) values('$usn1','$name1','$mail1','$phno1','$dept1','$gender1','$dob1','$password1')";
            if (mysqli_query($conn, $sql)) {
                echo "<script>
                alert('successful!');
                window.location.replace(\"index.php\");</script>";
                session_destroy();
            } else {
                echo "<script>
                alert('Data enter by you alreay exist in Database please Sign In');
                window.location.replace(\"index.php\");</script>";
                session_destroy();
            }
        } else {
            echo "<script>
                alert(' Password should be same');
                window.location.replace(\"singup.php\");</script>";
            session_destroy();
        }
    }
}
?>




<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/styleh.css">
  <link rel="stylesheet" type="text/css" href="css/index.css">
  <link rel="stylesheet" type="text/css" href="css/signup.css">
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



    <div>
        <br><br><br>
        <div class="stud" id="stud">
            <center>

            <form name="employee" method="POST" style="width: 80vw; background-color: #fff; color: #000;">
                <h1 class="formname">Sign-Up as Employee</h1>

                <label for="name1">NAME</label>
                <input type="text" name="name1" required><br><br>

                <label for="usn">USN</label>
                <input type="text" name="usn1" required><br><br>

                <label for="mail1">Email</label>
                <input type="email" name="mail1" required><br><br>

                <label for="phno1">Ph No.</label>
                <input type="tel" name="phno1" required><br><br>

                <label for="dept1">Department</label>
                <select name="dept1" class="selc" required>
                    <?php
                    include "config.php";

                    // Query to fetch department names from the database
                    $sql = "SELECT dept_name FROM dept";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['dept_name'] . "'>" . $row['dept_name'] . "</option>";
                        }
                    }

                    $conn->close();
                    ?>
                </select><br><br>

                <label for="dob1">DOB</label>
                <input type="date" name="dob1" required><br><br>

                <label for="gender">Gender</label>
                <select id="gender" name="gender1" required>
                  <option value="M">Male</option>
                  <option value="F">Female</option>
                </select>

                <label for="password1">Password</label>
                <input type="password" name="password1" required><br><br>

                <label for="cpassword1">Confirm Password</label>
                <input type="password" name="cpassword1" required><br><br>

                <input type="submit" class="su" name="emplsu" value="Sign-Up as Employee">
            </form>


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