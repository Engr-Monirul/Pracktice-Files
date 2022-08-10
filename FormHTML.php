<?php 
	//Declare Variables Before Using It 
	$snErr = $dnErr = $maErr = $unErr = $pnErr = $eaErr = $jdErr = $svErr = $rvErr = "";
	$sn = $dn = $ma = $un = $pn = $ea = $jd = $sv = $rv = $dbdelrs = $rvall = $rsv = $svall = "";
	$cd = "";
	$ssn = $sdn = $sma = $sun = $spn = $sea = $sjd = "";
	$sssn = $ssdn = $ssma = $ssun = $sspn = $ssea = $ssjd = $rva = $res = "";
	
	//connect to the xampp server using mysqli(procedural) 
	$conn = mysqli_connect("localhost","root","","test"); //localhost = host type, root = default username, "" = default blank password, test = db name in xampp server 
	if(!$conn)
	{
		$cd = "Server Not Connected";
	}
	else
	{
		$cd = "Server Connected";
	}
	
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if (empty($_POST["sn"]))
		{
			$snErr = "Serial Number Required..  ";
		}
		else
		{
			$sn = text($_POST["sn"]);
		}
		if (empty($_POST["dn"]))
		{
			$dnErr = "Device Name Required..  ";
		}
		else
		{
			$dn = text($_POST["dn"]);
		}
		if (empty($_POST["ma"]))
		{
			$maErr = "MAC Address Required..  ";
		}
		else
		{
			$ma = text($_POST["ma"]);
		}
		if (empty($_POST["un"]))
		{
			$unErr = "User Name Required..  ";
		}
		else
		{
			$un = text($_POST["un"]);
		}
		if (empty($_POST["pn"]))
		{
			$pnErr = "Phone Number Required..  ";
		}
		else
		{
			$pn = text($_POST["pn"]);
		}
		if (empty($_POST["ea"]))
		{
			$eaErr = "EMail Address Required..  ";
		}
		else
		{
			$ea = text($_POST["ea"]);
		}
		if (empty($_POST["jd"]))
		{
			$jdErr = "Join Date Required..  ";
		}
		else
		{
			$jd = text($_POST["jd"]);
		}
		if (empty($_POST["sv"]))
		{
			$svErr = "MAC Required";
		}
		else
		{
			$sv = text($_POST["sv"]);
		}
		if (empty($_POST["rv"]))
		{
			$rvErr = "MAC Value Required";
		}
		else
		{
			$rv = text($_POST["rv"]);
			$dbdel = "DELETE FROM wifi WHERE MAC_Address='$rv'";
			mysqli_query($conn, $dbdel);
	{
		$dbdelrs = "Something Went Wrong";
	}
		}
		if (!empty($_POST["rvall"]))
		{
			$rvall = text($_POST["rvall"]);
			$rvallv = "DELETE FROM wifi";
			mysqli_query($conn, $rvallv);
		}
		if (!empty($_POST["svall"]))
		{
			$rva = "SELECT Serial_Number, Device_Name, MAC_Address, User_Name, Phone_Number, EMail, Join_Date FROM wifi";
			$res = $conn->query($rva);
		}
	}
	function text($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	/*$ct = "CREATE TABLE wifi(
			Serial_Number int(100),
			Device_Name char(255),
			MAC_Address char(255),
			User_Name char(255),
			Phone_Number int(100),
			EMail char(255),
			Join_Date char(255)
			);";
	$de = mysqli_query($conn, $ct);*/
	
	$ctd = "INSERT INTO wifi VALUES('$sn','$dn','$ma','$un','$pn','$ea','$jd')";
	mysqli_query($conn, $ctd);
	
	$search = "SELECT Serial_Number, Device_Name, MAC_Address, User_Name, Phone_Number, EMail, Join_Date FROM wifi WHERE MAC_Address='$sv'";
	$result = $conn->query($search);
	if ($result->num_rows>0)
	{
		while($row = $result->fetch_assoc())
		{
			$ssn = $row["Serial_Number"];
			$sdn = $row["Device_Name"];
			$sma = $row["MAC_Address"];
			$sun = $row["User_Name"];
			$spn = $row["Phone_Number"];
			$sea = $row["EMail"];
			$sjd = $row["Join_Date"];
		}
	}
	else
	{
		$rsv = "Search Value Is Not Present";
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>WiFi Zone</title>
		<meta charset="UTF-8">
		<meta name="Author" content="Monirul Islam">
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<style>
			body{background-image:url("w.jpg");background-attachment:fixed;background-repeat:no-repeat;background-position:left top;background-size:cover;color:white;}
			table{width:100%;}
			fieldset{backdrop-filter:blur(8px);}
			.error{color:red;background-color:rgba(255,255,255,0.3);border-radius:8px 0px 8px 0px;}
			h1{color:green;text-shadow:5px 5px 4px black;text-align:center;-webkit-text-stroke-color:black;-webkit-text-stroke-width:1px;backdrop-filter:blur(8px);}
			h3{text-align:center;}
			h3 a:link{color:white;text-decoration:none;}
			h3 a:hover{color:red;}
			h3 .od{color:yellow;}
			#marid{color:red;-webkit-text-stroke-color:yellow;-webkit-text-stroke-width:1px;font-size:20px;}
			#fd{border:1px solid black;border-radius:10px 0px;}
			fieldset{box-shadow:5px 5px 5px black;}
		</style>
		<script>
			function alertt()
			{
				alert("Your All Data Will Be Delete From Database");
			}
		</script>
	</head>
	<body>
		<h1>WiFi Access Zone</h1>
		<h3><span class="od">WiFi Name: </span> Sumaiya, <span class="od"> Owner Name:</span> MD Monirul Islam, <span class="od"> Contact: Phone: </span><a href="tel:+8801533686262">+8801533686262, </a><span class="od">EMail: <a href="mailto:monyrulislam48@gmail.com">monyrulislam48@gmail.com</a></h3>
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>"><!-- Self Server echo htmlspecialchars $_SERVER PHP_SELF -->
		<fieldset>
			<legend><marquee>Fill Up This Form: </marquee></legend>
			<table>
			<tr>
				<th colspan="2">Insert Your Data Here -</th>
				<th>Your Inserted Data Is Showing Below -</th>
			</tr>
			<tr>
				<td align="right">Serial Number: </td>
				<td><input type="number" name="sn" placeholder="1 or Above"><span class="error"> <?php echo $snErr; ?> </span></td>
				<td rowspan="6" align="center">
					<?php echo "Your Details - ";?>
					<?php echo "<br>";?>
					<?php echo "Serial Number: ".$sn;?>
					<?php echo "<br>";?>
					<?php echo "Device Name: ".$dn;?>
					<?php echo "<br>";?>
					<?php echo "MAC Address: ".$ma;?>
					<?php echo "<br>";?>
					<?php echo "User Name: ".$un;?>
					<?php echo "<br>";?>
					<?php echo "Phone Number: ".$pn;?>
					<?php echo "<br>";?>
					<?php echo "EMail: ".$ea;?>
					<?php echo "<br>";?>
					<?php echo "Join Date: ".$jd;?>
				</td>
			</tr>
			<tr>
				<td align="right">Device Name: </td>
				<td><input type="text" name="dn" placeholder="Samsung/iPhone/ViVO or Etc"><span class="error"><?php echo $dnErr; ?> </span></td>
			</tr>
			<tr>
				<td align="right">MAC Address</td>
				<td><input type="text" name="ma" placeholder="F0:55:EF:6A:25 or Etc"><span class="error"><?php echo $maErr; ?> </span></td>
			</tr>
			<tr>
				<td align="right">User Name</td>
				<td><input type="text" name="un" placeholder="Mr. Peter or Etc"><span class="error"><?php echo $unErr; ?> </span></td>
			</tr>
			<tr>
				<td align="right">User Contact</td>
				<td><input type="number" name="pn" placeholder="01000000000 or Etc"><span class="error"><?php echo $pnErr; ?> </span><br>
				<input type="email" name="ea" placeholder="example@gmail.com or Etc"></td>
			</tr>
			<tr>
				<td align="right">Join Date</td>
				<td><input type="date" name="jd" placeholder=""><span class="error"><?php echo $jdErr; ?> </span></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="sub" value="SUBMIT"></td>
			</tr>
			</table>
		</fieldset>
		</form>
		<br><br><br>
		<marquee id="marid"><?php echo $cd; ?></marquee><br>
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
		<table>
			<tr>
				<td align="center" colspan="3">Search Value: 
				<input type="text" name="sv" placeholder="MAC Address To Search"><input type="submit" value="SEARCH"></td>
			</tr>
			<tr>
				<td align="center" colspan="3">Remove Value: 
				<input type="text" name="rv" placeholder="MAC Address To Remove"><input type="submit" value="DELETE"><br><br><br></td>
			</tr>
			<tr>
				<td width="30%"></td>
				<td width="40%" align="center" style="border:4px solid black;border-radius:0px 10px;text-align:center;backdrop-filter:blur(8px);">
					<?php echo "Search Value -";?>
					<?php echo "<br>"; ?>
					<?php echo "Serial Number: ".$ssn;?>
					<?php echo "<br>"; ?>
					<?php echo "Device Name: ".$sdn;?>
					<?php echo "<br>"; ?>
					<?php echo "MAC Address: ".$sma;?>
					<?php echo "<br>"; ?>
					<?php echo "User Name: ".$sun;?>
					<?php echo "<br>"; ?>
					<?php echo "Phone Number: ".$spn;?>
					<?php echo "<br>"; ?>
					<?php echo "EMail: ".$sea;?>
					<?php echo "<br>"; ?>
					<?php echo "Join Date: ".$sjd;?>
					<?php echo "<br>"."<br>"."<br>"?>
					<?php echo $rsv; ?>
				</td>
				<td widht="30%"></td>
			</tr>
		</form>
		</table>
		<table>
			<tr>
				<td align="center">
				<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>"><input type="submit" name="svall" value="SHOW ALL DATA"></form>
				</td>
			</tr>
			<tr>
				<td width="100%" align="center" colspan="2">
					<?php 
						if ($res->num_rows >0)
							{
								while($val = $res->fetch_assoc())
								{
									$sssn = $val["Serial_Number"];
									$ssdn = $val["Device_Name"];
									$ssma = $val["MAC_Address"];
									$ssun = $val["User_Name"];
									$sspn = $val["Phone_Number"];
									$ssea = $val["EMail"];
									$ssjd = $val["Join_Date"];
									
									echo "Serial Number: ".$sssn;
									echo "<br>";
									echo "Device Name: ".$ssdn;
									echo "<br>";
									echo "MAC Address: ".$ssma;
									echo "<br>";
									echo "User Name: ".$ssun;
									echo "<br>";
									echo "Phone Number: ".$sspn;
									echo "<br>";
									echo "EMail: ".$ssea;
									echo "<br>";
									echo "Join Date: ".$ssjd;
									echo "<br>";
									echo "<br>";
								}
							}
					?>
				</td>
			</tr>
		</table>
		</form>
		<table>
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
		<tr><td align="center"><input type="submit" name="rvall" value="REMOVE ALL" onclick="alertt()"></td></tr>
		</form>
		</table>
	</body>
</html>