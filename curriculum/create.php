<?php
	session_start();
	include "../inc/curriculum/addsbjt-inc.php";

	// Check if the user is logged in, if not then redirect him to login page
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["status"] !== "Active"){
		header("location: ../user/logout.php");
		exit;
	}
	
	if($_SESSION['userrank'] == "SUPERADMIN" || $_SESSION['userrank'] == "ADMIN"){
	} 	else if($_SESSION['userrank'] !== "SUPERADMIN" || $_SESSION['userrank'] !== "ADMIN") {
			header("location: ../curriculum/list");
			exit;
		}
?>
 
<!DOCTYPE HTML> 
<html> 
    <head> 
        <title>ICCES | Add Subject Curriculum</title>         
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
							<a href="../curriculum/list"><span>Return</span></a>
						</li>
					</ul>
                </nav>
            </header>
            <!-- Banner -->
            <section id="banner" style="height:100%;">
                <div class="inner">
                    <br/>
                    <h2>Add Subject Curriculum</h2>
                    <div class="login-wrap">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <!-- Subject Code -->
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-bookmark"></i> Subject Code
                                    </div>
                                    <input style="text-align:center;  font-size:small;" type="text" name="subject_code" placeholder="Subject Code" class="form-control <?php echo (!empty($subject_code_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $subject_code; ?>">
                                </div>
                                <span class="help-block" style="color:red;"><?php echo $subject_code_err; ?></span>
                            </div>
                            <!--  -->
                            <br/>
							<!-- Subject Name -->
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">
                                        <i class="fa fa-book"></i> Subject Name
                                    </div>
									<input style="text-align:center; font-size:small;" type="text" name="subject_name" placeholder="Subject's Name" class="form-control <?php echo (!empty($subject_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $subject_name; ?>">
								</div>
								<span class="help-block" style="color:red;"><?php echo $subject_name_err; ?></span>
							</div>
							<!--  -->
                            <br/>
							<!-- Units -->
							<div class="row">
								<!-- LNAME -->
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-list-ol"></i> Subject Unit
										</div>
										<input style="text-align:center; font-size:small;" type="number" name="subject_unit" placeholder="Subject's Unit" class="form-control <?php echo (!empty($subject_unit_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $subject_unit; ?>">
									</div>
								<span class="help-block" style="color:red;"><?php echo $subject_unit_err; ?></span>
								</div>
								<!-- FNAME -->
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-list-ol"></i> Lab Unit
										</div>
										<input style="text-align:center; font-size:small;" type="text" name="subject_labunit" placeholder="Subject's Laboratory Unit" class="form-control <?php echo (!empty($subject_labunit_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $subject_labunit; ?>">
									</div>
								<span class="help-block" style="color:red;"><?php echo $subject_labunit_err; ?></span>
								</div>
							</div>
							<!--  -->
                            <br/>
							<!-- YRLV/SEM -->
							<div class="row">
								<!-- YRLV -->
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-list-ol"></i> Year Level of Subject
										</div>
										<?php 
											$stmt = $bruh->prepare("SELECT id, yearlevel FROM table_yearlevel");
											$stmt->execute();
										?>
										<select style="text-align:center; font-size:xx-small; background-color:grey;" name="yearid" class="form-control  <?php echo (!empty($yearid_err)) ? 'is-invalid' : ''; ?>">
											<option value="">YEAR LEVEL SELECTION</option>
										<?php foreach($stmt->fetchAll() as $yrlv) { ?>
											<option value="<?php echo $yrlv[0];?>"><?php echo $yrlv[1];?></option>
										<?php } ?>
										</select>
									</div>
								<span class="help-block" style="color:red;"><?php echo $yearid_err; ?></span>
								</div>
								<!-- SEM -->
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-list-ol"></i> Semester of Subject
										</div>
										<?php 
											$stmt = $bruh->prepare("SELECT id, semesters FROM table_semester");
											$stmt->execute();
										?>
										<select style="text-align:center; font-size:xx-small; background-color:grey;" name="semesterid" class="form-control  <?php echo (!empty($semesterid_err)) ? 'is-invalid' : ''; ?>">
											<option value="">SEMESTER SELECTION</option>
										<?php foreach($stmt->fetchAll() as $sem) { ?>
											<option value="<?php echo $sem[0];?>"><?php echo $sem[1];?></option>
										<?php } ?>
										</select>
									</div>
								<span class="help-block" style="color:red;"><?php echo $semesterid_err; ?></span>
								</div>
							</div>
							<!--  -->
                            <br/>
							<div class="row">
								<!-- School Year -->
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-book"></i> School Year
										</div>
										<select style="text-align:center; font-size:xx-small; background-color:grey;" name="schoolyear" class="form-control" id="dropdownYear" onchange="getProjectReportFunc()">
										</select>
									</div>
									<span class="help-block" style="color:red;"><?php echo $schoolyear_err; ?></span>
								</div>
								<!-- Curriculum Type -->
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-book"></i> Curriculum Type
										</div>
										<select style="text-align:center; font-size:xx-small; background-color:grey;" name="curriculumtype" class="form-control  <?php echo (!empty($curriculumtype_err)) ? 'is-invalid' : ''; ?>">
											<option value="">CURRICULUM SELECTION</option>
											<option value="New Curriculum">New Curriculum</option>
											<option value="Old Curriculum">Old Curriculum</option>
										</select>
									</div>
									<span class="help-block" style="color:red;"><?php echo $curriculumtype_err; ?></span>
								</div>
							</div>
							<!--  -->
                            <br/>
                            <!-- Button -->
                            <ul class="actions special">
                                <li>
                                    <button type="submit" class="button primary" name="Submit">Add Subject Curriculum</button>
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

		<script type="text/javascript">
			$('#dropdownYear').each(function() {
				var year = (new Date()).getFullYear();
				var current = year;
				year -= 0;
				for (var i = 0; i < 6; i++) {
					if ((year+i) == current)
					$(this).append('<option selected value="' + (year + i) + '">' + (year + i) + '</option>');
					else
					$(this).append('<option value="' + (year + i) + '">' + (year + i) + '</option>');
				}
			})
		</script>
    </body>     
</html>