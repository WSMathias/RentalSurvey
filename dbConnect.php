<?php
/**
* Creates connection to the database.
*/
    $dbserver = "mysql";
    $dbusername = "root";
    $dbpassword = "root";
    $dbname = "surveydb";
    $conn = new mysqli($dbserver,$dbusername,$dbpassword,$dbname);   