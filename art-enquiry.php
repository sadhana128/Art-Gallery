<?php
// Database connection parameters
$servername = "localhost";  // Change this if your MySQL server is different
$username = "root";         // MySQL username
$password = "";             // MySQL password
$dbname = "art_gallery";    // Name of the database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input to prevent SQL injection
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mobnum = mysqli_real_escape_string($conn, $_POST['mobnum']);
    $amount = mysqli_real_escape_string($conn, $_POST['message']);

    // Insert data into database
    $sql = "INSERT INTO payments (fullname, email, mobnum, amount) 
            VALUES ('$fullname', '$email', '$mobnum', '$amount')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to a new page (bill) after successful submission
        header('Location: bill.php');
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
