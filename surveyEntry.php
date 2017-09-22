<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com"> </script>
        <link href="css/main.css" rel="stylesheet">
        <link href="css/surveyEntry.css" rel="stylesheet">
    </head>
    <body>
    <!-- Navbar -->
        <div class="nav navbar-inverse">
                <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <li><a class="navbar-brand">RentalSurvey</a></li>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="index.php">Home</a></li>
                        <li><a href="surveyEntry.php">Survey Entry</a></li>
                        <li><a href="table.php">Get statics</a></li>
                    </ul> 
                </div>
            </div>
        </div>
        <!-- Form to entry details -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-offset-3 col-md-6 col-md-offset-3 form_box ">
                  <form action="form.php" method="POST" >
                    <div class="form-group">
                    <label>Location </label>
                    <input type="text" class="form-control" id="location" name="place" placeholder="">
                    </div>
                    <div class="form-group">
                    <label>Area (sqft)</label>
                    <input type="number" class="form-control"  name="area">
                    </div>
                    <div class="form-group">
                    <label>Price (Rs) </label>
                    <input type="number" class="form-control" name="price">
                    </div>
                    <div class="form-group">
                    <label>Desposit (Rs) </label>
                    <input type="number" class="form-control" name="deposit">
                    </div>
                    <div class="form-group">
                    <label>Lease period(month) :</label>
                    <input type="number" class="form-control" name="lease">
                    </div>
                    <div class="text-center">
                    <input type="submit" value="Submit" class="submit_button col-md-offest-4  mol-md-offset-4 btn btn-primary">
                    </div>
                  </form>
                </div>
            </div>
        </div> 
        <!-- Alert Box -->
        <div class="container-fluid alert_box">
            <div class="row">
                <div class="col-md-offset-3 col-md-6 col-md-offset-3">
                  <div class="alert alert-info" style="<?php 
                /**
                * Displays the status message if any.
                */
                 session_start();
                  if (!isset($_SESSION["statusMessage"]) || $_SESSION["statusMessage"] == "")
                    echo 'display:none;';
                  else
                    echo 'display:block;';
                   ?>">
                        <?php      
                        if (isset($_SESSION["statusMessage"]) || $_SESSION["statusMessage"] != "")
                            {echo $_SESSION["statusMessage"];
                                unset($_SESSION["statusMessage"]);
                            }
                                                  
                        ?>
                  </div>
                </div>
            </div>
        </div> 
           
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCPX7xWTZQaFlNYvwP59-P0oElX32Jrl3s&libraries=places&callback=initAutocomplete"
         async defer></script>
         <script src="./js/surveyEntry.js"></script>
    </body>
</html>