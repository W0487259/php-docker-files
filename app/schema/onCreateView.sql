-- Run this in phpMyAdmin to create a view
Create or Replace view course_info as
select 
	c.Title as Title, 
	concat(c.CourseCode, c.CourseNum) as Code, 
	concat(i.FirstName, ' ', i.LastName) as Instructor,
    r.RoomNumber, c.Description
from Course c
	left join Instructor i on c.Instructor = i.InstructorId
	left join Room r on c.Room = r.RoomId;

-- select * from course_info
-- where Instructor IS NOT NULL
-- and RoomNumber IS NOT NULL;