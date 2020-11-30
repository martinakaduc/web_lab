<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Lab 06 - Exercise 04</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
                           integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
                           crossorigin="anonymous">
     <style>
       table, th, td {
         border: 1px solid black;
         background-color: yellow;
         padding: 5px 10px;
         text-align: center;
       }
     </style>
  </head>
  <body>
    <div align="center" style="vertical-align: middle;">
      <?php
          $languages = array ("a" => "A",
                              "b" => "B",
                              "q" => "Q");

          print "<table>";

          for ($i=0; $i<7; $i+=1) {
            print "<tr>";
            for ($k=0; $k<7; $k+=1) {
              print "<td>";
              echo(strval(($i+1) * ($k+1)));
              print "</td>";
            }
            print "</tr>";

          }

          print "</table>";
      ?>
    </div>
  </body>
</html>
