<?php
	session_start();
	include"../inc/clearance/cview-inc.php";
	
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
        <title>ICCES | View Student Clearance</title>         
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
							<a href="../clearance/list"><span>Return</span></a>
						</li>
					</ul>
                </nav>
            </header>
            <!-- Banner -->
            <section id="banner" style="height:100%;">
                <div class="inner">
                    <br/>
                    <h2>View Student Clearance</h2>
                    <div class="login-wrap">
<!------------------------------------------------------------------------------------->
                        <form method="post">
                            <!-- Student ID -->
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i> Student ID
                                    </div>
                                    <input style="text-align:center; font-size:small;" type="text" value="<?php echo $row["studentid"]; ?>" disabled readonly>
                                </div>
                            </div>
                            <!--  -->
                            <br/>
<!------------------------------------------------------------------------------------->
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-address-card"></i> Full Name
									</div>
									<input style="text-align:center; font-size:small;" type="text" value="<?php echo $row["studentname"]; ?>" disabled readonly>
								</div>
							</div>
                            <!--  -->
                            <br/>
<!------------------------------------------------------------------------------------->
							<div class="row">
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fab fa-leanpub"></i> Course
										</div>
										<input style="text-align:center; font-size:small;" type="text" value="<?php echo $row['course_type']; ?>" disabled readonly>
									</div>
								</div>
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-user-graduate"></i> Year Level
										</div>
										<input style="text-align:center; font-size:small;" type="text" value="<?php echo $row['yearlevel']; ?>" disabled readonly>
									</div>
								</div>
							</div>
                            <!--  -->
                            <br/>
<!------------------------------------------------------------------------------------->
							<!-- Library/Services -->
							<div class="row">
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-user-tie"></i> Library
										</div>
										<?php if($row["library_status"] == "Not Cleared"){ ?>
											<input type="text" style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" value="<?php echo $row["library_status"]; ?>" disabled readonly>
										<?php } else if ($row["library_status"] == "Cleared"){ ?>
											<input type="text" style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" value="<?php echo $row["library_status"]; ?>" disabled readonly>
										<?php } ?>
									</div>
								</div>
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-user-cog"></i> Services
										</div>
										<?php if($row["services_status"] == "Not Cleared"){ ?>
											<input type="text" style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" value="<?php echo $row["services_status"]; ?>" disabled readonly>
										<?php } else if ($row["services_status"] == "Cleared"){ ?>
											<input type="text" style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" value="<?php echo $row["services_status"]; ?>" disabled readonly>
										<?php } ?>
									</div>
								</div>
							</div>
							<!--  -->
                            <br/>
<!------------------------------------------------------------------------------------->
							<!-- Guidance/Cashier -->
							<div class="row">
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-user-shield"></i> Guidance
										</div>
										<?php if($row["guidance_status"] == "Not Cleared"){ ?>
											<input type="text" style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" value="<?php echo $row["guidance_status"]; ?>" disabled readonly>
										<?php } else if ($row["guidance_status"] == "Cleared"){ ?>
											<input type="text" style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" value="<?php echo $row["guidance_status"]; ?>" disabled readonly>
										<?php } ?>
									</div>
								</div>
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-user-edit"></i> Cashier
										</div>
										<?php if($row["cashier_status"] == "Not Cleared"){ ?>
											<input type="text" style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" value="<?php echo $row["cashier_status"]; ?>" disabled readonly>
										<?php } else if ($row["cashier_status"] == "Cleared"){ ?>
											<input type="text" style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" value="<?php echo $row["cashier_status"]; ?>" disabled readonly>
										<?php } ?>
									</div>
								</div>
							</div>
							<!--  -->
                            <br/>
