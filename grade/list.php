<?php
	session_start();
	include '../inc/func.php';
	include '../inc/grade/glist-inc.php';
	
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
						<h2>Students' Subjects</h2>
						<form method="POST">
							<div>
								<input type="text" class="form-control" name="keyword" value="<?php echo isset($_POST['keyword']) ? $_POST['keyword'] : '' ?>" placeholder="Search here..." required="">
								<ul class="actions special">
									<li>
										<button class="button primary" name="search">Search</button>
									</li>
									<a href="../grade/list" class="button">Reload</a>
								</ul>
							</div>
							<?php
								if(ISSET($_POST['search'])){
							?>
							<table>
								<thead>
									<tr>
										<td>Student ID</td>
										<td>Student Name</td>
										<td>Year Level</td>
										<td>Course</td>
										<td>Subject Code</td>
										<td></td>
									</tr>
								</thead>
								<tbody>
								<?php
									$keyword = $_POST['keyword'];
									$query = $pdo->prepare("SELECT * FROM grading_list WHERE studentid = '$keyword' OR studentname LIKE '%$keyword%' OR yearlevel = '$keyword' OR course_type = '$keyword' OR subject_code = '$keyword' GROUP BY instructorname = '".$_SESSION['fullname']."'");
									$query->execute();
									while($row = $query->fetch()){
								?>
								<tr>
									<td><?php echo $row['studentid']?></td>
									<td><?php echo $row['studentname']?></td>
									<td><?php echo $row['yearlevel']?></td>
									<td><?php echo $row['course_type']?></td>
									<td><?php echo $row['subject_code']?></td>
									<td>
										<a href="../grade/view.php?id=<?=$row['id']?>"><span class="fas fa-eye"></span></a>
									<?php if($_SESSION['userrank'] == "INSTRUCTOR") { ?>
										<a href="../grade/update.php?id=<?=$row['id']?>"><span class="fas fa-pen"></span></a>
									<?php } ?>
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
										<td>Student ID</td>
										<td>Student Name</td>
										<td>Year Level</td>
										<td>Course</td>
										<td>Subject Code</td>
										<td></td>
									</tr>
								</thead>
								<tbody>
								<?php foreach ($grades as $grade): ?>
								<tr>
									<td><?=$grade['studentid']?></td>
									<td><?=$grade['studentname']?></td>
									<td><?=$grade['yearlevel']?></td>
									<td><?=$grade['course_type']?></td>
									<td><?=$grade['subject_code']?></td>
									<td>
										<a href="../grade/view.php?id=<?=$grade['id']?>"><span class="fas fa-eye"></span></a>
									<?php if($_SESSION['userrank'] == "INSTRUCTOR") { ?>
										<a href="../grade/update.php?id=<?=$grade['id']?>"><span class="fas fa-pen"></span></a>
									<?php } ?>
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
								<a href="../grade/list.php?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
							<?php endif; ?>
							<?php echo "Page : $page"; ?>
							<?php if ($page*$records_per_page < $num_contacts): ?>
								<a href="../grade/list.php?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
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