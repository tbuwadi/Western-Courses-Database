<?php
include 'connecttodb.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>University Information</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
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

    //If code is not unique let user know
    if($matchFound=='yes'){
        echo("<h2>This course is already in the database.</h2>");

    //Otherwise, we add it to database.
    }else{
        if (preg_match($regex, $newCode)) {
            if(($newCode!='') AND ($newName!='') AND ($newWeight!='') AND (is_numeric($newWeight))){
                $query = 'INSERT INTO WesternCourse
                VALUES ("'.$newCode.'", "'.$newName.'", "'.$newWeight.'", "'.$newSuffix.'")';
                $result=mysqli_query($connection,$query);
                if (!$result) {
                    die("Failed");
                }
                echo("<h2>Course Added to Database</h2>");
            }else{
                echo("<h2>Please go back and fill all required fields properly.</h2>");
            }
        } else {
            echo("<h2>Please go back and fix. Western Course Code must follow the pattern csXXXX (case sensitive).</h2>");
        }
    }
    
?>
<?php
   mysqli_close($connection);
?>
