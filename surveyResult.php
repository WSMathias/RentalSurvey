<?php 
session_start();
$currentURL = $_SERVER['REQUEST_URI'];
if ($_GET["searchLocation"] != "") {
    $searchString = $_GET["searchLocation"];
    $dbserver = "";
    $dbusername = "survey";
    $dbpassword = "survey";
    $dbname = "surveydb";
    $location ;
    $averagePrice ;
    $averageDeposit;
    $averageLease ;
    $conn = new mysqli($dbserver,$dbusername,$dbpassword,$dbname);
    if($conn->connect_error) {
       die("connection failed : ".$conn->connect_error);
    }
    $sql = "select avg(price) as avgPrice,avg(deposit) as avgDeposit,avg(lease_period) as avgLease from survey where location like '$searchString'";
    if($result = $conn->query($sql)) {
       if (mysqli_num_rows($result)==0){
           $_SESSION["statusMessage"] = "No such location";
            header("Location: index.php");
       }else {
        while ($row = $result->fetch_assoc()) {                
                $averagePrice = $row["avgPrice"];
                $averageDeposit = $row["avgDeposit"];
                $averageLease = $row["avgLease"];
         }
       }
    }
}else {    
    header("Location: index.php");
}

?>
<html>
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
        .jumbotron {
            height:auto;
            margin-top:100px;
            padding : 20px;
        }

        </style>
    </head>
  
<body>
<div class="nav navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand">Region Survey</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="surveyEntry.php">Survey Entry</a></li>
                    <li class="active"><a href="surveyResult.php">Survey Result</a></li>
                    <li><a href="<?php echo $currentURL. '&stat=true'; ?>">Get statics</a></li>
                </ul>
            </div>
 </div>
 
 <?php 
        if ($_GET["stat"] == 'true') {
            include("stats.php");
        }

        ?>
 <div class="container">
        <div class="jumbotron">
            <h1>Location : <?php echo strtoupper($searchString); ?></h1>
            <h3>Average Price :<?php echo $averagePrice; ?></h3>
            <h3>Average Deposit : <?php echo $averagePrice; ?></h3>
            <h3>Average Lease Period : <?php echo $averageLease; ?></h3>
        </div>
        
 </div>

</body>
</html>