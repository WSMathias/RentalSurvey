<html>
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="./js/HttpClient.js"></script>
        <link href="css/main.css" rel="stylesheet">
        <link href="css/index.css" rel="stylesheet">
    </head>
<body>
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
 
<div class="jumbotron heading text-center">
        <h1>Find your dream property.</h1>
        <h3> Every information at your finger tip. </h3>
</div>
 <div class="container">
       <div class="row">
            <div class="col-md-offset-2 col-md-8 col-md-offset-2 col-xs-offset-1 col-xs-10 col-xs-offset-1">
            <form class="search_box" action="index.php">
                    <div class="form-container">
                        <a href="#" class="btn btn-info btn-lg" type="submit"><span class="glyphicon glyphicon-search"></span> </a>
                        <a href="#" onclick="toggleAdvancedOptions()" class="advancedSearch btn btn-info btn-md">Advanced</a>
                        <input type="text" class="form-control" id="searchTxt" onkeyup="suggestPlaces()" name="searchLocation" placeholder="Search by location" autocomplete="off">
                        <div id="suggestion">
                            <!-- <span>suggestion dropdown</span> -->
                        </div>
                    </div>
                    <div class="row advanced_option">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Area</label>
                                <select id="area" name="area" class="form-control">
                                    <option>--</option>
                                    <option>200-600</option>
                                    <option>600-1100</option>
                                    <option>1100-1800</option>
                                    <option>above 1800</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Deposit</label>
                                <select id="deposit" name="deposit" class="form-control">
                                    <option>--</option>
                                    <option>30000-70000</option>
                                    <option>70001-120000</option>
                                    <option>above 120000</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Lease Period</label>
                                <select id="lease" name="lease" class="form-control">
                                    <option>--</option>
                                    <option>30000-70000</option>
                                    <option>70001-120000</option>
                                    <option>above 120000</option>
                                </select>
                            </div>
                        </div>
                    </div>                             
            </form>
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
 <script src="./js/index.js"></script>
</body>
</html>