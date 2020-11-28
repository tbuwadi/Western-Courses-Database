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
   $courseToChange = $_POST["courseListEdit"];
   $newCourseName = $_POST["courseNameEdit"];
   $newCourseWeight = $_POST["courseWeightEdit"];
   $newSuffix = $_POST["selectedSuffix"];

    if (($_POST['action'] == 'Save Edits') AND $courseToChange!='') {

        if($newCourseName!=''){
            $query = 'UPDATE WesternCourse SET CourseName="' . $newCourseName . '" WHERE CourseNumber="' . $courseToChange . '"';
            $result=mysqli_query($connection,$query);
            if (!$result) {
                die("database query failed.");
            }
        }
        if($newCourseWeight!=''){
            $query = 'UPDATE WesternCourse SET CourseWeight="' . $newCourseWeight . '" WHERE CourseNumber="' . $courseToChange . '"';
            $result=mysqli_query($connection,$query);
            if (!$result) {
                die("database query failed.");
            }
        }
        if($newSuffix!=''){
            $query = 'UPDATE WesternCourse SET CourseSuffix="' . $newSuffix . '" WHERE CourseNumber="' . $courseToChange . '"';
            $result=mysqli_query($connection,$query);
            if (!$result) {
                die("database query failed.");
            }
        }
        
    } else if ($_POST['action'] == 'Delete Selected Course') {
        $seeUnique = mysqli_query($connection, 'SELECT WesternCourseNumber FROM isEquivalentTo WHERE WesternCourseNumber = "' . $courseToChange . '"');
        $matchFound = mysqli_num_rows($seeUnique) > 0 ? 'yes' : 'no';

        if ($matchFound=="yes"){
            $seeCourses = mysqli_query($connection, 'SELECT CourseCode, OtherCourseName, NickName 
            FROM OtherCourse, OtherUniversity, isEquivalentTo
            WHERE isEquivalentTo.WesternCourseNumber = "' . $courseToChange . '"  
            AND isEquivalentTo.OtherUniCourseCode = OtherCourse.CourseCode 
            AND isEquivalentTo.UniversityNum = OtherCourse.UniNum
            AND isEquivalentTo.UniversityNum = OtherUniversity.UniNumber');
            echo "<h2>Are you sure you want to delete? This course has the following equivalencies: </h2>";
            echo("<table>");
            $first_row = true;
            while ($row = mysqli_fetch_assoc($seeCourses)) {
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
        }else{
            echo "<h2>Are you sure you want to delete?</h2>";
        }
        ?>
        <form action="delete.php" method="post">
            <input type="hidden" id="courseCode" name="courseCode" value='<?php echo "$courseToChange";?>'/>
            <input type="submit" value="Delete">
            <br><br>
        </form>
        <?php
    } else {
        //invalid action
    }


?>
<?php
   mysqli_close($connection);
?>
