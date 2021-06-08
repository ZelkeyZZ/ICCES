<?php
	session_start();
	include '../inc/func.php';
	include '../inc/curriculum/list-inc.php';
	
	// Check if the user is logged in, if not then redirect him to login page
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["status"] !== "Active"){
		header("location: ../user/logout.php");
		exit;
	}
?>
<!DOCTYPE HTML> 
<html> 
    <head> 
        <title>Subject Legend</title>         
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
						<h2>Subject Legend</h2>
						<form method="POST">
							<div>
								<?php if($_SESSION['userrank'] == "ADMIN" || $_SESSION['userrank'] == "SUPERADMIN"){?>
								<a href="../curriculum/create" class="button">New Subject</a>
								<a href="../curriculum/export" class="button"><i class="fas fa-file-export"></i>Export</a>
								<a href="../curriculum/addfile" class="button"><i class="fas fa-file-import"></i>Import</a>
								<?php }?>
								<input type="text" class="form-control" name="keyword" value="<?php echo isset($_POST['keyword']) ? $_POST['keyword'] : '' ?>" placeholder="Search here..." required="">
								<ul class="actions special">
									<li>
										<button class="button primary" name="search">Search</button>
									</li>
									<a href="../user/list" class="button">Reload</a>
								</ul>
							</div>
							<?php
								if(ISSET($_POST['search'])){
							?>
							<table>
								<thead>
									<tr>
										<td>Subject Code</td>
										<td>Subject Name</td>
										<td>Subject Unit</td>
										<td>Lab Unit</td>
										<td>Total Unit</td>
										<td>School Year</td>
									</tr>
								</thead>
								<tbody>
									<?php
										$keyword = $_POST['keyword'];
										$query = $pdo->prepare("SELECT * FROM subject_list WHERE subject_code LIKE '%$keyword%' or subject_name LIKE '%$keyword%'");
										$query->execute();
										while($row = $query->fetch()){
									?>
									<tr>
										<td><?php echo $row['subject_code']?></td>
										<td><?php echo $row['subject_name']?></td>
										<td><?php echo $row['subject_unit']?></td>
										<td><?php echo $row['subject_labunit']?></td>
										<td><?php echo $row['subject_unit'] + $row['subject_labunit']?></td>
										<td><?php echo $row['schoolyear']?></td>
									<?php if($_SESSION['userrank'] == "ADMIN" || $_SESSION['userrank'] == "SUPERADMIN"){?>
										<td class="actions">
											<a href="../curriculum/edit.php?id=<?=$row['id']?>" class="edit"><i class="fas fa-pen"></i></a>
										</td>
									<?php }?>
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
										<td>Subject Code</td>
										<td>Subject Name</td>
										<td>Subject Unit</td>
										<td>Lab Unit</td>
										<td>Total Unit</td>
										<td>School Year</td>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($studentinfos as $studentinfo): ?>
									<tr>
										<td><?=$studentinfo['subject_code']?></td>
										<td><?=$studentinfo['subject_name']?></td>
										<td><?=$studentinfo['subject_unit']?></td>
										<td><?=$studentinfo['subject_labunit']?></td>
										<td><?=$studentinfo['subject_unit'] + $studentinfo['subject_labunit']?></td>
										<td><?=$studentinfo['schoolyear']?></td>
									<?php if($_SESSION['userrank'] == "ADMIN" || $_SESSION['userrank'] == "SUPERADMIN"){?>
										<td class="actions">
											<a href="../curriculum/edit.php?id=<?=$studentinfo['id']?>" class="edit"><i class="fas fa-pen"></i></a>
										</td>
									<?php }?>	
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
								<?php
								}
								?>
							<div class="pagination">
							<?php if ($page > 1): ?>
								<a href="../curriculum/list.php?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
							<?php endif; ?>
							<?php echo "Page : $page"; ?>
							<?php if ($page*$records_per_page < $num_contacts): ?>
								<a href="../curriculum/list.php?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
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