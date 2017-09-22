/**
* Generates statistics fo the complete data in the database based on location.
*/
<?php
$sort=$_GET["sort"];
$sortType=$_GET["type"];
$qsort;

include("dbConnectPDO.php");
if($sort=="" && $sortType==""){
        $stmt = $pdo->query(" select a.location,count(b.Lid) as lCount, ROUND(avg(b.price),2) as avgPrice,ROUND(avg(b.deposit),2) as avgDeposit, 
        ROUND(avg(b.lease_period),2) as avgLease from places a,
        details b where a.id=b.Lid group by a.id order by avgPrice");
        // returns jason result as json object
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
}
else{
        $qry="select a.location,count(b.Lid) as lCount, ROUND(avg(b.price),2) as avgPrice,ROUND(avg(b.deposit),2) as avgDeposit, 
        ROUND(avg(b.lease_period),2) as avgLease from places a,
        details b where a.id=b.Lid group by a.id order by ";
        include("dbConnectPDO.php");
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
/**
* return {boolean}
*/
        $qry=$qry." ".$qsort;        $stmt = $pdo->query("$qry");
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    }?>