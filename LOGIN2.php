<?php
session_start();

$servername = "localhost";
$username = "root";
$p = "2004";
$dbname = "bookStore";

$conn = new mysqli($servername, $username, $p, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['username'];
  $pass = $_POST['password'];

  $sql = "SELECT * FROM OWNER WHERE USERNAME='$name' AND PASSWORD='$pass';";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $_SESSION['user'] = $name;
    header("Location: mod2.html");
    exit();
  } else {
    echo '<script>
            window.location.href="LOGIN2.php";
            alert("INVALID USERNAME OR PASSWORD");
            </script>';
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INVOICE MANAGEMENT</title>
    <link rel="stylesheet" href="LOGINSTYLE.css">
    <style>
        label {
            font-size: large;
            font-weight: bold;
        }
    </style>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body>
    <div class="login-box">
        <h2 style="font-size: 28px;">Login</h2>

        <form action="./LOGIN2.php" method="post" autocomplete="on">
            <div style="padding: 0px 20px;">
                <span>
                    <i class='fas fa-user-circle' style='font-size:36px'></i>
                </span>
                <label style="font-size: 25px;" for="username">Username:</label>
                <input class='v' type="text" id="username" name="username" required>
            </div>
            <div style="padding: 0px 20px;">
                <span>
                    <i id="uwu" class='fas fa-eye-slash' style='font-size:36px'></i>
                </span>
                <label style="font-size: 22px;" for="password">Password:</label>
                <input class='v' type="password" id="password" name="password" required>
            </div>
            <div style="font-size: 22px;padding-bottom: 20px;">
                <input type="checkbox" onclick="fn()">Show Password
            </div>
            <div style="padding-top: 20px;">
                <button style="color:white ;padding: 7px 10px; background-color: chocolate;font-size: 20px;border-radius: 10px;"> submit </button>
            </div>
        </form>
        <div id="now"></div>
    </div>

    <script>
        function fn() {
            var x = document.getElementById("password");
            if (x.type == 'password') {
                x.type = "text";
                document.getElementById("uwu").classList = "fas fa-eye";
            } else
                x.type = "password";
        }
    </script>
</body>
</html>
