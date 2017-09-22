
<?php
/**
*  Returns the list of locations for the search 
*/
$return_arr = Array();
$query = $_GET["q"];
include("dbConnect.php");
if($conn->connect_error) {
    die("connection failed : ".$conn->connect_error);
 }
 else if($query!="") {
    $query=strtoupper($query);
    $sql = " select distinct(a.location) from places a,details b  where a.id=b.Lid and  location like '$query%'";
    if($result = $conn->query($sql)) {
        if (mysqli_num_rows($result)>0) {
            while ($row = $result->fetch_assoc()) {
                array_push($return_arr,$row["location"]);
            }
        }
    }
    echo json_encode($return_arr);
 }
 echo "";
?>