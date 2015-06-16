<html>
	<head>
		<style>
			body {
				background-color:#E6E6FA;
			}
			form {
				margin-left: 350px; margin-top:200px; height:250px; width:600px; border:2px solid black;background-color:#ADD8E6;
				border-radius: 12px;
			}
			.frm {
				 margin-top:10px;margin-left:100px;font-size:18px;
			}
			.sub {
				font-size: 16px; border-radius:5px;margin-left:15px;
			}
			.txt {
				height:25px;width:250px;border-radius:5px;
			}
		</style>
	</head>
	<body>
		<form method='post'>
			<div class="frm">
				<div style="margin-left:130px;"> <h3> Sign Up Here </h3> </div>
				<div>
					Name: <input type='text' class="txt" name='name' required style="margin-left:34px;">
				</div>
				<div>
					Username: <input type='text' class="txt" name='user_name' required style="margin-left:5px;">
				</div>
				<div>
					Password: <input type='text' class="txt" name='password' required style="margin-left:8px;">
				</div>
				<div>
					Mobile: <input type='text' class="txt" name='mobile' required style="margin-left:26px;">
				</div>
				<br>
				<a href="login.php" style="margin-left:170px;"> Login here </a>
				<input type='submit' class="sub" name='submit'>
			</div>		
		</form>		
	</body>
</html>
<?php
	$name = $_POST['name'];
	$user_name = $_POST['user_name'];
	$password = $_POST['password'];
	$mobile = $_POST['mobile'];
	if(isset($_POST['submit'])){
		include("db_connector.php");
		$names = mysql_query("SELECT user_name FROM `user`");
		$new = 0;
		while($r = mysql_fetch_assoc($names)){
			if($r['user_name'] == $user_name){
				$new = 1;
				break;
			}
		}
		if($new == 0){
			$sql = "insert into user values(' ','$name','$user_name','$password','$mobile')";
			$res = mysql_query($sql);
			if($res > 0){
				header('Location:homepage.php');
			}
		}else{
			echo "<script>alert('Username already used, use something new');</script>";
		}
		
	}
?>