<!------------------------------------------------------------------------------------->
							<!-- Student Affair/Registrar -->
							<div class="row">
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-user-tie"></i> Student Affair
										</div>
										<?php if($row["studentaffair_status"] == "Not Cleared"){ ?>
											<input type="text" style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" value="<?php echo $row["studentaffair_status"]; ?>" disabled readonly>
										<?php } else if ($row["studentaffair_status"] == "Cleared"){ ?>
											<input type="text" style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" value="<?php echo $row["studentaffair_status"]; ?>" disabled readonly>
										<?php } ?>
									</div>
								</div>
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-user-plus"></i> Registrar
										</div>
										<?php if($row["registrar_status"] == "Not Cleared"){ ?>
											<input type="text" style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" value="<?php echo $row["registrar_status"]; ?>" disabled readonly>
										<?php } else if ($row["registrar_status"] == "Cleared"){ ?>
											<input type="text" style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" value="<?php echo $row["registrar_status"]; ?>" disabled readonly>
										<?php } ?>
									</div>
								</div>
							</div>
							<!--  -->
                            <br/>
<!------------------------------------------------------------------------------------->
							<!-- Clinic/School Admin -->
							<div class="row">
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-user-nurse"></i> Clinic
										</div>
										<?php if($row["clinic_status"] == "Not Cleared"){ ?>
											<input type="text" style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" value="<?php echo $row["clinic_status"]; ?>" disabled readonly>
										<?php } else if ($row["clinic_status"] == "Cleared"){ ?>
											<input type="text" style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" value="<?php echo $row["clinic_status"]; ?>" disabled readonly>
										<?php } ?>
									</div>
								</div>
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-user-lock"></i> School Admin
										</div>
										<?php if($row["schooladmin_status"] == "Not Cleared"){ ?>
											<input type="text" style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" value="<?php echo $row["schooladmin_status"]; ?>" disabled readonly>
										<?php } else if ($row["schooladmin_status"] == "Cleared"){ ?>
											<input type="text" style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" value="<?php echo $row["schooladmin_status"]; ?>" disabled readonly>
										<?php } ?>
									</div>
								</div>
							</div>
							<!--  -->
                            <br/>
<!------------------------------------------------------------------------------------->
							<!-- Instructor1/2 -->
							<div class="row">
							<!-- Instructor 1 -->
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-user-tie"></i> Instructor
										</div>
										<input style="text-align:center; font-size:x-small;" type="text" placeholder="Instructor Name"value="<?php echo $row["instructor1_name"]; ?>" disabled readonly>
										<input style="text-align:center; font-size:x-small;" type="text" placeholder="Subject Code" value="<?php echo $row["instructor1_subject"]; ?>" disabled readonly>
										<?php if($row["instructor1_status"] == "Not Cleared"){ ?>
											<input type="text" style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" value="<?php echo $row["instructor1_status"]; ?>" disabled readonly>
										<?php } else if ($row["instructor1_status"] == "Cleared"){ ?>
											<input type="text" style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" value="<?php echo $row["instructor1_status"]; ?>" disabled readonly>
										<?php } ?>
									</div>
								</div>
								<!-- Instructor 2 -->
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-user-tie"></i> Instructor
										</div>
										<input style="text-align:center; font-size:x-small;" type="text" placeholder="Instructor Name" value="<?php echo $row["instructor2_name"]; ?>" disabled readonly>
										<input style="text-align:center; font-size:x-small;" type="text" placeholder="Subject Code" value="<?php echo $row["instructor2_subject"]; ?>" disabled readonly>
										<?php if($row["instructor2_status"] == "Not Cleared"){ ?>
											<input type="text" style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" value="<?php echo $row["instructor2_status"]; ?>" disabled readonly>
										<?php } else if ($row["instructor2_status"] == "Cleared"){ ?>
											<input type="text" style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" value="<?php echo $row["instructor2_status"]; ?>" disabled readonly>
										<?php } else if ($row['instructor2_status'] == "None"){ ?>
											<input type="text" style="text-align:center; color:#white; background-color:black; font-size:small;" value="<?php echo $row["instructor2_status"]; ?>" disabled readonly>
										<?php } ?>
									</div>
								</div>
							</div>
							<!--  -->
                            <br/>
