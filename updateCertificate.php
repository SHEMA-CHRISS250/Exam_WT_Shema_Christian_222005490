<?php
// Database connection parameters
// Include database connection file
require_once "db_connection.php";
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate inputs (you can add more validation if needed)
    $CertificateID = $_POST['CertificateID'];
    $UserID = $_POST['UserID'];
    $CourseID = $_POST['CourseID'];
    $DateOfCertificate = $_POST['DateOfCertificate'];
    $CertificateName = $_POST['CertificateName'];
    $IssuerName = $_POST['IssuerName'];

    // Update query
    $sql = "UPDATE certificate SET UserID='$UserID', CourseID='$CourseID', DateOfCertificate='$DateOfCertificate', CertificateName='$CertificateName',IssuerName='$IssuerName' WHERE CertificateID='$CertificateID'";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
         header("Location: viewCertificate.php");
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
 