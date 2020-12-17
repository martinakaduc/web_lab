<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Lab 09 - Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
                           integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
                           crossorigin="anonymous">
    <link rel="stylesheet" href="static/css/lab09_register.css">
    <script src="https://code.jquery.com/jquery-latest.js"></script>
    <script>

      function submit()
      {
        // console.log("Submit")
        var fname = $('input[name=fname]').val()
        var lname = $('input[name=lname]').val()
        var password = $('input[name=password]').val()
        var re_password = $('input[name=re-password]').val()
        var email = $('input[name=email]').val()
        var phone = $('input[name=phone]').val()
        var about = $('textarea[name=about]').val()
        var birthday = $('input[name=birthday]').val()
        var country = $('select[name=country]').val()
        var gender = $('input[name=gender]').val()

        var htype = $("#profile-tab").attr('aria-selected')
        var type = "employee"
        if (htype === true) {
          type = "hirer"
        }

        $.post('check.php', {
  				'fname': fname,
          'lname': lname,
          'password': password,
          're_password': re_password,
          'email': email,
          'phone': phone,
          'about': about,
          'birthday': birthday,
          'country': country,
          'gender': gender,
          'type': type,
          'action': "register"
  			}, function(data) {
          // console.log(data)
          if (data === 'true') {
            window.location.href = './lab09_login.php'
          } else {
            alert("Register failed!")
            // clear_field()
          }
  			})

      }

      function clear_field()
      {
        // console.log("Clear")
        $('input[name=fname]').val("")
        $('input[name=lname]').val("")
        $('input[name=password]').val("")
        $('input[name=re-password]').val("")
        $('input[name=email]').val("")
        $('input[name=phone]').val("")
        $('textarea[name=about]').val("")
        $('input[name=birthday]').val("")
        $('select[name=country]').prop("selectedIndex",0)
        $('input[name=gender]').prop('checked', false);
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
        $("#login-btn").click(function() {
          $(location).attr('href', './lab09_login.php')
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
                <p>Already have an account? Login now!</p>
                <input type="submit" name="" value="Login" id="login-btn"/><br/>
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
                        <h3 class="register-heading">Apply as a Employee</h3>
                        <div class="container register-form">

                            <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <input type="text" class="form-control" placeholder="First Name" value="" name="fname"/>
                                  </div>
                                  <div class="form-group">
                                      <input type="text" class="form-control" placeholder="Last Name" value="" name="lname"/>
                                  </div>
                                  <div class="form-group">
                                      <input type="password" class="form-control" placeholder="Password" value="" name="password"/>
                                  </div>
                                  <div class="form-group">
                                      <input type="password" class="form-control"  placeholder="Confirm Password" value="" name="re-password"/>
                                  </div>
                              </div>

                              <div class="col-md-6">
                                  <div class="form-group">
                                      <input type="email" class="form-control" placeholder="Email" value="" name="email"/>
                                  </div>
                                  <div class="form-group">
                                      <input type="text" minlength="10" maxlength="10" name="phone" class="form-control" placeholder="Phone Number" value="" />
                                  </div>
                                  <div class="form-group">
                                      <input placeholder="Birthday" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="birthday">
                                  </div>
                                  <div class="form-group">
                                      <select class="form-control" name="country">
                                          <option class="hidden" selected disabled value="none">Country</option>
                                          <option value="vietnam">Vietnam</option>
                                          <option value="australia">Australia</option>
                                          <option value="unitedstates">United State</option>
                                          <option value="india">India</option>
                                          <option value="other">Other</option>
                                      </select>
                                  </div>
                              </div>

                            </div>

                            <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group" style="height: 8em;">
                                      <textarea placeholder="About" class="form-control w-100 h-100" type="text" name="about"></textarea>
                                  </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <div class="maxl">
                                          <label class="radio inline">
                                              <input type="radio" name="gender" value="male" checked>
                                              <span> Male </span>
                                          </label>
                                          <label class="radio inline">
                                              <input type="radio" name="gender" value="female">
                                              <span>Female </span>
                                          </label>
                                          <label class="radio inline">
                                              <input type="radio" name="gender" value="female">
                                              <span>Other </span>
                                          </label>
                                      </div>
                                  </div>
                              </div>

                              <div class="col-md-6">
                                <input type="submit" class="btnRegister px-2"  value="Register" onclick="submit()"/>
                                <input type="button" class="btnClear px-2"  value="Clear All" onclick="clear_field()"/>
                              </div>

                            </div>

                        </div>
                    </div>
                    <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <h3  class="register-heading">Apply as a Hirer</h3>
                        <div class="container register-form">

                            <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <input type="text" class="form-control" placeholder="First Name" value="" name="fname"/>
                                  </div>
                                  <div class="form-group">
                                      <input type="text" class="form-control" placeholder="Last Name" value="" name="lname"/>
                                  </div>
                                  <div class="form-group">
                                      <input type="password" class="form-control" placeholder="Password" value="" name="password"/>
                                  </div>
                                  <div class="form-group">
                                      <input type="password" class="form-control"  placeholder="Confirm Password" value="" name="re-password"/>
                                  </div>
                              </div>

                              <div class="col-md-6">
                                  <div class="form-group">
                                      <input type="email" class="form-control" placeholder="Email" value="" name="email"/>
                                  </div>
                                  <div class="form-group">
                                      <input type="text" minlength="10" maxlength="10" name="phone" class="form-control" placeholder="Phone Number" value="" />
                                  </div>
                                  <div class="form-group">
                                      <input placeholder="Birthday" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="birthday">
                                  </div>
                                  <div class="form-group">
                                      <select class="form-control" name="country">
                                          <option class="hidden" selected disabled value="none">Country</option>
                                          <option value="vietnam">Vietnam</option>
                                          <option value="australia">Australia</option>
                                          <option value="unitedstates">United State</option>
                                          <option value="india">India</option>
                                          <option value="other">Other</option>
                                      </select>
                                  </div>
                              </div>

                            </div>

                            <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group" style="height: 8em;">
                                      <textarea placeholder="About" class="form-control w-100 h-100" type="text" name="about"></textarea>
                                  </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <div class="maxl">
                                          <label class="radio inline">
                                              <input type="radio" name="gender" value="male" checked>
                                              <span> Male </span>
                                          </label>
                                          <label class="radio inline">
                                              <input type="radio" name="gender" value="female">
                                              <span>Female </span>
                                          </label>
                                          <label class="radio inline">
                                              <input type="radio" name="gender" value="female">
                                              <span>Other </span>
                                          </label>
                                      </div>
                                  </div>
                              </div>

                              <div class="col-md-6">
                                <input type="submit" class="btnRegister px-2"  value="Register" onclick="submit()"/>
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
