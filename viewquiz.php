<?php
// Include the database connection file
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
    <title>quiz Management</title>
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
    <h2>quiz Management</h2>
    <!-- Display the table -->
    <table id="dataTable" class="table table-hover text-center">
        <tr>
            <th>Course ID</th>
            <th>UserID</th>
            <th>QuizTitle</th>
            <th>Question</th>
            <th>CorrectAnswers</th>
             <th>MaximumScore</th>
        <th> PassingScore</th>
            <th>TimeStamp</th>
            <th>Actions</th>
        </tr>
        <?php
        // Fetch data from the quiz table
        $sql = "SELECT * FROM quiz";
        $result = $conn->query($sql);

        // Output data of each row
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["QuizID"] . "</td>"; // Course ID
                echo "<td>" . $row["UserID"] . "</td>"; // UserID
                echo "<td>" . $row["QuizTitle"] . "</td>"; // QuizTitle
                echo "<td>" . $row["Question"] . "</td>"; // Question
                echo "<td>" . $row["CorrectAnswers"] . "</td>"; // CorrectAnswers
                echo "<td>" . $row["MaximumScore"] . "</td>"; // MaximumScore
                echo "<td>" . $row["PassingScore"] . "</td>"; // PassingScore
                echo "<td>" . $row["TimeStamp"] . "</td>"; // TimeStamp
                
                echo "<td>";
                // Edit and delete actions
              echo "<a href='updatequiz.html?id=" . $row["QuizID"] .  "'onclick='return confirm(\"Are you sure you want to update this Course?\")'><button class='button update-button'>Edit</button></a>";
                // Delete action
                echo "<a href='deletequiz.html?id=" . $row["QuizID"] . "'onclick='return confirm(\"Are you sure you want to delete this certificate?\")'><button class='button delete-button'>Delete</button></a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No data found</td></tr>";
        }

        $conn->close();
        ?>
    </table>
</body>
</html>
