<?php
$servername = "localhost";
$username = "root"; // default for XAMPP
$password = ""; // default is blank
$dbname = "snackbar_accounts";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check if connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $pass = $_POST['password'];
    $contacts = $_POST['contacts'];
    $address = $_POST['address'];

    // Hash the password for security
    $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);

    // Insert data into table
    $sql = "INSERT INTO snackbar_accounts (fullname, password, contacts, address) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $user, $email, $hashedPassword);

    if ($stmt->execute()) {
        echo "<script>alert('Account created successfully!');</script>";
    } else {
        echo "<script>alert('Error: Could not create account.');</script>";
    }

    $stmt->close();
}

$conn->close();
?>