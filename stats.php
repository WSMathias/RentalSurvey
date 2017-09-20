<?php
include("dbConnectPDO.php");
$stmt = $pdo->query("select a.location,count(b.Lid) as lCount,avg(b.price) as avgPrice,avg(b.deposit) as avgDeposit, avg(b.lease_period) as avgLease from places a,details b where a.id=b.Lid group by a.id");
//returns jason result as json object
echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
?>