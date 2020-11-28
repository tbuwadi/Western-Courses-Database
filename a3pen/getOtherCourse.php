<?php
$query = "SELECT CourseCode FROM OtherCourse";
$query = "SELECT CourseCode, NickName, UniNum
FROM OtherCourse
INNER JOIN OtherUniversity
ON OtherCourse.UniNum = OtherUniversity.UniNumber";

$result = mysqli_query($connection,$query);
if (!$result) {
    die("databases query failed.");
}
while ($row = mysqli_fetch_assoc($result)) {
	echo "<option value='".$row["CourseCode"]."-".$row["UniNum"]."'>".$row["CourseCode"]." - ".$row["NickName"]."</option>";
}
mysqli_free_result($result);
?>
