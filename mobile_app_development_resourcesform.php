<?php
// Include the database conn file
require_once 'db_connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $resourceType = mysqli_real_escape_string($conn, $_POST['ResourceType']);
    $resourceName = mysqli_real_escape_string($conn, $_POST['ResourceName']);
    $description = mysqli_real_escape_string($conn, $_POST['Description']);
    $url = mysqli_real_escape_string($conn, $_POST['URL']);
    $courseID = mysqli_real_escape_string($conn, $_POST['CourseID']);

    // Attempt to insert the data into the database
    $sql = "INSERT INTO mobile_app_development_resources (ResourceType, ResourceName, Description, URL, CourseID) 
            VALUES ('$resourceType', '$resourceName', '$description', '$url', '$courseID')";

    if (mysqli_query($conn, $sql)) {
        echo "Mobile app development resource record added successfully.";
        header("Location: viewmobile_app_development_resources.php");
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

    // Close conn
    mysqli_close($conn);
}
?>
