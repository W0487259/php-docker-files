<nav class='topnav'>
        <?php if (empty($activePage)) $activePage = 'home'; ?>
        <a <?php if ($activePage == 'view programs') echo 'class="active"'; ?> href='./view_programs.php'>View Program</a>
        <a <?php if ($activePage == 'add program') echo 'class="active"'; ?> href='./add_program.php'>Add Program</a>
        <a <?php if ($activePage == 'add room') echo 'class="active"'; ?> href='./add_room.php'>Add Room</a>
        <a <?php if ($activePage == 'add instructor') echo 'class="active"'; ?> href='./add_instructor.php'>Add Instructor</a>
        <a <?php if ($activePage == 'about') echo 'class="active"'; ?> href='./about.php'>About Me</a>
</nav>