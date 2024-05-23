<?php
// Database connection parameters
// Include database connection file
require_once "db_connection.php";
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate inputs (you can add more validation if needed)
    $ResourceID = $_POST['ResourceID'];
    $ResourceType = $_POST['ResourceType'];
    $ResourceName = $_POST['ResourceName'];
    $Description = $_POST['Description'];
    $URL = $_POST['URL'];
    $CourseID = $_POST['CourseID'];
    // Update query
    $sql = "UPDATE mobile_app_development_resources SET ResourceType='$ResourceType', ResourceName='$ResourceName', Description='$Description', URL='$URL',CourseID='$CourseID' WHERE ResourceID='$ResourceID'";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
         header("Location: viewmobile_app_development_resources.php");
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
 