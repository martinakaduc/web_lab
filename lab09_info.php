<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Lab 09 - Info</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
                           integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
                           crossorigin="anonymous">
    <link rel="stylesheet" href="static/css/lab09_register.css">
    <script src="https://code.jquery.com/jquery-latest.js"></script>
    <script>

      function getCookie(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for(var i = 0; i < ca.length; i++) {
          var c = ca[i];
          while (c.charAt(0) == ' ') {
            c = c.substring(1);
          }
          if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
          }
        }
        return "";
      }

      function check_login()
      {
        var email = getCookie("email")
        var password = getCookie("password")

        $.post('check.php', {
          'password': password,
          'email': email,
          'action': "check"
  			}, function(data) {
  				// console.log(data)
          if (data !== 'false') {
            var user = JSON.parse(data)
            show_info(user)
          } else {
            window.location.href = "./lab09_login.php";
          }
  			})
      }

      function show_info(user) {
        // console.log(user)
        var container = document.getElementById("container")
        container.innerHTML = "<h3>Personal Information</h3>"

        for (var key in user) {
          if (key === "password" || key === "id")
            continue
          var row = "<div class='row'><div class='col-lg-3'><b><p>"
                    +key+"</p></b></div><div class='col-lg-9'><p>"
                    +user[key]+"</p></div></div>"
          container.innerHTML += row
        }
      }

      $(document).ready(function() {
        check_login()
        $("#logout-btn").click(function() {
          $(location).attr('href', './lab09_logout.php')
        })
      })

    </script>
   </head>

   <body>
     <div class="container" id="container">
     </div>

     <div class="container">
       <div class="row">
         <input type="submit" name="" value="Logout" id="logout-btn"/><br/>
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
