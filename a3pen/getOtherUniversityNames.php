<?php
$query = "SELECT OfficialName FROM OtherUniversity";
$result = mysqli_query($connection,$query);
if (!$result) {
    die("databases query failed.");
}
while ($row = mysqli_fetch_assoc($result)) {
	echo "<option value='".$row["OfficialName"]."'>".$row["OfficialName"]."</option>";
}
mysqli_free_result($result);
?>
