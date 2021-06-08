<?php 
	session_start();
	include "../inc/func.php";
	include "../inc/info/req-edit-inc.php";
 
	// Check if the user is logged in, if not then redirect him to login page
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["status"] !== "Active"){
		header("location: ../user/logout.php");
		exit;
	}
	
	if($_SESSION['userrank'] == "SUPERADMIN" || $_SESSION['userrank'] == "ADMIN"){
	} 	else if($_SESSION['userrank'] !== "SUPERADMIN" || $_SESSION['userrank'] !== "ADMIN") {
			header("location: ../info/list");
			exit;
		}
?>

<!DOCTYPE HTML>
<html>
	<head>
	<title>ICCES | Update Student Information</title>
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
							<a href="../info/list"><span>Return</span></a>
						</li>
					</ul>
                </nav>
            </header>
            <!-- Banner -->
            <section id="banner" style="height:100%;">
                <div class="inner" ng-app="">
                    <br/>
					<h2>Student Information #<?=$clearance['studentinfoid']?></h2>
					<div class="login-wrap" ng-app="">
						<?php if ($msg): ?>
						<p><?=$msg?></p>
						<?php endif; ?>
<!------------------------------------------------------------------------------------->
						<form action="req-edit.php?studentinfoid=<?=$clearance['studentinfoid']?>" method="post" novalidate ng-app="">
							<!-- Student ID -->
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-user"></i> Student ID
									</div>
									<?php 
									$stmt = $pdo->query("SELECT studentid FROM table_student_info WHERE id = '".$clearance['studentinfoid']."'");
									$result = $stmt->fetch(PDO::FETCH_ASSOC); 
									?>
									<input style="text-align:center; font-size:small; background-color:black;" type="text" value="<?=$result['studentid']?>" disabled readonly>
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
									<?php 
									$stmt = $pdo->query("SELECT CONCAT(lastname,', ', firstname,' ',initials) as fullname FROM table_student_info WHERE id = '".$clearance['studentinfoid']."'");
									$result = $stmt->fetch(PDO::FETCH_ASSOC); 
									?>
									<input style="text-align:center; font-size:small; background-color:black;" type="text" value="<?=$result['fullname']?>" disabled readonly>
								</div>
							</div>
							<!--  -->
                            <br/>
<!------------------------------------------------------------------------------------->
							<div class="input-group-addon">
                                <i class="fas fa-graduation-cap"></i> Student Curriculum
                            </div>
							<div class="row">
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fab fa-leanpub"></i> Course
										</div>
										<?php 
										$stmt = $pdo->query("SELECT table_courses.course_type FROM table_courses LEFT JOIN table_student_info ON table_student_info.courseid = table_courses.id WHERE table_student_info.id = '".$clearance['studentinfoid']."'");
										$result = $stmt->fetch(PDO::FETCH_ASSOC); 
										?>
										<input style="text-align:center; font-size:small; background-color:black;" type="text" value="<?=$result['course_type']?>" disabled readonly />
									</div>
								</div>
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-user-graduate"></i> Year Level
										</div>
										<?php 
										$stmt = $pdo->query("SELECT table_yearlevel.yearlevel FROM table_yearlevel LEFT JOIN table_student_info ON table_student_info.yearid = table_yearlevel.id WHERE table_student_info.id = '".$clearance['studentinfoid']."'");
										$result = $stmt->fetch(PDO::FETCH_ASSOC); 
										?>
										<input style="text-align:center; font-size:small; background-color:black;" type="text" value="<?=$result['yearlevel']?>" disabled readonly />
									</div>
								</div>
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-list-ol"></i> Course Semester
										</div>
										<?php 
										$stmt = $pdo->query("SELECT table_semester.semesters FROM table_semester LEFT JOIN table_student_info ON table_student_info.semesterid = table_semester.id WHERE table_student_info.id = '".$clearance['studentinfoid']."'");
										$result = $stmt->fetch(PDO::FETCH_ASSOC); 
										?>
										<input style="text-align:center; font-size:small; background-color:black;" type="text" value="<?=$result['semesters']?>" disabled readonly />
									</div>
								</div>
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-calendar-alt"></i> School Year
										</div>
										<?php 
										$stmt = $pdo->query("SELECT schoolyear FROM table_student_info WHERE table_student_info.id = '".$clearance['studentinfoid']."'");
										$result = $stmt->fetch(PDO::FETCH_ASSOC); 
										?>
										<input style="text-align:center; font-size:small; background-color:black;" type="text" value="<?=$result['schoolyear']?>" disabled readonly />
									</div>
								</div>
							</div>
<!------------------------------------------------------------------------------------->
							<div class="row">
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-id-card-alt"></i> Student Type
										</div>
										<?php 
										$stmt = $pdo->query("SELECT studenttype FROM table_student_info WHERE table_student_info.id = '".$clearance['studentinfoid']."'");
										$result = $stmt->fetch(PDO::FETCH_ASSOC); 
										?>
										<input style="text-align:center; font-size:small; background-color:black;" type="text" value="<?=$result['studenttype']?>" disabled readonly />
									</div>
								</div>
								<!-- SUBJECTS -->
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-id-card-alt"></i> Curriculum Type
										</div>
										<?php 
										$stmt = $pdo->query("SELECT curriculumtype FROM table_student_info WHERE table_student_info.id = '".$clearance['studentinfoid']."'");
										$result = $stmt->fetch(PDO::FETCH_ASSOC); 
										?>
										<input style="text-align:center; font-size:small; background-color:black;" type="text" value="<?=$result['curriculumtype']?>" disabled readonly />
									</div>
								</div>
							</div>
							<!--  -->
							<br/>
