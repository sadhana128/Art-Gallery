<?php
// Database connection parameters (same as art-enquiry.php)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "art_gallery";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming you want to display the last inserted payment details (you can modify as per your requirement)
$sql = "SELECT * FROM payments ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);
echo '<link rel="stylesheet" type="text/css" href="styles24.css">'; // Include the CSS file

echo '<div class="container">';

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Display the details in a structured format
    echo "<h2>Payment Details</h2>";
    echo "<p><strong>Name:</strong> " . $row['fullname'] . "</p>";
    echo "<p><strong>Email:</strong> " . $row['email'] . "</p>";
    echo "<p><strong>Mobile Number:</strong> " . $row['mobnum'] . "</p>";
    echo "<p><strong>Amount:</strong> $" . $row['amount'] . "</p>";
    echo "<p><strong>Payment Date:</strong> " . $row['payment_date'] . "</p>";
} else {
    echo "No payment details found.";
}

// Close connection
$conn->close();
?>
