<?php /* critical to have as start of your php file. sessions will not work if data has been sent to browser */
    session_start();

    $firstName = "Jessica";
    $lastName = "Drew";
    $age = 33;
    $alias = "Spider-Woman";

    $_SESSION["FIRST_NAME"] = $firstName;
    $_SESSION["LAST_NAME"] = $lastName;
    $_SESSION["AGE"] = $age;
    $_SESSION["ALIAS"] = $alias;

    $session_id = session_id();
    $_SESSION["SESSION_ID"] = $session_id;

    