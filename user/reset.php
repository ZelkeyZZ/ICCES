<?php
	include "../inc/user/reset-inc.php";
?>
 
<!DOCTYPE HTML> 
<html> 
    <head> 
        <title>ICCES | Reset Password</title>         
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
    <body class="landing is-preload">
        <!-- Page Wrapper -->
        <div id="page-wrapper">
            <!-- Header -->
            <header id="header" class="alt">
                <nav id="nav">
                    <ul>
						<li class="special">
							<a href="#menu" class="menuToggle"><span>Menu</span></a>
							<div id="menu">
								<ul>
									<li><a href="../user/overview"><span>Overview</span></a></li>
									<li><a href="../user/logout"><span>Logout</span></a></li>
								</ul>
							</div>
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
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <!-- New Password -->
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-asterisk"></i> New Password
                                    </div>
                                    <input style="text-align:center;" type="password" name="new_password" placeholder="New Password" class="form-control <?php echo (!empty($new_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $new_password; ?>">
                                </div>
                                <span class="help-block" style="color:red;"><?php echo $new_password_err; ?></span>
                            </div>
                            <!--  -->
                            <br/>
							<!-- Confirm Password -->
							<div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-asterisk"></i> Confirm New Password
                                    </div>
                                    <input style="text-align:center;" type="password" name="confirm_password" placeholder="Confirm New Password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                                </div>
                                <span class="help-block" style="color:red;"><?php echo $confirm_password_err; ?></span>
                            </div>
							<!--  -->
							<br/>
                            <!-- Button -->
                            <ul class="actions special">
                                <li>
                                    <button class="button primary" type="submit" name="Submit">Update Password</button>
                                </li>
								<a href="../user/overview" class="button">Cancel</a>
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