<?php
// Include the database conn file
require_once 'db_connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $userID = mysqli_real_escape_string($conn, $_POST['UserID']);
    $courseID = mysqli_real_escape_string($conn, $_POST['CourseID']);
    $dateOfCertificate = mysqli_real_escape_string($conn, $_POST['DateOfCertificate']);
    $certificateName = mysqli_real_escape_string($conn, $_POST['CertificateName']);
    $issuerName = mysqli_real_escape_string($conn, $_POST['IssuerName']);

    // Attempt to insert the data into the database
    $sql = "INSERT INTO certificate (UserID, CourseID, DateOfCertificate, CertificateName, IssuerName) 
            VALUES ('$userID', '$courseID', '$dateOfCertificate', '$certificateName', '$issuerName')";

    if (mysqli_query($conn, $sql)) {
        echo "Certificate record added successfully.";

        
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

    // Close conn
    mysqli_close($conn);
}
?>
