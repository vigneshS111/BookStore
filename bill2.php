<?php
$servername = "localhost";
$username = "root";
$password = "2004";
$dbname = "bookStore";
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check the connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$name = $_POST['cname'];
$email = $_POST['cmail'];
$id = $_POST['cid'];
$phone = $_POST['cphone'];
$total = $_POST['total'];
$gst = $_POST['gst'];
$grant_total = $_POST['grant_total'];
$mop = $_POST['mop'];

$sql = "INSERT INTO CUSTOMER VALUES ('$id', '$name', '$phone', '$email')";
if (mysqli_query($conn, $sql)) {
  // Return the customer details as a JSON response
  $response = array('customer_id' => $id, 'customer_name' => $name, 'phone_no' => $phone, 'Email' => $email);
  echo json_encode($response);
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$sql2 = "INSERT INTO PURCHASE_INFO VALUES ('$id', '$gst', '$total', '$mop', '$grant_total')";
if (mysqli_query($conn, $sql2)) {
  echo 'success';

} else {
  echo 'failure';
}
// Close the database connection
mysqli_close($conn);
?>