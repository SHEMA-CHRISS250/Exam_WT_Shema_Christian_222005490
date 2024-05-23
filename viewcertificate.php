<?php
require_once "db_connection.php";

// Display any alert messages
if (isset($_GET['msg'])) {
    $msg = htmlspecialchars($_GET['msg']); // Sanitize the message for security
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">' . $msg . '
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate Management</title>
    <link rel="stylesheet" type="text/css" href="css/tablestyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Certificate Management</h2>
    <br><br><br>
    <table class="table table-hover text-center">
        <tr>
            <th>CertificateID</th>
            <th>UserID</th>
            <th>CourseID</th>
            <th>DateOfCertificate</th>
            <th>CertificateName</th>
            <th>IssuerName</th>
            <th>Actions</th>
        </tr>
        <?php
        // Fetch data from the certificate table using prepared statements
        $stmt = $conn->prepare("SELECT * FROM certificate");
        $stmt->execute();
        $result = $stmt->get_result();

        // Output data of each row
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row["CertificateID"]) . "</td>"; // CertificateID
                echo "<td>" . htmlspecialchars($row["UserID"]) . "</td>"; // UserID 
                echo "<td>" . htmlspecialchars($row["CourseID"]) . "</td>"; // CourseID
                echo "<td>" . htmlspecialchars($row["DateOfCertificate"]) . "</td>"; // DateOfCertificate
                echo "<td>" . htmlspecialchars($row["CertificateName"]) . "</td>"; // CertificateName
                echo "<td>" . htmlspecialchars($row["IssuerName"]) . "</td>"; // IssuerName
                echo "<td>";
                // Update action
                echo "<a href='updatecertificate.html?id=" . urlencode($row["CertificateID"]) . "'><i class='fas fa-edit'></i></a> ";
                // Delete action
                echo "<a href='deletecertificate.html?id=" . urlencode($row["CertificateID"]) . "'><i class='fas fa-trash'></i></a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No data found</td></tr>";
        }

        $stmt->close();
        $conn->close();
        ?>
    </table>
</body>
</html>
