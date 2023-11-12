<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "project";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Clear data from tables
$sql_clear_max = "DELETE FROM max";
$sql_clear_store = "DELETE FROM store";
$sql_clear_total = "DELETE FROM total";

$conn->query($sql_clear_max);
$conn->query($sql_clear_store);
$conn->query($sql_clear_total);

$conn->close();

// Redirect to index.php
header("Location: index.php");
exit();
?>
