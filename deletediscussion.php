<?php
require_once "db_connection.php";
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['DiscID'])) {
    // Sanitize the input
    $DiscID = $conn->real_escape_string($_POST['DiscID']);

    // Delete query
    $sql = "DELETE FROM discussion WHERE DiscID='$DiscID'";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header("Location: viewdiscussion.php");
    } else {
        echo "Error deleting record:" .$conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // If the form is not submitted via POST method or DiscID is not set, redirect or show an error message
    echo "Invalid request.";
}
?>

