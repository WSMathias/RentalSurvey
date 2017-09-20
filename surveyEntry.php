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
        <div class="nav navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand">Region Survey</a>
                </div>
                <ul class="nav navbar-nav  navbar-right">
                    <li><a href="index.php">Home</a></li>
                    <li class="active"><a href="surveyEntry.php">Survey Entry</a></li>
                    <li><a href="#">Get statics</a></li>
                </ul>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-offset-1 col-md-6 col-md-offset-5 form_box ">
                  <form action="form.php" method="GET" >
                    <div class="form-group">
                    <label>Location </label>
                    <input type="text" class="form-control" id="location" name="place" placeholder="">
                    </div>
                    <div class="form-group">
                    <label>Area in sqft </label>
                    <input type="number" class="form-control"  name="area">
                    </div>
                    <div class="form-group">
                    <label>Price (Rs) </label>
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
                    <input type="button" value="Submit" class="submit_button col-md-offest-4  mol-md-offset-4 btn btn-primary">
                  </form>
                </div>
            </div>
        </div>    
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCPX7xWTZQaFlNYvwP59-P0oElX32Jrl3s&libraries=places&callback=initAutocomplete"
         async defer></script>
         <script src="./js/surveyEntry.js"></script>
    </body>
</html>