<?php
	$conn=mysqli_connect("localhost","root","","mydb");
	$un = $pass = "";
	$unErr = $passErr = "";
	
	if(!$conn)
	{
		echo "DB Not Connected";
	}
	else
	{
		echo "DB Connected";
	}
	
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		if(empty($_POST["un"]))
		{
			$unErr = "User Name Rquired";
		}
		else
		{
			$un = test($_POST["un"]);
		}
		if(empty($_POST["pass"]))
		{
			$passErr = "Password Required";
		}
		else
		{
			$pass=test($_POST["pass"]);
		}
	}
	function test($data)
	{
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}
	$filed = "INSERT INTO login VAlUES('$un','$pass');";
	mysqli_query($conn, $filed);
?>
<DOCTYPE html>
<html>
	<head>
		<title>Internet Programming Assignment</title>
		<meta charset="UTF-8">
		<meta name="author" content="Rafsan">
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<script>
		</script>
		<style>
			body{background-image:url("");background-repeat:no-repeat;background-attachment:fixed;background-position:left top;}
			img{width:200px; height:300px;border:1px solid red;border-radius:20px;box-shadow:7px 7px 5px black;}
			ul {list-style-type: none;}
			ul li:before{content: '';display: inline-block;height: 10px;width: 10px;background-size: 10px;background-image: url("li.png");background-repeat: no-repeat;margin-right: 5px;margin-left:40%}
			h1{text-align:center;-webkit-text-stroke-width:0.5px;-webkit-text-stroke-color:red;text-shadow:5px 5px 5px black;}
			form{-backdrop-filter:blur(8px);border:1px solid black;margin-left:30%;margin-right:30%;border-radius:20px}
			.error{color:red;}
			table{width:100%;}
			form{box-shadow:5px 5px 5px black;}
		</style>
	</head>
	<body>
	<table>
	<tr>
	<td>
		<div id="imgfile" align="center"><img src="tjj.png"></div>
		<div id="list">
		<ul align="">
			<a href="#"><li>Home</li></a>
			<a href="#"><li>My CV</li></a>
			<a href="#"><li>Photo Gallery</li></a>
			<a href="#"><li>Important Link</li></a>
			<a href="#"><li>Content</li></a>
		</ul>
		</div>
	</td>
	<td>
		<div>
			<h1>Welcome To My Site</h1>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" align="center" method="POST">
				</br></br>User Name:<input type="text" name="un" value="" placeholder="Type Your Name"><span class="error"><?php echo $unErr; ?></span></br></br>
				Password:<input type="password" name="pass" value="" placeholder="Type Your Password"><span class="error"><?php echo $passErr; ?></span></br></br>
				<input type="submit" value="Sign In"><input type="submit" value="Sign Up"></br></br>
			</form>
		</div>
	</td>
	</body>
</html>