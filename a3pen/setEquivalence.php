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
   $westernCourse = $_POST["equivalentWestern"];
   $otherString = $_POST["equivalentOther"];
   list($otherCourse, $uniNum) = explode('-', $otherString);
   //Check if the code is unique or not
   
   $currDate = date("Y-m-d");

    $seeUnique = mysqli_query($connection, 'SELECT * FROM isEquivalentTo WHERE WesternCourseNumber="' . $westernCourse . '" AND OtherUniCourseCode="' . $otherCourse . '"');
    $matchFound = mysqli_num_rows($seeUnique) > 0 ? 'yes' : 'no';
    if($matchFound=='yes'){
        $query = 'UPDATE isEquivalentTo SET DateApproved="' . $currDate . '" WHERE WesternCourseNumber="' . $westernCourse . '" AND OtherUniCourseCode="' . $otherCourse . '"';
        $result=mysqli_query($connection,$query);
        if (!$result) {
            die("Failed");
        }
        echo("<h2>Thanks. Equivalence Saved.</h2>");
    }else{
        $query = 'INSERT INTO isEquivalentTo
        VALUES ("'.$westernCourse.'", "'.$otherCourse.'", "'.$uniNum.'", "'. $currDate .'")';
        $result=mysqli_query($connection,$query);
        if (!$result) {
            die("Failed");
        }
        echo("<h2>Thanks. Equivalence Saved.</h2>");
    }
    
?>
<?php
   mysqli_close($connection);
?>
