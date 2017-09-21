<?php
include("dbConnectPDO.php");
$stmt = $pdo->query(" select a.location,count(b.Lid) as lCount, ROUND(avg(b.price),2) as avgPrice,ROUND(avg(b.deposit),2) as avgDeposit, 
ROUND(avg(b.lease_period),2) as avgLease from places a,
details b where a.id=b.Lid group by a.id order by avgPrice  ");
//returns jason result as json object
echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
?>