<!------------------------------------------------------------------------------------->							
							<!-- Instructor 3/4 -->
							<div class="row">
							<!-- Instructor 3 -->
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-user-tie"></i> Instructor
										</div>
										<input style="text-align:center; font-size:x-small;" type="text" placeholder="Instructor Name "value="<?php echo $row["instructor3_name"]; ?>" disabled readonly>
										<input style="text-align:center; font-size:x-small;" type="text" placeholder="Subject Code" value="<?php echo $row["instructor3_subject"]; ?>" disabled readonly>
										<?php if($row["instructor3_status"] == "Not Cleared"){ ?>
											<input type="text" style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" value="<?php echo $row["instructor3_status"]; ?>" disabled readonly>
										<?php } else if ($row["instructor3_status"] == "Cleared"){ ?>
											<input type="text" style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" value="<?php echo $row["instructor3_status"]; ?>" disabled readonly>
										<?php } else if ($row['instructor3_status'] == "None"){ ?>
											<input type="text" style="text-align:center; color:#white; background-color:black; font-size:small;" value="<?php echo $row["instructor3_status"]; ?>" disabled readonly>
										<?php } ?>
									</div>
								</div>
								<!-- Instructor 4 -->
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-user-tie"></i> Instructor
										</div>
										<input style="text-align:center; font-size:x-small;" type="text" placeholder="Instructor Name" value="<?php echo $row["instructor4_name"]; ?>" disabled readonly>
										<input style="text-align:center; font-size:x-small;" type="text" placeholder="Subject Code" value="<?php echo $row["instructor4_subject"]; ?>" disabled readonly>
										<?php if($row["instructor4_status"] == "Not Cleared"){ ?>
											<input type="text" style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" value="<?php echo $row["instructor4_status"]; ?>" disabled readonly>
										<?php } else if ($row["instructor4_status"] == "Cleared"){ ?>
											<input type="text" style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" value="<?php echo $row["instructor4_status"]; ?>" disabled readonly>
										<?php } else if ($row['instructor4_status'] == "None"){ ?>
											<input type="text" style="text-align:center; color:#white; background-color:black; font-size:small;" value="<?php echo $row["instructor4_status"]; ?>" disabled readonly>
										<?php } ?>
									</div>
								</div>
							</div>
							<!--  -->
                            <br/>							
<!------------------------------------------------------------------------------------->
							<!-- Instructor 5/6 -->
							<div class="row">
							<!-- Instructor 5 -->
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-user-tie"></i> Instructor
										</div>
										<input style="text-align:center; font-size:x-small;" type="text" placeholder="Instructor Name "value="<?php echo $row["instructor5_name"]; ?>" disabled readonly>
										<input style="text-align:center; font-size:x-small;" type="text" placeholder="Subject Code" value="<?php echo $row["instructor5_subject"]; ?>" disabled readonly>
										<?php if($row["instructor5_status"] == "Not Cleared"){ ?>
											<input type="text" style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" value="<?php echo $row["instructor5_status"]; ?>" disabled readonly>
										<?php } else if ($row["instructor5_status"] == "Cleared"){ ?>
											<input type="text" style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" value="<?php echo $row["instructor5_status"]; ?>" disabled readonly>
										<?php } else if ($row['instructor5_status'] == "None"){ ?>
											<input type="text" style="text-align:center; color:#white; background-color:black; font-size:small;" value="<?php echo $row["instructor5_status"]; ?>" disabled readonly>
										<?php } ?>
									</div>
								</div>
								<!-- Instructor 6 -->
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-user-tie"></i> Instructor
										</div>
										<input style="text-align:center; font-size:x-small;" type="text" placeholder="Instructor Name" value="<?php echo $row["instructor6_name"]; ?>" disabled readonly>
										<input style="text-align:center; font-size:x-small;" type="text" placeholder="Subject Code" value="<?php echo $row["instructor6_subject"]; ?>" disabled readonly>
										<?php if($row["instructor6_status"] == "Not Cleared"){ ?>
											<input type="text" style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" value="<?php echo $row["instructor6_status"]; ?>" disabled readonly>
										<?php } else if ($row["instructor6_status"] == "Cleared"){ ?>
											<input type="text" style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" value="<?php echo $row["instructor6_status"]; ?>" disabled readonly>
										<?php } else if ($row['instructor6_status'] == "None"){ ?>
											<input type="text" style="text-align:center; color:#white; background-color:black; font-size:small;" value="<?php echo $row["instructor6_status"]; ?>" disabled readonly>
										<?php } ?>
									</div>
								</div>
							</div>
                            <!--  -->
							<br/>
