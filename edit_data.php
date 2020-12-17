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
  $name = $_POST['name'];
  $year = $_POST['year'];

  if (strlen($name) < 5 || strlen($name) > 40) {
    echo json_encode(false);
  } elseif ($year != "" && (intval($year) < 1999 || intval($year) > 2015)) {
    echo json_encode(false);
  } else {
    $success = false;

    $id_arr = mysqli_query($dbhandle, "SELECT id FROM cars;")->fetch_all(MYSQLI_ASSOC);
    foreach($id_arr as $key =>$value) {
      if ($value == $id) {
        $success = true;
        break;
      }
    }
    if ($success) {
      $sql = "UPDATE cars SET";
      if ($name != "") {
        $sql = $sql." name='$name'";
      }
      if ($year != "") {
        $sql = $sql.", year='$year'";
      }
      $sql = $sql." WHERE id=$id;";

      $result = mysqli_query($dbhandle, $sql);
      echo json_encode(true);
    } else {
      echo json_encode(false);
    }  
  }

  mysqli_close($dbhandle);
?>
