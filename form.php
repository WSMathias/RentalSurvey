
<?php 
/**
*  Accepts the input for form entry.
*/
session_start();
$_SESSION["statusMessage"] = "";
$location = $_POST["place"];
$area = (float)$_POST["area"];
$price = (float)$_POST["price"];
$deposit = (float)$_POST["deposit"];
$lease = (int)$_POST["lease"];
$lid;
/**
*  Redirects to index.php if any errors.
*/
function onError(){ 
    header("Location: surveyEntry.php");
}
/**
* Sets statusMessage session on success of the entry.
*/
function onSuccess(){
    $_SESSION["statusMessage"] .= "<br>success<br>";
    header("Location: surveyEntry.php");
}
/**
* Check if the parameters are empty.
* return {boolean}
*/
function isempty() {
    global $area,$location,$lease,$deposit,$price; 
    if ($location == "" || $area == 0 || $price == 0 || $deposit == 0 || $lease==0){
        $_SESSION["statusMessage"] .= "Fields cannot be empty.<br>"; 
        return true;
    }
    else
        return false;
}
/**
* Validates for any special characters.
* return {boolean}
*/
function validate($string) {
    /**
    * regular expression to check for scpecial characters to avoid sql injection
    */
    if (preg_match('/[\'^£$%&*()}{@#~?><>|=_+¬-]/', $string))
       {
         $_SESSION["statusMessage"] .= $string." : special charectors are not allowed<br>"; 
         return false;
       }
    else
        {
            return true;}
}
/**
* Checks if parameters are completely validated.
* return {boolean}
*/
function isValidated(){
    global $area,$location,$lease,$deposit,$price;
    if(!isempty()) {
        if(validate($location) && validate($deposit) && validate($lease) && validate($area)){
            if (($area > 300 && $area < 100000) && ($lease > 1))
               return true;
            else{
                $_SESSION["statusMessage"] .= "Area must be between 300 sqrft and 100000 sqrft<br>"; 
                return false;
            }
        }
        else  {
            return false;
        }
        return true;
    }
    else 
        return false;
}
/**
* Inserts the data to the database if validated.
*/
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
