<?php
$servername = "localhost";
$username = "root";
$p = "vvvvv";
$dbname = "MADARA";

$conn = new mysqli($servername, $username, $p, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$pid=$_GET['data'];

$sql2= "select * from PRODUCT_INFO where PRODUCT_ID= $pid";
$result2 = $conn->query($sql2);
if($result2->num_rows > 0)
{
    echo '1';
}
else
   echo '0';
$conn->close();
?>