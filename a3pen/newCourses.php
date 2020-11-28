<?php
include 'connecttodb.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>University Information</title>
<style>
</style>
</head>
<body>
    Thanks.
</body>
</html>
<?php
   $newCode = $_POST["newCode"];
   $newName = $_POST["newName"];
   $newWeight = $_POST["newWeight"];
   $newSuffix = $_POST["newSuffix"];

   $regex = '/^cs\d{4}$/';
   //Check if the code is unique or not
    $seeUnique = mysqli_query($connection, 'SELECT CourseNumber FROM WesternCourse WHERE CourseNumber = "' . $newCode . '"');
    $matchFound = mysqli_num_rows($seeUnique) > 0 ? 'yes' : 'no';
    if($matchFound=='yes'){
        echo 'Already Exists in DB';
    }else{
        if (preg_match($regex, $newCode)) {
            if(($newCode!='') AND ($newName!='') AND ($newWeight!='')){
                $query = 'INSERT INTO WesternCourse
                VALUES ("'.$newCode.'", "'.$newName.'", "'.$newWeight.'", "'.$newSuffix.'")';
                $result=mysqli_query($connection,$query);
                if (!$result) {
                    die("Failed");
                }
            }else{
                echo 'Please fill all required fields.';
            }
        } else {
            echo 'Invalid Code, must follow format CSXXXX';
        }
    }
    
?>
<?php
   mysqli_close($connection);
?>
