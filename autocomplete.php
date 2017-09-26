
<?php
/**
*  Returns the list of locations for the search 
*/
$return_arr = Array();
$query = $_GET["q"];
require_once("./dbConnectPDO.php");
if($conn->connect_error) {
    die("connection failed : ".$conn->connect_error);
 } else if($query!="") {
        $query=strtoupper($query);
        $sql = " select distinct(a.location) from places a,details b  where a.id=b.Lid and  location like '$query%'";
            $stmt = $dbh->prepare($sql);
            $stmt->execute();
        if($stmt->rowCount()>0) {
            echo json_encode($stmt->fetchAll( PDO::FETCH_ASSOC ));
        }
        else
            echo json_encode("");
} else
    echo json_encode("");
?>