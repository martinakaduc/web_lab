<html>
<head>
	 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Lab 06 - Exercise 05</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
                           integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
                           crossorigin="anonymous">
   <script src="https://code.jquery.com/jquery-latest.js"></script>
	<style type="text/css">
		table{
			background-color: #ABB1BA;
			margin: auto;
		}
		#result{
			width: 416px;
			height: 70px;
		}
		input {
			width: 50px;
			height: 50px;
		}
		#equ{
			width: 80px;
			height: 164px;
		}
		#zero{
			width: 164px;
			height: 80px;
		}
	</style>
</head>
<body>
  <div class="container-fluid">
    <div class="header text-center">
     <h2 class="w-100">Calculator</h2>
   </div>

        <div class="row">
          <div class="col-sm-0 col-md-2 col-lg-4"></div>

          <div class="col-10 col-sm-10 col-md-6 col-lg-3">
            <input type="text" class="w-100" id="result"/>

          </div>

          <div class="col-2 col-sm-2 col-md-2 col-lg-1">
            <input type="button" class="w-100" value="<-" onclick="del()"/>

          </div>

          <div class="col-sm-0 col-md-2 col-lg-4"></div>
        </div>



        <div class="row py-3">
          <div class="col-sm-0 col-md-2 col-lg-4"></div>
           <div class="col-3 col-sm-3 col-md-2 col-lg-1">
             <input type="button" class="w-100" value="C" onclick="clr()"/>
           </div>
           <div class="col-3 col-sm-3 col-md-2 col-lg-1">
             <input type="button" class="w-100" value="(" onclick="dis('(')"/>
           </div>
           <div class="col-3 col-sm-3 col-md-2 col-lg-1">
             <input type="button" class="w-100" value=")" onclick="dis(')')"/>
           </div>
           <div class="col-3 col-sm-3 col-md-2 col-lg-1">
             <input type="button" class="w-100" value="^" onclick="dis('^')"/>
           </div>
           <div class="col-sm-0 col-md-2 col-lg-4"></div>
        </div>

        <div class="row py-3">
          <div class="col-sm-0 col-md-2 col-lg-4"></div>
           <div class="col-3 col-sm-3 col-md-2 col-lg-1">
             <input type="button" class="w-100" value="7" onclick="dis('7')"/>
           </div>
           <div class="col-3 col-sm-3 col-md-2 col-lg-1">
             <input type="button" class="w-100" value="8" onclick="dis('8')"/>
           </div>
           <div class="col-3 col-sm-3 col-md-2 col-lg-1">
             <input type="button" class="w-100" value="9" onclick="dis('9')"/>
           </div>
           <div class="col-3 col-sm-3 col-md-2 col-lg-1">
             <input type="button" class="w-100" value="/" onclick="dis('/')"/>
           </div>
           <div class="col-sm-0 col-md-2 col-lg-4"></div>
        </div>

        <div class="row py-3">
          <div class="col-sm-0 col-md-2 col-lg-4"></div>
           <div class="col-3 col-sm-3 col-md-2 col-lg-1">
             <input type="button" class="w-100" value="4" onclick="dis('4')"/>
           </div>
           <div class="col-3 col-sm-3 col-md-2 col-lg-1">
             <input type="button" class="w-100" value="5" onclick="dis('5')"/>
           </div>
           <div class="col-3 col-sm-3 col-md-2 col-lg-1">
             <input type="button" class="w-100" value="6" onclick="dis('6')"/>
           </div>
           <div class="col-3 col-sm-3 col-md-2 col-lg-1">
             <input type="button" class="w-100" value="*" onclick="dis('*')"/>
           </div>
           <div class="col-sm-0 col-md-2 col-lg-4"></div>
        </div>

        <div class="row py-3">
          <div class="col-sm-0 col-md-2 col-lg-4"></div>
           <div class="col-3 col-sm-3 col-md-2 col-lg-1">
             <input type="button" class="w-100" value="1" onclick="dis('1')"/>
           </div>
           <div class="col-3 col-sm-3 col-md-2 col-lg-1">
             <input type="button" class="w-100" value="2" onclick="dis('2')"/>
           </div>
           <div class="col-3 col-sm-3 col-md-2 col-lg-1">
             <input type="button" class="w-100" value="3" onclick="dis('3')"/>
           </div>
           <div class="col-3 col-sm-3 col-md-2 col-lg-1">
             <input type="button" class="w-100" value="-" onclick="dis('-')"/>
           </div>
           <div class="col-sm-0 col-md-2 col-lg-4"></div>
        </div>

        <div class="row py-3">
          <div class="col-sm-0 col-md-2 col-lg-4"></div>
           <div class="col-3 col-sm-3 col-md-2 col-lg-1">
             <input type="button" class="w-100" value="." onclick="dis('.')"/>
           </div>
           <div class="col-3 col-sm-3 col-md-2 col-lg-1">
             <input type="button" class="w-100" value="0" onclick="dis('0')"/>
           </div>
           <div class="col-3 col-sm-3 col-md-2 col-lg-1">
             <input type="button" class="w-100" value="=" onclick="solve()"/>
           </div>
           <div class="col-3 col-sm-3 col-md-2 col-lg-1">
             <input type="button" class="w-100" value="+" onclick="dis('+')"/>
           </div>
           <div class="col-sm-0 col-md-2 col-lg-4"></div>
        </div>


   </div>
	<script type="text/javascript">
		var a = '', b = '', cal = '';
    var list_op = ["+", "-", "*", "/", "^"]

    function dis(val)
    {
        if (list_op.includes(val)) {
          let last_char = document.getElementById("result").value.slice(-1)
          if (list_op.includes(last_char)) {
            document.getElementById("result").value = document.getElementById("result").value.slice(0, -1) + val
            return
          }
        }

        document.getElementById("result").value += val
    }

    //function that evaluates the digit and return result
    function solve()
    {
        let x = document.getElementById("result").value
        x = x.replace("^", "**")
        // console.log(x)
        $.post('cal.php', {
  				'equa': x
  			}, function(data) {
  				// console.log(data)
  				$('#result').val(data)
  			})
    }

    //function that clear the display
    function clr()
    {
        document.getElementById("result").value = ""
    }

    //function that delete a character
    function del()
    {
        document.getElementById("result").value = document.getElementById("result").value.slice(0,-1)
    }
	</script>
</body>
</html>
