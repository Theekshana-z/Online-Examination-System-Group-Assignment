<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "oesfe";


$conn = new mysqli($host, $user, $password, $db);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['quizid'], $_POST['amount'], $_POST['employeeid'])) {
        $quizid = $_POST['quizid'];
        $amount = $_POST['amount'];
        $employeeid = $_POST['employeeid'];

        
        $stmt = $conn->prepare("INSERT INTO payment (quizid, amount, employeeid) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $quizid, $amount, $employeeid);

        if ($stmt->execute()) {
            echo "Payment submitted successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    if (isset($_POST['delete'])) {
        $quizid = $_POST['quizid'];
        $amount = $_POST['amount'];
        $employeeid = $_POST['employeeid'];

        
        $deleteSql = "DELETE FROM payment WHERE quizid = ? AND amount = ? AND employeeid = ?";
        $stmt = $conn->prepare($deleteSql);

        if ($stmt) {
            
            $stmt->bind_param("sss", $quizid, $amount, $employeeid);

            if ($stmt->execute()) {
                echo "Payment details deleted successfully!";
            } else {
                echo "Error executing delete statement: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Error preparing delete statement: " . $conn->error;
        }
    }

    if (isset($_POST['updateSubmit'])) {
        $newquizid = $_POST['newquizid'];
        $newamount = $_POST['newamount'];
        $newemployeeid = $_POST['newemployeeid'];

        
        $updateSql = "UPDATE payment SET quizid = ?, amount = ? WHERE employeeid = ?";
        $stmt = $conn->prepare($updateSql);
        $stmt->bind_param("sss", $newquizid, $newamount, $newemployeeid);

        if ($stmt->execute()) {
            echo "Payment details updated successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }
    }
}
?>





<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/payment.css">
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
        <div>
          <li>
            <ul class="submenu">
              <li><a href="#">User Profile</a></li><br>
              <li><a href="#">Logout</a></li>
              </ul>
        </div>
        
      </ul>
    </nav>
    <div class="login-signup">
  <a href="index.php" class="signup">
    <button>Sign OUT</button>
  </a>
</div>

  </header>
 

	 <center>
    <h1>Payment Information</h1>
</center>

<div class="container">
    
    <div class="left-side">
	
		 <form action="payment.php" method="post"> 
		   

        Quiz ID:<br/>
        <input type="text" name="quizid" id="quizid" placeholder="Enter Quiz ID" required><br><br/>

        Amount:<br/>
        <input type="text" name="amount" id="amount" placeholder="Enter amount" required><br><br/>
		
		Employee ID:<br/>
        <input type="text" name="employeeid" id="employeeid" placeholder="Enter Payment ID" required><br><br/>     
	
		<div class="right-side">
        <button type="submit" name="submit" id="submit">submit</button>
		<button type="reset" name="cancle" id="submit">Cancle</button>
		
		</form>
    </div>
   
    </div>  
</div>

<center>
    <section>
        <?php
        $sql = "SELECT * FROM payment";
		 $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<h2>Your payment details:</h2>";
            while ($row = $result->fetch_assoc()) {
                echo "<p><strong> Quiz ID:</strong> " . $row['quizid'] . "</p>";
                echo "<p><strong>Amount:</strong> " . $row['amount'] . "</p>";
                echo "<p><strong>Employee ID:</strong> " . $row['employeeid'] . "</p>";
                echo "<form method='POST' action='payment.php'>";
                echo "<input type='hidden' name='quizid' value='" . $row['quizid'] . "'>";
                echo "<input type='hidden' name='amount' value='" . $row['amount'] . "'>";
                echo "<input type='hidden' name='employeeid' value='" . $row['employeeid'] . "'>";
                echo "<input type='submit' name='delete' value='Delete submit'>";
				echo"&nbsp";
                echo "<input type='submit' name='update' value='Update Submit'>";
                echo "</form>";

                if (isset($_POST['update']) && $_POST['employeeid'] == $row['employeeid'] && $_POST['quizid'] == $row['quizid']) {
                    echo "<form method='POST' action='Payemnt.php'>";
                    echo "<input type='hidden' name='employeeid' value='" . $row['employeeid'] . "'>";
                    echo "<input type='hidden' name='quizid' value='" . $row['quizid'] . "'>";
                    echo "<label class='label' for='newquizid'>New Quiz ID:</label>";
                    echo "<input type='text' id='newquizid' name='newquizid' value='" . $row['quizid'] . "' required><br><br>";
                    echo "<label class='label' for='newamount'>New amount:</label>";
                    echo "<textarea name='newamount'>".$row['amount'] ."</textarea>";
                    echo "<input type='submit' name='Update' value='update'>";
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
      <a href="contact.php">Contact Us</a>
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
