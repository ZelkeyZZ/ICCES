<?php
	session_start();
	include 'inc/func.php';
	include 'inc/ulist-inc.php';
	
	// Check if the user is logged in, if not then redirect him to login page
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
		header("location: ../../../user/login");
		exit;
	}
	
	if($_SESSION['userrank'] !== "STUDENT"){
	} else if($_SESSION['userrank'] == "STUDENT") {
			header("location: ../../../user/login");
			exit;
	}
?>
<!DOCTYPE HTML> 
<html> 
    <head> 
        <title>Registered Students</title>         
        <meta charset="utf-8"/> 
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/> 
        <link rel="stylesheet" href="../../../assets/css/main.css"/> 
        <link rel="stylesheet" href="../../../assets/css/fontawesome.css"/> 
        <link rel="stylesheet" href="../../../assets/css/v4-shims.css"/> 
        <link rel="stylesheet" href="../../../assets/css/brands.css"/> 
        <link rel="stylesheet" href="../../../assets/css/all.css"/> 
        <link rel="stylesheet" href="../../../assets/css/regular.css"/> 
        <link rel="stylesheet" href="../../../assets/css/solid.css"/> 
        <link rel="stylesheet" href="../../../assets/css/svg-with-js.css"/>
		<link rel="shortcut icon" type="image/png" href="../../../images/icon/favicon.png"/>
        <noscript>
            <link rel="stylesheet" href="../../../assets/css/noscript.css"/>
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
							<a href="../../overview"><span>Return</span></a>
						</li>
					</ul>
                </nav>
            </header>
			<!-- One -->
			<section id="one" class="wrapper style1 special">
				<div class="inner">
					<header class="major">
						<h2>Registered Users</h2>
						<form method="POST">
							<div>
								<input type="text" class="form-control" name="keyword" value="<?php echo isset($_POST['keyword']) ? $_POST['keyword'] : '' ?>" placeholder="Search here..." required="">
								<ul class="actions special">
									<li>
										<button class="button primary" name="search">Search</button>
									</li>
									<a href="users" class="button">Reload</a>
								</ul>
							</div>
							<?php
								if(ISSET($_POST['search'])){
							?>
							<table>
								<thead>
									<tr>
										<td>User's ID</td>
										<td>User's Name</td>
										<td>User's Email</td>
										<td>User's Level</td>
										<td>User's Status</td>
										<td></td>
									</tr>
								</thead>
								<tbody>
								<?php
									$keyword = $_POST['keyword'];
									$query = $pdo->prepare("SELECT * FROM test_user_list WHERE employee_name LIKE '%$keyword%' OR student_name LIKE '%$keyword%' OR user_id LIKE '%$keyword%' OR user_email LIKE '%$keyword%' or `user_rank` LIKE '%$keyword%' or `user_status` LIKE '%$keyword%'");
									$query->execute();
									while($row = $query->fetch()){
								?>
								<tr>
									<td><?php echo $row['user_id']?></td>
								<?php if($row['employee_name'] !== NULL){ ?>
									<td><?php echo $row['employee_name'];?></td>
								<?php } 	else { ?>
									<td><?php echo $row['student_name'];?></td>
									<?php 	} ?>
									<td><?php echo $row['user_email']?></td>
									<td><?php echo $row['user_rank']?></td>
									<td><?php echo $row['user_status']?></td>
									<td><a class="fas fa-pen" href="../view/edit?id=<?php echo $row['id'];?>" class="edit"></a></td>
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
										<td>User's ID</td>
										<td>User's Name</td>
										<td>User's Email</td>
										<td>User's Level</td>
										<td>User's Status</td>
										<td></td>
									</tr>
								</thead>
								<tbody>
								<?php foreach ($users as $user): ?>
								<tr>
									<td><?=$user['user_id']?></td>
								<?php if($user['employee_name'] !== NULL){ ?>
									<td><?php echo $user['employee_name'];?></td>
								<?php } 	else { ?>
									<td><?php echo $user['student_name'];?></td>
									<?php 	} ?>
									</td>
									<td><?=$user['user_email']?></td>
									<td><?=$user['user_rank']?></td>
									<td><?=$user['user_status']?></td>
									<td><a class="fas fa-pen" href="../view/edit?id=<?php echo $user['id'];?>" class="edit"></a></td>
								</tr>
								<?php endforeach; ?>
							</tbody>
							</table>
							<?php
								}
							?>
							<div class="pagination">
							<?php if ($page > 1): ?>
								<a href="users.php?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
							<?php endif; ?>
							<?php echo "Page : $page"; ?>
							<?php if ($page*$records_per_page < $num_contacts): ?>
								<a href="users.php?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
							<?php endif; ?>
						</div>
						</form>
					</header>
				</div>
			</section>
        </div>         
        <!-- Scripts -->         
        <script src="../../../assets/js/jquery.min.js"></script>         
        <script src="../../../assets/js/jquery.scrollex.min.js"></script>         
        <script src="../../../assets/js/jquery.scrolly.min.js"></script>         
        <script src="../../../assets/js/browser.min.js"></script>         
        <script src="../../../assets/js/breakpoints.min.js"></script>         
        <script src="../../../assets/js/util.js"></script>         
        <script src="../../../assets/js/main.js"></script>         
        <script src="../../../assets/js/all.js"></script>         
        <script src="../../../assets/js/brands.js"></script>         
        <script src="../../../assets/js/fontawesome.js"></script>         
        <script src="../../../assets/js/regular.js"></script>         
        <script src="../../../assets/js/solid.js"></script>         
        <script src="../../../assets/js/v4-shims.js"></script>         
    </body>     
</html>