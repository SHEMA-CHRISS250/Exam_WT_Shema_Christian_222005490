<?php
// Connect to database (replace dbname, username, password with actual credentials)
require_once "db_connection.php";


$email = $_POST['Email'];
$password = $_POST['Password'];

$sql = "SELECT *FROM user WHERE Email='$email' AND Password='$password'";
$result =$conn->query($sql);
if ($result->num_rows >0) {
  // echo "successfully loggedin!";
  header("Location: Dashboard.html");
      exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
