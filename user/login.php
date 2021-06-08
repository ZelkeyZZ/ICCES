<?php
	include "../inc/user/log-inc.php";
?>

<!DOCTYPE HTML> 
<html> 
    <head> 
        <title>ICCES | Login</title>         
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
            <link rel="stylesheet" href="../assets/css/noscript.css"/>
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
                            <a href=".."><span>Home</span></a>
                        </li>
                    </ul>
                </nav>
            </header>
            <!-- Banner -->
            <section id="banner">
                <div class="inner">
                    <br/>
                    <h2><img src="../images/login-small.png" style="width:100%; height:auto;"></h2>
                    <div class="login-wrap">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <!-- Username -->
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i> ID Number
                                    </div>
                                    <input style="text-align:center;" type="text" name="username" placeholder="ID Number" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                                </div>
                                <span class="help-block" style="color:red;"><?php echo $username_err; ?></span>
                            </div>
                            <!--  -->
                            <br/>
                            <!-- Password -->
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-asterisk"></i> Password <i class="fas fa-eye" onclick="showpwd()"></i>
                                    </div>
                                    <input type="password" style="text-align:center;" name="password" id="password" placeholder="Password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                                </div>
                                <span class="help-block" style="color:red;"><?php echo $password_err; ?></span>
                            </div>
                            <!--  -->
							<br/>
							<!-- Button -->
							<ul class="actions special">
								<li>
									<button class="button primary" type="submit" value="Login"><i class="fa fa-check"></i>Login</button>
								</li>
							</ul>
							<!--  -->
							<a href="../recover">Forgot your password?</a>
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
		<!-- Internal -->
		<script type="text/javascript">
			function showpwd() {
			var x = document.getElementById("password");
				if (x.type === "password") {
					x.type = "text";
				} else {
					x.type = "password";
				}
			}
		</script>		
    </body>     
</html>