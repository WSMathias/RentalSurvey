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
            if (mysqli_num_rows($result)>1) {
                while ($row = $result->fetch_assoc()) {
                    $list[] = $row["location"];
                }
            } 
            else {
                header("Location: surveyResult.php?searchLocation=$searchLocation");
            }
         }
    }
?>
<html>
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
        .search_box {
            height:auto;
            margin-top:200px;
            padding : 20px;
        }

        .submit_button {
            margin : 10px 42%;
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
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="surveyEntry.php">Survey Entry</a></li>
                    <li><a href="surveyResult.php">Survey Result</a></li>
                    <li><a href="<?php echo $currentURL. '?stat=true'; ?>">Get statics</a></li>
                </ul> 
            </div>
 </div>
 
 <?php 
        if ($_GET["stat"] == 'true') {
            include("stats.php");
        }

        ?>
 <div class="container">
       <div class="row">
            <div class="col-md-offset-3 col-md-7 col-md-offset-3">
            <form class="search_box" action="index.php">
                <div class="form-group">
                    <label> Enter Location </label>
                    <input type="text" class="form-control" name="searchLocation" >
                    <input type="submit" style="display:none;" >
                </div>
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