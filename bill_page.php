<?php
// Database connection details (same as art-enquiry.php)

// Fetch data from database
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM payments ORDER BY id DESC LIMIT 1"; // Assuming you want to display the latest entry
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Name: " . $row["fullname"]. "<br>";
        echo "Email: " . $row["email"]. "<br>";
        echo "Mobile Number: " . $row["mobnum"]. "<br>";
        echo "Amount: $" . $row["amount"]. "<br>";
        echo "Payment Date: " . $row["created_at"]. "<br>";
        // Add more fields as needed
    }
} else {
    echo "0 results";
}

$conn->close();
?>
