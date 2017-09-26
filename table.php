<!DOCTYPE html>
<html lang="en">
<head>
  <title>Survey Statistics</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="css/main.css" rel="stylesheet">
  <link href="css/table.css" rel="stylesheet">
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
                    <li><a href="index.php" class="navbar-brand">RentalSurvey</a></li>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li ><a href="index.php">Home</a></li>
                        <li><a href="surveyEntry.php">Survey Entry</a></li>
                        <li class="active"><a href="table.php">Get statics</a></li>
                    </ul> 
                </div>
            </div>
 </div>
<!-- Table with the statistics about the data about different locations. -->
<div class=" row " >
<div class=" col-xs-11  col-sm-12  col-md-offset-1 col-md-10  col-md-offset-1" >           
  <table class=" table table-bordered">
    <thead>
      <tr>
        <th>Location</th>
        <th>Responders <a href="#" onclick="sortRespond()"><span class=" sort glyphicon glyphicon-sort"></span></a></th>
        <th>Avg Rent/sqft <a href="#" onclick="sortRent()"><span class=" sort glyphicon glyphicon-sort"></span></a></h>
        <th>Avg Deposit <a href="#" onClick="sortDeposit()"><span class=" sort glyphicon glyphicon-sort"></span></a></th>
        <th>Avg Lease Period <a href="#" onclick="sortPeriod()"><span class=" sort glyphicon glyphicon-sort"></span></a></th>
      </tr>
    </thead>
    <tbody id="tbrow">
    </tbody>
  </table>
  </div>
</div>
<script src="./js/HttpClient.js"></script>
<script src="./js/table.js"></script>
</body>
</html>

