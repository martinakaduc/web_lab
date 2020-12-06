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
    header("Location: ./lab07_03.php");
  }
  if ($year != "" && (intval($year) < 1999 || intval($year) > 2015)) {
    header("Location: ./lab07_03.php");
  }

  $sql = "UPDATE cars SET";
  if ($name != "") {
    $sql = $sql." name='$name'";
  }
  if ($year != "") {
    $sql = $sql.", year='$year'";
  }
  $sql = $sql." WHERE id=$id;";

  $result = mysqli_query($dbhandle, $sql);
  echo mysqli_error($dbhandle);

  mysqli_close($dbhandle);
  header("Location: ./lab07_03.php");
?>
