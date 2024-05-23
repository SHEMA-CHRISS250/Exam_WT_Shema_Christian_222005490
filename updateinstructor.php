<?php
// Database connection parameters
// Include database connection file
require_once "db_connection.php";
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate inputs (you can add more validation if needed)
    $InstructorID = $_POST['InstructorID'];
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $Email = $_POST['Email'];
    $PhoneNumber = $_POST['PhoneNumber'];

    // Update query
    $sql = "UPDATE instructor SET FirstName='$FirstName', LastName='$LastName', Email='$Email', PhoneNumber='$PhoneNumber' WHERE InstructorID='$InstructorID'";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
         header("Location: viewinstructor.php");
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
 