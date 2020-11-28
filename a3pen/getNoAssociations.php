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
   $query = 'SELECT OfficialName, NickName
   FROM OtherUniversity
   WHERE UniNumber NOT IN (SELECT UniNum FROM OtherCourse)';
   
   $result=mysqli_query($connection,$query);
    if (!$result) {
         die("database query2 failed.");
    }
    echo("<h2>Courses in system with no associated courses:</h2>");
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