<?php 
/**
* Generates the data for the searched location and stores it into and array.
*/
session_start();
$list = [];

if ($_GET["searchLocation"] != "") {
        $searchString = $_GET["searchLocation"];
        $area = $_GET["area"];
        if ($area != "--") {
            switch ($area)  {
                case "200-600" : {
                    $area = " and area > 200 and area < 600";
                    break;
                } 
                case "600-1100" : {
                    $area = " and area > 600 and area < 1100";
                    break;
                } 
                case "1100-1800" : {
                    $area = " and area > 1100 and area < 1800";
                    break;
                } 
                case "above 1800" : {
                    $area = " and area > 1800";
                    break;
                } 
            }
        } else{
            $area = "";
        }
        $deposit = $_GET["deposit"];
        if ($deposit != "--") {
            switch ($deposit)  {
                case "30000-70000" : {
                    $deposit = " and deposit > 3000 and deposit < 70000";
                    break;
                } 
                case "70000-120000" : {
                    $deposit = " and deposit > 70000 and deposit < 120000";
                    break;
                } 
                case "above 120000" : {
                    $deposit = " and deposit > 120000";
                    break;
                } 
            }
        } else{
            $deposit = "";
        }
        


        $lease = $_GET["lease"];
        if ($lease != "--") {
            switch ($lease)  {
                case "1-6" : {
                    $lease = " and lease_period > 1 and lease_period < 6";
                    break;
                } 
                case "6-15" : {
                    $lease = " and lease_period > 6 and lease_period < 15";
                    break;
                } 
                case "above 15" : {
                    $lease = " and lease_period > 15";
                    break;
                } 
            }
        } else{
            $lease = "";
        }
        include("dbConnect.php");
        if($conn->connect_error) {
        die("connection failed : ".$conn->connect_error);
        }
        $sql = "select * from places a,details b where a.id=b.Lid and  a.location='$searchString' $area $deposit $lease";
        if($result = $conn->query($sql)) {
        if (mysqli_num_rows($result)>0){            
                while ($row = $result->fetch_assoc()) 
                    $list[] = $row;
        } else {
                header("Location: index.php");
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
        <link href="css/main.css" rel="stylesheet">
        <link href="css/surveyResult.css" rel="stylesheet">
    </head>
<body>
<!-- Navbar -->
<div class="nav navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand">Region Survey</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="surveyEntry.php">Survey Entry</a></li>
                    <li class="active"><a href="surveyResult.php">Survey Result</a></li>
                    <li><a href="table.php">Get statics</a></li>
                </ul>
            </div>
 </div>
<!-- Table with the list of location with details. -->
 <div class="container">
        <div class="row">
          <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">           
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>LOCATION</th>
                    <th>AREA</th>
                    <th>DEPOSIT</th>
                    <th>LEASE PERIOD</th>
                </tr>
                </thead>
                <tbody id="tbrow">
                <?php
                /**
                * Displays the data stored in the array in the form of table .
                */
                foreach ($list as $row)
                {
                    
                    echo '<tr><td>'. $row["location"].'</td>
                    <td>'. $row["AREA"].'</td>
                    <td>'. $row["DEPOSIT"].'</td>
                    <td>'. $row["LEASE_PERIOD"].'</td><tr>';
                    
                }
                ?>
                </tbody>
            </table>
          </div>
        </div>    
 </div>
</body>
</html>