USE tbuwadiassign2db;

-- Create View
CREATE VIEW tbuwadiassign2view AS 
SELECT OtherCourseName, OfficialName, NickName, City, CourseName
FROM isEquivalentTo, WesternCourse, OtherUniversity, OtherCourse 
WHERE TaughtToYear = 1
AND isEquivalentTo.OtherUniCourseCode = OtherCourse.CourseCode
AND isEquivalentTo.UniversityNum = OtherCourse.UniNum
AND isEquivalentTo.UniversityNum = OtherUniversity.UniNumber
AND isEquivalentTo.WesternCourseNumber = WesternCourse.CourseNumber;

-- select all rows in view
SELECT * FROM tbuwadiassign2view;

-- run view again with just uoft nicknames
SELECT * FROM tbuwadiassign2view
WHERE NickName = "UofT"
ORDER BY CourseName;

-- show all uni table info
SELECT * FROM OtherUniversity;

-- delete any university that has a nickname with the letters "cord" in it
DELETE FROM OtherUniversity
WHERE NickName LIKE "%cord%";

-- show all uni table again
SELECT * FROM OtherUniversity;

-- delete waterloo
DELETE FROM OtherUniversity
WHERE UniNumber = 2;

-- The reason why this failed is because the primary key in this table is a foreign key in other tables
-- Specifically, if the university still has any courses offered by it in the OtherCourses table there will be an error when it is deleted

-- Show everything in uni table again
SELECT * FROM OtherUniversity;

-- Show other courses & the info they are associated with
SELECT * 
FROM OtherCourse, OtherUniversity
WHERE OtherCourse.UniNum = OtherUniversity.UniNumber;

-- delete all courses that are offered from a uni in city of waterloo
DELETE FROM OtherCourse
WHERE EXISTS
(SELECT * 
FROM OtherUniversity 
WHERE OtherCourse.UniNum = OtherUniversity.UniNumber
and OtherUniversity.City = "Waterloo" );

DELETE FROM OtherCourse 
WHERE UniNumber IN ( SELECT UniNumber FROM OtherUniversity WHERE City='waterloo');


-- Show other courses & the info they are associated with
SELECT * 
FROM OtherCourse, OtherUniversity
WHERE OtherCourse.UniNum = OtherUniversity.UniNumber;

-- select all rows in view
SELECT * FROM tbuwadiassign2view;
