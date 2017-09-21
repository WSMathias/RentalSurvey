<?php 
session_start();
$_SESSION["statusMessage"] = "";
$location = $_POST["place"];
$area = (float)$_POST["area"];
$price = (float)$_POST["price"];
$deposit = (float)$_POST["deposit"];
$lease = (int)$_POST["lease"];
$lid;

function onError(){ 
    header("Location: surveyEntry.php");
}
function onSuccess(){
    $_SESSION["statusMessage"] .= "<br>success<br>";
    header("Location: surveyEntry.php");
}
function isempty() {
    if ($location == null || $area == 0 || $price == 0 || $deposit == 0 || $lease==0){
        $_SESSION["statusMessage"] .= "Fields cannot be empty.<br>"; 
        return true;
    }
    else
        return false;
}
function validate($string) {
    if (preg_match('/[\'^£$%&*()}{@#~?><>|=_+¬-]/', $string))
       {
         $_SESSION["statusMessage"] .= $string." cannot have special charectors<br>"; 
         return false;
        }
    else
        {
            return true;}
}
function isValidated(){
    global $area,$location,$lease,$deposit;
    if(!isempty()) {
        if(validate($location) && validate($deposit) && validate($lease) && validate($area)){
            if (($area > 300 && $area < 100000) || ($lease > 1))
               return true;
            else{
                $_SESSION["statusMessage"] .= "Area must be between 300 sqrft and 100000 sqrft<br>"; 
                return false;
            }
        }
        else  {
            return false;
        }
    }
}

if (!isValidated()) {
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
                $sql = "insert into details(area,price,deposit,lease_period,lid) values($area,ROUND($price/$area,2),$deposit,$lease,$lid)";
                if($conn->query($sql)) {
                    onSuccess();
                }
        }
        else{
            echo "new location= ". $location." ". $lid;
            $sqlPlaces ="insert into places(location) values('$location')";
            $sqlDetails ="insert into details(area,price,deposit,lease_period,lid) values($area,ROUND($price/$area,2),$deposit,$lease,LAST_INSERT_ID())";        
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
