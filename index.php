<?php 
$currentURL = $_SERVER['REQUEST_URI'];
?>
<?php 
session_start();
    $searchLocation = $_GET["searchLocation"];
    $dbserver = "";
    $dbusername = "survey";
    $dbpassword = "survey";
    $dbname = "surveydb";
    $list = [];
    $conn = new mysqli($dbserver,$dbusername,$dbpassword,$dbname);
    if ($_GET["searchLocation"]!="")  {
        if($conn->connect_error) {
            die("connection failed : ".$conn->connect_error);
         }
         $sql = " select distinct(location) from survey where location like '%$searchLocation%'";
         if($result = $conn->query($sql)) {
            if (mysqli_num_rows($result)>0) {
                while ($row = $result->fetch_assoc()) {
                    $list[] = $row["location"];
                }
            } 
           /* else if(mysqli_num_rows($result)==1){
                $row=$result->fetch_assoc();
                header("Location: surveyResult.php?searchLocation=" . $row['location']);
            }*/
         }
    }
?>
<html>
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="css/main.css" rel="stylesheet">
    </head>
<body>
<div class="nav navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <li><a class="navbar-brand">RentalSurveyCompany</a></li>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="surveyEntry.php">Survey Entry</a></li>
                    <!--<li><a href="surveyResult.php">Survey Result</a></li>-->
                    <li><a href="<?php echo $currentURL. '?stat=true'; ?>">Get statics</a></li>
                </ul> 
            </div>
 </div>
 
 <?php 
        if ($_GET["stat"] == 'true') {
            include("stats.php");
        }

        ?>
<div class="jumbotron heading text-center">
        <h1>Find your dream property.</h1>
        <h3> Every information at your finger tip. </h3>
</div>
 <div class="container">
       <div class="row">
            <div class="col-md-offset-2 col-md-8 col-md-offset-2">
            <form class="search_box" action="index.php">
                     <input type="text" class="form-control" name="searchLocation" >
                     <a href="#" class="btn btn-info btn-lg"><span class="glyphicon glyphicon-search"></span> </a>
            </form>
            <?php
                    session_start(); 
                    if (isset($_SESSION["statusMessage"]))
                    {
                    ?>
                    <div class="alert alert-danger alert-dismissable fade-in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <strong><?php
                            echo $_SESSION["statusMessage"];
                            unset($_SESSION["statusMessage"]);
                        ?></strong>
                    </div>
                    <?php 
                    }
                    ?>

            </div>
       </div>
       <div class="row">
       <div class="col-md-offset-4 col-md-4 col-md-offset-4">
                <ol>
                <?php 
                foreach($list as $row) {
                    echo '<li><a href="surveyResult.php?searchLocation=' .$row.'">'.$row .'</a> </li>';
                }
                ?>
                </ol>
       </div>
       </div>
 </div>

</body>
</html>