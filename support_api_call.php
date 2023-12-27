<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $dbHost = "localhost";
    $dbUser = "root";
    $dbPassword = "";
    $dbName = "oesfe";

    $conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the keys exist in the $_POST array
    $name = isset($_POST["name"]) ? $_POST["name"] : "";
    $phone = isset($_POST["Phone"]) ? $_POST["Phone"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $subject = isset($_POST["subject"]) ? $_POST["subject"] : "";
    $massage = isset($_POST["massage"]) ? $_POST["massage"] : "";

    $sql = "INSERT INTO support (name, phone, email, subject, massage) VALUES (?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $name, $phone, $email, $subject, $massage);

    if ($stmt->execute()) {
        echo "Support details submitted successfully!";
        header('location: support.php');
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request.";
}
?>
