<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "oesfe";

$conn = mysqli_connect($host, $user, $password, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connection successful!";
}

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
        $dbusn = $row['usn'];
        $dbphno = $row['phno'];
        $dbgender = $row['gender'];
        $dbdob = $row['DOB'];
        $dbdept = $row['dept'];

    }
}

?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" type="text/css" href="css/employeeprofile.css">
<header>
    <div><img class = "logo" src = "images/Examee Logo.png" alt = "This is a logo" height = "50px" width = "225px"></div>
    <nav>
      <ul>
        <li><a href="homeemployee.php">Dashboard</a></li>
        <li><a href="employeeprofile.php">Profile</a>
        <li><a href="homeemployee.php">Examination</a></li>
        <li><a href="payment.php">Payemnt</a></li>
        <li><a href="viewscore.php">Score</a></li>
        <li><a href="feedback.php">Feedback Page</a></li>
        <li><a href="support.php">Support</a></li>
      </ul>
    </nav>
    <div class="login-signup">
  <a href="index.php" class="signup">
    <button>Sign OUT</button>
  </a>
</div>

  </header>
 
<body>
    <!-- Your HTML code here -->
    <br><br><br>
    <div class="profile-container">
        <center><h1>Update Profile Details</h1></center>
        <form method="post" action="submitupdateemployeeprofile.php">
            <label for="employeeid">Employee ID (Read-Only):</label>
            <input type="text" name="employeeid" value="<?php echo $dbusn; ?>" readonly><br><br>

            <label for="name">User Name:</label>
            <input type="text" name="name1" value="<?php echo $dbname; ?>"><br><br>

            <label for="mail">Email:</label>
            <input type="email" name="mail1" value="<?php echo $dbmail; ?>" required><br><br>

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
                $dept_query = "SELECT dept_name FROM dept";
                $dept_result = mysqli_query($conn, $dept_query);

                if ($dept_result && mysqli_num_rows($dept_result) > 0) {
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

            <input type="submit" name="delete_profile" value="Delete Profile" onclick="deleteProfile()">
            <br><br>

        </form>
    </div>


</body>
</html>

</script>
