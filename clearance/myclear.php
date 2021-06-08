<?php
	session_start();
	include"../inc/clearance/myclear-inc.php";
	
	// Check if the user is logged in, if not then redirect him to login page
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
		header("location: login");
		exit;
	}
	
	if(($_SESSION['id'] !== $userid)){
		header("location: ../404/myclear404.php");
		exit;
	}
	
	if($_SESSION['userrank'] == "STUDENT"){
	} else if($_SESSION['userrank'] !== "STUDENT") {
			header("location: ../user/overview");
			exit;
	}
?>
<!DOCTYPE HTML> 
<html> 
    <head> 
        <title>ICCES | My Clearance</title>         
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
    <body>
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
            <h2>My Clearance</h2>
			<br/>
			<a href="/clearance/edit?studentinfoid=<?php echo $_SESSION['infoid'];?>" class="button"><span>Edit Clearance</span></a>
            <div class="login-wrap">
                <form method="post">
                    <!-- Student ID -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-user"></i> Student ID
                            </div>
                            <input style="text-align:center; font-size:small; background-color:#000000;" type="text" value="<?php echo $row["studentid"]; ?>" disabled readonly>
                        </div>
                        <span class="help-block" style="color:red;"></span>
                    </div>
                    <!--  -->
                    <br/>
					<!-- FULLNAME -->
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-address-card"></i> Full Name
							</div>
							<input style="text-align:center; font-size:small; background-color:#000000;" type="text" value="<?php echo $row["studentname"]; ?>" disabled readonly>
						</div>
					</div>
					<!--  -->
                    <br/>
					<!-- Course/Year -->
					<div class="row">
						<!-- Student Course -->
						<div class="col-6 form-group">
						<div class="input-group">
							<div class="input-group-addon">
                                <i class="fab fa-leanpub"></i> Course
                            </div>
							<input style="text-align:center; font-size:small; background-color:#000000;" type="text" value="<?php echo $row['course_type']; ?>" disabled readonly>
						</div>
						</div>
						<!-- Student Year Level -->
						<div class="col-6 form-group">
						<div class="input-group">
							<div class="input-group-addon">
                                <i class="fas fa-user-graduate"></i> Year Level
                            </div>
							<input style="text-align:center; font-size:small; background-color:#000000;" type="text" value="<?php echo $row['yearlevel']; ?>" disabled readonly>
						</div>
						</div>
					</div>
					<!--  -->
                    <br/>
					<!-- Library/Services -->
					<div class="row">
						<div class="col-6 form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fas fa-user-tie"></i> Library
								</div>
								<?php
								if($row["library_status"] == "Not Cleared"){
									print '<input type="text" style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" class="form-control" value="';echo $row["library_status"]; print'" disabled readonly>';
								} else if ($row["library_status"] == "Cleared"){
									Print '<input type="text" style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" class="form-control" value="';echo $row["library_status"]; print'" disabled readonly>';
								}
								?>
							</div>
						</div>
						<div class="col-6 form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fas fa-user-cog"></i> Services
								</div>
								<?php
								if($row["services_status"] == "Not Cleared"){
									Print '<input type="text" style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" class="form-control" value="';echo $row["services_status"]; print'" disabled readonly>';
								} else if ($row["services_status"] == "Cleared"){
									Print '<input type="text" style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" class="form-control" value="';echo $row["services_status"]; print'" disabled readonly>';
								}
								?>
							</div>
						</div>
					</div>
					<!--  -->
                    <br/>
					<!-- Guidance/Cashier -->
					<div class="row">
						<div class="col-6 form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fas fa-user-shield"></i> Guidance
								</div>
								<?php
								if($row["guidance_status"] == "Not Cleared"){
									Print '<input type="text" style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" class="form-control" value="';echo $row["guidance_status"]; print'" disabled readonly>';
								} else if ($row["guidance_status"] == "Cleared"){
									Print '<input type="text" style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" class="form-control" value="';echo $row["guidance_status"]; print'" disabled readonly>';
								}
								?>
							</div>
						</div>
						<div class="col-6 form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fas fa-user-edit"></i> Cashier
								</div>
								<?php
								if($row["cashier_status"] == "Not Cleared"){
									Print '<input type="text" style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" class="form-control" value="';echo $row["cashier_status"]; print'" disabled readonly>';
								} else if ($row["cashier_status"] == "Cleared"){
									Print '<input type="text" style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" class="form-control" value="';echo $row["cashier_status"]; print'" disabled readonly>';
								}
								?>
							</div>
						</div>
					</div>
					<!--  -->
                    <br/>
					<!-- Student Affair/Registrar -->
					<div class="row">
						<div class="col-6 form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fas fa-user-tie"></i> Student Affair
								</div>
								<?php
								if($row["studentaffair_status"] == "Not Cleared"){
									Print '<input type="text" style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" class="form-control" value="';echo $row["studentaffair_status"]; print'" disabled readonly>';
								} else if ($row["studentaffair_status"] == "Cleared"){
									Print '<input type="text" style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" class="form-control" value="';echo $row["studentaffair_status"]; print'" disabled readonly>';
								}
								?>
							</div>
						</div>
						<div class="col-6 form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fas fa-user-plus"></i> Registrar
								</div>
								<?php
								if($row["registrar_status"] == "Not Cleared"){
									Print '<input type="text" style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" class="form-control" value="';echo $row["registrar_status"]; print'" disabled readonly>';
								} else if ($row["registrar_status"] == "Cleared"){
									Print '<input type="text" style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" class="form-control" value="';echo $row["registrar_status"]; print'" disabled readonly>';
								}
								?>
							</div>
						</div>
					</div>
					<!--  -->
                    <br/>
					<!-- Clinic/School Admin -->
					<div class="row">
						<div class="col-6 form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fas fa-user-nurse"></i> Clinic
								</div>
								<?php
								if($row["clinic_status"] == "Not Cleared"){
									Print '<input type="text" style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" class="form-control" value="';echo $row["clinic_status"]; print'" disabled readonly>';
								} else if ($row["clinic_status"] == "Cleared"){
									Print '<input type="text" style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" class="form-control" value="';echo $row["clinic_status"]; print'" disabled readonly>';
								}
								?>
							</div>
						</div>
						<div class="col-6 form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fas fa-user-lock"></i> School Admin
								</div>
								<?php
								if($row["schooladmin_status"] == "Not Cleared"){
									Print '<input type="text" style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" class="form-control" value="';echo $row["schooladmin_status"]; print'" disabled readonly>';
								} else if ($row["schooladmin_status"] == "Cleared"){
									Print '<input type="text" style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" class="form-control" value="';echo $row["schooladmin_status"]; print'" disabled readonly>';
								}
								?>
							</div>
						</div>
					</div>
					<!--  -->
                    <br/>
					<!-- Instructor1/2 -->
					<div class="row">
					<!-- Instructor 1 -->
						<div class="col-6 form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fas fa-user-tie"></i> Instructor Name
								</div>
								<input style="text-align:center; font-size:x-small; background-color:#000000;" type="text" placeholder="Instructor Name "class="form-control" value="<?php echo $row["instructor1_name"]; ?>" disabled readonly>
								<input style="text-align:center; font-size:x-small; background-color:#000000;" type="text" placeholder="Subject Code" class="form-control" value="<?php echo $row["instructor1_subject"]; ?>" disabled readonly>
								<?php
								if($row["instructor1_status"] == "Not Cleared"){
									Print '<input type="text" style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" class="form-control" value="';echo $row["instructor1_status"]; print'" disabled readonly>';
								} else if ($row["instructor1_status"] == "Cleared"){
									Print '<input type="text" style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" class="form-control" value="';echo $row["instructor1_status"]; print'" disabled readonly>';
								} else if ($row['instructor1_status'] == "None"){
									print '<input type="text" style="text-align:center; color:#white; background-color:black; font-size:small;" class="form-control" value="';echo $row["instructor1_status"]; print'" disabled readonly>';
								}
								?>
							</div>
						</div>
						<!-- Instructor 2 -->
						<div class="col-6 form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fas fa-user-tie"></i> Instructor Name
								</div>
								<input style="text-align:center; font-size:x-small; background-color:#000000;" type="text" placeholder="Instructor Name" class="form-control" value="<?php echo $row["instructor2_name"]; ?>" disabled readonly>
								<input style="text-align:center; font-size:x-small; background-color:#000000;" type="text" placeholder="Subject Code" class="form-control" value="<?php echo $row["instructor2_subject"]; ?>" disabled readonly>
								<?php
								if($row["instructor2_status"] == "Not Cleared"){
									Print '<input type="text" style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" class="form-control" value="';echo $row["instructor2_status"]; print'" disabled readonly>';
								} else if ($row["instructor2_status"] == "Cleared"){
									Print '<input type="text" style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" class="form-control" value="';echo $row["instructor2_status"]; print'" disabled readonly>';
								} else if ($row['instructor2_status'] == "None"){
									print '<input type="text" style="text-align:center; color:#white; background-color:black; font-size:small;" class="form-control" value="';echo $row["instructor2_status"]; print'" disabled readonly>';
								}
								?>
							</div>
						</div>
					</div>
					<!--  -->
                    <br/>
					<!-- Instructor 3/4 -->
					<div class="row">
					<!-- Instructor 3 -->
						<div class="col-6 form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fas fa-user-tie"></i> Instructor Name
								</div>
								<input style="text-align:center; font-size:x-small; background-color:#000000;" type="text" placeholder="Instructor Name "class="form-control" value="<?php echo $row["instructor3_name"]; ?>" disabled readonly>
								<input style="text-align:center; font-size:x-small; background-color:#000000;" type="text" placeholder="Subject Code" class="form-control" value="<?php echo $row["instructor3_subject"]; ?>" disabled readonly>
								<?php
								if($row["instructor3_status"] == "Not Cleared"){
									Print '<input type="text" style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" class="form-control" value="';echo $row["instructor3_status"]; print'" disabled readonly>';
								} else if ($row["instructor3_status"] == "Cleared"){
									Print '<input type="text" style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" class="form-control" value="';echo $row["instructor3_status"]; print'" disabled readonly>';
								} else if ($row['instructor3_status'] == "None"){
									print '<input type="text" style="text-align:center; color:#white; background-color:black; font-size:small;" class="form-control" value="';echo $row["instructor3_status"]; print'" disabled readonly>';
								}
								?>
							</div>
						</div>
						<!-- Instructor 4 -->
						<div class="col-6 form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fas fa-user-tie"></i> Instructor Name
								</div>
								<input style="text-align:center; font-size:x-small; background-color:#000000;" type="text" placeholder="Instructor Name" class="form-control" value="<?php echo $row["instructor4_name"]; ?>" disabled readonly>
								<input style="text-align:center; font-size:x-small; background-color:#000000;" type="text" placeholder="Subject Code" class="form-control" value="<?php echo $row["instructor4_subject"]; ?>" disabled readonly>
								<?php
								if($row["instructor4_status"] == "Not Cleared"){
									Print '<input type="text" style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" class="form-control" value="';echo $row["instructor4_status"]; print'" disabled readonly>';
								} else if ($row["instructor4_status"] == "Cleared"){
									Print '<input type="text" style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" class="form-control" value="';echo $row["instructor4_status"]; print'" disabled readonly>';
								} else if ($row['instructor4_status'] == "None"){
									print '<input type="text" style="text-align:center; color:#white; background-color:black; font-size:small;" class="form-control" value="';echo $row["instructor4_status"]; print'" disabled readonly>';
								}
								?>
							</div>
						</div>
					</div>
					<!--  -->
                    <br/>
					<!-- Instructor 5/6 -->
					<div class="row">
					<!-- Instructor 5 -->
						<div class="col-6 form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fas fa-user-tie"></i> Instructor Name
								</div>
								<input style="text-align:center; font-size:x-small; background-color:#000000;" type="text" placeholder="Instructor Name "class="form-control" value="<?php echo $row["instructor5_name"]; ?>" disabled readonly>
								<input style="text-align:center; font-size:x-small; background-color:#000000;" type="text" placeholder="Subject Code" class="form-control" value="<?php echo $row["instructor5_subject"]; ?>" disabled readonly>
								<?php
								if($row["instructor5_status"] == "Not Cleared"){
									Print '<input type="text" style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" class="form-control" value="';echo $row["instructor5_status"]; print'" disabled readonly>';
								} else if ($row["instructor5_status"] == "Cleared"){
									Print '<input type="text" style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" class="form-control" value="';echo $row["instructor5_status"]; print'" disabled readonly>';
								} else if ($row['instructor5_status'] == "None"){
									print '<input type="text" style="text-align:center; color:#white; background-color:black; font-size:small;" class="form-control" value="';echo $row["instructor5_status"]; print'" disabled readonly>';
								}
								?>
							</div>
						</div>
						<!-- Instructor 6 -->
						<div class="col-6 form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fas fa-user-tie"></i> Instructor Name
								</div>
								<input style="text-align:center; font-size:x-small; background-color:#000000;" type="text" placeholder="Instructor Name" class="form-control" value="<?php echo $row["instructor6_name"]; ?>" disabled readonly>
								<input style="text-align:center; font-size:x-small; background-color:#000000;" type="text" placeholder="Subject Code" class="form-control" value="<?php echo $row["instructor6_subject"]; ?>" disabled readonly>
								<?php
								if($row["instructor6_status"] == "Not Cleared"){
									Print '<input type="text" style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" class="form-control" value="';echo $row["instructor6_status"]; print'" disabled readonly>';
								} else if ($row["instructor6_status"] == "Cleared"){
									Print '<input type="text" style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" class="form-control" value="';echo $row["instructor6_status"]; print'" disabled readonly>';
								} else if ($row['instructor6_status'] == "None"){
									print '<input type="text" style="text-align:center; color:#white; background-color:black; font-size:small;" class="form-control" value="';echo $row["instructor6_status"]; print'" disabled readonly>';
								}
								?>
							</div>
						</div>
					</div>
                    <!--  -->
					<br/>
					<!-- Instructor 7/8 -->
					<div class="row">
					<!-- Instructor 7 -->
						<div class="col-6 form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fas fa-user-tie"></i> Instructor Name
								</div>
								<input style="text-align:center; font-size:x-small; background-color:#000000;" type="text" placeholder="Instructor Name "class="form-control" value="<?php echo $row["instructor7_name"]; ?>" disabled readonly>
								<input style="text-align:center; font-size:x-small; background-color:#000000;" type="text" placeholder="Subject Code" class="form-control" value="<?php echo $row["instructor7_subject"]; ?>" disabled readonly>
								<?php
								if($row["instructor7_status"] == "Not Cleared"){
									Print '<input type="text" style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" class="form-control" value="';echo $row["instructor7_status"]; print'" disabled readonly>';
								} else if ($row["instructor7_status"] == "Cleared"){
									Print '<input type="text" style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" class="form-control" value="';echo $row["instructor7_status"]; print'" disabled readonly>';
								} else if ($row['instructor7_status'] == "None"){
									print '<input type="text" style="text-align:center; color:#white; background-color:black; font-size:small;" class="form-control" value="';echo $row["instructor7_status"]; print'" disabled readonly>';
								}
								?>
							</div>
						</div>
						<!-- Instructor 6 -->
						<div class="col-6 form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fas fa-user-tie"></i> Instructor Name
								</div>
								<input style="text-align:center; font-size:x-small; background-color:#000000;" type="text" placeholder="Instructor Name" class="form-control" value="<?php echo $row["instructor8_name"]; ?>" disabled readonly>
								<input style="text-align:center; font-size:x-small; background-color:#000000;" type="text" placeholder="Subject Code" class="form-control" value="<?php echo $row["instructor8_subject"]; ?>" disabled readonly>
								<?php
								if($row["instructor8_status"] == "Not Cleared"){
									Print '<input type="text" style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" class="form-control" value="';echo $row["instructor8_status"]; print'" disabled readonly>';
								} else if ($row["instructor8_status"] == "Cleared"){
									Print '<input type="text" style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" class="form-control" value="';echo $row["instructor8_status"]; print'" disabled readonly>';
								} else if ($row['instructor8_status'] == "None"){
									print '<input type="text" style="text-align:center; color:#white; background-color:black; font-size:small;" class="form-control" value="';echo $row["instructor8_status"]; print'" disabled readonly>';
								}
								?>
							</div>
						</div>
					</div>
                    <!--  -->
					<br/>
					<!-- Clearance Status -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fas fa-tasks"></i> Clearance Status
                            </div>
                            <?php
							if($row["clearance_status"] == "Incomplete"){
								print '<input type="text" style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" class="form-control" value="';echo $row["clearance_status"]; print'" disabled readonly>';
							} else if ($row["clearance_status"] == "Completed"){
								print '<input type="text" style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" class="form-control" value="';echo $row["clearance_status"]; print'" disabled readonly>';
							}
							?>
                        </div>
                    </div>
<!------------------------------------------------------------------------------------->
					<p>
					<?php
						echo "Last Edited by ".$row['editorname']." - ".$row['editorrank']."";
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