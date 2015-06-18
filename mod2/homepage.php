<?php
	session_start();
	//echo "Session value: ".$_SESSION['user_name']."<br>";
	if($_SESSION['user_name'] != ''){
		$current_user_id = $_COOKIE['user'];
		$serial_no = $_COOKIE['serial_no'];
			//setcookie('serial_no',$serial_no);
		include("db_connector.php");
		$result = mysql_query("SELECT * FROM `user` WHERE user_id = '$current_user_id'");
		if($result > 0){
			$s = mysql_fetch_array($result);
		}		
?>
<!DOCTYPE html>
<html>
	<head>
	  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	  <style>
		.view{
			margin-left:100px;margin-right:100px;margin-top: 30px;font-size:18px;
		}
		.outside {
			border:1px solid gray;margin-left:300px;margin-right:300px;border-radius:10px;
		}
		.field {
			margin-left:50px;
		}
		.txt {
			padding:3px;border:1px solid gray;margin-top:3px;width:280px; border-radius:5px;
		}
		.btn {
			float:right; margin-top:20px; border-radius:3px; background-color:white; border:1px solid gray;
		}
	  </style>
	</head>
	<body>
		<div class="container">               
		  <ul class="pagination">
			<li><a href="homepage.php"> Profile </a></li>
			<li><a href="timelog.php"> Time Logs </a></li>
		  </ul>
		  <button class="btn">
			<a href="logout.php"> Logout </a>
		  </button>
		</div>
		<div class="outside">
			<fieldset class="view">
				<legend> User's Profile: </legend>
				<div class="field">
					Userid: <input type='text' class="txt" name='' value="<?php echo $s['user_id']; ?>" readonly style="margin-left:32px;">
				</div>
				<div class="field">
					Username: <input type='text' class="txt" name='' value="<?php echo $s['user_name']; ?>" readonly style="margin-left:1px;">
				</div>
				<div class="field">
					Name: <input type='text' class="txt" name='' value="<?php echo $s['name']; ?>" readonly style="margin-left:37px;">
				</div>
				<div class="field">
					Password: <input type='text' class="txt" name='' value="<?php echo $s['password']; ?>" readonly style="margin-left:6px;">
				</div>
				<div class="field">
					Mobile: <input type='text' class="txt" name='' value="<?php echo $s['mobile']; ?>" readonly style="margin-left:32px;">
				</div>
				<div class="field">
					House No: <input type='text' class="txt" name='' value="<?php echo $s['house_no']; ?>" readonly style="margin-left:5px;">
				</div>
				<div class="field">
					Street: <input type='text' class="txt" name='' value="<?php echo $s['street']; ?>" readonly style="margin-left:37px;">
				</div>
				<div class="field">
					City: <input type='text' class="txt" name='' value="<?php echo $s['city']; ?>" readonly style="margin-left:54px;">
				</div>
				<div class="field">
					State: <input type='text' class="txt" name='' value="<?php echo $s['state']; ?>" readonly style="margin-left:43px;">
				</div>
				<div class="field">
					Country: <input type='text' class="txt" name='' value="<?php echo $s['country']; ?>" readonly style="margin-left:22px;">
				</div>
				<br><br>
			</fieldset>
		</div>
	</body>
</html>
<?php
	}else{
		header('Location:login.php');
	}
?>