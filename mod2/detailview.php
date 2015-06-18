<?php
	session_start();
	//echo "Session value: ".$_SESSION['user_name']."<br>";
	if($_SESSION['user_name'] != ''){
		if($_GET['record_id'] != ''){
			$record_id = $_GET['record_id'];
			setcookie('record_id',$_GET['record_id']);
		}else{
			$record_id = $_COOKIE['record_id'];
		}
		include("db_connector.php");
		$result = mysql_query("SELECT * FROM `time_logs` WHERE sl_no = '$record_id'");
		$r = mysql_fetch_assoc($result);
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
				padding:3px;border:1px solid gray;margin-top:3px;width:280px;
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
			<li><a href="addlog.php"> Add New Log</a></li>
		  </ul>
		  <button class="btn">
			<a href="logout.php"> Logout </a>
		  </button>
		</div>
		<div class="outside">
			<fieldset class="view">
				<legend> Detail Log View: </legend>
				<div class="field">
					User Id: <input type='text' class="txt" name='' value="<?php echo $r['user_id']; ?>" readonly style="margin-left:26px;">
				</div>
				<div class="field">
					Date: <input type='text' class="txt" name='' value="<?php echo $r['dates']; ?>" readonly style="margin-left:47px;">
				</div>
				<div class="field">
					Start Time: <input type='text' class="txt" name='' value="<?php echo $r['start_time']; ?>" readonly style="margin-left:3px;">
				</div>
				<div class="field">
					End Time: <input type='text' class="txt" name='' value="<?php echo $r['end_time']; ?>" readonly style="margin-left:9px;">
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