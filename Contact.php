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

?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/contact.css">
</head>
<body>
<header>
    <a href="index.php"><div><img class = "logo" src = "images/Examee Logo.png" alt = "This is a logo" height = "50px" width = "225px"></div></a>
    <nav>
      <ul>
        
      </ul>
    </nav>
    <div class="login-signup">
  <a href="Home Page.php" class="signup">
    <button>Sign OUT</button>
  </a>
</div>

  </header>




<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="Contact.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="c-page">
        <h3><center>
            <h1>Welcome To Examee Assistance Page</h1>
            <p>If you have any questions or need assistance, please feel free to get in touch with us. We're here to help!</p>
            </center></h3>

            <img src="images/CONTACT US.png" height = "300px" width = "1200px">

        <section class="c-details">
            <div class="c-box">
                <div class="c-icon">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                </div>
                <div class="c-info">
                    <h3>Location</h3>
                    <p>No.123, Main Street,<br />Colombo-03.</p>
                </div>
            </div>

            <div class="c-box">
                <div class="c-icon">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                </div>
                <div class="c-info">
                    <h3>Telephone</h3>
                    <p>+947865674342<br />+94798674387</p>
                </div>
            </div>

            <div class="c-box">
                <div class="c-icon">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                </div>
                <div class="c-info">
                    <h3>Email</h3>
                    <a href="mailto:exameeNet@gmail.com">exameeNet@gmail.com</a>
                </div>
            </div>
        </section>

        <section class="c-form">
           
        </section>
    </div>

   <div class="c-map">
        <!-- Replace the following iframe code with your actual Google Maps embed code -->
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4047271.2999762455!2d78.46169489521603!3d7.851731513542368!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2593cf65a1e9d%3A0xe13da4b400e2d38c!2sSri%20Lanka!5e0!3m2!1sen!2slk!4v1652730033179!5m2!1sen!2slk"
            width="100%" height="400" style="border: 0" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
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





