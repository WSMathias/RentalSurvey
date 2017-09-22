<?php
/**
* Creates connection to the database.
*/
    $dbserver = "localhost";
    $dbusername = "survey";
    $dbpassword = "survey";
    $dbname = "surveydb";
    $conn = new mysqli($dbserver,$dbusername,$dbpassword,$dbname);
?>