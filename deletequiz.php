<?php
require_once "db_connection.php";
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['QuizID'])) {
    // Sanitize the input
    $QuizID = $conn->real_escape_string($_POST['QuizID']);

    // Delete query
    $sql = "DELETE FROM quiz WHERE QuizID='$QuizID'";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header("Location: viewquiz.php");
    } else {
        echo "Error deleting record:" .$conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // If the form is not submitted via POST method or QuizID is not set, redirect or show an error message
    echo "Invalid request.";
}
?>

