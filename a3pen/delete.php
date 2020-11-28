<?php
include 'connecttodb.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>University Information</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
</body>
</html>
<?php

   //Delete a course
   $westernCourse = $_POST["courseCode"];
    $query = 'DELETE FROM WesternCourse WHERE CourseNumber="' . $westernCourse . '"';
    $result=mysqli_query($connection,$query);
    if (!$result) {
        die("Failed");
    }
    echo("<h2>Deleted.</h2>");
?>
<?php
   mysqli_close($connection);
?>
