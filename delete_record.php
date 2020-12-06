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

  $id = $_POST["id"];

  $result = mysqli_query($dbhandle, "DELETE FROM cars WHERE id=$id;");
  echo mysqli_error($dbhandle);

  mysqli_close($dbhandle);
  header("Location: ./lab07_04.php");
?>