<!------------------------------------------------------------------------------------->
							<!-- Test -->
							<div class="input-group-addon">
								<i class="fas fa-file-contract"></i> Student Requisites
							</div>
							<div class="row">
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-smile"></i> Good Moral
										</div>
										<select style="text-align:center; font-size:small; background-color:grey;" name="goodmoral" class="form-control">
                                            <option value="Pending" <?php echo ($clearance['goodmoral'] == 'Pending') ? 'Selected' : '' ; ?>><?php echo ($clearance['goodmoral'] == 'Pending') ? 'Selected: Pending' : 'Pending' ; ?></option>
											<option value="Submitted" <?php echo ($clearance['goodmoral'] == 'Submitted') ? 'Selected' : '' ; ?>><?php echo ($clearance['goodmoral'] == 'Submitted') ? 'Selected: Submitted' : 'Submitted' ; ?></option>
                                            <option value="Not Submitted" <?php echo ($clearance['goodmoral'] == 'Not Submitted') ? 'Selected' : '' ; ?>><?php echo ($clearance['goodmoral'] == 'Not Submitted') ? 'Selected: Not Submitted' : 'Not Submitted' ; ?></option>
											<option value="To Follow" <?php echo ($clearance['goodmoral'] == 'To Follow') ? 'Selected' : '' ; ?>><?php echo ($clearance['goodmoral'] == 'To Follow') ? 'Selected: To Follow' : 'To Follow' ; ?></option>
										</select>
									</div>
								</div>
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="far fa-clipboard"></i> T.O.R
										</div>
										<select style="text-align:center; font-size:small; background-color:grey;" name="tor" class="form-control">
											<option value="Pending" <?php echo ($clearance['tor'] == 'Pending') ? 'Selected' : '' ; ?>><?php echo ($clearance['tor'] == 'Pending') ? 'Selected: Pending' : 'Pending' ; ?></option>
											<option value="Submitted" <?php echo ($clearance['tor'] == 'Submitted') ? 'Selected' : '' ; ?>><?php echo ($clearance['tor'] == 'Submitted') ? 'Selected: Submitted' : 'Submitted' ; ?></option>
                                            <option value="Not Submitted" <?php echo ($clearance['tor'] == 'Not Submitted') ? 'Selected' : '' ; ?>><?php echo ($clearance['tor'] == 'Not Submitted') ? 'Selected: Not Submitted' : 'Not Submitted' ; ?></option>
											<option value="To Follow" <?php echo ($clearance['tor'] == 'To Follow') ? 'Selected' : '' ; ?>><?php echo ($clearance['tor'] == 'To Follow') ? 'Selected: To Follow' : 'To Follow' ; ?></option>
										</select>
									</div>
								</div>
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-clipboard"></i> Form 137
										</div>
										<select style="text-align:center; font-size:small; background-color:grey;" name="form137" class="form-control">
											<option value="Pending" <?php echo ($clearance['form137'] == 'Pending') ? 'Selected' : '' ; ?>><?php echo ($clearance['form137'] == 'Pending') ? 'Selected: Pending' : 'Pending' ; ?></option>
											<option value="Submitted" <?php echo ($clearance['form137'] == 'Submitted') ? 'Selected' : '' ; ?>><?php echo ($clearance['form137'] == 'Submitted') ? 'Selected: Submitted' : 'Submitted' ; ?></option>
                                            <option value="Not Submitted" <?php echo ($clearance['form137'] == 'Not Submitted') ? 'Selected' : '' ; ?>><?php echo ($clearance['form137'] == 'Not Submitted') ? 'Selected: Not Submitted' : 'Not Submitted' ; ?></option>
											<option value="To Follow" <?php echo ($clearance['form137'] == 'To Follow') ? 'Selected' : '' ; ?>><?php echo ($clearance['form137'] == 'To Follow') ? 'Selected: To Follow' : 'To Follow' ; ?></option>
										</select>
									</div>
								</div>
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fab fa-wpforms"></i> Application Form
										</div>
										<select style="text-align:center; font-size:small; background-color:grey;" name="appform" class="form-control">
											<option value="Pending" <?php echo ($clearance['appform'] == 'Pending') ? 'Selected' : '' ; ?>><?php echo ($clearance['appform'] == 'Pending') ? 'Selected: Pending' : 'Pending' ; ?></option>
											<option value="Submitted" <?php echo ($clearance['appform'] == 'Submitted') ? 'Selected' : '' ; ?>><?php echo ($clearance['appform'] == 'Submitted') ? 'Selected: Submitted' : 'Submitted' ; ?></option>
                                            <option value="Not Submitted" <?php echo ($clearance['appform'] == 'Not Submitted') ? 'Selected' : '' ; ?>><?php echo ($clearance['appform'] == 'Not Submitted') ? 'Selected: Not Submitted' : 'Not Submitted' ; ?></option>
											<option value="To Follow" <?php echo ($clearance['appform'] == 'To Follow') ? 'Selected' : '' ; ?>><?php echo ($clearance['appform'] == 'To Follow') ? 'Selected: To Follow' : 'To Follow' ; ?></option>
										</select>
									</div>
								</div>
							</div>
							<br/>
<!------------------------------------------------------------------------------------->
							<ul class="actions special">
								<li>
									<button type="submit" class="button primary" value="submit" name="submit"><i class="fas fa-pencil-alt"></i> Update Info</button>
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
		<script src="../assets/js/curriscript.js"></script>
		<script src="../assets/js/calcpay.js"></script>
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