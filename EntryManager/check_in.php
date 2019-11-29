<!DOCTYPE html>
<html>
<head>
	<title>Check In Page</title>
</head>
<body>
	<h4 align="right"><a href="index.php" align="center">To go back click here</a></h4>
	<h3 align="center">Enter Your Details To Check In</h3>

	<form align = "center" action="check_in.php" method="post">
		<h3>Visitor Details:</h3><br>
		Name: <input type="text" name="visitor_name" required><br>
		E-mail: <input type="email" name="visitor_email" required><br>
		Ph. no.: <input type="text" name="visitor_number" required><br>
		<br><h3>Host Details:</h3><br>
		Name: <input type="text" name="host_name" required><br>
		E-mail: <input type="email" name="host_email" required><br>
		Ph. no.: <input type="text" name="host_number" required><br>
		<input type="submit" name="submit" value="Check In">
	</form>
	<br>
</body>
</html>

<?php
		if(isset($_POST['submit'])){
			include('dbcon.php');
			$v_name =  $_POST['visitor_name'];
			$v_email =  $_POST['visitor_email'];
			$v_number =  $_POST['visitor_number'];
			$h_name =  $_POST['host_name'];
			$h_email =  $_POST['host_email'];
			$h_number =  $_POST['host_number'];
			date_default_timezone_set("Asia/Calcutta"); 
			$date =  date("h:i:sa");
			$message = "Dear $h_name a visitor has check in at $date\nYou are required to host $v_name\nFollowing are the details:\n$v_name \n$v_email\n$v_number\nCheck In Time: $date";
			mail($h_email,"Entry Management System",$message);
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

			
			$qry = "INSERT INTO `visitorandhost`(`H_Name`, `H_email`, `H_number`, `V_Name`, `V_email`, `V_number`, `time`) VALUES ('$h_name','$h_email','$h_number','$v_name','$v_email','$v_number','$date')";
			$run = mysqli_query($con,$qry);

			if($run == true){
				?>
				<script type="text/javascript">
					alert("You have checked in successfully");
					window.open('index.php','_self');
				</script>
				<?php	
			}
		}
?>