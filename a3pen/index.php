<!DOCTYPE html>
<html>
<head>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
<style>
    
body{
    background-color:#F3EDFD;
    font-family: 'Lato', sans-serif;
    color: #230051;
}
* {
  box-sizing: border-box;
}
h1{
    text-align: center;
    padding-top: 21px;
}
h2{
    padding-top: 20px;
    margin-left: 60px;
}
h3{
    margin-top: 0;
}
select, input[type=date]{
    border: 2px solid #50248F;
    padding: 7px;
    margin-top: 15px;
    border-radius: 5px;
    font-family: 'Lato', sans-serif;
    font-weight: bold;
}
input[type=text]{
    font-family: 'Lato', sans-serif;
    font-weight: bold;
    border-radius: 10px;
    margin-top: 10px;
    border: 2px solid #50248F;
    padding: 7px;
}
input[type=submit], button{
    font-family: 'Lato', sans-serif;
    font-weight: bold;
    margin-top: 5px;
    background-color: #50248F;
    color: white;
    border: none;
    padding: 9px;
    border-radius: 5px;
}

.flex-container {
  display: flex;
  flex-direction: row;
  font-size: 18px;
  margin-left: 30px;
  margin-right: 30px;
}

.flex-item {
  color: black;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  border-radius: 20px;
  padding: 30px;
  flex: 50%;
  background-color:#FCFBFF;
  margin: 20px;
}

/* Responsive layout - makes a one column-layout instead of two-column layout */
@media (max-width: 800px) {
  .flex-container {
    flex-direction: column;
  }
}
</style>
</head>
<body>
<?php
include 'connecttodb.php';
?>
<!-- Title -->
<h1>Western Courses Database</h1>

<h2>Find Information</h2>
<div class="flex-container">
    
    <div class="flex-item">
        <h3>List all Western course information:</h3>
            <form action="getUWOCourses.php" method="post">
                <p>Order by: </p>
                <input type="radio" id="courseNumber" name="orderby" value="CourseNumber">
                <label for="courseNumber">Course Number</label><br>
                <input type="radio" id="courseName" name="orderby" value="CourseName">
                <label for="courseName">Course Name</label><br>
                <br>  
                <p>Order in: </p>
                <input type="radio" id="ascending" name="orderin" value="ASC">
                <label for="ascending">Ascending Order</label><br>
                <input type="radio" id="descending" name="orderin" value="DESC">
                <label for="descending">Descending Order</label><br>  
                <br>
                <input type="submit" value="Search">
            </form>
      </div>

    <!-- Determine if search by uni name or province -->
    <div class="flex-item">

          <h3>List Other University Information</h3>
          <form action="getUniversityInfo.php" method="post">
            <label for="uniList">Search by University Name:</label><br>
            <select name="uniList" id="uniList">
                <!-- HAVE TO HANDLE IN PHP -->
                <option value="" selected disabled hidden>Select University</option>
                <?php
                    include 'getOtherUniversityNames.php';
                ?>
            </select>
            <input type="submit" value="Search">
          </form>
          <br>
          <form action="getProvinceInfo.php" method="post">
            <label for="provinceList">Search by Province:</label><br>
            <select name="provinceList" id="provinceList">
                <!-- HAVE TO HANDLE IN PHP -->
                <option value="" selected disabled hidden>Select Province</option>
                <option value="AB">AB</option>
                <option value="BC">BC</option>
                <option value="MB">MB</option>
                <option value="NB">NB</option>
                <option value="NL">NL</option>
                <option value="NT">NT</option>
                <option value="NS">NS</option>
                <option value="NU">NU</option>
                <option value="ON">ON</option>
                <option value="PE">PE</option>
                <option value="QC">QC</option>
                <option value="SK">SK</option>
                <option value="YT">YT</option>
            </select>
            <input type="submit" value="Search">
          </form>
          <br><br>
          <form action="getNoAssociations.php" method="post">
                <input type="submit" value="Click here to show universities with no associated courses.">
          </form>
    </div>
  
    <!-- Edit a course -->
    <div class="flex-item">
      
    <h3>Find Equivalent Courses</h3>
    <form action="getEquivalentTo.php" method="post">
        <label for="courseList">Find courses equivalent to:</label><br>
        <select name="courseList" id="courseList">
            <!-- HAVE TO HANDLE IN PHP -->
            <option value="" selected disabled hidden>Select Course</option>
            <?php
                    include 'getWesternCoursesInEquivalent.php';
            ?>
        </select>
        <input type="submit" value="Search">
        <br><br>
  
    </form>
    <form action="getEquivalentDate.php" method="post">
        <label for="equivDate">Show Equivalencies made on or before:</label><br>
        <input type="date" id="equivDate" name="equivDate">
        <input type="submit" value="Search">
        <br><br>
    </form>
    </div>
  
    <!-- Add a new course  -->
    
  
    
  </div>

