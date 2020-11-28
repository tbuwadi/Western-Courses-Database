<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>University Information</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
include 'connecttodb.php';
?>
<h1>Western Courses Database</h1>
<?php
   $whichCourse= $_POST["courseList"];
   $query = 'SELECT CourseName, CourseNumber, CourseWeight FROM WesternCourse WHERE CourseNumber="' . $whichCourse . '"';
   $query2 = 'SELECT OtherCourseName, OfficialName, CourseCode, DateApproved
   FROM OtherCourse, OtherUniversity, isEquivalentTo
   WHERE isEquivalentTo.WesternCourseNumber = "' . $whichCourse . '"  
   AND isEquivalentTo.OtherUniCourseCode = OtherCourse.CourseCode 
   AND isEquivalentTo.UniversityNum = OtherCourse.UniNum
   AND isEquivalentTo.UniversityNum = OtherUniversity.UniNumber;';
   
   $result=mysqli_query($connection,$query);
    if (!$result) {
         die("database query2 failed.");
    }
    echo("<h2>Western Course Information:</h2>");

    //Create table with information from the query
    echo("<table>");
    $first_row = true;
    while ($row = mysqli_fetch_assoc($result)) {
        if ($first_row) {
            $first_row = false;
            echo '<tr>';
            foreach($row as $key => $field) {
                echo '<th>' . htmlspecialchars($key) . '</th>';
            }
            echo '</tr>';
        }
        echo '<tr>';
        foreach($row as $key => $field) {
            echo '<td>' . htmlspecialchars($field) . '</td>';
        }
        echo '</tr>';
    }
    echo("</table>");
    mysqli_free_result($result);

    echo("<br><br>");
    $result2=mysqli_query($connection,$query2);
    if (!$result2) {
         die("database query2 failed.");
    }

    //Create table with information from the query
    echo("<h2>Equivalent Courses:</h2>");
    echo("<table>");
    $first_row = true;
    while ($row = mysqli_fetch_assoc($result2)) {
        if ($first_row) {
            $first_row = false;
            echo '<tr>';
            foreach($row as $key => $field) {
                echo '<th>' . htmlspecialchars($key) . '</th>';
            }
            echo '</tr>';
        }
        echo '<tr>';
        foreach($row as $key => $field) {
            echo '<td>' . htmlspecialchars($field) . '</td>';
        }
        echo '</tr>';
    }
    echo("</table>");
    mysqli_free_result($result2);

?>
<?php
   mysqli_close($connection);
?>
</body>
</html>