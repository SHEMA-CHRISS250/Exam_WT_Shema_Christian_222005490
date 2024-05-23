<?php
// Include the database conn file
require_once 'db_connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $userID = mysqli_real_escape_string($conn, $_POST['UserID']);
    $quizTitle = mysqli_real_escape_string($conn, $_POST['QuizTitle']);
    $question = mysqli_real_escape_string($conn, $_POST['Question']);
    $correctAnswers = mysqli_real_escape_string($conn, $_POST['CorrectAnswers']);
    $maximumScore = mysqli_real_escape_string($conn, $_POST['MaximumScore']);
    $passingScore = mysqli_real_escape_string($conn, $_POST['PassingScore']);

    // Attempt to insert the data into the database
    $sql = "INSERT INTO quiz (UserID, QuizTitle, Question, CorrectAnswers, MaximumScore, PassingScore) 
            VALUES ('$userID', '$quizTitle', '$question', '$correctAnswers', '$maximumScore', '$passingScore')";

    if (mysqli_query($conn, $sql)) {
        echo "Records added successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

    // Close conn
    mysqli_close($conn);
}
?>
