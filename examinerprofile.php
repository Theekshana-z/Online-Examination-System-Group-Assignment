<?php
include "config.php";
session_start();

$type1 = $_SESSION["type"];
$username1 = $_SESSION["username"];
$sql = "SELECT * FROM " . $type1 . " WHERE mail = '$username1'";
$res = mysqli_query($conn, $sql);
if($res == true){
    global $dbmail, $dbpw, $dbusn;
    while ($row = mysqli_fetch_array($res)){
        $dbmail = $row['mail'];
        $dbname = $row['name'];
        $dbusn = $row['examinerid'];
        $dbpw = $row['pw'];
        $dbphno = $row['phno'];
        $dbgender = $row['gender'];
        $dbdob = $row['DOB'];
        $dbdept = $row['dept'];

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styleh.css">
    <link rel="stylesheet" type="text/css" href="css/examinerprofile.css">
    <title>Examiner Profile</title>
</head>
<body>
<header>
    <div><img class = "logo" src = "images/Examee Logo.png" alt = "examee.net logo" height = "50px" width = "225px"></div>
    <nav>
      <ul>
        <li><a href = "homeexaminer.php">DASHBOARD</a></li>
        <li><a href = "examinerprofile.php">PROFILE</a></li>
        <li onclick="score()"><a>QUIZ</a></li>
        <li><a href = "index.php">SIGN OUT</a></li>
       </ul>
        
      </ul>
    </nav>
    
  </header>
<center>
        <section style="margin-top:4vw;font-size:3vw;color: #000;">Examiner&nbsp;<?php echo $dbname ?> Profile</section>
        <hr>
        
    </center>
<div class="profile-container">
    
    <center><h1>Update Profile Details</h1></center>
    <form method="post" action="submitupdateexaminerprofile.php">
    <label for="examinerid">Examiner ID (Read-Only):</label>
    <input type="text" name="examinerid" value="<?php echo $dbusn; ?>" readonly><br><br>

    <label for="name">Name:</label>
    <input type="text" name="name1" value="<?php echo $dbname; ?>"><br><br>

    <label for="mail">Email:</label>
    <input type="email" name="mail1" value="<?php echo $dbmail; ?>" required><br><br>
    
    <label for="pw">Password:</label>
    <input type="password" name="pw1" value="<?php echo $dbpw; ?>" required>
    <input type="checkbox" id="showPassword"><br><br>
    
    
    

    <label for="phno">Phone Number:</label>
    <input type="text" name="phno1" value="<?php echo $dbphno; ?>" required><br><br>

    <label for="gender">Gender:</label>
    <select name="gender1" required>
    <option value="M" <?php echo ($dbgender === 'M') ? 'selected' : ''; ?>>M</option>
    <option value="F" <?php echo ($dbgender === 'F') ? 'selected' : ''; ?>>F</option>
    </select><br><br>

    <label for="dob">Date of Birth:</label>
    <input type="date" name="dob1" value="<?php echo $dbdob; ?>" required><br><br>

    <label for="dept">Department:</label>
    <select name="dept1" required>
    <?php
        //Form department section dropdownmenu PHP
        // Fetch department names from the database
        $dept_query = "SELECT dept_name FROM dept";
        $dept_result = mysqli_query($conn, $dept_query);

        if (mysqli_num_rows($dept_result) > 0) {
        while ($dept_row = mysqli_fetch_assoc($dept_result)) {
            $dept_name = $dept_row['dept_name'];
            $selected = ($dept_name == $dbdept) ? "selected" : "";
            echo "<option value=\"$dept_name\" $selected>$dept_name</option>";
        }
    }

    ?>
    </select><br><br>

    <input type="submit" name="update_profile" value="Update Profile">
    <br><br>
</form>

</div>

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


<!--JS code for paasword showing-->
<script>
    const passwordInput = document.querySelector('input[name="pw1"]');
    const showPasswordCheckbox = document.getElementById('showPassword');

    showPasswordCheckbox.addEventListener('change', function() {
        if (this.checked) {
            passwordInput.type = 'text';
        } else {
            passwordInput.type = 'password';
        }
    });
</script>
