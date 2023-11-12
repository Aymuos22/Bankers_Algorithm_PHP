<?php
error_reporting(E_ERROR | E_PARSE);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project"; // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from the form
$total1 = $_POST["total1"];
$total2 = $_POST["total2"];
$total3 = $_POST["total3"];

// Insert data into the database
$sql = "INSERT INTO total (total1, total2, total3) VALUES ('$total1', '$total2', '$total3')";

if ($conn->query($sql) === TRUE) {
    // Redirect to a success page
    header("Location: page1.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
