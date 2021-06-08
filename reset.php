<?php
	include("inc/config-inc.php");
	
	if(!isset($_GET["hashcode"])){
		header("location: 404/404.php");
		exit();
	}
	
	$hashcode = $_GET["hashcode"];
	
	$getEmailQuery = "SELECT email FROM table_reset WHERE hashcode='$hashcode'";
	
	$stmt = $pdo->prepare($getEmailQuery);
	$stmt->execute();
	$row = $stmt->fetch();
	
	if($row == 0){
		header("location: 404/request404.php");
		exit();
	}
	
	if(isset($_POST["password"])){
		$password = $_POST["password"];
		$password = password_hash($password, PASSWORD_DEFAULT);
		
		$email = $row["email"];
		
		$query = $pdo->query("UPDATE table_users SET password = '$password' WHERE email = '$email'");
		
		if($query){
			$query = $pdo->query("DELETE FROM table_reset WHERE hashcode = '$hashcode'");
			header("location: 404/success.php");
			exit();
		} else {
			header("location: 404/went404.php");
			exit();
		}
	}
?>
<!DOCTYPE HTML> 
<html> 
    <head> 
        <title>ICCES | Reset Password</title>         
        <meta charset="utf-8"/> 
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/> 
        <link rel="stylesheet" href="assets/css/main.css"/> 
        <link rel="stylesheet" href="assets/css/fontawesome.css"/> 
        <link rel="stylesheet" href="assets/css/v4-shims.css"/> 
        <link rel="stylesheet" href="assets/css/brands.css"/> 
        <link rel="stylesheet" href="assets/css/all.css"/> 
        <link rel="stylesheet" href="assets/css/regular.css"/> 
        <link rel="stylesheet" href="assets/css/solid.css"/> 
        <link rel="stylesheet" href="assets/css/svg-with-js.css"/>
        <link rel="shortcut icon" type="image/png" href="images/icon/favicon.png"/>
        <noscript>
            <link rel="stylesheet" href="assets/css/noscript.css"/>
        </noscript>         
    </head>     
    <body class="landing is-preload">
        <!-- Page Wrapper -->
        <div id="page-wrapper">
            <!-- Header -->
            <header id="header" class="alt">
                <nav id="nav">
                    <ul>
                        <li class="special">
                            <a href="../index.html"><span>Home</span></a>
                        </li>
                    </ul>
                </nav>
            </header>
            <!-- Banner -->
            <section id="banner">
                <div class="inner">
                    <br/>
                    <h2>Change Password</h2>
                    <div class="login-wrap">
                        <form method="post">
                            <!-- Username -->
                            <div class="form-group">
                                <div class="input-group">
                                    <p style="font-size:15px">Enter Your New Password.</p>
                                    <div class="input-group-addon">
                                        <i class="fa fa-asterisk"></i> New Password
                                    </div>
                                    <input style="text-align:center;" type="password" name="password" placeholder="New Password" class="form-control" value="">
                                </div>
                                <span class="help-block" style="color:red;"></span>
                            </div>
                            <!--  -->
                            <br/>
                            <!-- Button -->
                            <ul class="actions special">
                                <li>
                                    <button class="button primary" type="submit" name="Submit">Update Password</button>
                                </li>
                            </ul>
                            <!--  -->
                        </form>
                    </div>
                </div>
            </section>
            <!-- Footer -->             
            <footer id="footer">
                <ul class="copyright">
                    <li>Copyright &copy; Informatics College. All rights reserved.</li>
                    <li>Design & Template: 
                        <a href="https://zelkeyzz.github.io/WebTest">ZKArts</a>
                    </li>
                </ul>
            </footer>
        </div>         
        <!-- Scripts -->         
        <script src="assets/js/jquery.min.js"></script>         
        <script src="assets/js/jquery.scrollex.min.js"></script>         
        <script src="assets/js/jquery.scrolly.min.js"></script>         
        <script src="assets/js/browser.min.js"></script>         
        <script src="assets/js/breakpoints.min.js"></script>         
        <script src="assets/js/util.js"></script>         
        <script src="assets/js/main.js"></script>         
        <script src="assets/js/all.js"></script>         
        <script src="assets/js/brands.js"></script>         
        <script src="assets/js/fontawesome.js"></script>         
        <script src="assets/js/regular.js"></script>         
        <script src="assets/js/solid.js"></script>         
        <script src="assets/js/v4-shims.js"></script>         
    </body>     
</html>