<?php
require_once "db_connection.php";

if (isset($_GET['query'])) {
    $searchTerm = $conn->real_escape_string($_GET['query']);
    $output = "";
    $queries = [
        'instructor' => "SELECT InstructorID, FirstName, LastName,Email, PhoneNumber FROM instructor WHERE InstructorID LIKE '%$searchTerm%'",
        'certificate' => "SELECT CertificateID,UserID, CourseID, DateOfCertificate, CertificateName, IssuerName FROM  certificate WHERE  CertificateID LIKE '%$searchTerm%'",
        'user' => "SELECT UserID ,FirstName, LastName, PhoneNumber,Email,Password FROM user WHERE UserID LIKE '%$searchTerm%'",
        'courses' => "SELECT CourseID, CourseName, Description, InstructorID FROM courses WHERE CourseID LIKE '%$searchTerm%'",
        'discussion' => "SELECT DiscID,UserID, CourseID, DiscussionTopic, CourseRelatedQuestions, Replies FROM discussion WHERE DiscID LIKE '%$searchTerm%'",
        'enrollment' => "SELECT EnrollmentID, UserID, CourseID,EnrollmentDate FROM enrollment WHERE EnrollmentID LIKE '%$searchTerm%'",
        'feedback' => "SELECT FeedID, UserID, CourseID, FeedbackContent, Rating,TimeStamp FROM feedback WHERE FeedID LIKE '%$searchTerm%'",
        'mobile_app_development_resources' => "SELECT ResourceID, ResourceType, ResourceName, Description, URL, CourseID FROM mobile_app_development_resources WHERE ResourceID LIKE '%$searchTerm%'",
        'progress' => "SELECT ProgresID, CourseID, CompletionStatus, PercentageOfCourse,TimeStamp FROM progress WHERE ProgresID LIKE '%$searchTerm%'",
        'quiz' => "SELECT QuizID, UserID, QuizTitle, Question, CorrectAnswers, MaximumScore, PassingScore,TimeStamp FROM quiz WHERE QuizID LIKE '%$searchTerm%'"];

 $output .= "<h2><u>Search Results:</u></h2>";

    foreach ($queries as $table => $sql) {
        $result = $conn->query($sql);
        $output .= "<h3>Table of $table:</h3>";
        
        if ($result) {
            if ($result->num_rows > 0) {
                $output .= "<table border='1'>";
                // Output table header
                $output .= "<tr>";
                $row = $result->fetch_assoc(); // Fetch first row to get column names
                foreach ($row as $key => $value) {
                    $output .= "<th>$key</th>";
                }
                $output .= "</tr>";
                
                // Output table data
                do {
                    $output .= "<tr>";
                    foreach ($row as $value) {
                        $output .= "<td>$value</td>";
                    }
                    $output .= "</tr>";
                } while ($row = $result->fetch_assoc());
                
                $output .= "</table>";
            } else {
                $output .= "<p>No results found in $table matching the search term: '$searchTerm'</p>";
            }
        } else {
            $output .= "<p>Error executing query: " . $conn->error . "</p>";
        }
    }

    echo $output;

    $conn->close();
} else {
    echo "<p>No search term was provided.</p>";
}
?>

