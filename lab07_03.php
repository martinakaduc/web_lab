<?php
  $username = "root";
  $password = "mysql";
  $hostname = "localhost";

  //connection to the database
  $dbhandle = mysqli_connect($hostname, $username, $password)
    or die("Unable to connect to MySQL");
  // echo "Connected to MySQL";
  $selected = mysqli_select_db($dbhandle, "examples")
    or die("Could not select examples");
  $result = mysqli_query($dbhandle, "SELECT id, name, year FROM cars");
?>
<html lang="en">
<head>
	 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Lab 07 - Exercise 03</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
                           integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
                           crossorigin="anonymous">
   <script src="https://code.jquery.com/jquery-latest.js"></script>
    <style type="text/css">
    table, th, td {
      border: 1px solid black;
      margin: auto;
    }
    </style>
</head>
<body>
  <div class="container">
    <div class="row py-3">
      <div class="col-md-12 col-lg-6">
        <table>
          <tr>
            <th> ID </th>
            <th> Name </th>
            <th> Year </th>
          </tr>
          <?php foreach($result as $key => $value) { ?>
            <tr>
              <?php foreach($value as $k => $v) { ?>
                <td>
                  <?php echo $v;?>
                </td>
              <?php } ?>
            </tr>
          <?php } ?>
        </table>
      </div>
      <div class="col-md-12 col-lg-6">
        <form method="POST" action="./edit_record.php">
          <div class="form-group">
              <input type="id" class="form-control" placeholder="ID" value="" name="id"/>
          </div>
          <div class="form-group">
              <input type="name" class="form-control" placeholder="Name" value="" name="name"/>
          </div>
          <div class="form-group">
              <input type="year" class="form-control" placeholder="Year" value="" name="year"/>
          </div>
          <input type="submit" class="btn btn-primary"  value="Edit record"/>
        </form>
      </div>
    </div>
  </div>
</body>

<?php
  mysqli_close($dbhandle);
?>
