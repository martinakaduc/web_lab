<?php
  function connect() {
    $username = "root";
    $password = "mysql";
    $hostname = "localhost";

    //connection to the database
    $dbhandle = mysqli_connect($hostname, $username, $password)
      or die("Unable to connect to MySQL");
    // echo "Connected to MySQL";
    $selected = mysqli_select_db($dbhandle, "examples")
      or die("Could not select examples");
    // $result = mysqli_query($dbhandle, "SELECT id, name, year FROM cars")->fetch_all(MYSQLI_ASSOC);

    return $dbhandle;
  }

  function login($post_data) {
    $dbhandle = connect();

    $email = $_POST['email'];
    $password = $_POST['password'];
    # Hash password
    // $hash_password = hashing($password);
    // if (!$hash_password) {
    //   return false;
    // }

    $result = check_account($dbhandle, $email, $password);
    return $result;
    if (!$result) {
      return false;
    } else {
      return $hash_password;
    }
    mysqli_close($dbhandle);

  }

  function hashing($password) {
    $hashed = password_hash($password, PASSWORD_BCRYPT);
    return $hashed;
  }

  function check_account($dbhandle, $email, $password) {
    $result = mysqli_query($dbhandle, "SELECT id, password FROM employee WHERE email='$email';");
    if ($result == false) {
      return false;
    } else {
      $user = $result->fetch_all(MYSQLI_ASSOC)[0];
      if (password_verify($password, $user["password"])) {
        return $user["password"];
      }
      return false;
    }
  }

  function check_account_hashed($post_data) {
    $dbhandle = connect();
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($dbhandle, "SELECT * FROM employee WHERE email='$email' AND password='$password';");

    if ($result == false) {
      return false;
    } else {
      $user = $result->fetch_all(MYSQLI_ASSOC);
      if (count($user) > 0) {
        $user[0]["password"] = NULL;
        return $user[0];
      }        
      return false;
    }

    mysqli_close($dbhandle);

  }

  function check_user($dbhandle, $email) {
    $result = mysqli_query($dbhandle, "SELECT id FROM employee WHERE email='$email';");
    if ($result == false) {
      return false;
    } else {
      $user = $result->fetch_all(MYSQLI_ASSOC);
      if (count($user) > 0)
        return true;

      return false;
    }
  }

  function register($post_data) {
    $dbhandle = connect();

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $about = $_POST['about'];
    $birthday = $_POST['birthday'];
    $country = $_POST['country'];
    $gender = $_POST['gender'];
    $type =  $_POST['type'];

    $user = check_user($dbhandle, $email);

    if ($user) {
      return false;
    }

    $hash_password = hashing($password);
    if (!$hash_password) {
      return false;
    }

    $result = mysqli_query($dbhandle, "INSERT INTO employee (fname,lname,type,password,email,phone,gender,birthday,country,about)
                                        VALUES('$fname',
                                               '$lname',
                                               '$type',
                                               '$hash_password',
                                               '$email',
                                               '$phone',
                                               '$gender',
                                               '$birthday',
                                               '$country',
                                               '$about');");
    $error =  mysqli_error($dbhandle);
    if ($error) {
      return false;
    } else {
      return true;
    }

    mysqli_close($dbhandle);
  }

?>
