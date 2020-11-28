<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Western Courses</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
include 'connecttodb.php';
?>
<h1>Here are your courses:</h1>
<?php
   $whichOrderBy= $_POST["orderby"];
   $whichOrderIn= $_POST["orderin"];
   $query = 'SELECT * FROM WesternCourse ORDER BY ' . $whichOrderBy . ' ' . $whichOrderIn . '';
   $result=mysqli_query($connection,$query);
    if (!$result) {
         die("database query2 failed.");
    }
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