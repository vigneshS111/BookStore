<?php
$product_id = $_GET['q'];
// Database configuration
$host = "localhost";
$username = "root";
$password = "2004";
$dbname = "bookStore";

// Establishing database connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT PRODUCT_NAME, PRICE FROM PRODUCT_INFO WHERE PRODUCT_ID = '$product_id'";

// Execute the query and get the result set
$result = $conn->query($sql);

// Check if any rows were returned
if ($result->num_rows > 0) {
  // Fetch the row data as an associative array
  $row = $result->fetch_assoc();

  // Send the response as a JSON object
  echo json_encode($row);
} else {
  // Send an error response if no rows were returned
  echo "Product not found";
}

$conn->close();

?>