<?php 
	session_start();
	include "../inc/func.php";
	include "../inc/grade/gcreate-inc.php";
 
	// Check if the user is logged in, if not then redirect him to login page
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["status"] !== "Active"){
		header("location: ../user/logout.php");
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
	<!-- Title Page-->
	<title>ICCES | Add My Subject</title>
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
		<!-- CONTENT -->
		<section id="banner">
			<div class="inner" style="overflow:auto;">
				<div class="login-wrap">
					<div class="card-header">
						<h2>Add My Subject</h2>
						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <!-- Student ID -->
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i> Student ID
                                    </div>
                                    <input style="text-align:center; font-size:small; background-color:#000000;" type="text" placeholder="Student ID" value="<?php echo $_SESSION['username']; ?>" disabled readonly>
                                </div>
                            </div>
                            <!--  -->
                            <br/>
							<!-- FULLNAME -->
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-address-card"></i> Fullname
										</div>
										<input style="text-align:center; font-size:small; background-color:#000000;" type="text" placeholder="Fullname" value="<?php echo $_SESSION['lastname'].', '.$_SESSION['firstname'].' '.$_SESSION['initials']; ?>" disabled readonly>
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
									<?php 
										$stmt = $bruh->prepare('SELECT course_type FROM table_courses LEFT JOIN table_student_info ON table_student_info.courseid = table_courses.id WHERE table_student_info.id = "'.$_SESSION['infoid'].'"');
										$stmt->execute();
										$result = $stmt->fetch();
									?>
									<input style="text-align:center; font-size:small; background-color:#000000;" type="text" placeholder="Student's Course" value="<?php echo $result['course_type']; ?>" disabled readonly>
								</div>
								</div>
								<!-- Student Year Level -->
								<div class="col-6 form-group">
								<div class="input-group">
									<div class="input-group-addon">
                                        <i class="fas fa-user-graduate"></i> Year Level
                                    </div>
									<?php 
										$stmt = $bruh->prepare('SELECT yearlevel FROM table_yearlevel LEFT JOIN table_student_info ON table_student_info.yearid = table_yearlevel.id WHERE table_student_info.id = "'.$_SESSION['infoid'].'"');
										$stmt->execute();
										$result = $stmt->fetch();
									?>
									<input style="text-align:center; font-size:small; background-color:#000000;" type="text" placeholder="Student's Year Level" value="<?php echo $result['yearlevel']; ?>" disabled readonly>
								</div>
								</div>
							</div>
							<!--  -->
                            <br/>
							<!-- Instructor Name -->
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">
                                        <i class="fas fa-user-tie"></i> Instructor Name
                                    </div>
									<?php 
										$stmt = $bruh->prepare("SELECT concat(table_employee_info.firstname, ' ', table_employee_info.initials, ' ', table_employee_info.lastname) AS NAME FROM table_employee_info LEFT JOIN table_users ON table_employee_info.userid = table_users.id WHERE table_users.userrank = 'INSTRUCTOR'");
										$stmt->execute();
									?>
									<select style="text-align:center; font-size:x-small; background-color:#3e4142;" name="instructorname" class="form-control  <?php echo (!empty($instructorname)) ? 'is-invalid' : ''; ?>">
										<option value="">INSTRUCTOR SELECTION</option>
									<?php foreach($stmt->fetchAll() as $instructors) { ?>
										<option value="<?php echo $instructors[0];?>"><?php echo $instructors[0];?></option>
									<?php } ?>
									</select>
								</div>
								<span class="help-block" style="color:red;"><?php echo $instructorname_err; ?></span>
							</div>
							<!--  -->
                            <br/>
							<!-- Subject -->
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">
                                        <i class="fas fa-book"></i> Subject
                                    </div>
								</div>
								<div class="input-group">
									<?php 
										$stmt = $bruh->prepare("SELECT table_subjects.id ,concat(table_subjects.subject_code, ' : ', table_subjects.subject_name) AS subjectfull FROM table_subjects LEFT JOIN table_student_subject ON table_student_subject.sbjid = table_subjects.id WHERE table_student_subject.studentinfoid = '".$_SESSION['infoid']."'");
										$stmt->execute();
									?>
									<select style="text-align:center; font-size:x-small; background-color:#3e4142;" name="sbjid" class="form-control <?php echo (!empty($sbjid_err)) ? 'is-invalid' : ''; ?>">
										<option value="">SUBJECT SELECTION</option>
									<?php foreach($stmt->fetchAll() as $subjects) { ?>
										<option value="<?php echo $subjects[0];?>"><?php echo $subjects[1];?></option>
									<?php } ?>
									</select>
									<span class="invalid-feedback"><?php echo $sbjid_err;?></span>
								</div>
							</div>
							<!--  -->
                            <br/>
                            <!-- Button -->
                            <ul class="actions special">
                                <li>
                                    <button type="submit" class="button primary" name="Submit"><i class="fa fa-check"></i> Create </button>
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
    </body>     
</html>