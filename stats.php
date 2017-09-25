
<?php
/**
* Generates statistics fo the complete data in the database based on location.
*/
$sort=$_GET["sort"];
$sortType=$_GET["type"];
$qsort;
require_once("./dbConnect.php");
function jsonResponse($qry) {
    global $qsort,$qry,$conn;
    $list = [];
    $result = $conn->query($qry);
    if (mysqli_num_rows($result) > 0) { 
         while ($row = $result->fetch_assoc())  {
            $list[] = $row;
         }
    echo json_encode($list);
    } else 
    echo json_encode(array("status" => null));
 
}
if($sort=="" && $sortType==""){
        $qry=" select a.location,count(b.Lid) as lCount, ROUND(avg(b.price),2) as avgPrice,ROUND(avg(b.deposit),2) as avgDeposit, 
        ROUND(avg(b.lease_period),2) as avgLease from places a,
        details b where a.id=b.Lid group by a.id order by avgPrice";
        jsonResponse($qry);
}
else{
        $qry="select a.location,count(b.Lid) as lCount, ROUND(avg(b.price),2) as avgPrice,ROUND(avg(b.deposit),2) as avgDeposit, 
        ROUND(avg(b.lease_period),2) as avgLease from places a,
        details b where a.id=b.Lid group by a.id order by ";
        if($sortType=="ASC"){
            switch ($sort){
                case "respond":{
                    $qsort="lCount";
                    break;
                }
                case "rent":{
                    $qsort="avgPrice";
                    break;
                }
                case "deposit":{
                    $qsort="avgDeposit";
                    break;
                }
                case "lease":{
                    $qsort="avgLease";
                    break;
                }
            }
            $qsort=$qsort." ".$sortType;
        }
        else if($sortType=="DESC"){
            switch ($sort){
                case "respond":{
                    $qsort="lCount";
                    break;
                }
                case "rent":{
                    $qsort="avgPrice";
                    break;
                }
                case "deposit":{
                    $qsort="avgDeposit";
                    break;
                }
                case "lease":{
                    $qsort="avgLease";
                    break;
                }
            }
            $qsort=$qsort." ".$sortType;
        }
        $qry=$qry." ".$qsort; 
        jsonResponse($qry);
    }
?>
