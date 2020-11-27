<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>University Information</title>
<style>
body{
    font-family: arial, sans-serif;
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>
<?php
include 'connecttodb.php';
?>
<h1>Here is the selected university information:</h1>
<?php
   $whichUniID= $_POST["uniList"];
   print $whichUniID;
   $query = 'SELECT * FROM OtherUniversity WHERE UniNumber=' . $whichUniID . '';
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