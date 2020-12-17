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
  $success = false;

  $id_arr = mysqli_query($dbhandle, "SELECT id FROM cars;")->fetch_all(MYSQLI_ASSOC);
  foreach($id_arr as $key =>$value) {
    if ($value == $id) {
      $success = true;
      break;
    }
  }

  if ($success) {
    $result = mysqli_query($dbhandle, "DELETE FROM cars WHERE id=$id;");
    echo json_encode(true);
  } else {
    echo json_encode(false);
  }  

  mysqli_close($dbhandle);
?>
