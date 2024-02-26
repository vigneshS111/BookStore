<?php
$servername = "localhost";
$username = "root";
$p = "2004";
$dbname = "bookStore";

$conn = new mysqli($servername, $username, $p, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$q = $_GET['q'];
$sql1 = "select CUSTOMER_NAME,PHONE,GMAIL_ID from CUSTOMER where CUSTOMER_ID='$q';";
$sql2 = "select TOTAL_AMOUNT,MODE_OF_PAYMENT from PURCHASE_INFO where PURCHASE_ID='$q';";

$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
  $row1 = $result1->fetch_assoc();
}


$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
  $row2 = $result2->fetch_assoc();
}

$row3 = array_merge($row1, $row2);
echo json_encode($row3);

$conn->close();
?>