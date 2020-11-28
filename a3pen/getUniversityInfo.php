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
   $whichUniID= $_POST["uniList"];
   $query = 'SELECT OfficialName, City, ProvinceCode, NickName FROM OtherUniversity WHERE UniNumber=' . $whichUniID . '';
   $query2 = 'SELECT CourseCode, OtherCourseName, TaughtToYear, OtherCourseWeight FROM OtherCourse WHERE UniNum=' . $whichUniID . '';

   $result=mysqli_query($connection,$query);
    if (!$result) {
         die("database query2 failed.");
    }
    echo("<h2>Selected University Courses</h2>");
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
    echo("<h2>This University's Courses:</h2>");
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