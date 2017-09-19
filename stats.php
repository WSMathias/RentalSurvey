<?php
$highDemand;
$lowDemand;
$dbserver = "";
$dbusername = "survey";
$dbpassword = "survey";
$dbname = "surveydb";
$connDemand = new mysqli($dbserver,$dbusername,$dbpassword,$dbname);
$sqlMinDemand = "select location from survey where price in(select min(price) from survey)";
if ($result=$connDemand->query($sqlMinDemand)) {
    if (mysqli_num_rows($result) > 0) {
        $lowDemand = $result->fetch_assoc()["location"]; 
    }
}
$sqlMaxDemand = "select location from survey where price in(select max(price) from survey)";
if ($result=$connDemand->query($sqlMaxDemand)) {
    if (mysqli_num_rows($result) > 0) {
        $highDemand = $result->fetch_assoc()["location"]; 
    }
}
?>
   <div class="row alert-box"  
    style=
    "position:fixed;
     z-index:9999;
     height:100vh;
     top:0px;
     background-color:transparent; width:100vw;">
     <div  style="position:absolute;
        top:30%;
        left:25%;
        width:54vw;
        z-index:10000;
        ">
        <a href="<?php echo $_SERVER["SCRIPT_NAME"]; ?>" style="padding:5px;" class="close" data-dismiss="alert-box">X</a>
            <div class="alert alert-info" style="padding:40px; border:2px solid black;">  
            <h3 style="color:red;">High demand area :<?php echo '<a href="surveyResult.php?searchLocation='.$highDemand .'">'. $highDemand; ?></a></h3>
            <h3 style="color:green;">Low demand area : <?php echo '<a href="surveyResult.php?searchLocation='.$lowDemand .'">'. $lowDemand; ?></a></h3>
       </div>
    </div>
</div>
