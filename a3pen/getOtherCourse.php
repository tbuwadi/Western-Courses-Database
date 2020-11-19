<?php
$query = "SELECT CourseCode FROM OtherCourse";
$result = mysqli_query($connection,$query);
if (!$result) {
    die("databases query failed.");
}
while ($row = mysqli_fetch_assoc($result)) {
	echo "<option value='".$row["CourseCode"]."'>".$row["CourseCode"]."</option>";
}
mysqli_free_result($result);
?>
