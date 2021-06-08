<?php
	session_start();
	include '../inc/func.php';
	include '../inc/curriculum/list-inc.php';
	
	// Check if the user is logged in, if not then redirect him to login page
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["status"] !== "Active"){
		header("location: ../user/logout.php");
		exit;
	}
	
	if($_SESSION['userrank'] == "SUPERADMIN" || $_SESSION['userrank'] == "ADMIN"){
	} 	else if($_SESSION['userrank'] !== "SUPERADMIN" || $_SESSION['userrank'] !== "ADMIN") {
			header("location: ../curriculum/list");
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
							<a href="../curriculum/list"><span>Return</span></a>
						</li>
					</ul>
                </nav>
            </header>
			<!-- One -->
			<section id="one" class="wrapper style1 special">
				<div class="inner">
					<header class="major">
						<h2>Import File</h2>
						<form action="import.php" method="post" enctype="multipart/form-data">
							<input type="file" name="uploadedfile" required>
							<input type="submit" value="Upload">
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