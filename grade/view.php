<?php
	session_start();
	include"../inc/grade/gview-inc.php";
	
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
		<title>ICCES | View Student Subject</title>
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
							<a href="../grade/list"><span>Return</span></a>
						</li>
					</ul>
                </nav>
            </header>
            <!-- Banner -->
            <section id="banner" style="height:100%;">
                <div class="inner">
                    <br/>
                    <h2>View Student Subject</h2>
                    <div class="login-wrap">
<!------------------------------------------------------------------------------------->
                        <form method="post">
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">
                                        <i class="fa fa-user"></i> Student ID
                                    </div>
									<input style="text-align:center; font-size:small;" type="text" value="<?php echo $row["studentid"]; ?>" disabled disabled>
								</div>
							</div>
							<!--  -->
							<br/>
<!------------------------------------------------------------------------------------->
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">
											<i class="fa fa-address-card"></i> Fullname
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
										<input style="text-align:center; font-size:small;" type="text" value="<?php echo $row["course_type"]; ?>" disabled readonly>
									</div>
								</div>
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-user-graduate"></i> Year Level
										</div>
										<input style="text-align:center; font-size:small;" type="text" value="<?php echo $row["yearlevel"]; ?>" disabled readonly>
									</div>
								</div>
							</div>
							<!--  -->
							<br/>
<!------------------------------------------------------------------------------------->
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">
											<i class="fas fa-book"></i> Subjects
									</div>
									<input style="text-align:center; font-size:small;" type="text" value="<?php echo $row["subject_code"]; ?>" disabled readonly>
								</div>
							</div>
							<!--  -->
							<br/>
<!------------------------------------------------------------------------------------->
							<div class="row">
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="far fa-chart-bar"></i> Prelim Grade
										</div>
										<input style="text-align:center; font-size:small;" type="text" value="<?=$row['prelim_score']?>" disabled readonly>
									</div>
								</div>
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="far fa-chart-bar"></i> Midterm Grade
										</div>
										<input style="text-align:center; font-size:small;" type="text" value="<?=$row['midterm_score']?>" disabled readonly>
									</div>
								</div>
							</div>
								<!--  -->
								<br/>
							<div class="row">	
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="far fa-chart-bar"></i> Finals Grade
										</div>
										<input style="text-align:center; font-size:small;" type="text" value="<?=$row['finals_score']?>" disabled readonly>
									</div>
								</div>
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="far fa-chart-bar"></i> Average Grade
										</div>
										<input style="text-align:center; font-size:small;" type="text" value="<?=$row['average_score']?>" disabled readonly>
									</div>
								</div>
							</div>
							<br/>
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">
										<i class="far fa-chart-bar"></i> Overall Grade
									</div>
									<input style="text-align:center; font-size:small;" type="text" value="<?=$row['overall_score']?>" disabled readonly>
								</div>
							</div>
							<br/>
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">
										<i class="far fa-chart-bar"></i> Remarks
									</div>
									<input style="text-align:center; font-size:small;" type="text" value="<?=$row['remarks']?>" disabled readonly>
								</div>
							</div>
							<!--  -->
							<br/>
<!------------------------------------------------------------------------------------->
							<p>
							<?php
								echo "Last Edited by ".$row['editorname']." - ".$row['editorrank']."";
								echo '<br/>';
								echo "on ".$row['datesigned']."";
							?>
							</p>
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
</html