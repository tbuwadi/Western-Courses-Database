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
   $time = strtotime($_POST['equivDate']);
   if ($time) {
        $new_date = date('Y-m-d', $time);
   } else {
        echo 'Invalid Date: ' . $_POST['equivDate'];
   }
   $query = 'SELECT WesternCourseNumber, OtherCourseName, OfficialName, CourseCode, DateApproved
   FROM OtherCourse, OtherUniversity, isEquivalentTo
   WHERE DateApproved <= "' . $new_date . '"
   AND isEquivalentTo.OtherUniCourseCode = OtherCourse.CourseCode 
   AND isEquivalentTo.UniversityNum = OtherCourse.UniNum
   AND isEquivalentTo.UniversityNum = OtherUniversity.UniNumber ORDER BY DateApproved DESC;';
   
   $result=mysqli_query($connection,$query);
    if (!$result) {
         die("database query2 failed.");
    }
    echo("<h2>Equivalencies on or before Selected Date:</h2>");
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

?>
<?php
   mysqli_close($connection);
?>
</body>
</html>