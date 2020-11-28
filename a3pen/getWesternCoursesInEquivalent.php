<?php
$query = "SELECT DISTINCT WesternCourseNumber FROM isEquivalentTo";
$result = mysqli_query($connection,$query);
if (!$result) {
    die("databases query failed.");
}
while ($row = mysqli_fetch_assoc($result)) {
	echo "<option value='".$row["WesternCourseNumber"]."'>".$row["WesternCourseNumber"]."</option>";
}
mysqli_free_result($result);
?>
