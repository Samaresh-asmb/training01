<?php
	session_start();
	//echo "Session value: ".$_SESSION['user_name'];
?>
<html>
	<head>
		<style>
			body {
				background-color:#E6E6FA;
			}
			form {
				margin-left: 350px; margin-top:200px; height:200px; width:600px; border:2px solid black;background-color:#ADD8E6;
				border-radius: 12px;
			}
			.frm {
				 margin-top:30px;margin-left:100px;font-size:18px;
			}
			.sub {
				font-size: 16px; border-radius:5px;margin-left:20px;
			}
			.txt {
				height:25px;width:250px;border-radius:5px;
			}
		</style>
	</head>
	<body>
		<form method='post'>
			<div class="frm">
				<div>
					Username: <input type='text' class="txt" name='user_name' required style="margin-left:10px;">
				</div>
				<div>
					Password: <input type='password' class="txt" name='password' required style="margin-left:13px;">
				</div>
				<br>
				<a href="signup.php" style="margin-left:155px;"> Register here </a>
				<input type='submit' class="sub" name='submit'>
			</div>		
		</form>		
	</body>
</html>
<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		if(isset($_POST['submit'])){
			$user_name = $_POST['user_name'];
			$password = $_POST['password'];
			include("db_connector.php");
			$result=mysql_query("select * from user where user_name='$user_name' AND password='$password'");
			$r=mysql_num_rows($result);
			if($r == 1)
			{	//session part
				session_regenerate_id();
				$_SESSION['user_name'] = $user_name;
				session_write_close();
				
				//create record for current user
				$cur_date = date("Y-m-d");
				date_default_timezone_set('Asia/Kolkata');  // this sets time zone to IST
				$start_time = date('h:i:s a');				//current time 
				$user_id = mysql_result($result,0);			//user_id
					setcookie('user', $user_id);
				
				mysql_query("insert into time_logs values(' ','$user_id','$cur_date','$start_time',' ')");
				$result2 = mysql_query("select max(sl_no) from time_logs");
				$r2 = mysql_result($result2,0);
					setcookie('serial_no',$r2);
				header('Location:homepage.php');
			}
			else 
			{
				echo "<script> alert('Wrong id or Password')</script>";
			}
		}
	}
?>