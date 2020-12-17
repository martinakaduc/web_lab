<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Lab 09 - Logout</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
                           integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
                           crossorigin="anonymous">
    <link rel="stylesheet" href="static/css/lab09_register.css">
    <script src="https://code.jquery.com/jquery-latest.js"></script>
    <script>

      function logout()
      {
        document.cookie = "email= ; expires = Thu, 01 Jan 1970 00:00:00 GMT"
        document.cookie = "password= ; expires = Thu, 01 Jan 1970 00:00:00 GMT"
      }

      $(document).ready(function() {
        logout()
        $("#register-btn").click(function() {
          $(location).attr('href', './lab09_register.php')
        })
        $("#login-btn").click(function() {
          $(location).attr('href', './lab09_login.php')
        })
      })

    </script>
   </head>

   <body>
     <div class="container">
       <h3>Already logout! Choose an option!</h3>
       <div class="row py-3">
        <div class="col-md-6">
          <input type="submit" name="" value="Login" id="login-btn"/>
        </div>
        <div class="col-md-6">
          <input type="submit" name="" value="Register" id="register-btn"/>
        </div>
       </div>
     </div>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
              integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
              crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
              integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
              crossorigin="anonymous"></script>
   </body>
</html>
