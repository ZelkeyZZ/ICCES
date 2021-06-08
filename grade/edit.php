<?php 
	session_start();
	include "../inc/func.php";
	include "../inc/grade/gedit-inc.php";
 
	// Check if the user is logged in, if not then redirect him to login page
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["status"] !== "Active"){
		header("location: ../user/logout.php");
		exit;
	}
	
	if($_SESSION['userrank'] == "STUDENT"){
	} 	else if($_SESSION['userrank'] !== "STUDENT") {
			header("location: ../user/overview");
			exit;
		}

?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>ICCES | My Student Subject</title>
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
                    <h2>Update Student Grade</h2>
                    <div class="login-wrap" ng-app="">
						<?php if ($msg): ?>
						<p><?=$msg?></p>
						<?php endif; ?>
						<form action="edit.php?id=<?=$grade['id']?>" method="post">
<!------------------------------------------------------------------------------------->
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">
                                        <i class="fa fa-user"></i> Student ID
                                    </div>
									<input style="text-align:center; font-size:small; background-color:#000000; color:#ffffff;" type="text" value="<?=$grade['studentid']?>" disabled readonly>
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
									<input style="text-align:center; font-size:small; background-color:#000000; color:#ffffff;"type="text" value="<?=$grade['studentname']?>" disabled readonly>
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
										<input style="text-align:center; font-size:small; background-color:#000000; color:#ffffff;" type="text" value="<?=$grade['course_type']?>" disabled readonly>
									</div>
								</div>
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-user-graduate"></i> Year Level
										</div>
										<input style="text-align:center; font-size:small; background-color:#000000; color:#ffffff;" type="text" value="<?=$grade['yearlevel']?>" disabled readonly>
									</div>
								</div>
							</div>
							<!--  -->
							<br/>
<!------------------------------------------------------------------------------------->
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fas fa-user-tie"></i> Instructor
									</div>
									<?php 
									$stmt = $pdo->prepare("SELECT concat(table_employee_info.firstname, ' ', table_employee_info.initials, ' ', table_employee_info.lastname) AS NAME FROM table_employee_info LEFT JOIN table_users ON table_employee_info.userid = table_users.id WHERE table_users.userrank = 'INSTRUCTOR'");
									$stmt->execute();
									?>
									<select style="text-align:center; font-size:small; background-color:#50595f;" name="instructorname" class="form-control">
										<option value="<?=$grade['instructorname']?>">Selected : <?=$grade['instructorname']?></option>
									<?php foreach($stmt->fetchAll() as $instructors) { ?>
										<option value="<?php echo $instructors[0];?>"><?php echo $instructors[0];?></option>
									<?php } ?>
									</select>
								</div>
							</div>
<!------------------------------------------------------------------------------------->
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fas fa-book"></i> Subject
									</div>
									<input style="text-align:center; font-size:small; background-color:#000000; color:#ffffff;" type="text" value="<?=$grade['subjectsname']?>" disabled readonly>
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
										<input style="text-align:center; font-size:small; background-color:#000000; color:#ffffff;" type="text" name="prelim_score" value="<?=$grade['prelim_score']?>" readonly />
									</div>
								</div>
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="far fa-chart-bar"></i> Midterm Grade
										</div>
										<input style="text-align:center; font-size:small; background-color:#000000; color:#ffffff;" type="text" name="midterm_score" value="<?=$grade['midterm_score']?>" readonly />
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
										<input style="text-align:center; font-size:small; background-color:#000000; color:#ffffff;" type="text" name="finals_score" value="<?=$grade['finals_score']?>" readonly />
									</div>
								</div>
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="far fa-chart-bar"></i> Average Grade
										</div>
										<input style="text-align:center; font-size:small; background-color:#000000; color:#ffffff;" type="text" name="average_score" value="<?php echo $grade['average_score']; ?>" readonly />
									</div>
								</div>
							</div>
							<br/>
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">
										<i class="far fa-chart-bar"></i> Overall Grade
									</div>
									<input style="text-align:center; font-size:small; background-color:#000000; color:#ffffff;" type="text" name="overall_score" value="<?php echo $grade['overall_score']; ?>" readonly />
								</div>
							</div>
							<br/>
							<div class="col-6 form-group">
								<div class="input-group">
									<div class="input-group-addon">
										<i class="far fa-chart-bar"></i> Remarks
									</div>
									<?php if($grade['remarks'] == "Pending"){?>
									<input style="text-align:center; font-size:small; background-color:#000000; color:#ffffff;" type="text" name="remarks" value="<?php echo $grade['remarks']; ?>" readonly />
									<?php } elseif($grade['remarks'] == "Passed") { ?>
									<input style="text-align:center; font-size:small; color:#000000; background-color:#00ad45;" type="text" name="remarks" value="<?php echo $grade['remarks']; ?>" readonly />
									<?php } elseif($grade['remarks'] == "Failed") { ?>
									<input style="text-align:center; font-size:small; color:#000000; background-color:#ff6565;" type="text" name="remarks" value="<?php echo $grade['remarks']; ?>" readonly />
									<?php } ?>
								</div>
							</div>
							<br/>
<!------------------------------------------------------------------------------------->
							<ul class="actions special">
								<li>
									<button type="submit" class="button primary" value="submit" name="submit"><i class="fas fa-pencil-alt"></i> Update </button>
								</li>
							</ul>
							<br/>
                        </form>
                    </div>
                </div>
            </section>
        </div>         
        <!-- Scripts --> 
		<script src="../assets/js/jquery-3.6.0.min.js"></script>
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
		<script src="../assets/js/angular-route.js"></script>
		<script src="../assets/js/angular.js"></script>
		<script src="../assets/js/angular.min.js"></script>
		
    </body>     
</html