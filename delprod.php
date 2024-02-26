<?php
$servername = "localhost";
$username = "root";
$p = "2004";
$dbname = "bookStore";

$conn = new mysqli($servername, $username, $p, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$pid = $_POST['PID'];
$sql2 = "select * from PRODUCT_INFO where PRODUCT_ID= $pid";
$result2 = $conn->query($sql2);
if ($result2->num_rows == 0) {
  echo '<script>alert("No Product Id found");</script>';

} else {
  $sql = "delete from PRODUCT_INFO where PRODUCT_ID='$pid'";
  if (mysqli_query($conn, $sql)) {
    echo '<script>alert("Product Deleted");</script>';

  } else {
    echo '<script>alert("Error");</script>';
  }
}
$conn->close();
?>