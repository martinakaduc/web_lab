<html lang="en">
<head>
	 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Lab 08 - Exercise 03</title>
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
          while (data_table.childNodes.length > 2) {
            data_table.removeChild(data_table.lastChild)
          }

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
						data_table.appendChild(row)
					})
				}
      })
    }

    function editData() {
      edit_form = document.getElementById("edit-form")
      $.ajax({
        url: "edit_data.php",
        type: "post",
        dataType: "json",
        data: {
          id: edit_form.elements['id'].value,
          name: edit_form.elements['name'].value,
          year: edit_form.elements['year'].value
        },

        success: function( data ){
          // console.log(data)
          if (data === false) {
            alert("Cannot edit!")
          } else {
            loadData()
          }
        }
      })
    }

    $(document).ready(function() {
      loadData()
    })
    </script>
</head>
<body>
  <div class="container">
    <div class="row py-3">
      <div class="col-md-12 col-lg-6">
        <table id="data-table">
          <tr>
            <th> ID </th>
            <th> Name </th>
            <th> Year </th>
          </tr>

        </table>
      </div>
      <div class="col-md-12 col-lg-6">
        <form method="POST" action="javascript:editData()" id="edit-form">
          <div class="form-group">
              <input type="id" class="form-control" placeholder="ID" value="" name="id"/>
          </div>
          <div class="form-group">
              <input type="name" class="form-control" placeholder="Name" value="" name="name"/>
          </div>
          <div class="form-group">
              <input type="year" class="form-control" placeholder="Year" value="" name="year"/>
          </div>
          <input type="submit" class="btn btn-primary"  value="Edit record"/>
        </form>
      </div>
    </div>
  </div>
</body>
