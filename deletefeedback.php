<?php
require_once "db_connection.php";
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['FeedID'])) {
    // Sanitize the input
    $FeedID = $conn->real_escape_string($_POST['FeedID']);

    // Delete query
    $sql = "DELETE FROM feedback WHERE FeedID='$FeedID'";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header("Location: viewfeedback.php");
    } else {
        echo "Error deleting record:" .$conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // If the form is not submitted via POST method or FeedID is not set, redirect or show an error message
    echo "Invalid request.";
}
?>

