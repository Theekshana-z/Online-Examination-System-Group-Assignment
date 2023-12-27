<?php
include "config.php";
session_start();

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
        

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        $employeeid = $_POST['employeeID'];
        $fb_name = $_POST['fb_name'];
        $feedback = $_POST['feedback'];

        $sql = "INSERT INTO feedback (employeeid, fb_name, feedback) VALUES (?, ?, ?)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $employeeid, $fb_name, $feedback);

        if ($stmt->execute()) {
            echo "Feedback submitted successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    if (isset($_POST['delete'])) {
        $employeeid = $_POST['employeeid'];
        $fb_name = $_POST['fb_name'];
        $feedback = $_POST['feedback'];

        $deleteSql = "DELETE FROM feedback WHERE employeeid = ? AND fb_name = ? AND feedback = ?";
        $stmt = $conn->prepare($deleteSql);

        if ($stmt) {
            $stmt->bind_param("sss", $employeeid, $fb_name, $feedback);

            if ($stmt->execute()) {
                echo "Feedback entry deleted successfully!";
            } else {
                echo "Error executing delete statement: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Error preparing delete statement: " . $conn->error;
        }
    }
    
    if (isset($_POST['updateSubmit'])) {
        $newEmployeeid = $_POST['employeeid'];
        $newFb_name = $_POST['newFb_name']; 
        $newFeedback = $_POST['newFeedback'];

        $updateSql = "UPDATE feedback SET fb_name = ?, feedback = ? WHERE employeeid = ?";
        $stmt = $conn->prepare($updateSql);
        $stmt->bind_param("sss", $newFb_name, $newFeedback, $newEmployeeid);

        if ($stmt->execute()) {
            echo "Feedback entry updated successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/feedback.css">
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
        <li><a href="support.php">Support</a></li>
  
        
      </ul>
    </nav>
    <div class="login-signup">
  <a href="your_link_here" class="signup">
    <button>Sign OUT</button>
  </a>
</div>

  </header><br>
 

  <main>
        <div class="content">
            <center>
                <h1 class="h1">Feedback Page</h1><br>
                <div class="rectangle" ><br/><br/>
                    <h1 class="rectangle h1">Feedback Form</h1><br/>
                    <p>We value your feedback. Please fill out the form below:</p><br/><br/>
                    <form class="form" action="feedback.php" method="POST">
                        <label class="label" for="employeeID">Employee ID:</label>
                        <input type="text" id="employeeID" name="employeeID" placeholder="Type your employee ID" required><br><br>
                        <label class="label" for="fb_name">What About:</label>
                        <input type="text" id="fb_name" name="fb_name" required><br><br><br>
                        <label class="label" for="feedback">Feedback:</label>
                        <textarea id="feedback" name="feedback" placeholder="Type your feedback here" rows="20" cols="60" required></textarea><br><br>
                        <input type="submit" name="submit" value="Submit">
                        <input type="reset" name="cancel" value="Cancel">
                    </form>
                </div>
            </center>
        </div>
    </main><br><br>

<center>
    <section>
        <?php
        $sql = "SELECT * FROM feedback";
        $result = $conn->query($sql);
        

        if ($result->num_rows > 0) {
            echo "<h2>Your Feedbacks:</h2>";
            while ($row = $result->fetch_assoc()) {
                echo "<p><strong>Employee ID:</strong> " . $row['employeeid'] . "</p>";
                echo "<p><strong>What About:</strong> " . $row['fb_name'] . "</p>";
                echo "<p><strong>Feedback:</strong> " . $row['feedback'] . "</p>";
                echo "<form method='POST' action='feedback.php'>";
                echo "<input type='hidden' name='employeeid' value='" . $row['employeeid'] . "'>";
                echo "<input type='hidden' name='fb_name' value='" . $row['fb_name'] . "'>";
                echo "<input type='hidden' name='feedback' value='" . $row['feedback'] . "'>";
                echo "<input type='submit' name='delete' value='Delete'>";echo"&nbsp";
                echo "<input type='submit' name='update' value='Edit'>";
                echo "</form>";

                if (isset($_POST['update']) && $_POST['employeeid'] == $row['employeeid'] && $_POST['fb_name'] == $row['fb_name']) {
                    echo "<form method='POST' action='feedback.php'>";
                    echo "<input type='hidden' name='employeeid' value='" . $row['employeeid'] . "'>";
                    echo "<input type='hidden' name='fb_name' value='" . $row['fb_name'] . "'>";
                    echo "<label class='label' for='newFb_name'>Updated What About:</label>";
                    echo "<input type='text' id='newFb_name' name='newFb_name' value='" . $row['fb_name'] . "' required><br><br>";
                    echo "<label class='label' for='feedback'>Updated feedback:</label>";
                    echo "<textarea name='newFeedback'>" . $row['feedback'] . "</textarea>";
                    echo "<input type='submit' name='updateSubmit' value='Update'>";
                    echo "</form>";
                }
                echo "<hr>";
            }
        }
        ?>
    </section>
    </center>
    


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
