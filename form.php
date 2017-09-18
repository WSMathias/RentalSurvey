<?php 
session_start();
$location = $_GET["place"];
$area = (float)$_GET["area"];
$price = (float)$_GET["price"];
$deposit = (float)$_GET["deposit"];
$lease = (int)$_GET["lease"];

if ($location == null || $area == 0 || $price == 0 || $deposit == 0 || $lease==0) {
    $_SESSION["statusMessage"] = "error";
    header("Location: surveyEntry.php");
} else {
    $dbserver = "";
    $dbusername = "survey";
    $dbpassword = "survey";
    $dbname = "surveydb";
    $conn = new mysqli($dbserver,$dbusername,$dbpassword,$dbname);
    if($conn->connect_error) {
       die("connection failed : ".$conn->connect_error);
    }
    $sql = "insert into survey(location,area,price,deposit,lease_period) values('$location',$area,$price,$deposit,$lease)";
    if($conn->query($sql)) {
        $_SESSION["statusMessage"] = "success";
        header("Location: index.php");
    }
}

?>