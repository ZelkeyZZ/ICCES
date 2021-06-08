<?php
	session_start();
	include '../inc/func.php';
	include '../inc/config-inc.php';
	include '../inc/clearance/clist-inc.php';
	
	// Check if the user is logged in, if not then redirect him to login page
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["status"] !== "Active"){
		header("location: ../user/logout.php");
		exit;
	}
	
	if($_SESSION['userrank'] !== "STUDENT"){
	} 	else if($_SESSION['userrank'] == "STUDENT") {
			header("location: ../user/overview");
			exit;
		}
?>
<!DOCTYPE HTML> 
<html> 
    <head> 
        <title>Student's Clearance</title>         
        <meta charset="utf-8"/> 
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/> 
        <link rel="stylesheet" href="../assets/css/main.css"/> 
        <link rel="stylesheet" href="../assets/css/fontawesome.css"/> 
        <link rel="stylesheet" href="../assets/css/v4-shims.css"/> 
        <link rel="stylesheet" href="../assets/css/brands.css"/> 
        <link rel="stylesheet" href="../assets/css/all.css"/> 
        <link rel="stylesheet" href="../assets/css/regular.css"/> 
        <link rel="stylesheet" href="../assets/css/solid.css"/> 
        <link rel="stylesheet" href="../assets/css/svg-with-js.css"/>
		<link rel="shortcut icon" type="image/png" href="../images/icon/favicon.png"/>
        <noscript>
            <link rel="stylesheet" href="assets/css/noscript.css"/>
        </noscript>         
    </head>     
    <body class="landing is-preload" style="height:100%; width:100%;">
        <!-- Page Wrapper -->
        <div id="page-wrapper">
			<!-- Header -->
            <header id="header" class="alt">
                <nav id="nav">
                    <ul>
						<li class="special">
							<a href="../user/overview"><span>Return</span></a>
						</li>
					</ul>
                </nav>
            </header>
			<!-- One -->
			<section id="one" class="wrapper style1 special">
				<div class="inner">
					<header class="major">
						<h2>Student's Clearance</h2>
						<form method="POST">
							<div>
								<input type="text" class="form-control" name="keyword" value="<?php echo isset($_POST['keyword']) ? $_POST['keyword'] : '' ?>" placeholder="Search here..." required="">
								<ul class="actions special">
									<li>
										<button class="button primary" name="search">Search</button>
									</li>
									<a href="../clearance/list" class="button">Reload</a>
								</ul>
							</div>
						<?php
							if(ISSET($_POST['search'])){
						?>
						<table>
							<thead>
								<tr>
									<td>#</td>
									<td>Student ID</td>
									<td>Student Name</td>
									<td>Year Level</td>
									<td>Course</td>
									<td>Student's Clearance</td>
									<td></td>
								</tr>
							</thead>
							<tbody>
								<?php
									$keyword = $_POST['keyword'];
									$query = $pdo->prepare("SELECT * FROM student_clearance WHERE studentname LIKE '%$keyword%' OR studentid = '$keyword' OR clearance_status = '$keyword' OR yearlevel = '$keyword' OR course_type = '$keyword'");
									$query->execute();
									while($row = $query->fetch()){
								?>
								<tr>
									<td style="color:black;"><?php echo $row['id']?></td>
									<td><?php echo $row['studentid']?></td>
									<td><?php echo $row['studentname']?></td>
									<td><?php echo $row['yearlevel']?></td>
									<td><?php echo $row['course_type']?></td>
									<?php
									if($row['clearance_status'] == "Completed"){
										echo '<td style="background-color:#65ff86; color:black;">'.$row['clearance_status'].'</td>';
									} else if ($row['clearance_status'] == "Incomplete"){
										echo '<td style="background-color:#ff6565; color:black;">'.$row['clearance_status'].'</td>';
									}
									?>
									<td class="actions">
										<a href="../clearance/view.php?id=<?=$row['id']?>" class="edit"><i class="fas fa-eye"></i></a>
										<a href="../clearance/sign.php?id=<?=$row['id']?>" class="edit"><i class="fas fa-pen"></i></a>
									</td>
								</tr>
								<?php
									}
								?>
							</tbody>
						</table>
						<?php		
							} else{
						?>
						<table>
							<thead>
								<tr>
									<td>#</td>
									<td>Student ID</td>
									<td>Student Name</td>
									<td>Year Level</td>
									<td>Course</td>
									<td>Student's Clearance</td>
									<td></td>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($clearances as $clearance): ?>
								<tr>
									<td style="color:black;"><?=$clearance['id']?></td>
									<td><?=$clearance['studentid']?></td>
									<td><?=$clearance['studentname']?></td>
									<td><?php echo $clearance['yearlevel']?></td>
									<td><?php echo $clearance['course_type']?></td>
								<?php
									if($clearance['clearance_status'] == "Completed"){
										echo '<td style="background-color:#65ff86; color:black;">'.$clearance['clearance_status'].'</td>';
									} else if ($clearance['clearance_status'] == "Incomplete"){
										echo '<td style="background-color:#ff6565; color:black;">'.$clearance['clearance_status'].'</td>';
									}
								?>
									<td class="actions">
										<a href="../clearance/view.php?id=<?=$clearance['id']?>" class="edit"><i class="fas fa-eye"></i></a>
										<a href="../clearance/sign.php?id=<?=$clearance['id']?>" class="edit"><i class="fas fa-pen"></i></a>
									</td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
						<?php
							}
						?>
						<div class="pagination">
							<?php if ($page > 1): ?>
								<a href="../clearance/list.php?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
							<?php endif; ?>
							<?php echo "Page : $page"; ?>
							<?php if ($page*$records_per_page < $num_contacts): ?>
								<a href="../clearance/list.php?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
							<?php endif; ?>
						</div>
						</form>
					</header>
				</div>
			</section>
        </div>         
        <!-- Scripts -->         
        <script src="../assets/js/jquery.min.js"></script>         
        <script src="../assets/js/jquery.scrollex.min.js"></script>         
        <script src="../assets/js/jquery.scrolly.min.js"></script>         
        <script src="../assets/js/browser.min.js"></script>         
        <script src="../assets/js/breakpoints.min.js"></script>         
        <script src="../assets/js/util.js"></script>         
        <script src="../assets/js/main.js"></script>         
        <script src="../assets/js/all.js"></script>         
        <script src="../assets/js/brands.js"></script>         
        <script src="../assets/js/fontawesome.js"></script>         
        <script src="../assets/js/regular.js"></script>         
        <script src="../assets/js/solid.js"></script>         
        <script src="../assets/js/v4-shims.js"></script>         
    </body>     
</html>