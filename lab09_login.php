<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Lab 09 - Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
                           integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
                           crossorigin="anonymous">
    <link rel="stylesheet" href="static/css/lab09_register.css">
    <script src="https://code.jquery.com/jquery-latest.js"></script>
    <script>

      function submit()
      {
        // console.log("Submit")
        var password = $('input[name=password]').val()
        var email = $('input[name=email]').val()

        var htype = $("#profile-tab").attr('aria-selected')
        var type = "employee"
        if (htype === true) {
          type = "hirer"
        }

        $.post('check.php', {
          'password': password,
          'email': email,
          'type': type,
          'action': "login"
  			}, function(data) {
  				// console.log(data)
  				// alert(data)
          if (data !== 'false') {
            // Store cookie here
            document.cookie = "email="+email+";"
            document.cookie = "password="+data.substring(1,data.length-1)+";"
            window.location.href = './lab09_info.php'
          } else {
            alert("Login failed!")
            // clear_field()
          }
  			})

      }

      function clear_field()
      {
        $('input[name=password]').val("")
        $('input[name=email]').val("")
      }

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
            window.location.href = "./lab09_info.php"
          }
  			})
      }

      $(document).ready(function() {
        check_login()
        $("#register-btn").click(function() {
          $(location).attr('href', './lab09_register.php')
        })
      })

    </script>
   </head>

   <body>
     <div class="container-fluid register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                <h3>Welcome</h3>
                <p>Don't have any account yet! Register now!</p>
                <input type="submit" name="" value="Register" id="register-btn"/><br/>
            </div>
            <div class="col-md-9 register-right">
                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Employee</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Hirer</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Login as a Employee</h3>
                        <div class="container register-form">

                            <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <input type="email" class="form-control" placeholder="Email" value="" name="email"/>
                                  </div>
                                  <div class="form-group">
                                      <input type="password" class="form-control" placeholder="Password" value="" name="password"/>
                                  </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-6">
                                <input type="submit" class="btnRegister px-2"  value="Login" onclick="submit()"/>
                                <input type="button" class="btnClear px-2"  value="Clear All" onclick="clear_field()"/>
                              </div>

                            </div>

                        </div>
                    </div>
                    <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <h3  class="register-heading">Login as a Hirer</h3>
                        <div class="container register-form">

                          <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email" value="" name="email"/>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password" value="" name="password"/>
                                </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              <input type="submit" class="btnRegister px-2"  value="Login" onclick="submit()"/>
                              <input type="button" class="btnClear px-2"  value="Clear All" onclick="clear_field()"/>
                            </div>

                          </div>

                        </div>
                    </div>
                </div>
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