<h2>Modify Information</h2>
<div class="flex-container">
  <!-- Query Western Course Information -->
  

  <!-- Edit a course -->
  <div class="flex-item">
    <h3>Edit a Western Course</h3>
    <form action="modifyCourses.php" method="post">
        <label for="courseList">Select a Course to Modify:</label>
        <select name="courseListEdit" id="courseListEdit">
            <!-- HAVE TO HANDLE IN PHP -->
            <option value="" selected disabled hidden>Select Course</option>
            <?php
                    include 'getWesternCourses.php';
            ?>
        </select>
        <br><br>
        <label for="courseNameEdit">Course Name: </label><br>
        <input type="text" id="courseNameEdit" name="courseNameEdit"><br><br>
        
        <label for="courseWeightEdit">Course Weight: </label><br>
        <input type="text" id="courseWeightEdit" name="courseWeightEdit"><br><br>

        <label for="selectedSuffix">Course Suffix:</label><br>
        <select name="selectedSuffix" id="selectedSuffix">
            <!-- HAVE TO HANDLE IN PHP -->
            <option value="" selected disabled hidden>Select a Course Suffix</option>
            <option value="A/B">A/B</option>
            <option value="F/G">F/G</option>
            <option value="E">E</option>
            <option value="Y">Y</option>
            <option value="Z">Z</option>
            <option value="NULL">None</option>

        </select><br><br>
        <input type="submit" name="action" value="Save Edits">
        <input onclick="return confirm('Are you sure you want to delete?')" type="submit" name="action" value="Delete Selected Course">

    </form>
  </div>

  <!-- Add a new course  -->
  <div class="flex-item">
    <h3>Add New Western Course</h3>
    <form action="newCourses.php" method="post">
        
        <label for="courseCode">Course Code: </label><br>
        <input type="text" id="newCode" name="newCode"><br><br>

        <label for="courseName">Course Name: </label><br>
        <input type="text" id="newName" name="newName"><br><br>
        
        <label for="courseWeight">Course Weight: </label><br>
        <input type="text" id="newWeight" name="newWeight"><br><br>

        <label for="courseList">Course Suffix:</label><br>
        <select name="newSuffix" id="newSuffix">
            <!-- HAVE TO HANDLE IN PHP -->
            <option value="" selected disabled hidden>Select a Course Suffix</option>
            <option value="A/B">A/B</option>
            <option value="F/G">F/G</option>
            <option value="E">E</option>
            <option value="Y">Y</option>
            <option value="Z">Z</option>
            <option value="NULL">None</option>

        </select><br><br>
        <input type="submit" value="Add Course">
    </form>
  </div>

  <div class="flex-item">
    <h3>New Equivalence</h3>
    <form action="setEquivalence.php" method="post">
        
        <label for="equivalentWestern">Select Western Course:</label><br>
        <select name="equivalentWestern" id="equivalentWestern">
            <!-- HAVE TO HANDLE IN PHP -->
            <option value="" selected disabled hidden>Select Course</option>
            <?php
                    include 'getWesternCourses.php';
            ?>
        </select><br><br>

        <label for="equivalentOther">Select Equivalent Course:</label><br>
        <select name="equivalentOther" id="equivalentOther">
            <!-- HAVE TO HANDLE IN PHP -->
            <option value="" selected disabled hidden>Select Course</option>
            <?php
                    include 'getOtherCourse.php';
            ?>
        </select><br><br>

        <input type="submit" value="Save Equivalence">
    </form>
  </div>
</div>

<?php
  mysqli_close($connection);
?>

</body>
</html>
