<?php
    session_start();

    $firstName = $_SESSION["FIRST_NAME"];
    $lastName = $_SESSION["LAST_NAME"];
    $age = $_SESSION["AGE"];
    $alias = $_SESSION["ALIAS"];
    $session_id = $_SESSION["SESSION_ID"];

    echo "FN: $firstName, LN: $lastName, Age: $age, Alias: $alias, sessionID: $session_id";

    //session data can be stored in a database to check against later (restoring a previous session)