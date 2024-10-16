Create or Replace view course_info as
select 
	c.Title as Title, 
	concat(c.CourseCode, c.CourseNum) as CourseCode, 
	concat(i.FirstName, ' ', i.LastName) as Instructor,
    r.RoomNumber
from Course c
	left join Instructor i on c.Instructor = i.InstructorId
	left join Room r on c.Room = r.RoomId;

select * from course_info
where Instructor IS NOT NULL
and RoomNumber IS NOT NULL;