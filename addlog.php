<?php
	session_start();
	//echo "Session value: ".$_SESSION['user_name']."<br>";
	if($_SESSION['user_name'] != ''){
		$current_user_id = $_COOKIE['user'];
?>
<html>
	<head>
	  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	  
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
		  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
			<script>
				var curdate = new Date();
				$(function() {
					$( "#dates" ).datepicker({
						dateFormat: "yy-mm-dd",
						value: curdate,   // the current date is used as default value
						min: curdate,
						max: curdate,
					});
				},
				function(){
					$('#sample3 input').ptTimeSelect({
						containerClass: "timeCntr",
						containerWidth: "350px",
						setButtonLabel: "Select",
						minutesLabel: "min",
						hoursLabel: "Hrs"
					});
				});
				
			</script>
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
		  </ul>
		  <button class="btn">
			<a href="logout.php"> Logout </a>
		  </button>
		</div>
		<form method="post">
			<div class="outside">
				<fieldset class="view">
					<legend> Create New Log: </legend>
					<div class="field">
						Date: <input type='text' class="txt" name='dates' id="dates" style="margin-left:47px;">
					</div>
					<div class="field">
						User Id: <input type='text' class="txt" name='user_id' value="<?php echo $current_user_id; ?>" readonly style="margin-left:28px;">
					</div>
					<div class="field">
						Start Time: <input type='text' class="txt" name='start_time' id="start_time" style="margin-left:3px;">
					</div>
					<div class="field">
						End Time: <input type='text' class="txt" name='end_time' id="end_time" style="margin-left:9px;">
					</div>
					<br>
					<input type="submit" name="submit" value="Submit" style="margin-left:260px;border-radius:8px;">
					<input type="submit" name="cancel" value="Cancel" style="margin-left:20px;border-radius:8px;">
				</fieldset>
				<br>
			</div>
		</form>
		<?php			
			if(isset($_POST['submit'])){
				$dates = $_POST['dates'];
				$user_id = $_POST['user_id'];
				$start_time = $_POST['start_time'];
				$end_time = $_POST['end_time'];
				include("db_connector.php");
				$rs = mysql_query("insert into `time_logs` values(' ','$user_id','$dates','$start_time','$end_time')");
				if($rs > 0){
					header('Location:timelog.php');
				}
			}
			if(isset($_POST['cancel'])){
				header('Location:detailview.php');
			}
		?>
	</body>
</html>
<?php
	}else{
		header('Location:login.php');
	}
?>