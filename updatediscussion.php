<?php
// Database connection parameters
// Include database connection file
require_once "db_connection.php";
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate inputs (you can add more validation if needed)
    $DiscID = $_POST['DiscID'];
    $UserID = $_POST['UserID'];
    $CourseID = $_POST['CourseID'];
    $DiscussionTopic = $_POST['DiscussionTopic'];
    $CourseRelatedQuestions = $_POST['CourseRelatedQuestions'];
    $Replies = $_POST['Replies'];

    // Update query
    $sql = "UPDATE discussion SET UserID='$UserID', CourseID='$CourseID', DiscussionTopic='$DiscussionTopic', CourseRelatedQuestions='$CourseRelatedQuestions',Replies='$Replies' WHERE DiscID='$DiscID'";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
         header("Location: viewdiscussion.php");
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
 