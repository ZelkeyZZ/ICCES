<?php
	session_start();
	include '../inc/func.php';
	include '../inc/info/slist-inc.php';
	
	// Check if the user is logged in, if not then redirect him to login page
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["status"] !== "Active"){
		header("location: ../user/logout.php");
		exit;
	}
	
	if($_SESSION['userrank'] == "SUPERADMIN" || $_SESSION['userrank'] == "CASHIER"){
	} 	else if($_SESSION['userrank'] !== "SUPERADMIN" || $_SESSION['userrank'] !== "CASHIER") {
			header("location: ../user/overview");
			exit;
		}
?>
<!DOCTYPE HTML> 
<html> 
    <head> 
        <title>Students' Information</title>         
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
    <body class="landing is-preload" style="height:100%">
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
						<h2>Students' Information</h2>
						<form method="POST">
							<div>
								<input type="text" class="form-control" name="keyword" value="<?php echo isset($_POST['keyword']) ? $_POST['keyword'] : '' ?>" placeholder="Search here..." required="">
								<ul class="actions special">
									<li>
										<button class="button primary" name="search">Search</button>
									</li>
									<a href="../info/list" class="button">Reload</a>
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
										<td>Info</td>
										<td>C.O.R</td>
										<td>Req.</td>
									</tr>
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td><a href="../info/cor-create"><i class="far fa-plus-square" style="color:#ffffff"></i></a></td>
										<td><a href="../info/req-create"><i class="far fa-plus-square" style="color:#ffffff"></i></a></td>
									</tr>
								</thead>
								<tbody>
<?php
$keyword = $_POST['keyword'];
$query = $pdo->prepare("
SELECT 
table_student_info.id,
table_student_info.studentid, CONCAT(table_student_info.lastname,', ',table_student_info.firstname,' ',table_student_info.initials) AS studentname,
table_yearlevel.yearlevel, table_courses.course_type AS course
FROM table_student_info 
LEFT JOIN table_yearlevel ON table_yearlevel.id = table_student_info.yearid
LEFT JOIN table_courses ON table_courses.id = table_student_info.courseid
WHERE 
CONCAT(table_student_info.lastname,', ',table_student_info.firstname,' ',table_student_info.initials) LIKE '%$keyword%' 
OR table_student_info.studentid LIKE '%$keyword%' 
OR table_yearlevel.yearlevel LIKE '%$keyword%' 
OR table_courses.course_type LIKE '%$keyword%'");
$query->execute();
while($row = $query->fetch()){
?>
									<tr>
										<td><?php echo $row['id']?></td>
										<td><?php echo $row['studentid']?></td>
										<td><?php echo $row['studentname']?></td>
										<td><?php echo $row['yearlevel']?></td>
										<td><?php echo $row['course']?></td>
										<td>
											<a href="../info/view.php?id=<?=$row['id']?>"><i class="fas fa-eye" style="color:#ffffff"></i></a>
											<a href="../info/update.php?id=<?=$row['id']?>"><i class="fas fa-pen" style="color:#ffffff"></i></a>
										</td>
										<td>
										<?php 
											$stmt = $pdo->query('SELECT * FROM table_student_cor WHERE studentinfoid = "'.$row['id'].'"');
											$result = $stmt->fetch(PDO::FETCH_ASSOC);
												if (!is_array($result))  { ?>
												<i class="fas fa-times-circle" style="color:#ffffff"></i>
										<?php	} else{ ?>
												<a href="../info/cor-edit.php?studentinfoid=<?=$row['id']?>" class="edit" style="color:#525252"><i class="fas fa-pen" style="color:#ffffff"></i></a>
										<?php 	} ?>
										</td>
										<td>
										<?php 
											$stmt = $pdo->query('SELECT * FROM table_student_req WHERE studentinfoid = "'.$row['id'].'"');
											$result = $stmt->fetch(PDO::FETCH_ASSOC);
												if (!is_array($result))  { ?>
												<i class="fas fa-times-circle" style="color:#ffffff"></i>
										<?php	} else{ ?>
												<a href="../info/req-edit.php?studentinfoid=<?=$row['id']?>" class="edit" style="color:#525252"><i class="fas fa-pen" style="color:#ffffff"></i></a>
										<?php 	} ?>
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
										<td>Info</td>
										<td>C.O.R</td>
										<td>Req.</td>
									</tr>
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td><a href="../info/cor-create"><i class="far fa-plus-square" style="color:#ffffff"></i></a></td>
										<td><a href="../info/req-create"><i class="far fa-plus-square" style="color:#ffffff"></i></a></td>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($studentinfos as $studentinfo): ?>
									<tr>
										<td><?=$studentinfo['id']?></td>
										<td><?=$studentinfo['studentid']?></td>
										<td><?=$studentinfo['studentname']?></td>
										<td><?=$studentinfo['yearlevel']?></td>
										<td><?=$studentinfo['course']?></td>
										<td>
											<a href="../info/view.php?id=<?=$studentinfo['id']?>"><i class="fas fa-eye" style="color:#ffffff"></i></a>
											<a href="../info/update.php?id=<?=$studentinfo['id']?>"><i class="fas fa-pen" style="color:#ffffff"></i></a>
										</td>
										<td>
										<?php 
											$stmt = $pdo->query('SELECT * FROM table_student_cor WHERE studentinfoid = "'.$studentinfo['id'].'"');
											$result = $stmt->fetch(PDO::FETCH_ASSOC);
												if (!is_array($result))  { ?>
												<i class="fas fa-times-circle" style="color:#ffffff"></i>
										<?php	} else{ ?>
												<a href="../info/cor-edit.php?studentinfoid=<?=$studentinfo['id']?>" class="edit" style="color:#525252"><i class="fas fa-pen" style="color:#ffffff"></i></a>
										<?php 	} ?>
										</td>
										<td>
										<?php 
											$stmt = $pdo->query('SELECT * FROM table_student_req WHERE studentinfoid = "'.$studentinfo['id'].'"');
											$result = $stmt->fetch(PDO::FETCH_ASSOC);
												if (!is_array($result))  { ?>
												<i class="fas fa-times-circle" style="color:#ffffff"></i>
										<?php	} else{ ?>
												<a href="../info/req-edit.php?studentinfoid=<?=$studentinfo['id']?>" class="edit" style="color:#525252"><i class="fas fa-pen" style="color:#ffffff"></i></a>
										<?php 	} ?>
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
								<a href="../info/list.php?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
							<?php endif; ?>
							<?php echo "Page : $page"; ?>
							<?php if ($page*$records_per_page < $num_contacts): ?>
								<a href="../info/list.php?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
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