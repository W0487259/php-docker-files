<nav class='topnav'>
        <?php if (empty($activePage)) $activePage = 'home'; ?>
        <a <?php if ($activePage == 'home') echo 'class="active"'; ?> href='./home.php'>Home</a>
        <a <?php if ($activePage == 'projects') echo 'class="active"'; ?> href='./projects.php'>Projects</a>
        <a <?php if ($activePage == 'courses') echo 'class="active"'; ?> href='./courses.php'>Courses</a>
        <a <?php if ($activePage == 'schedule') echo 'class="active"'; ?> href='./schedule.php'>Schedule</a>
        <a <?php if ($activePage == 'about') echo 'class="active"'; ?> href='./about.php'>About Me</a>
        <a <?php if ($activePage == 'contact') echo 'class="active"'; ?> href='./contact.php'>Contact</a>
        <a <?php if ($activePage == 'email') echo 'class="active"'; ?> href='./email.php'>Email</a>
</nav>