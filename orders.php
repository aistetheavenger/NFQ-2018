<?php
include "connect.php";
connect();

if (isset($_GET["submit"])){
	echo "submitted";
}
?>

<!DOCTYPE html>
<html>
<head>
	<!-- data table -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css"/>
	<script type="text/javascript" src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script>
	<script type="text/javascript" charset="utf-8">
		$(document).ready(function() {
			$('#table').DataTable();
		} );
	</script>
	<!-- data table -->
	<title>Orders</title>
	<style type="text/css">
		body{background-color: #BCE7FD}
	</style>
</head>
<body>
	<div class="container">
		<table id="table">
			<thead >
				<tr>
					<th>Cupcake</th>
					<th>Frosting</th>
					<th>Toppings</th>
					<th>Quabtity</th>
					<th>Price</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$sql = "SELECT * FROM Orders";
				$result = mysqli_query($conn, $sql);
				if (mysqli_num_rows($result) > 0) {
					while($row = mysqli_fetch_assoc($result)){
						echo "<td>" . $row["base"] . "</td>" ."<td>" . $row["frost"] . "</td>" . "<td>" . $row["topping"] . "</td>" . "<td>" . $row["quantity"] . "</td>" . "<td>" . $row["price"] . "</td></tr>";
					}
				}              
				?>
			</tbody>
		</table>        
		<script type="text/javascript">
			$('#table')
			.addClass('table table-hover ');
		</script>
	</div>
	<?php 
	$conn->close();
	?>
</body>
</html>



