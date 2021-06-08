<?php 
	session_start();
	include "../inc/func.php";
	include "../inc/info/supdate-inc.php";
	include "../inc/info/studentsubject-inc.php";
 
	// Check if the user is logged in, if not then redirect him to login page
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["status"] !== "Active"){
		header("location: ../user/logout.php");
		exit;
	}
	
	if($_SESSION['userrank'] !== "STUDENT"){
	} else if($_SESSION['userrank'] == "STUDENT") {
			header("location: ../user/login");
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
					<h2>Student Information #<?=$clearance['id']?></h2>
					<div class="login-wrap" ng-app="">
						<?php if ($msg): ?>
						<p><?=$msg?></p>
						<?php endif; ?>
<!------------------------------------------------------------------------------------->
						<form action="update.php?id=<?=$clearance['id']?>" method="post" novalidate ng-app="">
							<!-- Student ID -->
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-user"></i> Student ID
									</div>
									<input style="text-align:center; font-size:small; background-color:#000000;" type="hidden" name="studentinfoid" value="<?=$clearance['id']?>" readonly>
									<input style="text-align:center; font-size:small; background-color:#000000;" type="text" value="<?=$clearance['studentid']?>" id="idnumber" disabled readonly>
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
									<input style="text-align:center; font-size:small; background-color:#000000;" type="text" value="<?=$clearance['lastname']?>, <?=$clearance['firstname']?>" disabled readonly>
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
											$stmt4 = $bruh->prepare("SELECT id, course_type FROM table_courses ORDER BY id");
											$stmt4->execute();
										?>
										<?php if($_SESSION['userrank'] == "ADMIN" || $_SESSION['userrank'] == "SUPERADMIN"){?>
										<select style="text-align:center; font-size:small; background-color:#3e4142;" id="coursetype" name="courseid" class="form-control">
											<option value="">COURSE SELECTION</option>
											<?php foreach($stmt4->fetchAll() as $courses) { ?>
											<option value="<?php echo $courses[0];?>" <?php echo ($clearance['courseid'] == $courses[0]) ? 'Selected' : '' ; ?>><?php echo ($clearance['courseid'] == $courses[0]) ? 'Selected: '.$courses[1].'' : $courses[1] ; ?></option>
											<?php } ?>
										</select>
										<?php } elseif ($_SESSION['userrank'] == "CASHIER") {?>
											<input style="text-align:center; font-size:small;" type="text" name="courseid" placeholder="Course" value="<?php echo $clearance['courseid']?>" disabled readonly />
										<?php } ?>
									</div>
								</div>
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-user-graduate"></i> Year Level
										</div>
										<?php 
											$stmt1 = $bruh->prepare("SELECT id, yearlevel FROM table_yearlevel");
											$stmt1->execute();
										?>
										<?php if($_SESSION['userrank'] == "ADMIN" || $_SESSION['userrank'] == "SUPERADMIN"){?>
										<select style="text-align:center; font-size:small; background-color:#3e4142;" id="yearlevel" name="yearid" class="form-control">
											<option value="">YEAR LEVEL SELECTION</option>
											<?php foreach($stmt1->fetchAll() as $yrlv) { ?>
											<option value="<?php echo $yrlv[0];?>" <?php echo ($clearance['yearid'] == $yrlv[0]) ? 'Selected' : '' ; ?>><?php echo ($clearance['yearid'] == $yrlv[0]) ? 'Selected: '.$yrlv[1].'' : $yrlv[1] ; ?></option>
											<?php } ?>
										</select>
										<?php } elseif ($_SESSION['userrank'] == "CASHIER") {?>
											<input style="text-align:center; font-size:small;" type="text" name="yearid" placeholder="Course" value="<?php echo $clearance['yearid']?>" disabled readonly />
										<?php } ?>
									</div>
								</div>
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-list-ol"></i> Course Semester
										</div>
										<?php 
											$stmt2 = $bruh->prepare("SELECT id, semesters FROM table_semester");
											$stmt2->execute();
										?>
										<?php if($_SESSION['userrank'] == "ADMIN" || $_SESSION['userrank'] == "SUPERADMIN"){?>
										<select style="text-align:center; font-size:small; background-color:#3e4142;" id="courseterm" name="semesterid" class="form-control">
											<option value="">SEMESTER SELECTION</option>
											<?php foreach($stmt2->fetchAll() as $sems) { ?>
											<option value="<?php echo $sems[0];?>" <?php echo ($clearance['semesterid'] == $sems[0]) ? 'Selected' : '' ; ?>><?php echo ($clearance['semesterid'] == $sems[0]) ? 'Selected: '.$sems[1].'' : $sems[1] ; ?></option>
											<?php } ?>
										</select>
										<?php } elseif ($_SESSION['userrank'] == "CASHIER") {?>
											<input style="text-align:center; font-size:small;" type="text" name="yearid" placeholder="Course" value="<?php echo $clearance['yearid']?>" disabled readonly />
										<?php } ?>
									</div>
								</div>
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-calendar-alt"></i> School Year
										</div>
										<?php if($_SESSION['userrank'] == "ADMIN" || $_SESSION['userrank'] == "SUPERADMIN"){?>
										<select style="text-align:center; font-size:small; background-color:#3e4142;" name="schoolyear" class="form-control">
                                            <option value="">None</option>
											<option value="2021" <?php echo ($clearance['schoolyear'] == '2021') ? 'Selected' : '' ; ?>><?php echo ($clearance['schoolyear'] == '2021') ? 'Selected: 2021-2022' : '2021-2022' ; ?></option>
											<option value="2022" <?php echo ($clearance['schoolyear'] == '2022') ? 'Selected' : '' ; ?>><?php echo ($clearance['schoolyear'] == '2022') ? 'Selected: 2022-2023' : '2022-2023' ; ?></option>
											<option value="2023" <?php echo ($clearance['schoolyear'] == '2023') ? 'Selected' : '' ; ?>><?php echo ($clearance['schoolyear'] == '2023') ? 'Selected: 2023-2024' : '2023-2024' ; ?></option>
											<option value="2024" <?php echo ($clearance['schoolyear'] == '2024') ? 'Selected' : '' ; ?>><?php echo ($clearance['schoolyear'] == '2024') ? 'Selected: 2024-2025' : '2024-2025' ; ?></option>
											<option value="2025" <?php echo ($clearance['schoolyear'] == '2025') ? 'Selected' : '' ; ?>><?php echo ($clearance['schoolyear'] == '2025') ? 'Selected: 2025-2026' : '2025-2025' ; ?></option>
											<option value="2026" <?php echo ($clearance['schoolyear'] == '2026') ? 'Selected' : '' ; ?>><?php echo ($clearance['schoolyear'] == '2026') ? 'Selected: 2026-2027' : '2026-2027' ; ?></option>
											<option value="2027" <?php echo ($clearance['schoolyear'] == '2027') ? 'Selected' : '' ; ?>><?php echo ($clearance['schoolyear'] == '2027') ? 'Selected: 2027-2028' : '2027-2028' ; ?></option>
											<option value="2028" <?php echo ($clearance['schoolyear'] == '2028') ? 'Selected' : '' ; ?>><?php echo ($clearance['schoolyear'] == '2028') ? 'Selected: 2028-2029' : '2028-2029' ; ?></option>
											<option value="2029" <?php echo ($clearance['schoolyear'] == '2029') ? 'Selected' : '' ; ?>><?php echo ($clearance['schoolyear'] == '2029') ? 'Selected: 2029-2030' : '2029-2030' ; ?></option>
											<option value="2030" <?php echo ($clearance['schoolyear'] == '2030') ? 'Selected' : '' ; ?>><?php echo ($clearance['schoolyear'] == '2030') ? 'Selected: 2030-2031' : '2030-2031' ; ?></option>
										</select>
										<?php } elseif ($_SESSION['userrank'] == "CASHIER") {?>
											<input style="text-align:center; font-size:small;" type="text" name="schoolyear" placeholder="School Year" value="<?php echo $clearance['schoolyear']?>" disabled readonly />
										<?php } ?>
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
										<?php if($_SESSION['userrank'] == "ADMIN" || $_SESSION['userrank'] == "SUPERADMIN"){?>
										<select style="text-align:center; font-size:small; background-color:#3e4142;" id="studenttype" name="studenttype" class="form-control">
											<option value="None Selected" <?php echo ($clearance['studenttype'] == 'None Selected') ? 'Selected' : '' ; ?>><?php echo ($clearance['studenttype'] == 'None Selected') ? 'Selected: None Selected' : 'None Selected' ; ?></option>
											<option value="Regular" <?php echo ($clearance['studenttype'] == 'Regular') ? 'Selected' : '' ; ?>><?php echo ($clearance['studenttype'] == 'Regular') ? 'Selected: Regular' : 'Regular' ; ?></option>
											<option value="Irregular" <?php echo ($clearance['studenttype'] == 'Irregular') ? 'Selected' : '' ; ?>><?php echo ($clearance['studenttype'] == 'Irregular') ? 'Selected: Irregular' : 'Irregular' ; ?></option>
										</select>
										<?php } elseif ($_SESSION['userrank'] == "CASHIER") {?>
											<input type="text" style="text-align:center; font-size:small;" id="studenttype" name="studenttype" placeholder="Student Type" value="<?php echo $clearance['studenttype'];?>" disabled readonly />
										<?php } ?>
									</div>
								</div>
								<!-- SUBJECTS -->
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-id-card-alt"></i> Curriculum Type
										</div>
										<?php if($_SESSION['userrank'] == "ADMIN" || $_SESSION['userrank'] == "SUPERADMIN"){?>
										<select style="text-align:center; font-size:small; background-color:#3e4142;" id="curriculumtype" name="curriculumtype" class="form-control">
											<option value="None Selected" <?php echo ($clearance['curriculumtype'] == 'None Selected') ? 'Selected' : '' ; ?>><?php echo ($clearance['curriculumtype'] == 'None Selected') ? 'Selected: None Selected' : 'None Selected' ; ?></option>
											<option value="New Curriculum" <?php echo ($clearance['curriculumtype'] == 'New Curriculum') ? 'Selected' : '' ; ?>><?php echo ($clearance['curriculumtype'] == 'New Curriculum') ? 'Selected: New Curriculum' : 'New Curriculum' ; ?></option>
											<option value="Old Curriculum" <?php echo ($clearance['curriculumtype'] == 'Old Curriculum') ? 'Selected' : '' ; ?>><?php echo ($clearance['curriculumtype'] == 'Old Curriculum') ? 'Selected: Old Curriculum' : 'Old Curriculum' ; ?></option>
										</select>
										<?php } elseif ($_SESSION['userrank'] == "CASHIER") {?>
											<input type="text" style="text-align:center; font-size:small;" id="curriculumtype" name="curriculumtype" placeholder="Student Type" value="<?php echo $clearance['curriculumtype'];?>" disabled readonly />
										<?php } ?>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fas fa-book"></i> Subjects
									</div>
									<?php if($clearance['studenttype'] == "Regular") {?>
										<?php 
											$stmt7 = $bruh->prepare("SELECT id, subject_code, subject_name FROM table_subjects WHERE yearid = ".$clearance['yearid']." AND semesterid = ".$clearance['yearid']." AND schoolyear = ".$clearance['schoolyear']." AND curriculumtype = '".$clearance['curriculumtype']."'");
											$stmt7->execute();
										?>
										<div class="row">
											<?php foreach($stmt7->fetchAll() as $subjects) { ?>
											<div class="col-3">
												<input type="checkbox" id="<?php echo $subjects[1];?>" name="sbjid[]" value="<?php echo $subjects[0];?>" class="form-control sbjid" />
												<label for="<?php echo $subjects[1];?>" style="font-size:small;"><?php echo $subjects[1];?></label>
											</div>
											<?php } ?>
										</div>
									<?php } elseif ($clearance['studenttype'] == "Irregular") { ?>
										<?php 
											$stmt7 = $bruh->prepare("SELECT id, subject_code, subject_name FROM table_subjects WHERE curriculumtype = '".$clearance['curriculumtype']."'");
											$stmt7->execute();
										?>
										<div class="row">
											<?php foreach($stmt7->fetchAll() as $subjects) { ?>
											<div class="col-3">
												<input type="checkbox" id="<?php echo $subjects[1];?>" name="sbjid[]" value="<?php echo $subjects[0];?>" class="form-control sbjid" />
												<label for="<?php echo $subjects[1];?>" style="font-size:small;"><?php echo $subjects[1];?></label>
											</div>
											<?php } ?>
										</div>
									<?php } ?>
									<textarea style="text-align:center; resize:none;" name="subjects" placeholder="Subjects" readonly ><?=$clearance['subjects']?></textarea>
								</div>
							</div>
							<!--  -->
							<br/>
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
		
		<script type="text/javascript">

		$(".sbjid").on("change", function () {
		var subject = [];
			$(".sbjid:checked").each(function(){
				subject.push($(this).attr("id"));
			});
			$("textarea[name='subjects']").val(subject.join(" | "));
		});
		</script>
				
    </body>     
</html