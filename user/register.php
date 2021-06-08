<?php
	session_start();
	include "../inc/user/reg-inc.php";

	if($_SESSION['userrank'] == "SUPERADMIN" || $_SESSION['userrank'] == "ADMIN"){
	} 	else if($_SESSION['userrank'] !== "SUPERADMIN" || $_SESSION['userrank'] !== "ADMIN") {
			header("location: ../user/login");
			exit;
		}
?>
 
<!DOCTYPE HTML> 
<html> 
    <head> 
        <title>ICCES | Create Account</title>         
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
    </head>     
    <body class="landing is-preload">
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
            <!-- Banner -->
            <section id="banner" style="height:100%;">
                <div class="inner">
                    <br/>
                    <h2><img src="../images/create.png" style="width:100%; height:auto;"></h2>
                    <div class="login-wrap">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <!-- New Password -->
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-id-card-alt"></i> ID Number
                                    </div>
                                    <input style="text-align:center;  font-size:small;" type="text" name="username" placeholder="ID Number" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                                </div>
                                <span class="help-block" style="color:red;"><?php echo $username_err; ?></span>
                            </div>
                            <!--  -->
                            <br/>
							<!-- EMAIL -->
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">
                                        <i class="fas fa-envelope"></i> Email Address
                                    </div>
									<input style="text-align:center; font-size:small;" type="email" name="email" placeholder="Email Address" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
								</div>
								<span class="help-block" style="color:red;"><?php echo $email_err; ?></span>
							</div>
							<!--  -->
                            <br/>
							<!-- Password -->
							<div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-asterisk"></i> Password <i class="fas fa-eye" onclick="showpwd()"></i>
                                    </div>
                                    <input style="text-align:center; font-size:small;" type="password" id="password" name="password" placeholder="Password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                                </div>
                                <span class="help-block" style="color:red;"><?php echo $password_err; ?></span>
                            </div>
							<!--  -->
							<br/>
							<!-- Confirm Password -->
							<div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-asterisk"></i> Repeat Password <i class="fas fa-eye" onclick="showrepwd()"></i>
                                    </div>
                                    <input style="text-align:center; font-size:small;" type="password" id="repeat" name="confirm_password" placeholder="Repeat Password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                                </div>
                                <span class="help-block" style="color:red;"><?php echo $confirm_password_err; ?></span>
                            </div>
							<!--  -->
							<br/>
							<!-- Full Name -->
							<div class="row">
								<!-- FNAME -->
								<div class="col-4 form-group">
								<div class="input-group">
									<div class="input-group-addon">
                                        <i class="fa fa-address-card"></i> Firstname
                                    </div>
									<input style="text-align:center; font-size:small;" type="text" name="firstname" placeholder="Firstname" class="form-control <?php echo (!empty($firstname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $firstname; ?>">
								</div>
								<span class="help-block" style="color:red;"><?php echo $firstname_err; ?></span>
								</div>
								<!-- LNAME -->
								<div class="col-4 form-group">
								<div class="input-group">
									<div class="input-group-addon">
                                        <i class="fa fa-address-card"></i> Middle Initial
                                    </div>
									<input style="text-align:center; font-size:small;" type="text" name="initials" placeholder="Middle Initial" class="form-control <?php echo (!empty($initials_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $initials; ?>">
								</div>
								<span class="help-block" style="color:red;"><?php echo $initials_err; ?></span>
								</div>
								<div class="col-4 form-group">
								<div class="input-group">
									<div class="input-group-addon">
                                        <i class="fa fa-address-card"></i> Lastname
                                    </div>
									<input style="text-align:center; font-size:small;" type="text" name="lastname" placeholder="Lastname" class="form-control <?php echo (!empty($lastname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $lastname; ?>">
								</div>
								<span class="help-block" style="color:red;"><?php echo $lastname_err; ?></span>
								</div>
							</div>
							<!--  -->
                            <br/>
							<!-- PREFIX -->
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">
                                        <i class="fas fa-user"></i> Prefix
                                    </div>
									<select style="text-align:center; font-size:small; background-color:grey;" name="prefix" class="form-control <?php echo (!empty($prefix_err)) ? 'is-invalid' : ''; ?>">
										<option value="">SELECTION</option>
										<option value="Mr.">Mr.</option>
										<option value="Ms.">Ms.</option>
										<option value="Mrs.">Mrs.</option>
									</select>
								</div>
								<span class="help-block" style="color:red;"><?php echo $prefix_err; ?></span>
							</div>
							<!--  -->
                            <br/>
							<!-- User Rank -->
							<div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fas fa-users"></i> Access Level
                                    </div>
                                    <select style="text-align:center; font-size:small; background-color:grey;" name="userrank" class="form-control <?php echo (!empty($userrank_err)) ? 'is-invalid' : ''; ?>">
									<option value="">SELECTION</option>
									<option value="ADMIN">Registrar</option>
									<option value="SCHOOLADMIN">School Administrator</option>
									<option value="SERVICES">Services</option>
									<option value="CASHIER">Cashier</option>
									<option value="STUDENTAFFAIR">Student Affair</option>
									<option value="GUIDANCE">Guidance</option>
									<option value="CLINIC">Clinic</option>
									<option value="LIBRARIAN">Librarian</option>
									<option value="INSTRUCTOR">Instructor</option>
									<option value="STUDENT">Student</option>
								</select>
                                </div>
                                <span class="help-block" style="color:red;"><?php echo $userrank_err; ?></span>
                            </div>
							<!--  -->
							<br/>
                            <!-- Button -->
                            <ul class="actions special">
                                <li>
                                    <button type="submit" class="button primary" name="Submit"><i class="fa fa-check"></i> Register </button>
									<button type="reset" class="button" name="Reset"><i class="fa fa-eraser"></i> Clear</button>
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
		<script type="text/javascript">
			function showrepwd() {
			var x = document.getElementById("repeat");
				if (x.type === "password") {
					x.type = "text";
				} else {
					x.type = "password";
				}
			}
		</script>
    </body>     
</html>