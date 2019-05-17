<html>
	<head><title>All users</title></head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<body>
		<table border="1" align="center" class="table table-dark">
			<thead ><tr>

				<th>First name</th>
				<th>Lastname name</th>
				<th>Email</th>
				<th>Photo</th>
			</tr></thead>
	</body>
</html>

<?php
	include "database.php";
	$n=1;
	  $sql_users="SELECT * FROM usuarios";
	  $result=$conn->query($sql_users);

	  if($result->num_rows > 0){
		  while ($row = $result->fetch_assoc()) {
			  echo "<tr><td>".$row['firstname']."</td>";
			  echo "<td>".$row['lastname']."</td>";
			  echo "<td>".$row['email']."</td>";
			  echo "<td align='center'><img src=".$row['photo']." width=50></td></tr>";
		  }
		  echo "</table>";
	  }else{
		  echo "::: No hay usuarios registrados :::";
	  }

?>
