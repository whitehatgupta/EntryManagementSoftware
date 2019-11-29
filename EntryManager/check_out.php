<!DOCTYPE html>
<html>
<head>
	<title>Check Out Page</title>
</head>
<body>
<h4 align="right"><a href="index.php" align="center">To go back click here</a></h4>
<table border="1" align="center">
	<tr>
		<th>Id</th>
		<th>Visitor Name</th>
		<th>Visitor Email</th>
		<th>Visitor Number</th>
		<th>Host Name</th>
		<th>Host Email</th>
		<th>Host Number</th>
		<th>Time</th>
	</tr>
<?php
	
	include('dbcon.php');
	$sql = "SELECT `id`, `H_Name`, `H_email`, `H_number`, `V_Name`, `V_email`, `V_number`, `time` FROM `visitorandhost` WHERE 1";
	$result = $con->query($sql);
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			echo "<tr><td>".$row["id"]."</td><td>".$row["H_Name"]."</td><td>".$row["H_email"]."</td><td>".$row["H_number"]."</td><td>".$row["V_Name"]."</td><td>".$row["V_email"]."</td><td>".$row["V_number"]."</td><td>".$row["time"]."</td></tr>";
		}
		echo "</table>";
	}
?>
<form action="check_out.php" method="post" align="center">
		<h3>Enter your Id from given database along with a check out time to check out:</h3><br>
		Id: <input type="number" name="id" required>
		Time: <input type="text" name="time" required><br>
		<input type="submit" name="submit" value="Check Out">
</form>
	
<?php		
	if(isset($_POST['submit'])){
			include('dbcon.php');
			$idd =  $_POST['id'];
			$time = $_POST['time'];
			$sql = "SELECT `id`, `H_Name`, `H_email`, `H_number`, `V_Name`, `V_email`, `V_number`, `time` FROM `visitorandhost` WHERE `visitorandhost`.`id` = $idd";
			$result = $con->query($sql);
			$row = $result->fetch_assoc();
			$name = $row["V_Name"];
			$h_name = $row["H_Name"];
			$h_number = $row["V_number"];
			$t = $row["time"];
			$message = "Dear $name following are the details of your visit:\nYou were hosted by $h_name \nYou checked in at $t \nAnd checked out at $time";
			$email = $row["V_email"];
			mail($email,"Entry Management System",$message);
			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://www.fast2sms.com/dev/bulk?authorization=9s70WOldEbivrjyqfYZacSx8gBTnNKH1XPD6MpIR4oCuhweJFzOPbnwN98u0Y2WkgaDEG5IACZcqyzxv&sender_id=FSTSMS&message=".urlencode('$message')."&language=english&route=p&numbers=".urlencode('$h_number'),
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_SSL_VERIFYHOST => 0,
			  CURLOPT_SSL_VERIFYPEER => 0,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => array(
			    "cache-control: no-cache"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			

			$qry = "DELETE FROM `visitorandhost` WHERE `visitorandhost`.`id` = $idd";
			$run = mysqli_query($con,$qry);
			if($run == true){
				?>
				<script type="text/javascript">
					alert("You have checked out successfully");
					window.open('index.php','_self');
				</script>
				<?php	
			}
	}



?>

</body>
</html>
