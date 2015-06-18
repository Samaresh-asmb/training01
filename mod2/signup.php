<html>
	<head>
		<style>
			body {
				background-color:#E6E6FA;
			}
			form {
				margin-left: 200px; margin-top:100px; width:950px; border:2px solid black;background-color:#ADD8E6;
				border-radius: 12px;
			}
			.frm {
				 margin-top:10px;margin-left:60px;font-size:18px;
			}
			.block {
				border-radius:10px; width:85%;
			}
			.sub {
				font-size:16px; border-radius:5px; margin-left:15px;
			}
			.txt {
				height:25px;width:250px;border-radius:5px;
			}
			.txt2 {
				margin-left:50%;margin-top:-3%;
			}
		</style>
	</head>
	<body>
		<form method='post'>
			<div class="frm">
				<div style="margin-left:300px;"> <h3> Sign Up Here </h3> </div>
				<fieldset class='block'>
					<legend> <b> Personal Details: </b> </legend><br>
						<div>
							Name: <input type='text' class="txt" name='name' required style="margin-left:34px;">
						</div>
						<div class="txt2">
							Username: <input type='text' class="txt" name='user_name' required style="margin-left:5px;">
						</div>
						<div>
							Password: <input type='text' class="txt" name='password' required style="margin-left:8px;">
						</div>
						<div class="txt2">
							Mobile: <input type='text' class="txt" name='mobile' required style="margin-left:26px;">
						</div><br>
				</fieldset><br>
				<fieldset class='block'>
					<legend> <b> Address Details: </b> </legend><br>
						<div>
							House No: <input type='text' class="txt" name='house_no' required style="margin-left:5px;">
						</div>
						<div class="txt2">
							Street: <input type='text' class="txt" name='street' required style="margin-left:36px;">
						</div>
						<div>
							City: <input type='text' class="txt" name='city' required style="margin-left:46px;">
						</div>
						<div class="txt2">
							State: <input type='text' class="txt" name='state' required style="margin-left:42px;">
						</div>
						<div>
							Country: <input type='text' class="txt" name='country' required style="margin-left:18px;">
						</div><br>
				</fieldset>			
				
				<br>
				<a href="login.php" style="margin-left:620px;"> Login here </a>
				<input type='submit' class="sub" name='submit'>
				<br><br>
			</div>		
		</form>		
	</body>
</html>
<?php
	$name = $_POST['name'];
	$user_name = $_POST['user_name'];
	$password = $_POST['password'];
	$mobile = $_POST['mobile'];
	$house_no = $_POST['house_no'];
	$street = $_POST['street'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$country = $_POST['country'];
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
			$sql = "insert into user values(' ','$name','$user_name','$password','$mobile','$house_no','$street','$city','$state','$country')";
			$res = mysql_query($sql);
			if($res > 0){
				header('Location:homepage.php');
			}
		}else{
			echo "<script>alert('Username already used, use something new');</script>";
		}
		
	}
?>