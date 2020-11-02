USE tbuwadiassign2db;

-- QUERY 1: 
SELECT CourseName 
FROM WesternCourse;

-- QUERY 2: 
SELECT DISTINCT CourseCode
FROM OtherCourse;

-- QUERY 3: 
SELECT * 
FROM WesternCourse 
ORDER BY CourseName;

-- QUERY 4:
SELECT CourseNumber, CourseName 
FROM WesternCourse 
WHERE CourseWeight='0.5';

-- QUERY 5: 
SELECT CourseCode, OtherCourseName 
FROM OtherCourse
INNER JOIN OtherUniversity
ON OtherCourse.UniNum = OtherUniversity.UniNumber 
WHERE OtherUniversity.OfficialName = "University of Toronto";

-- QUERY 6: 
SELECT OtherCourseName, NickName
FROM OtherCourse
INNER JOIN OtherUniversity
ON OtherCourse.UniNum = OtherUniversity.UniNumber
WHERE OtherCourseName LIKE '%Introduction%';

-- QUERY 7: 
SELECT OtherCourseName, OfficialName, CourseName, DateApproved
FROM isEquivalentTo, WesternCourse, OtherUniversity, OtherCourse 
WHERE DateApproved < DATE_SUB(NOW(), INTERVAL 5 YEAR)
AND isEquivalentTo.OtherUniCourseCode = OtherCourse.CourseCode
AND isEquivalentTo.UniversityNum = OtherCourse.UniNum
AND isEquivalentTo.UniversityNum = OtherUniversity.UniNumber
AND isEquivalentTo.WesternCourseNumber = WesternCourse.CourseNumber;


-- QUERY 8:
SELECT OtherCourseName, NickName 
FROM OtherCourse, OtherUniversity, isEquivalentTo
WHERE isEquivalentTo.WesternCourseNumber = "cs1026"  
AND isEquivalentTo.OtherUniCourseCode = OtherCourse.CourseCode 
AND isEquivalentTo.UniversityNum = OtherCourse.UniNum
AND isEquivalentTo.UniversityNum = OtherUniversity.UniNumber;

-- QUERY 9:
SELECT COUNT(WesternCourseNumber) 
FROM isEquivalentTo 
WHERE WesternCourseNumber = "cs1026";

-- QUERY 10: 
SELECT CourseName, OtherCourseName, NickName 
FROM WesternCourse, OtherUniversity, OtherCourse, isEquivalentTo 
WHERE OtherUniversity.City = "Waterloo" 
AND OtherUniversity.ProvinceCode = "ON"
AND isEquivalentTo.OtherUniCourseCode = OtherCourse.CourseCode
AND isEquivalentTo.UniversityNum = OtherCourse.UniNum
AND isEquivalentTo.UniversityNum = OtherUniversity.UniNumber
AND isEquivalentTo.WesternCourseNumber = WesternCourse.CourseNumber;

-- QUERY 11: 
SELECT OfficialName 
FROM OtherUniversity 
WHERE OtherUniversity.UniNumber NOT IN (SELECT UniversityNum FROM isEquivalentTo);

-- QUERY 12: 
SELECT CourseName, CourseNumber
FROM isEquivalentTo
LEFT JOIN WesternCourse
ON isEquivalentTo.WesternCourseNumber = WesternCourse.CourseNumber
LEFT JOIN OtherCourse
ON isEquivalentTo.OtherUniCourseCode = OtherCourse.CourseCode
WHERE OtherCourse.TaughtToYear = 3 OR OtherCourse.TaughtToYear = 4;

-- QUERY 13: 
SELECT CourseName
FROM WesternCourse
WHERE CourseNumber
IN 
(SELECT WesternCourseNumber
FROM isEquivalentTo
GROUP BY WesternCourseNumber
HAVING COUNT(WesternCourseNumber)>1);

-- QUERY 14: 
SELECT DISTINCT 
WesternCourse.CourseNumber AS "Western Course Number", 
WesternCourse.CourseName AS "Western Course Name" , 
WesternCourse.CourseWeight AS "Course Weight", 
OtherCourse.OtherCourseName AS "Other University Course Name" ,
OtherUniversity.OfficialName AS "University Name" ,
OtherCourse.OtherCourseWeight AS "Other Course Weight"  
FROM isEquivalentTo, WesternCourse, OtherUniversity, OtherCourse
WHERE WesternCourse.CourseNumber = isEquivalentTo.WesternCourseNumber
AND OtherCourse.CourseCode = isEquivalentTo.OtherUniCourseCode
AND NOT WesternCourse.CourseWeight = OtherCourse.OtherCourseWeight
AND OtherUniversity.UniNumber = isEquivalentTo.UniversityNum
AND OtherUniversity.UniNumber = OtherCourse.UniNum;

