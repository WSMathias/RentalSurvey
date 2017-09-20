<?php
    $dbserver = "localhost";
    $dbusername = "survey";
    $dbpassword = "survey";
    $dbname = "surveydb";
    //compatable with php > 5.1
    $pdo = new PDO("mysql:host=$dbserver;dbname=$dbname;charset=utf8",$dbusername,$dbpassword );

?>