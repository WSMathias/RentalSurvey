<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php
include(dbConnect.php);
  if($conn->connect_error) {
      die("connection failed : ".$conn->connect_error);
  }
   $sql = " SELECT  COUNT(DISTINCT location) from survey";
   if($result = $conn->query($sql)) {
      if (mysqli_num_rows($result)>0) {
          while ($row = $result->fetch_assoc()) {
              $list[] = $row;
          }
      } 
    }
?>
<div class="container">
  <h2>Bordered Table</h2>
  <p>The .table-bordered class adds borders to a table:</p>            
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Location</th>
        <th>Responders</th>
        <th>Avg Rent</th>
        <th>Avg Deposit</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>BTM</td>
        <td>20</td>
        <td>15000</td>
        <td>50000</td>
      </tr>
    </tbody>
  </table>
</div>
</body>
</html>

