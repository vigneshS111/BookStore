<?php
$q = $_GET['q'];
$conn = new mysqli('localhost', 'root', '2004', 'bookStore');
$sql = "SELECT * FROM PRODUCT_INFO WHERE PRODUCT_NAME LIKE '%$q%'";
$result = $conn->query($sql);
$results = array();
while ($row = $result->fetch_assoc()) {
  $results[] = array('value' => $row['PRODUCT_NAME']);
}
echo json_encode($results);
?>