<!------------------------------------------------------------------------------------->
							<!-- Instructor 7/8 -->
							<div class="row">
							<!-- Instructor 7 -->
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-user-tie"></i> Instructor
										</div>
										<input style="text-align:center; font-size:x-small;" type="text" placeholder="Instructor Name "value="<?php echo $row["instructor7_name"]; ?>" disabled readonly>
										<input style="text-align:center; font-size:x-small;" type="text" placeholder="Subject Code" value="<?php echo $row["instructor7_subject"]; ?>" disabled readonly>
										<?php if($row["instructor7_status"] == "Not Cleared"){ ?>
											<input type="text" style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" value="<?php echo $row["instructor7_status"]; ?>" disabled readonly>
										<?php } else if ($row["instructor7_status"] == "Cleared"){ ?>
											<input type="text" style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" value="<?php echo $row["instructor7_status"]; ?>" disabled readonly>
										<?php } else if ($row['instructor7_status'] == "None"){ ?>
											<input type="text" style="text-align:center; color:#white; background-color:black; font-size:small;" value="<?php echo $row["instructor7_status"]; ?>" disabled readonly>
										<?php } ?>
									</div>
								</div>
								<!-- Instructor 6 -->
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-user-tie"></i> Instructor
										</div>
										<input style="text-align:center; font-size:x-small;" type="text" placeholder="Instructor Name" value="<?php echo $row["instructor8_name"]; ?>" disabled readonly>
										<input style="text-align:center; font-size:x-small;" type="text" placeholder="Subject Code" value="<?php echo $row["instructor8_subject"]; ?>" disabled readonly>
										<?php if($row["instructor8_status"] == "Not Cleared"){ ?>
											<input type="text" style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" value="<?php echo $row["instructor8_status"]; ?>" disabled readonly>
										<?php } else if ($row["instructor8_status"] == "Cleared"){ ?>
											<input type="text" style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" value="<?php echo $row["instructor8_status"]; ?>" disabled readonly>
										<?php } else if ($row['instructor8_status'] == "None"){ ?>
											<input type="text" style="text-align:center; color:#white; background-color:black; font-size:small;" value="<?php echo $row["instructor8_status"]; ?>" disabled readonly>
										<?php } ?>
									</div>
								</div>
							</div>
                            <!--  -->
							<br/>
<!------------------------------------------------------------------------------------->
							<!-- Clearance Status -->
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fas fa-tasks"></i> Clearance Status
                                    </div>
                                    <?php if($row["clearance_status"] == "Incomplete"){ ?>
										<input type="text" style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" value="<?php echo $row["clearance_status"]; ?>" disabled readonly>
									<?php } else if ($row["clearance_status"] == "Completed"){ ?>
										<input type="text" style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" value="<?php echo $row["clearance_status"]; ?>" disabled readonly>
									<?php } ?>
                                </div>
                            </div>
							<br/>
<!------------------------------------------------------------------------------------->
							<p>
							<?php
								echo "Last Edited by ".$row["editorname"]." - ".$row['editorrank']."";
								echo '<br/>';
								echo "on ".$row['datesigned']."";
							?>
							</p>
							<!--  -->
							<br/>
<!------------------------------------------------------------------------------------->
                        </form>
                    </div>
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