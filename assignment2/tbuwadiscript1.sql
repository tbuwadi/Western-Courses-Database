SHOW databases;
DROP DATABASE IF EXISTS tbuwadiassign2db;
CREATE DATABASE tbuwadiassign2db;
USE tbuwadiassign2db;
GRANT USAGE ON *.* TO 'ta'@'localhost';
DROP USER 'ta'@'localhost';
CREATE USER 'ta'@'localhost' IDENTIFIED BY 'cs3319';
GRANT ALL PRIVILEGES ON tbuwadiassign2db.* TO 'ta'@'localhost';
FLUSH PRIVILEGES;
SHOW TABLES;

CREATE TABLE WesternCourse(
    CourseNumber varchar(6) NOT NULL,
    CourseName varchar(50) NOT NULL,
    CourseWeight varchar(3) NOT NULL,
    CourseSuffix varchar(3),
    UNIQUE(CourseNumber),
    PRIMARY KEY(CourseNumber)
);

CREATE TABLE OtherUniversity(
    UniNumber INT(2) NOT NULL,
    OfficialName varchar(50) NOT NULL,
    City varchar(50) NOT NULL,
    ProvinceCode varchar(2) NOT NULL,
    NickName varchar(20) NOT NULL,
    UNIQUE(UniNumber),
    PRIMARY KEY(UniNumber)
);

CREATE TABLE OtherCourse(
    CourseCode varchar(10) NOT NULL,
    OtherCourseName varchar(50) NOT NULL,
    TaughtToYear INT(1) NOT NULL,
    OtherCourseWeight varchar(3) NOT NULL,
    UniNum INT(2) NOT NULL,
    FOREIGN KEY(UniNum) REFERENCES OtherUniversity(UniNumber),
    PRIMARY KEY(CourseCode ,UniNum)
);

CREATE TABLE isEquivalentTo(
    WesternCourseNumber varchar(6) NOT NULL,
    OtherUniCourseCode varchar(10) NOT NULL,
    UniversityNum INT(2) NOT NULL,
    DateApproved DATE NOT NULL,
    FOREIGN KEY (WesternCourseNumber) REFERENCES WesternCourse(CourseNumber) ON DELETE CASCADE,
    FOREIGN KEY (OtherUniCourseCode, UniversityNum) REFERENCES OtherCourse(CourseCode, UniNum) ON DELETE CASCADE,
    PRIMARY KEY (WesternCourseNumber, OtherUniCourseCode, UniversityNum) 
);

SHOW TABLES;
