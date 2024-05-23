<?php
require_once "db_connection.php";
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ResourceID'])) {
    // Sanitize the input
    $ResourceID = $conn->real_escape_string($_POST['ResourceID']);

    // Delete query
    $sql = "DELETE FROM mobile_app_development_resources WHERE ResourceID='$ResourceID'";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header("Location: viewmobile_app_development_resources.php");
    } else {
        echo "Error deleting record:" .$conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // If the form is not submitted via POST method or ResourceID is not set, redirect or show an error message
    echo "Invalid request.";
}
?>

