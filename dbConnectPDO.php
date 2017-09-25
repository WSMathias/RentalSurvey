<?php
/**
* Creates connection to the datbase using PHP pdo.
*/
    $dbserver = "mysql";
    $dbusername = "root";
    $dbpassword = "root";
    $dbname = "surveydb";
    //compatable with php > 5.1
    $pdo = new PDO("mysql: host=$dbserver;dbname=$dbname;charset=utf8",$dbusername,$dbpassword);
  
