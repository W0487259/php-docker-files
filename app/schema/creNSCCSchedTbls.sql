-- *********************************************************
-- NSCC Schedule Table Structure
-- David Kristiansen
-- Oct 2023
-- *********************************************************

CREATE DATABASE IF NOT EXISTS NSCCSchedule;
-- Activate database
Use NSCCSchedule;
-- Delete existing tables, if they exist. Cascade deletes to child tables.
DROP TABLE IF EXISTS Course,
Instructor,
Program,
Room CASCADE;
CREATE TABLE Room (
    RoomId int Not NULL AUTO_INCREMENT,
    Campus VARCHAR(50),
    Building VARCHAR(50),
    RoomNumber VARCHAR(6),
    PRIMARY KEY (RoomId)
);
CREATE TABLE Instructor (
    InstructorId int NOT NULL AUTO_INCREMENT,
    FirstName VARCHAR(100),
    LastName VARCHAR(100),
    PRIMARY KEY (InstructorId)
);
CREATE TABLE Program (
    ProgramId int NOT NULL AUTO_INCREMENT,
    Code VARCHAR(4) NOT NULL UNIQUE,
    Title VARCHAR(100) NOT NULL UNIQUE,
    PRIMARY KEY (ProgramId)
);
CREATE TABLE Course (
    CourseId int NOT NULL AUTO_INCREMENT,
    CourseCode varchar(4) NOT NULL,
    CourseNum varchar(4) NOT NULL,
    Title varchar(100),
    Description varchar(1000),
    Section int,
    Active bool,
    Instructor int,
    Room int,
    Program int,
    PRIMARY KEY (CourseId),
    CONSTRAINT fk_Course_Program FOREIGN KEY (Program) REFERENCES Program (ProgramId),
    CONSTRAINT fk_Course_Instructor FOREIGN KEY (Instructor) REFERENCES Instructor (InstructorId) ON DELETE SET NULL,
    CONSTRAINT fk_Course_Room FOREIGN KEY (Room) REFERENCES Room (RoomId) ON DELETE SET NULL
);
-- Naming Foreign Keys
-- fk_[referencing table name]_[referenced table name]_[referencing field name]?
-- Which fk should have cascade update? Or delete? Add them as you see fit.
-- Will the drop tables work without removing constraints? Why?
-- Is Room in 3rd Normal Form? If not than what needs to happen for it to be? Implement it!