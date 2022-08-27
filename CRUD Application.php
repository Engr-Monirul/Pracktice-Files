<?php
	$con=mysqli_connect("localhost","root","","mydb");
	$conErr = $pid = $pn = $qn = $ppu = $result = "";
	
	if(!$con)
		echo "<p style='color:red;font-size:20px;'>*</p>";
	else
		echo "<p style='color:green;font-size:20px;'>*</p>";
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		$pid = test($_POST["pid"]);
		$pn = test($_POST["pn"]);
		$qn = test($_POST["qn"]);
		$ppu = test($_POST["ppu"]);
	}
	function test($data)
	{
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}
	
	$add="INSERT INTO crud(ProductID,ProductName,Quantity,PricePerUnit) VALUES('$pid','$pn','$qn','$ppu')";
	mysqli_query($con, $add);
	
	$gd = "SELECT * FROM crud";
	$gdata = mysqli_query($con,$gd);
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>CRUD Application</title>
		<meta charset="UTF-8">
		<meta name="author" content="Rafsan">
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<script>
		</script>
		<style>
			#t1{margin-left:40%;margin-top:5%;}
			#t2{}
		</style>
	</head>
	<body>
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
		<table id="t1">
			<tr>
				<td>Product ID</td>
				<td><input type="number" name="pid" value=""></td>
			</tr>
			<tr>
				<td>Product Name</td>
				<td><input type="text" name="pn" value=""></td>
			</tr>
			<tr>
				<td>Quantity</td>
				<td><input type="number" name="qn" value=""></td>
			</tr>
			<tr>
				<td>Price Per Unit</td>
				<td><input type="number" name="ppu" value=""></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" value="Add"></td>
			</tr>
		</table>
		</form>
		<?php 
		echo "<table border='1' width='70%' align='center'>";
		echo "<tr><th>SL.</th><th>Product ID</th><th>Product Name</th><th>Quantity</th><th>Price Per Unit</th><th>Action</th></tr>";
		while($row = mysqli_fetch_assoc($gdata)) {
        echo "<tr align='center'><td>".$row["SL"]."</td><td>".$row["ProductID"]."</td><td>".$row["ProductName"]."</td><td>".$row["Quantity"]."</td><td>".$row["PricePerUnit"]."</td><td>"."<form method='POST' action=-<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>->"."<input type='submit' value='EDIT'>"."<input type='submit' value='DELETE'>"."</form>"."</td></tr>";
    }
		echo "</table>";
		?>
	</body>
</html>