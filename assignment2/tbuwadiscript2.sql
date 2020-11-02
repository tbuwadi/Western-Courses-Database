USE  tbuwadiassign2db;

SELECT * FROM OtherUniversity;
LOAD DATA LOCAL INFILE '/home/centos/tbuwadi/assignment2/loaddatafall2020.txt' INTO TABLE OtherUniversity
FIELDS TERMINATED BY ','
LINES TERMINATED  BY '\n';
SELECT * FROM OtherUniversity;

SELECT * FROM WesternCourse; 
INSERT INTO WesternCourse VALUES('cs1026', 'Computer Science Fundamentals I', '0.5', 'A/B');                                    
INSERT INTO WesternCourse VALUES('cs1027', 'Computer Science Fundamentals II', '0.5', 'A/B');
INSERT INTO WesternCourse VALUES('cs2210', 'Algorithms and Data Structures', '1.0', 'A/B');
INSERT INTO WesternCourse VALUES('cs3319', 'Databases', '0.5', 'A/B');
INSERT INTO WesternCourse VALUES('cs2120', 'Modern Survival Skills I: Coding Essentials', '0.5', 'A/B');
INSERT INTO WesternCourse VALUES('cs4490', 'Thesis', '0.5', 'Z');
INSERT INTO WesternCourse VALUES('cs0020', 'Intro to Coding using Pascal and Fortran', '1.0', "");
INSERT INTO WesternCourse VALUES('cs2222', 'Intro to Website Development with React', '0.5', "A/B");
SELECT * FROM WesternCourse;

SELECT * FROM OtherUniversity;
INSERT INTO OtherUniversity VALUES(97, 'Tala Buwadi University', 'Halifax', 'NS', 'UofTB');
SELECT * FROM OtherUniversity;

SELECT * FROM OtherCourse;
INSERT INTO  OtherCourse VALUES('CompSci022', 'Introduction to Programming', '1', '0.5', '2');
INSERT INTO  OtherCourse VALUES('CompSci033', 'Intro to Programming for Med Students', '3', '0.5', '2');
INSERT INTO  OtherCourse VALUES('CompSci021', 'Packages', '1', '0.5', '2');
INSERT INTO  OtherCourse VALUES('CompSci222', 'Introduction to Databases', '2', '1.0', '2');
INSERT INTO  OtherCourse VALUES('CompSci023', 'Advanced Programming', '1', '0.5', '2');

INSERT INTO  OtherCourse VALUES('CompSci011', 'Intro to Computer Science', '2', '0.5', '4');
INSERT INTO  OtherCourse VALUES('CompSci123', 'Using UNIX', '2', '0.5', '4');

INSERT INTO  OtherCourse VALUES('CompSci021', 'Intro Programming', '1', '1.0', '66');
INSERT INTO  OtherCourse VALUES('CompSci022', 'Advanced Programming', '1', '0.5', '66');
INSERT INTO  OtherCourse VALUES('CompSci319', 'Using Databases', '3', '0.5', '66');

INSERT INTO  OtherCourse VALUES('CompSci333', 'Graphics', '3', '0.5', '55');
INSERT INTO  OtherCourse VALUES('CompSci444', 'Networks', '4', '0.5', '55');

INSERT INTO  OtherCourse VALUES('CompSci022', 'Using Packages', '1', '0.5', '77');
INSERT INTO  OtherCourse VALUES('CompSci101', 'Introduction to Using Data Structures', '2', '0.5', '77');

INSERT INTO  OtherCourse VALUES('CompSci444', 'Creating a Full Stack Web App', '1', '0.5', '97');
INSERT INTO  OtherCourse VALUES('CompSci555', 'Creating an App Using React Native', '1', '0.5', '97');
SELECT * FROM OtherCourse;

SELECT * FROM isEquivalentTo;
INSERT INTO  isEquivalentTo VALUES('cs1026','CompSci022','2','2015-05-12');
INSERT INTO  isEquivalentTo VALUES('cs1026','CompSci033','2','2013-01-02');
INSERT INTO  isEquivalentTo VALUES('cs1026','CompSci011','4','1997-02-09');
INSERT INTO  isEquivalentTo VALUES('cs1026','CompSci021','66','2010-01-12');
INSERT INTO  isEquivalentTo VALUES('cs1027','CompSci023','2','2017-06-22');
INSERT INTO  isEquivalentTo VALUES('cs1027','CompSci022','66','2019-09-01');
INSERT INTO  isEquivalentTo VALUES('cs2210','CompSci101','77','1998-07-12');
INSERT INTO  isEquivalentTo VALUES('cs3319','CompSci222','2','1990-09-13');
INSERT INTO  isEquivalentTo VALUES('cs3319','CompSci319','66','1987-09-21');
INSERT INTO  isEquivalentTo VALUES('cs2120','CompSci022','2','2018-12-10');
INSERT INTO  isEquivalentTo VALUES('cs0020','CompSci022','2','1999-09-17');
SELECT * FROM isEquivalentTo;

SELECT * FROM isEquivalentTo;
UPDATE isEquivalentTo SET DateApproved = '2018-09-18' WHERE WesternCourseNumber="cs0020" AND OtherUniCourseCode="CompSci022" AND UniversityNum=2;
SELECT * FROM isEquivalentTo;

SELECT * FROM OtherCourse;
UPDATE OtherCourse SET TaughtToYear=1 WHERE OtherCourseName LIKE 'Intro%';
SELECT * FROM OtherCourse;
