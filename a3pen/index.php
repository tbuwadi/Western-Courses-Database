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
    padding-top: 20px;
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
            <form action="/action_page.php">
                <p>Order by: </p>
                <input type="radio" id="courseNumber" name="orderby" value="courseNumber">
                <label for="courseNumber">Course Number</label><br>
                <input type="radio" id="courseName" name="orderby" value="courseName">
                <label for="courseName">Course Name</label><br>
                <br>  
                <p>Order in: </p>
                <input type="radio" id="ascending" name="orderin" value="ascending">
                <label for="ascending">Ascending Order</label><br>
                <input type="radio" id="descending" name="orderin" value="descending">
                <label for="descending">Descending Order</label><br>  
                <br>
                <input type="submit" value="Search">
            </form>
      </div>

    <!-- Determine if search by uni name or province -->
    <div class="flex-item">

          <h3>List Other University Information</h3>
          <form action="/action_page.php">
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
          <form action="/action_page.php">
            <label for="provinceList">Search by Province:</label><br>
            <select name="provinceList" id="provinceList">
                <!-- HAVE TO HANDLE IN PHP -->
                <option value="" selected disabled hidden>Select Province</option>
                <option value="Western">AB</option>
                <option value="Western">BC</option>
                <option value="Western">MB</option>
                <option value="Western">NB</option>
                <option value="Western">NL</option>
                <option value="Western">NT</option>
                <option value="Western">NS</option>
                <option value="Western">NU</option>
                <option value="Western">ON</option>
                <option value="Western">PE</option>
                <option value="Western">QC</option>
                <option value="Western">SK</option>
                <option value="Western">YT</option>
            </select>
            <input type="submit" value="Search">
          </form>
          <br><br>

          <button>Click here to show universities with no associated courses.</button>

    </div>
  
    <!-- Edit a course -->
    <div class="flex-item">
      
        
    <h3>Find Equivalent Courses</h3>
    <form action="/action_page.php">
  
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
    <form action="/action_page.php">
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
    <form action="/action_page.php">

        <label for="courseList">Select a Course to Modify:</label>
        <select name="courseList" id="courseList">
            <!-- HAVE TO HANDLE IN PHP -->
            <option value="" selected disabled hidden>Select Course</option>
            <?php
                    include 'getWesternCourses.php';
            ?>
        </select>

        <br><br>
        
        <label for="courseNameEdit">Course Name: </label><br>
        <input type="text" id="courseNameEdit" name="courseName"><br><br>
        
        <label for="courseWeightEdit">Course Weight: </label><br>
        <input type="text" id="courseWeightEdit" name="courseWeight"><br><br>

        <label for="courseList">Course Suffix:</label><br>
        <select name="courseList" id="courseList">
            <!-- HAVE TO HANDLE IN PHP -->
            <option value="" selected disabled hidden>Select a Course Suffix</option>
            <option value="AB">A/B</option>
            <option value="AB">F/G</option>
            <option value="AB">E</option>
            <option value="AB">Y</option>
            <option value="AB">Z</option>
            <option value="AB">None</option>

        </select><br><br>

        <input type="submit" value="Save Edits">
        <input type="submit" value="Delete Selected Course">

    </form>
  </div>

  <!-- Add a new course  -->
  <div class="flex-item">
    <h3>Add New Western Course</h3>
    <form action="/action_page.php">
        
        <label for="courseCode">Course Code: </label><br>
        <input type="text" id="courseCodeNew" name="courseCodeNew"><br><br>

        <label for="courseName">Course Name: </label><br>
        <input type="text" id="courseNameNew" name="courseNameNew"><br><br>
        
        <label for="courseWeight">Course Weight: </label><br>
        <input type="text" id="courseWeightNew" name="courseWeightNew"><br><br>

        <label for="courseList">Course Suffix:</label><br>
        <select name="courseList" id="courseList">
            <!-- HAVE TO HANDLE IN PHP -->
            <option value="" selected disabled hidden>Select a Course Suffix</option>
            <option value="AB">A/B</option>
            <option value="AB">F/G</option>
            <option value="AB">E</option>
            <option value="AB">Y</option>
            <option value="AB">Z</option>
            <option value="AB">None</option>

        </select><br><br>

        <input type="submit" value="Add Course">
    </form>
  </div>

  <div class="flex-item">
    <h3>New Equivalence</h3>
    <form action="/action_page.php">
        
        <label for="courseList">Select Western Course:</label><br>
        <select name="courseList" id="courseList">
            <!-- HAVE TO HANDLE IN PHP -->
            <option value="" selected disabled hidden>Select Course</option>
            <?php
                    include 'getWesternCourses.php';
            ?>
        </select><br><br>

        <label for="courseList">Select Equivalent Course:</label><br>
        <select name="courseList" id="courseList">
            <!-- HAVE TO HANDLE IN PHP -->
            <option value="" selected disabled hidden>Select Course</option>

        </select><br><br>

        <input type="submit" value="Save Equivalence">
    </form>
  </div>
</div>



</body>
</html>
