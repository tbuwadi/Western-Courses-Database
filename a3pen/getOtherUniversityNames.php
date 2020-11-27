<?php
$query = "SELECT OfficialName FROM OtherUniversity ORDER BY ProvinceCode";
$result = mysqli_query($connection,$query);
if (!$result) {
    die("databases query failed.");
}
while ($row = mysqli_fetch_assoc($result)) {
	echo "<option value='".$row["UniNumber"]."'>".$row["OfficialName"]."</option>";
}
mysqli_free_result($result);
?>
