<?php
require_once "db_connection.php";
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['CertificateID'])) {
    // Sanitize the input
    $CertificateID = $conn->real_escape_string($_POST['CertificateID']);

    // Delete query
    $sql = "DELETE FROM certificate WHERE CertificateID='$CertificateID'";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header("Location: viewCertificate.php");
    } else {
        echo "Error deleting record:" .$conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // If the form is not submitted via POST method or CertificateID is not set, redirect or show an error message
    echo "Invalid request.";
}
?>

