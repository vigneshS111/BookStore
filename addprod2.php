<?php
$servername = "localhost";
$username = "root";
$p = "2004";
$dbname = "bookStore";

$conn = new mysqli($servername, $username, $p, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$pid = $_POST['PRODUCT_ID1'];
$pname = $_POST['PRODUCT_NAME1'];
$pprice = $_POST['PRICE1'];
$pqty = $_POST['QUANTITY1'];
$sql2 = "select * from PRODUCT_INFO where PRODUCT_ID= $pid";
$result2 = $conn->query($sql2);
if ($result2->num_rows > 0) {
  echo '<script>alert("Product Id must be unique");</script>';
  echo '<script>
    window.location.href="modprod2.html";
    </script>';
}
$sql = "INSERT INTO PRODUCT_INFO VALUES ('$pid', '$pname', '$pqty', '$pprice');";
if (mysqli_query($conn, $sql)) {
  echo '<script>alert("Product Added");</script>';
  echo '<script>
    window.location.href="modprod2.html";
    </script>';

}




$conn->close();
?>