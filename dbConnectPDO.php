<?php
/**
* Creates connection to the datbase using PHP pdo.
*/
   
$array;
$dbserver = 'mysql';
$dbport =3306;
$dbusername = 'root';
$dbpassword = 'root';
$dbname = 'surveydb';

try {
        $dbh = new PDO("mysql:host=$dbserver;port=$dbport;dbname=$dbname", $dbusername, $dbpassword , array( PDO::ATTR_PERSISTENT => false));
        // $stmt = $dbh->prepare("select * from places");
        // $stmt->execute();
        // $array = $stmt->fetchAll( PDO::FETCH_ASSOC );
        // echo json_encode($array);
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage();
        die();
    }
  
