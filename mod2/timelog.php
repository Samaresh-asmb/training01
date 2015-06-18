<?php
	session_start();
	//echo "Session value: ".$_SESSION['user_name']."<br>";
	if($_SESSION['user_name'] != ''){
		$current_user_id = $_COOKIE['user'];
		$serial_no = $_COOKIE['serial_no'];
			//setcookie('serial_no',$serial_no);
		include("db_connector.php");
		$result = mysql_query("SELECT * FROM `time_logs` WHERE user_id = '$current_user_id'");
		if($result > 0){
			
?>
<!DOCTYPE html>
<html>
	<head>
	  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	  <style>
		.btn {
			float:right; margin-top:20px; border-radius:3px; background-color:white; border:1px solid gray;
		}
		.log_list {
			background-color:gray;margin-left:100px;margin-right:100px;margin-top:50px;border-radius:10px;
		}
		.tab_header {
			text-align: center;padding:5px;
		}
		.tab_view {
			border:1px solid black;border-radius:10px;margin-left:10px;margin-right:10px;width:98%;
		}
		.attribute {
			padding:8px; font-size:18px;
		}
	  </style>
	</head>
	<body>
		<div class="container">               
		  <ul class="pagination">
			<li><a href="homepage.php"> Profile </a></li>
			<li><a href="timelog.php"> Time Logs </a></li>
			<br>			
		  </ul>
		  <button class="btn">
			<a href="logout.php"> Logout </a>
		  </button>
		</div>
		<div class="log_list">
			<form method="post" action="detailview.php">
				<div>
					<div class="tab_header">
						<h4> <u> Log Details Table </u> </h4>
					</div>
					<div>
						<table class="tab_view">
							<tr style="border:1px solid black;">
								<td class="attribute">
									<span> <u> Serial No </u> </span>
								</td>
								<td class="attribute">
									<span> <u> User Id </u> </span>
								</td>
								<td class="attribute">
									<span> <u> Dates </u> </span>
								</td>
								<td class="attribute">
									<span> <u> Start Time </u> </span>
								</td>
								<td class="attribute">
									<span> <u> End Time </u> </span>
								</td>
							</tr>
							<?php
								while($s = mysql_fetch_assoc($result)){
									$serial =  $s['sl_no'];
									$res2 = mysql_query("select * from `time_logs` where sl_no = '$serial'");
									$r = mysql_fetch_array($res2);
							?>
								<a href="#">
									<tr style="border:1px solid black;">
										<td class="attribute">
											<span> <?php echo $r['sl_no']; ?> </span>											
										</td>
										<td class="attribute">											
											<span> <?php echo $r['user_id']; ?> </span>											
										</td>
										<td class="attribute">
											<a href="detailview.php?record_id=<?php echo $r['sl_no']; //sending hidden field value of sl_no ?>">
												<span> <?php echo $r['dates']; ?> </span>
											</a>
										</td>
										<td class="attribute">											
											<span> <?php echo $r['start_time']; ?> </span>											
										</td>
										<td class="attribute">											
											<span> <?php echo $r['end_time']; ?>  </span>											
										</td>
									</tr>
								</a>
							<?php
									if(isset($_POST['record_id'])){
										echo $record_id = $_POST['record_id'];exit;
										setcookie('record_id',$record_id);
										header('Location:detailview.php');
									}
								}
							?>
						</table>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>
<?php
		}
	}else{
		header('Location:login.php');
	}
?>