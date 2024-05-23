<?php
// Include the database conn file
require_once 'db_connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $userID = mysqli_real_escape_string($conn, $_POST['UserID']);
    $courseID = mysqli_real_escape_string($conn, $_POST['CourseID']);
    $discussionTopic = mysqli_real_escape_string($conn, $_POST['DiscussionTopic']);
    $courseRelatedQuestions = mysqli_real_escape_string($conn, $_POST['CourseRelatedQuestions']);
    $replies = mysqli_real_escape_string($conn, $_POST['Replies']);

    // Attempt to insert the data into the database
    $sql = "INSERT INTO discussion (UserID, CourseID, DiscussionTopic, CourseRelatedQuestions, Replies) 
            VALUES ('$userID', '$courseID', '$discussionTopic', '$courseRelatedQuestions', '$replies')";

    if (mysqli_query($conn, $sql)) {
        echo "Discussion record added successfully.";
        header("Location: viewdiscussion.php");
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

    // Close conn
    mysqli_close($conn);
}
?>
