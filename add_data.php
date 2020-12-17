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

  $length = mysqli_query($dbhandle, "SELECT id FROM cars ORDER BY id DESC;");
  $id = $length->fetch_object()->id + 1;
  $name = $_POST['name'];
  $year = $_POST['year'];

  $result = false;
  if (strlen($name) < 5 || strlen($name) > 40) {
    echo json_encode($result);
  } elseif (intval($year) < 1999 || intval($year) > 2015) {
    echo json_encode($result);
  } else {
    $result = mysqli_query($dbhandle, "INSERT INTO cars VALUES($id, '$name', '$year');");
    echo json_encode($id);
  }

  mysqli_close($dbhandle);
?>
