<html lang="en">
<head>
	 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Lab 08 - Exercise 01</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
                           integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
                           crossorigin="anonymous">
   <script src="https://code.jquery.com/jquery-latest.js"></script>
    <style type="text/css">
    table, th, td {
      border: 1px solid black;
      margin: auto;
    }
    </style>
    <script>
    function loadData() {
      $.ajax({
        url: "get_data.php",
    		type: "get",
    		dataType: "json",

    		success: function( data ){
					// console.log(data)
    			data_table = document.getElementById("data-table")

					data.forEach(function (item, index) {
						// console.log(item)
						row = document.createElement("TR")
						col1 = document.createElement("TD")
						col2 = document.createElement("TD")
						col3 = document.createElement("TD")
						col1.innerHTML = item["id"]
						col2.innerHTML = item["name"]
						col3.innerHTML = item["year"]
						row.appendChild(col1)
						row.appendChild(col2)
						row.appendChild(col3)
						data_table.appendChild(row);
					})
				}
      })
    }

    $(document).ready(function() {
      loadData()
    })
    </script>
</head>
<body>
  <table id="data-table">
    <tr>
      <th> ID </th>
      <th> Name </th>
      <th> Year </th>
    </tr>

  </table>
</body>
