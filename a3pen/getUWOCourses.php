<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Western Courses</title>
</head>
<body>
<?php
include 'connectdb.php';
?>
<h1>Here are your courses:</h1>
<ol>
<?php
   $whichOrderBy= $_POST["orderby"];
   $whichOrderIn= $_POST["orderin"];
   $query = 'SELECT * FROM WesternCourse ORDER BY "' . $whichOrderBy . '""' . $whichOrderIn . '"';
   $result=mysqli_query($connection,$query);
    if (!$result) {
         die("database query2 failed.");
     }
    while ($row=mysqli_fetch_assoc($result)) {
        echo '<li>';
        echo $row["CourseName"];
     }
     mysqli_free_result($result);
?>
</ol>
<?php
   mysqli_close($connection);
?>
</body>
</html>