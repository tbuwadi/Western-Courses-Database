<?php
$query = "SELECT CourseNumber FROM WesternCourse";
$result = mysqli_query($connection,$query);
if (!$result) {
    die("databases query failed.");
}
while ($row = mysqli_fetch_assoc($result)) {
	echo "<option value='".$row["WesternCourse"]."'>".$row["WesternCourse"]."</option>";
}
mysqli_free_result($result);
?>
