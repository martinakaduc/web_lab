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
  $result = mysqli_query($dbhandle, "SELECT id, name, year FROM cars")->fetch_all(MYSQLI_ASSOC);

  echo json_encode($result);

  mysqli_close($dbhandle);
?>
