<?php
// Database connection parameters
// Include database connection file
require_once "db_connection.php";
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate inputs (you can add more validation if needed)
    $FeedID = $_POST['FeedID'];
    $UserID = $_POST['UserID'];
    $QuizTitle = $_POST['QuizTitle'];
    $Question = $_POST['Question'];
    $CorrectAnswers = $_POST['CorrectAnswers'];
    $MaximumScore = $_POST['MaximumScore'];
    $PassingScore = $_POST['PassingScore'];

    // Update query
    $sql = "UPDATE quiz SET UserID='$UserID', QuizTitle='$QuizTitle', Question='$Question', CorrectAnswers='$CorrectAnswers' WHERE FeedID='$FeedID',MaximumScore='$MaximumScore',PassingScore='$PassingScore'";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
         header("Location: viewquiz.php");
    } else {
        echo "Error updating record: " .$conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // If the form is not submitted via POST method, redirect or show an error message
    echo "Form submission method not allowed.";
}
?>
 