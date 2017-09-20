<?php 
session_start();
$location = $_GET["place"];
$area = (float)$_GET["area"];
$price = (float)$_GET["price"];
$deposit = (float)$_GET["deposit"];
$lease = (int)$_GET["lease"];
$lid;

function onError(){
    $_SESSION["statusMessage"] = "error";
    header("Location: surveyEntry.php");
}
function onSuccess(){
    $_SESSION["statusMessage"] = "success";
    header("Location: surveyEntry.php");
}

if ($location == null || $area == 0 || $price == 0 || $deposit == 0 || $lease==0) {
    onError();
} else {
    include("dbConnect.php");
    $location = strtoupper($location);
    if($conn->connect_error) {
       die("connection failed : ".$conn->connect_error);
    }
    $sqlCheck="select id from places where location = '$location'";
    if($result=$conn->query($sqlCheck)) {
        if(mysqli_num_rows($result)>0){
            $lid=($result->fetch_assoc())["id"];
                $sql = "insert into details(area,price,deposit,lease_period,lid) values($area,$price/$area,$deposit,$lease,$lid)";
                if($conn->query($sql)) {
                    onSuccess();
                }
        }
        else{
            echo "new location= ". $location." ". $lid;
            $sqlPlaces ="insert into places(location) values('$location')";
            $sqlDetails ="insert into details(area,price,deposit,lease_period,lid) values($area,$price/$area,$deposit,$lease,LAST_INSERT_ID())";        
            if($conn->query($sqlPlaces) && $conn->query($sqlDetails)) {
                onSuccess();
            }
            else{
                onError();
            }
        }
    }
    else{
        onError();
    }
}

?>
