<?php
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$password = $_POST['password'];
$re_password = $_POST['re_password'];
$phone = $_POST['phone'];
$about = $_POST['about'];
$birthday = $_POST['birthday'];
$country = $_POST['country'];
$gender = $_POST['gender'];

if (strlen($fname) < 2 || strlen($fname) > 30) {
  echo "Please correct First Name";
} else

if (strlen($lname) < 2 || strlen($lname) > 30) {
  echo "Please correct Last Name";
} else

if (!preg_match("/\S+@\S+\.\S+/", $email)) {
  echo "Please correct Email";
} else

if (strlen($password) < 2 || strlen($password) > 30) {
  echo "Please correct Password";
} else

if ($password != $re_password) {
  echo "Password does not match!";
} else

if (is_null($birthday)) {
  echo "Please correct birthday!";
} else

if (is_null($country)) {
  echo "Please correct country!";
} else

if (strlen($about) > 1000) {
  echo "Please correct About";
} else

echo "Complete!";

?>
