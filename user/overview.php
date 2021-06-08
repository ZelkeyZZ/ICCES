<?php
	// Initialize the session
	session_start();
	
	// Check if the user is logged in, if not then redirect him to login page
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["status"] !== "Active"){
		header("location: ../user/logout.php");
		exit;
	}
	
	include"../inc/config-inc.php";
	include"../graph/monthlyuser.php";
	include"../graph/yearlyuser.php";
	include"../graph/clearancemonthly.php";
	include"../graph/clearanceyearly.php";
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>ICCES | Overview</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="../assets/css/main-1.css" />
		<link rel="stylesheet" href="../assets/css/fontawesome.css"/> 
        <link rel="stylesheet" href="../assets/css/v4-shims.css"/> 
        <link rel="stylesheet" href="../assets/css/brands.css"/> 
        <link rel="stylesheet" href="../assets/css/all.css"/> 
        <link rel="stylesheet" href="../assets/css/regular.css"/> 
        <link rel="stylesheet" href="../assets/css/solid.css"/> 
        <link rel="stylesheet" href="../assets/css/svg-with-js.css"/>
		<link rel="shortcut icon" type="image/png" href="../images/icon/favicon.png"/>
	</head>
	
	<body class="is-preload" style="height:100%; width:100%;">
		<!-- Header -->
			<div id="header">
				<div class="top">
					<!-- Logo -->
						<div id="logo">
							<h2 id="title">
							<?php echo $_SESSION["prefix"], $_SESSION["lastname"];?>, <?php echo $_SESSION["firstname"]?> <?php echo $_SESSION["initials"]?>
							</h2>
							<p><?php echo $_SESSION["email"]?></p>
							<p><?php echo $_SESSION["userrank"]?></p>
						</div>
					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li><a href="overview#top" id="top-link"><span class="icon solid fa-pager">User Counter</span></a></li>
								<?php
								if($_SESSION['userrank'] == "STUDENT"){
								?>
								<li><a href="overview#studentcp" id="studentcp-link"><span class="icon solid fa-users-cog">Student Control Panel</span></a></li>
								<?php
								}
								?>
								<?php
								if($_SESSION['userrank'] == "ADMIN" || $_SESSION['userrank'] == "SUPERADMIN"){
								?>
								<li><a href="overview#admincp" id="admincp-link"><span class="icon solid fa-users-cog">Admin Control Panel</span></a></li>
								<li><a href="overview#stats" id="stats-link"><span class="icon solid fa-users-cog">Statistics</span></a></li>
								<?php
								}
								?>
								<?php
								if($_SESSION['userrank'] !== "STUDENT"){
								?>
								<li><a href="overview#staffcp" id="staff-link"><span class="icon solid fa-th-list">Staff Control Panel</span></a></li>
								<?php
								}
								?>
								<li><a href="overview#mv" id="mv-link"><span class="icon solid fa-newspaper">Mission/Vision</span></a></li>
								<?php
								if($_SESSION['userrank'] == "STUDENT" || $_SESSION['userrank'] == "INSTRUCTOR" || $_SESSION['userrank'] == "SUPERADMIN"){
								?>
								<li><a href="../curriculum/list"><span class="icon solid fa-list">Subject Legend</span></a></li>
								<?php
								}
								?>
								<li><a href="reset"><span class="icon solid fa-key">Change Password</span></a></li>
								<li><a href="logout"><span class="icon solid fa-power-off">Logout</span></a></li>
							</ul>
						</nav>
				</div>
				<div class="bottom">
					<!-- Social Icons -->
						<ul class="icons">
							<li><a href="https://twitter.com/informaticsph" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="https://www.facebook.com/InformaticsPH/" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
							<li><a href="https://www.youtube.com/channel/UCmX-QuWML5HAqZvhdt2OAwQ" class="icon solid brands fa-youtube"><span class="label">Youtube</span></a></li>
							<li><a href="https://informatics.edu.ph" class="icon solid fa-globe"><span class="label">Website</span></a></li>
							<li><a href="mailto:info.marketing@informatics.com.ph" class="icon solid fa-envelope"><span class="label">Email</span></a></li>
						</ul>
				</div>
			</div>
		<!-- Main -->
			<div id="main">
				<!-- User Counter -->
				<section id="top" class="one dark cover">
					<div class="container">
						<header>
							<h2>USER COUNTER</h2>
						</header>
						<form method="post">
							<div class="row">
								<div class="col-3 col-12-mobile">
								<?php $stmt = $pdo->query('SELECT count(*) as total FROM table_users'); ?>
									<article class="item">
										<header>
									<?php $result = $stmt->fetch(PDO::FETCH_ASSOC);
										echo '<h2>' .$result['total']. '</h2>';
									?>
											<h3>Users</h3>
										</header>
									</article>
								</div>
								<div class="col-3 col-12-mobile">
								<?php $stmt = $pdo->query("SELECT count(*) as total FROM table_student_info"); ?>
									<article class="item">
										<header>
									<?php $result = $stmt->fetch(PDO::FETCH_ASSOC);
										echo '<h2>' .$result['total']. '</h2>';
									?>
											<h3>Students</h3>
										</header>
									</article>
								</div>
								<div class="col-3 col-12-mobile">
								<?php $stmt = $pdo->query('SELECT count(*) as total FROM table_clearance WHERE clearance_status = 1'); ?>
									<article class="item">
										<header>
									<?php $result = $stmt->fetch(PDO::FETCH_ASSOC);
										echo '<h2>' .$result['total']. '</h2>';
									?>
											<h3>Ongoing Clearance</h3>
										</header>
									</article>
								</div>
								<div class="col-3 col-12-mobile">
								<?php $stmt = $pdo->query('SELECT count(*) as total FROM table_clearance WHERE clearance_status = 2'); ?>
									<article class="item">
										<header>
										<?php $result = $stmt->fetch(PDO::FETCH_ASSOC);
											echo '<h2>' .$result['total']. '</h2>';
										?>
											<h3>Completed Clearance</h3>
										</header>
									</article>
								</div>
							</div>
						<form>
					</div>
				</section>
				<!-- Mission/Vision -->
				<section id="mv" class="two dark cover">
					<div class="container">
						<article class="item">
							<header>
							<h2>MISSION & VISION</h2>
							<p>“We are the most preferred and leading private educational institution offering IT-enhanced programs <br/>
							transforming students to globally competitive individuals who can be innovators of the world.”</p>
							</header>
						</article>
					</div>
				</section>
				<!-- Admin Control Panel -->
				<?php
				if($_SESSION['userrank'] == "ADMIN" || $_SESSION['userrank'] == "SUPERADMIN"){
				?>
				<section id="admincp" class="one dark cover">
					<div class="container">
						<header>
							<h2>ADMIN CONTROL PANEL</h2>
						</header>
						<form method="post">
							<div class="row">
								<div class="col-4">
									<article class="item">
										<header>
											<a href="admin/view/users"><h3><span class="icon solid fa-user"> View Users</span></h3></a>
										</header>
									</article>
								</div>
								<div class="col-4">
									<article class="item">
										<header>
											<a href="admin/view/students"><h3><span class="icon solid fa-user-graduate"> View Students</span></h3></a>
										</header>
									</article>
								</div>
								<div class="col-4">
									<article class="item">
										<header>
											<a href="admin/view/instructors"><h3><span class="icon solid fa-user-tie"> View Instructors</span></h3></a>
										</header>
									</article>
								</div>
								<div class="col-4">
									<article class="item">
										<header>
											<a href="register"><h3><span class="icon solid fa-user-plus"> Create User</span></h3></a>
										</header>
									</article>
								</div>
								<div class="col-4">
									<article class="item">
										<header>
											<a href="../grade/list"><h3><span class="icon solid fa-list-alt"> Students' Subject</span></h3></a>
										</header>
									</article>
								</div>
								<div class="col-4">
									<article class="item">
										<header>
											<a href="../clearance/list"><h3><span class="icon solid fa-list-alt"> Students' Clearance</span></h3></a>
										</header>
									</article>
								</div>
								<div class="col-4">
									<article class="item">
										<header>
											<a href="../info/list"><h3><span class="icon solid fa-list-alt"> Students' Information</span></h3></a>
										</header>
									</article>
								</div>
								<div class="col-4">
									<article class="item">
										<header>
											<a href="admin/clearall"><h3><span class="icon solid fa-user-minus"> Download and Archive All Clearance</span></h3></a>
										</header>
									</article>
								</div>
							</div>
						<form>
					</div>
				</section>
				<section id="stats" class="one dark cover">
					<div class="container">
					<h2>STATISTICS</h2>
						<article class="item-1">
							<header>
								<h2 style="color:black;">Monthly - Created Users</h2>
								<div id="users" style="height:400px; width:1200px;"></div>
							</header>
						</article>
						<article class="item-1">
							<header>
								<h2 style="color:black;">Monthly - Student Clearance</h2>
								<div id="clearancemonthly" style="height:400px; width:1200px;"></div>
							</header>
						</article>
						<article class="item-1">
							<header>
								<h2 style="color:black;">Yearly - Created Users</h2>
								<div id="yearlyuser" style="height:400px; width:1200px;"></div>
							</header>
						</article>
						<article class="item-1">
							<header>
								<h2 style="color:black;">Yearly - Student Clearance</h2>
								<div id="yearlyclearance" style="height:400px; width:1200px;"></div>
							</header>
						</article>
					</div>
				</section>
				<?php
				}
				?>
				<!-- Staff Control Panel -->
				<?php
				if($_SESSION['userrank'] !== "STUDENT" && $_SESSION['userrank'] !== "ADMIN"){
				?>
				<section id="staffcp" class="one dark cover">
					<div class="container">
						<header>
							<h2>STAFF CONTROL PANEL</h2>
						</header>
						<form method="post">
							<div class="row">
								<?php 
								if($_SESSION['userrank'] == "INSTRUCTOR" || $_SESSION['userrank'] == "ADMIN" || $_SESSION['userrank'] == "SUPERADMIN"){
								?>
								<div class="col-4">
									<article class="item">
										<header>
											<a href="../grade/list"><h3><span class="icon solid fa-list-alt"> Students' Subject</span></h3></a>
										</header>
									</article>
								</div>
								<?php
								}
								?>
								<?php 
								if($_SESSION['userrank'] !== "STUDENT"){
								?>
								<div class="col-4">
									<article class="item">
										<header>
											<a href="../clearance/list"><h3><span class="icon solid fa-list-alt"> Students' Clearance</span></h3></a>
										</header>
									</article>
								</div>
								<?php
								}
								?>
								<?php 
								if($_SESSION['userrank'] == "CASHIER" || $_SESSION['userrank'] == "ADMIN" || $_SESSION['userrank'] == "SUPERADMIN"){
								?>
								<div class="col-4">
									<article class="item">
										<header>
											<a href="../info/list"><h3><span class="icon solid fa-list-alt"> Students' Information</span></h3></a>
										</header>
									</article>
								</div>
								<?php
								}
								?>
							</div>
						<form>
					</div>
				</section>
				<?php
				}
				?>
				<!-- Student Control Panel -->
				<?php
				if($_SESSION['userrank'] == "STUDENT"){
				?>
				<section id="studentcp" class="three dark cover">
					<div class="container">
						<header>
							<h2>STUDENT CONTROL PANEL</h2>
						</header>
						<form method="post">
							
							<br/>
							<div class="row">
								<div class="col-4">
									<article class="item">
										<header>
											<a href="../clearance/create"><h3><span class="icon solid fa-file-signature"> Create My Clearance</span></h3></a>
										</header>
									</article>
								</div>
								<div class="col-4">
									<article class="item">
										<header>
											<a href="../grade/create"><h3><span class="icon solid fa-plus"> Add My Subject</span></h3></a>
										</header>
									</article>
								</div>
								<div class="col-4">
									<article class="item">
										<header>
											<a href="../info/myinfo?userid=<?php echo $_SESSION['id'];?>"><h3><span class="icon solid fa-id-card"> View My Student Info.</span></h3></a>
											<?php $stmt = $pdo->query('SELECT * FROM table_student_info WHERE studentid = "'.$_SESSION['username'].'"'); ?>
											<?php 
												$result = $stmt->fetch(PDO::FETCH_ASSOC);
												if (!is_array($result))  {
													echo "<h3>No Student Information</h3>";
												} else{
													echo '<h3>Student Information Available</h3>';
												}
											?>
										</header>
									</article>
								</div>
								<div class="col-4">
									<article class="item">
										<header>
											<a href="../clearance/myclear?userid=<?php echo $_SESSION['id'];?>"><h3 name="clearance_status"><span class="icon solid fa-file-alt"> View My Clearance</span></h3></a>
											<form method="post">
											<?php $stmt = $pdo->query('SELECT clearance_status FROM student_clearance WHERE studentinfoid = "'.$_SESSION['infoid'].'"'); ?>
											<?php 
												$result = $stmt->fetch(PDO::FETCH_ASSOC);
												if (!is_array($result))  {
													echo "<h3>No Clearance</h3>";
												} elseif($result['clearance_status'] == "Incomplete"){
													echo '<h3 style="color:#ff6565"><span class="icon solid fa-battery-half"> ' .$result['clearance_status']. '</span></h3>';
												}elseif ($result['clearance_status'] == "Completed") {
													echo '<h3 style="color:#00ad45"><span class="icon solid fa-battery-full"> ' .$result['clearance_status']. '</span></h3>';
												}
											?>
											</form>
										</header>
									</article>
								</div>
								<div class="col-4">
									<article class="item">
										<header>
											<a href="../grade/mygrade"><h3><span class="icon solid fa-star-half-alt"> View My Grades</span></h3></a>
											<form method="post">
											<?php $stmt = $pdo->query('SELECT count(*) as total FROM table_student_grade WHERE studentinfoid = "'.$_SESSION['infoid'].'"'); ?>
											<?php $result = $stmt->fetch(PDO::FETCH_ASSOC);
												echo '<h3> Total Subject : ' .$result['total']. '</h3>';
											?>
											</form>
										</header>
									</article>
								</div>
							</div>
						<form>
					</div>
				</section>
				<?php
				}
				?>
				</div>
			<!-- Footer -->
			<div id="footer">
				<!-- Copyright -->
				<ul class="copyright">
                    <li>Copyright &copy; Informatics College. All rights reserved.</li>
                    <li>Design & Template: 
                        <a href="https://zelkeyzz.github.io/WebTest">ZKArts</a>
                    </li>
                </ul>
			</div>
		<!-- Scripts -->
		<!-- External Scripts -->
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<!-- Local Scripts -->
		<script src="../assets/js/jquery.min.js"></script>
		<script src="../assets/js/Chart.bundle.min.js"></script>
		<script src="../assets/js/Chart.min.js"></script>
		<script src="../assets/js/widgets.js"></script>
		<script src="../assets/js/jquery.scrolly.min.js"></script>
		<script src="../assets/js/jquery.scrollex.min.js"></script>
		<script src="../assets/js/browser.min.js"></script>
		<script src="../assets/js/breakpoints.min.js"></script>
		<script src="../assets/js/util.js"></script>
		<script src="../assets/js/main-1.js"></script>
		<script src="../assets/js/all.js"></script>
		<script src="../assets/js/brands.js"></script>
		<script src="../assets/js/fontawesome.js"></script>
		<script src="../assets/js/regular.js"></script>
		<script src="../assets/js/solid.js"></script>
		<script src="../assets/js/v4-shims.js"></script>
		<!-- Internal Scripts -->
		<script type="text/javascript">
		google.charts.load('current', {'packages':['corechart']});
		google.charts.setOnLoadCallback(drawChart);
		
		function drawChart() {
			var data = google.visualization.arrayToDataTable([
			['Date Created', '# of Users', '# of Students', '# of Instructors', '# of Registrar', '# of Staff'],
			['<?php echo $jan['datecreated'] = 'January, 2021'; ?>', <?php echo $jan['total']; ?>,<?php echo $jan1['students']; ?>,<?php echo $jan2['instructors']; ?>,<?php echo $jan3['admins']; ?>, <?php echo $jan4['staffs']; ?>],
			['<?php echo $feb['datecreated'] = 'Febuary, 2021'; ?>',	<?php echo $feb['total']; ?>,<?php echo $feb1['students']; ?>,<?php echo $feb2['instructors']; ?>,<?php echo $feb3['admins']; ?>, <?php echo $feb4['staffs']; ?>],
			['<?php echo $mar['datecreated'] = 'March, 2021'; ?>',	<?php echo $mar['total']; ?>,<?php echo $mar1['students']; ?>,<?php echo $mar2['instructors']; ?>,<?php echo $mar3['admins']; ?>, <?php echo $mar4['staffs']; ?>],
			['<?php echo $apr['datecreated'] = 'April, 2021'; ?>',	<?php echo $apr['total']; ?>,<?php echo $apr1['students']; ?>,<?php echo $apr2['instructors']; ?>,<?php echo $apr3['admins']; ?>, <?php echo $apr4['staffs']; ?>],
			['<?php echo $may['datecreated'] = 'May, 2021'; ?>',	<?php echo $may['total']; ?>,<?php echo $may1['students']; ?>,<?php echo $may2['instructors']; ?>,<?php echo $may3['admins']; ?>, <?php echo $may4['staffs']; ?>],
			['<?php echo $jun['datecreated'] = 'June, 2021'; ?>',	<?php echo $jun['total']; ?>,<?php echo $jun1['students']; ?>,<?php echo $jun2['instructors']; ?>,<?php echo $jun3['admins']; ?>, <?php echo $jun4['staffs']; ?>],
			['<?php echo $jul['datecreated'] = 'July, 2021'; ?>',	<?php echo $jul['total']; ?>,<?php echo $jul1['students']; ?>,<?php echo $jul2['instructors']; ?>,<?php echo $jul3['admins']; ?>, <?php echo $jul4['staffs']; ?>],
			['<?php echo $aug['datecreated'] = 'August, 2021'; ?>',	<?php echo $aug['total']; ?>,<?php echo $aug1['students']; ?>,<?php echo $aug2['instructors']; ?>,<?php echo $aug3['admins']; ?>, <?php echo $aug4['staffs']; ?>],
			['<?php echo $sep['datecreated'] = 'September, 2021'; ?>',	<?php echo $sep['total']; ?>,<?php echo $sep1['students']; ?>,<?php echo $sep2['instructors']; ?>,<?php echo $sep3['admins']; ?>, <?php echo $sep4['staffs']; ?>],
			['<?php echo $oct['datecreated'] = 'October, 2021'; ?>',	<?php echo $oct['total']; ?>,<?php echo $oct1['students']; ?>,<?php echo $oct2['instructors']; ?>,<?php echo $oct3['admins']; ?>, <?php echo $oct4['staffs']; ?>],
			['<?php echo $nov['datecreated'] = 'November, 2021'; ?>',	<?php echo $nov['total']; ?>,<?php echo $nov1['students']; ?>,<?php echo $nov2['instructors']; ?>,<?php echo $nov3['admins']; ?>, <?php echo $nov4['staffs']; ?>],
			['<?php echo $dec['datecreated'] = 'December, 2021'; ?>',	<?php echo $dec['total']; ?>,<?php echo $dec1['students']; ?>,<?php echo $dec2['instructors']; ?>,<?php echo $dec3['admins']; ?>, <?php echo $dec4['staffs']; ?>]
			]);
		
			var options = {'backgroundColor': 'transparent',
			hAxis: {title: 'Date Created',  titleTextStyle: {color: 'black'}},
			legend: {textStyle: {color: 'black'}},
			colors:['black', 'blue', 'red', 'green','yellow'],
			vAxis: {minValue: 0, textStyle: {color: 'black'}}
			};
		
			var chart = new google.visualization.AreaChart(document.getElementById('users'));
			chart.draw(data, options);
		}
		</script>
		<script type="text/javascript">
			google.charts.load('current', {'packages':['corechart']});
			google.charts.setOnLoadCallback(drawChart);
		
			function drawChart() {
				var data = google.visualization.arrayToDataTable([
					['Date Created', '# of Users', '# of Students', '# of Instructors', '# of Registrar', '# of Staff'],
					['<?php echo $useryrjan['datecreated'] = 'Year 2021';?>',<?php echo $useryrjan['total'];?>,<?php echo $useryrjan1['students'];?>,<?php echo $useryrjan2['instructors'];?>,<?php echo $useryrjan3['admins'];?>,<?php echo $useryrjan4['staffs'];?>],
					['<?php echo $useryrfeb['datecreated'] = 'Year 2022';?>',<?php echo $useryrfeb['total'];?>,<?php echo $useryrfeb1['students'];?>,<?php echo $useryrfeb2['instructors'];?>,<?php echo $useryrfeb3['admins'];?>,<?php echo $useryrfeb4['staffs'];?>],
					['<?php echo $useryrmar['datecreated'] = 'Year 2023';?>',<?php echo $useryrmar['total'];?>,<?php echo $useryrmar1['students'];?>,<?php echo $useryrmar2['instructors'];?>,<?php echo $useryrmar3['admins'];?>,<?php echo $useryrmar4['staffs'];?>],
					['<?php echo $useryrapr['datecreated'] = 'Year 2024';?>',<?php echo $useryrapr['total'];?>,<?php echo $useryrapr1['students'];?>,<?php echo $useryrapr2['instructors'];?>,<?php echo $useryrapr3['admins'];?>,<?php echo $useryrapr4['staffs'];?>],
					['<?php echo $useryrmay['datecreated'] = 'Year 2025';?>',<?php echo $useryrmay['total'];?>,<?php echo $useryrmay1['students'];?>,<?php echo $useryrmay2['instructors'];?>,<?php echo $useryrmay3['admins'];?>,<?php echo $useryrmay4['staffs'];?>],
					['<?php echo $useryrjun['datecreated'] = 'Year 2026';?>',<?php echo $useryrjun['total'];?>,<?php echo $useryrjun1['students'];?>,<?php echo $useryrjun2['instructors'];?>,<?php echo $useryrjun3['admins'];?>,<?php echo $useryrjun4['staffs'];?>],
					['<?php echo $useryrjul['datecreated'] = 'Year 2027';?>',<?php echo $useryrjul['total'];?>,<?php echo $useryrjul1['students'];?>,<?php echo $useryrjul2['instructors'];?>,<?php echo $useryrjul3['admins'];?>,<?php echo $useryrjul4['staffs'];?>],
					['<?php echo $useryraug['datecreated'] = 'Year 2028';?>',<?php echo $useryraug['total'];?>,<?php echo $useryraug1['students'];?>,<?php echo $useryraug2['instructors'];?>,<?php echo $useryraug3['admins'];?>,<?php echo $useryraug4['staffs'];?>],
					['<?php echo $useryrsep['datecreated'] = 'Year 2029';?>',<?php echo $useryrsep['total'];?>,<?php echo $useryrsep1['students'];?>,<?php echo $useryrsep2['instructors'];?>,<?php echo $useryrsep3['admins'];?>,<?php echo $useryrsep4['staffs'];?>],
					['<?php echo $useryroct['datecreated'] = 'Year 2030';?>',<?php echo $useryroct['total'];?>,<?php echo $useryroct1['students'];?>,<?php echo $useryroct2['instructors'];?>,<?php echo $useryroct3['admins'];?>,<?php echo $useryroct4['staffs'];?>],
					['<?php echo $useryrnov['datecreated'] = 'Year 2031';?>',<?php echo $useryrnov['total'];?>,<?php echo $useryrnov1['students'];?>,<?php echo $useryrnov2['instructors'];?>,<?php echo $useryrnov3['admins'];?>,<?php echo $useryrnov4['staffs'];?>],
					['<?php echo $useryrdec['datecreated'] = 'Year 2032';?>',<?php echo $useryrdec['total'];?>,<?php echo $useryrdec1['students'];?>,<?php echo $useryrdec2['instructors'];?>,<?php echo $useryrdec3['admins'];?>,<?php echo $useryrdec4['staffs'];?>]
				]);
		
				var options = {'backgroundColor': 'transparent',
				hAxis: {title: 'Date Created',  titleTextStyle: {color: 'black'}},
				legend: {textStyle: {color: 'black'}},
				colors:['black', 'blue', 'red', 'green','yellow'],
				vAxis: {minValue: 0, textStyle: {color: 'black'}}
				};
		
				var chart = new google.visualization.AreaChart(document.getElementById('yearlyuser'));
				chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
			google.charts.load('current', {'packages':['corechart']});
			google.charts.setOnLoadCallback(drawChart);
		
			function drawChart() {
				var data = google.visualization.arrayToDataTable([
					['Date Created', 'Created Clearance', 'Incomplete Clearance', 'Completed Clearance'],
					['<?php echo $clearancejan['datecreated'] = 'January, 2021'; ?>',<?php echo $clearancejan['total']; ?>,<?php echo $clearancejan1['unfinished']; ?>,<?php echo $clearancejan2['finished']; ?>],
					['<?php echo $clearancefeb['datecreated'] = 'Febuary, 2021'; ?>',<?php echo $clearancefeb['total']; ?>,<?php echo $clearancefeb1['unfinished']; ?>,<?php echo $clearancefeb2['finished']; ?>],
					['<?php echo $clearancemar['datecreated'] = 'March, 2021'; ?>',<?php echo $clearancemar['total']; ?>,<?php echo $clearancemar1['unfinished']; ?>,<?php echo $clearancemar2['finished']; ?>],
					['<?php echo $clearanceapr['datecreated'] = 'April, 2021'; ?>',<?php echo $clearanceapr['total']; ?>,<?php echo $clearanceapr1['unfinished']; ?>,<?php echo $clearanceapr2['finished']; ?>],
					['<?php echo $clearancemay['datecreated'] = 'May, 2021'; ?>',<?php echo $clearancemay['total']; ?>,<?php echo $clearancemay1['unfinished']; ?>,<?php echo $clearancemay2['finished']; ?>],
					['<?php echo $clearancejun['datecreated'] = 'June, 2021'; ?>',<?php echo $clearancejun['total']; ?>,<?php echo $clearancejun1['unfinished']; ?>,<?php echo $clearancejun2['finished']; ?>],
					['<?php echo $clearancejul['datecreated'] = 'July, 2021'; ?>',<?php echo $clearancejul['total']; ?>,<?php echo $clearancejul1['unfinished']; ?>,<?php echo $clearancejul2['finished']; ?>],
					['<?php echo $clearanceaug['datecreated'] = 'August, 2021'; ?>',<?php echo $clearanceaug['total']; ?>,<?php echo $clearanceaug1['unfinished']; ?>,<?php echo $clearanceaug2['finished']; ?>],
					['<?php echo $clearancesep['datecreated'] = 'September, 2021'; ?>',<?php echo $clearancesep['total']; ?>,<?php echo $clearancesep1['unfinished']; ?>,<?php echo $clearancesep2['finished']; ?>],
					['<?php echo $clearanceoct['datecreated'] = 'October, 2021'; ?>',<?php echo $clearanceoct['total']; ?>,<?php echo $clearanceoct1['unfinished']; ?>,<?php echo $clearanceoct2['finished']; ?>],
					['<?php echo $clearancenov['datecreated'] = 'Novemember, 2021'; ?>',<?php echo $clearancenov['total']; ?>,<?php echo $clearancenov1['unfinished']; ?>,<?php echo $clearancenov2['finished']; ?>],
					['<?php echo $clearancedec['datecreated'] = 'December, 2021'; ?>',<?php echo $clearancedec['total']; ?>,<?php echo $clearancedec1['unfinished']; ?>,<?php echo $clearancedec2['finished']; ?>]
				]);
		
				var options = {'backgroundColor': 'transparent',
				hAxis: {title: 'Date Created',  titleTextStyle: {color: 'black'}},
				legend: {textStyle: {color: 'black'}},
				colors:['black', 'blue', 'red', 'green','yellow'],
				vAxis: {minValue: 0, textStyle: {color: 'black'}}
				};
		
				var chart = new google.visualization.AreaChart(document.getElementById('clearancemonthly'));
				chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
			google.charts.load('current', {'packages':['corechart']});
			google.charts.setOnLoadCallback(drawChart);
		
			function drawChart() {
				var data = google.visualization.arrayToDataTable([
					['Date Created', 'Created Clearance', 'Incomplete Clearance', 'Completed Clearance'],
					['<?php echo $clearanceyrjan['datecreated'] = 'Year 2021'; ?>',<?php echo $clearanceyrjan['total']; ?>,<?php echo $clearanceyrjan1['unfinished']; ?>,<?php echo $clearanceyrjan2['finished']; ?>],
					['<?php echo $clearanceyrfeb['datecreated'] = 'Year 2022'; ?>',<?php echo $clearanceyrfeb['total']; ?>,<?php echo $clearanceyrfeb1['unfinished']; ?>,<?php echo $clearanceyrfeb2['finished']; ?>],
					['<?php echo $clearanceyrmar['datecreated'] = 'Year 2023'; ?>',<?php echo $clearanceyrmar['total']; ?>,<?php echo $clearanceyrmar1['unfinished']; ?>,<?php echo $clearanceyrmar2['finished']; ?>],
					['<?php echo $clearanceyrapr['datecreated'] = 'Year 2024'; ?>',<?php echo $clearanceyrapr['total']; ?>,<?php echo $clearanceyrapr1['unfinished']; ?>,<?php echo $clearanceyrapr2['finished']; ?>],
					['<?php echo $clearanceyrmay['datecreated'] = 'Year 2025'; ?>',<?php echo $clearanceyrmay['total']; ?>,<?php echo $clearanceyrmay1['unfinished']; ?>,<?php echo $clearanceyrmay2['finished']; ?>],
					['<?php echo $clearanceyrjun['datecreated'] = 'Year 2026'; ?>',<?php echo $clearanceyrjun['total']; ?>,<?php echo $clearanceyrjun1['unfinished']; ?>,<?php echo $clearanceyrjun2['finished']; ?>],
					['<?php echo $clearanceyrjul['datecreated'] = 'Year 2027'; ?>',<?php echo $clearanceyrjul['total']; ?>,<?php echo $clearanceyrjul1['unfinished']; ?>,<?php echo $clearanceyrjul2['finished']; ?>],
					['<?php echo $clearanceyraug['datecreated'] = 'Year 2028'; ?>',<?php echo $clearanceyraug['total']; ?>,<?php echo $clearanceyraug1['unfinished']; ?>,<?php echo $clearanceyraug2['finished']; ?>],
					['<?php echo $clearanceyrsep['datecreated'] = 'Year 2029'; ?>',<?php echo $clearanceyrsep['total']; ?>,<?php echo $clearanceyrsep1['unfinished']; ?>,<?php echo $clearanceyrsep2['finished']; ?>],
					['<?php echo $clearanceyroct['datecreated'] = 'Year 2030'; ?>',<?php echo $clearanceyroct['total']; ?>,<?php echo $clearanceyroct1['unfinished']; ?>,<?php echo $clearanceyroct2['finished']; ?>],
					['<?php echo $clearanceyrnov['datecreated'] = 'Year 2031'; ?>',<?php echo $clearanceyrnov['total']; ?>,<?php echo $clearanceyrnov1['unfinished']; ?>,<?php echo $clearanceyrnov2['finished']; ?>],
					['<?php echo $clearanceyrdec['datecreated'] = 'Year 2032'; ?>',<?php echo $clearanceyrdec['total']; ?>,<?php echo $clearanceyrdec1['unfinished']; ?>,<?php echo $clearanceyrdec2['finished']; ?>]
				]);
		
				var options = {'backgroundColor': 'transparent' ,
				hAxis: {title: 'Date Created',  titleTextStyle: {color: 'black'}},
				legend: {textStyle: {color: 'black'}},
				colors:['blue', 'red', 'green'],
				vAxis: {minValue: 0}
				};
		
				var chart = new google.visualization.AreaChart(document.getElementById('yearlyclearance'));
				chart.draw(data, options);
			}
		</script>
	</body>
</html>