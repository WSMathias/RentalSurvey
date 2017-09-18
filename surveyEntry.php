<?php 
$currentURL = $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
        .form_box {
            background:grey;
            height:auto;
            margin-top:100px;
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
                    <li><a href="index.php">Home</a></li>
                    <li class="active"><a href="surveyEntry.php">Survey Entry</a></li>
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-offset-2 col-md-8 col-md-offset-2 form_box ">
                  <form action="form.php" method="GET" >
                    <div class="form-group">
                    <label>Location </label>
                    <input type="text" class="form-control" name="place">
                    </div>
                    <div class="form-group">
                    <label>Area in sqft </label>
                    <input type="number" class="form-control"  name="area">
                    </div>
                    <div class="form-group">
                    <label>Price </label>
                    <input type="number" class="form-control" name="price">
                    </div>
                    <div class="form-group">
                    <label>Desposit </label>
                    <input type="number" class="form-control" name="deposit">
                    </div>
                    <div class="form-group">
                    <label>Lease period(month) :</label>
                    <input type="number" class="form-control" name="lease">
                    </div>
                    <input type="submit"  class="submit_button col-md-offest-4  mol-md-offset-4 btn btn-primary">
                    <?php
                    session_start(); 
                    if (isset($_SESSION["statusMessage"]))
                    {
                    ?>
                    <div class="alert alert-<?php if($_SESSION['statusMessage']=='error') echo 'danger'; else echo 'success';?> alert-dismissable fade-in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <strong><?php
                            if ($_SESSION["statusMessage"] == "success")
                                echo "Successfully inserted!!";
                            else
                                echo "Fields cannot be empty";
                            unset($_SESSION["statusMessage"]);
                        ?></strong>
                    </div>
                    <?php 
                    }
                    ?>

                  </form>
                </div>
            </div>
        </div>
        
    </body>
</html>