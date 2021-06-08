<?php 
	session_start();
	include "../inc/func.php";
	include "../inc/info/cor-edit-inc.php";
 
	// Check if the user is logged in, if not then redirect him to login page
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["status"] !== "Active"){
		header("location: ../user/logout.php");
		exit;
	}
	
	if($_SESSION['userrank'] == "SUPERADMIN" || $_SESSION['userrank'] == "CASHIER"){
	} 	else if($_SESSION['userrank'] !== "SUPERADMIN" || $_SESSION['userrank'] !== "CASHIER") {
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
						<form action="cor-edit.php?studentinfoid=<?=$clearance['studentinfoid']?>" method="post" novalidate ng-app="">
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
							<div class="input-group-addon">
								<i class="fas fa-certificate"></i> Certificate of Registration
							</div>
							<div class="row">
								<div class="col-6 form-group">
									<div class="input-group">
									<div class="input-group-addon">
										<i class="fas fa-scroll"></i> Scholarship
									</div>
									<select style="text-align:center; font-size:small; background-color:#3e4142;" id="st" name="scholartype" class="form-control">
										<option value="None Selected" <?php echo ($clearance['scholartype'] == 'None Selected') ? 'Selected' : '' ; ?>><?php echo ($clearance['scholartype'] == 'None Selected') ? 'Selected: None Selected' : 'None Selected' ; ?></option>
										<option value="No Scholarship" <?php echo ($clearance['scholartype'] == 'No Scholarship') ? 'Selected' : '' ; ?>><?php echo ($clearance['scholartype'] == 'No Scholarship') ? 'Selected: No Scholarship' : 'No Scholarship' ; ?></option>
										<option value="Half Scholarship" <?php echo ($clearance['scholartype'] == 'Half Scholarship') ? 'Selected' : '' ; ?>><?php echo ($clearance['scholartype'] == 'Half Scholarship') ? 'Selected: Half Scholarship' : 'Half Scholarship' ; ?></option>
                                        <option value="Full Scholarship" <?php echo ($clearance['scholartype'] == 'Full Scholarship') ? 'Selected' : '' ; ?>><?php echo ($clearance['scholartype'] == 'Full Scholarship') ? 'Selected: Full Scholarshipr' : 'Full Scholarship' ; ?></option>
									</select>
									</div>
								</div>
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-dollar-sign"></i> Payment Method
										</div>
										<select style="text-align:center; font-size:small; background-color:#3e4142;" id="ps" name="payment_type" class="form-control">
											<option value="None Selected" <?php echo ($clearance['payment_type'] == 'None Selected') ? 'Selected' : '' ; ?>><?php echo ($clearance['payment_type'] == 'None Selected') ? 'Selected: None Selected' : 'None Selected' ; ?></option>
											<option value="Full Payment" <?php echo ($clearance['payment_type'] == 'Full Payment') ? 'Selected' : '' ; ?>><?php echo ($clearance['payment_type'] == 'Full Payment') ? 'Selected: Full Payment' : 'Full Payment' ; ?></option>
                                            <option value="Installment" <?php echo ($clearance['payment_type'] == 'Installment') ? 'Selected' : '' ; ?>><?php echo ($clearance['payment_type'] == 'Installment') ? 'Selected: Installment' : 'Installment' ; ?></option>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group">
							  <div class="input-group">
							    <div class="input-group-addon">
							      <i class="fas fa-dollar-sign"></i> Tuition Fee
							    </div>
							  </div>
							</div>
							<div class="row">
							  <div class="col-6 form-group">
							    <div class="input-group">
							      <div class="input-group-addon">
							        <i class="fas fa-dollar-sign"></i> Misc Fee
							      </div>
							      <input style="text-align:center; font-size:small;" type="number" id="mfee" name="misc_fee" placeholder="Amount" value="<?php echo $clearance['misc_fee']?>" />
							    </div>
							  </div>
							  <div class="col-6 form-group">
							    <div class="input-group">
							      <div class="input-group-addon">
							        <i class="fas fa-dollar-sign"></i> Thesis Fee
							      </div>
							      <input style="text-align:center; font-size:small;" type="number" id="tfee" name="thesis_fee" placeholder="Amount" value="<?php echo $clearance['thesis_fee']?>" />
							    </div>
							  </div>
							  <div class="col-6 form-group">
							    <div class="input-group">
							      <div class="input-group-addon">
							        <i class="fas fa-dollar-sign"></i> NSTP Fee
							      </div>
							      <input style="text-align:center; font-size:small;" type="number" id="nfee" name="nstp_fee" placeholder="Amount" value="<?php echo $clearance['nstp_fee']?>" />
							    </div>
							  </div>
							  <div class="col-6 form-group">
							    <div class="input-group">
							      <div class="input-group-addon">
							        <i class="fas fa-dollar-sign"></i> Laboratory Fee
							      </div>
							      <input style="text-align:center; font-size:small;" type="number" id="lfee" name="lab_fee" placeholder="Amount" value="<?php echo $clearance['lab_fee']?>" />
							    </div>
							  </div>
							  <div class="col-6 form-group">
							    <div class="input-group">
							      <div class="input-group-addon">
							        <i class="fas fa-list-ol"></i> Total Units
							      </div>
							      <input style="text-align:center; font-size:small;" type="number" id="nbruhunit" name="total_units" placeholder="Number of Units" value="<?php echo $clearance['total_units']?>" />
							    </div>
							  </div>
							  <div class="col-6 form-group">
							    <div class="input-group">
							      <div class="input-group-addon">
							        <i class="fas fa-dollar-sign"></i> Total Tuition Fee
							      </div>
							      <input style="text-align:center; font-size:small;" type="number" id="ttfee" name="tuiton_fee" placeholder="Amount" value="<?php echo $clearance['tuiton_fee']?>" />
							    </div>
							  </div>
							</div>
							<div class="form-group">
							  <div class="input-group">
							    <div class="input-group-addon">
							      <i class="fas fa-dollar-sign"></i> Total Fee
							    </div>
							    <input style="text-align:center; font-size:small;" type="number" id="ttlfee" name="totaltuiton_fee" placeholder="Amount" value="<?php echo $clearance['totaltuiton_fee']?>" />
							  </div>
							</div>
							<div class="row">
							  <div class="col-6 form-group">
							    <div class="input-group">
							      <div class="input-group-addon">
							        <i class="fas fa-dollar-sign"></i> 15% Surcharge
							      </div>
							      <input style="text-align:center; font-size:small;" type="number" id="15sc" name="surcharge" placeholder="Amount" value="<?php echo $clearance['surcharge']?>" />
							    </div>
							  </div>
							  <div class="col-6 form-group">
							    <div class="input-group">
							      <div class="input-group-addon">
							        <i class="fas fa-dollar-sign"></i> Prelim
							      </div>
							      <input style="text-align:center; font-size:small;" type="date" name="prelim_date" placeholder="Due Date" value="<?php echo $clearance['prelim_date']; ?>">
							      <input style="text-align:center; font-size:small;" type="number" class="breakdown" name="prelim_installment" placeholder="Amount" value="<?php echo $clearance['prelim_installment']?>" />
							    </div>
							  </div>
							  <div class="col-6 form-group">
							    <div class="input-group">
							      <div class="input-group-addon">
							        <i class="fas fa-dollar-sign"></i> Midterm
							      </div>
							      <input style="text-align:center; font-size:small;" type="date" name="midterm_date" placeholder="Due Date" value="<?php echo $clearance['midterm_date']; ?>">
							      <input style="text-align:center; font-size:small;" type="number" class="breakdown" name="midterm_installment" placeholder="Amount" value="<?php echo $clearance['midterm_installment']?>" />
							    </div>
							  </div>
							  <div class="col-6 form-group">
							    <div class="input-group">
							      <div class="input-group-addon">
							        <i class="fas fa-dollar-sign"></i> Final
							      </div>
							      <input style="text-align:center; font-size:small;" type="date" name="finals_date" placeholder="Due Date" value="<?php echo $clearance['finals_date']; ?>">
							      <input style="text-align:center; font-size:small;" type="number" class="breakdown" name="finals_installment" placeholder="Amount" value="<?php echo $clearance['finals_installment']?>" />
							    </div>
							  </div>
							</div>
							<br />
							<button id="calculate" type="button">calculate</button>
							<!--  -->
							<br />
							<br />
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