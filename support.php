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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $name = $_POST["name"];
    $phone = $_POST["Phone"]; 
    $email = $_POST["email"];
    $subject = $_POST["subject"]; 
    $massage = $_POST["massage"];

}
?>


<!DOCTYPE html>
<html>
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
  <a href="index.php" class="signup">
    <script src="js\support.js"></script>   
    <button>Sign OUT</button>
  </a>
</div>

  </header>
<title>Examee.NET | Support</title>
<link rel = "stylesheet" href = "css/support.css">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
<h1 class="title"> <center> Support </h1></center>
    <h2 class="para"> <center>Welcome to our Examee.NET Support page!</center>
        <br><br>
        <p><center> If you have any questions or need support, please feel free to get in touch with us. We are here to help!
        </p></center>
    </h2>

    <div class="inputbox">
        <form id="user-box" method="post" action="support_api_call.php"> 
            <label for="Name">Name:</label>
            <input type="text" id="name" name="name" required><br><br>

            <label for="Phone">Phone:</label>
            <input type="text" id="Phone" name="Phone" required><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="subject">Subject:</label>
            <input type="text" id="subject" name="subject" required><br><br>

            <label for="massage">Massage:</label>
            <textarea id="massage" name="massage" rows="10" style="width: 600px" required></textarea><br><br>

            <center>
                <input type="submit" value="Submit">
                <input type="reset" value="Clear All">
            </center>
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
</body>
</html>                                   