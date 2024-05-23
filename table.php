<?php
require_once "db_connection.php";

// Display any alert messages
if(isset($_GET['msg'])){
    $msg = $_GET['msg'];
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
    <title>View Courses</title>
    <link rel="stylesheet" type="text/css" href="style3.css">
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
    <h2>View Courses</h2>
    <table>
        <tr>
            <th>Course ID</th>
            <th>Course Name</th>
            <th>Description</th>
            <th>Instructor ID</th>
            <th>Actions</th>
        </tr>
        <?php
        // Fetch data from the courses table
        $sql = "SELECT * FROM courses";
        $result = $conn->query($sql);

        // Output data of each row
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["CourseID"] . "</td>"; // CourseID
                echo "<td>" . $row["coursesName"] . "</td>"; // Course Name
                echo "<td>" . $row["Description"] . "</td>"; // Description
                echo "<td>" . $row["InstructorID"] . "</td>"; // Instructor ID
                echo "<td>";
                // Edit and delete actions
                echo "<a href='updateCourse.php?id=" . $row["CourseID"] . "'>Edit</a>";
                echo " | ";
                echo "<a href='deleteCourse.php?id=" . $row["CourseID"] . "'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No data found</td></tr>";
        }

        $conn->close();
        ?>
    </table>
</body>
</html>
