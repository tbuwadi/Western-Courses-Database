<?php
include 'connecttodb.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>University Information</title>
<style>
</style>
</head>
<body>
    Deleted.
</body>
</html>
<?php
   $westernCourse = $_POST["courseCode"];
    $query = 'DELETE FROM WesternCourse WHERE CourseNumber="' . $westernCourse . '"';
    $result=mysqli_query($connection,$query);
    if (!$result) {
        die("Failed");
    }
    
?>
<?php
   mysqli_close($connection);
?>
