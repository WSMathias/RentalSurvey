<?php
$return_arr = Array();
$query = $_GET["q"];
include("dbConnect.php");
if($conn->connect_error) {
    die("connection failed : ".$conn->connect_error);
 }
 else if($query!="") {
    $query=strtoupper($query);
    $sql = " select * from places  where location like '$query%'";
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