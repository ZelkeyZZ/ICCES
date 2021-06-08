<?php 
	session_start();
	include "../inc/func.php";
	include "../inc/info/studentsubject-inc.php";
 
	// Check if the user is logged in, if not then redirect him to login page
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["status"] !== "Active"){
		header("location: ../user/logout.php");
		exit;
	}
	
	/*if($_SESSION['userrank'] == "STUDENT"){
	} else if($_SESSION['userrank'] !== "STUDENT") {
			header("location: ../user/overview");
			exit;
	}*/

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
                                        <i class="fa fa-user"></i> Enroll Subject
                                    </div>
                                    <?php 
										$stmt = $pdo->prepare("SELECT id, CONCAT(lastname,', ',firstname,' ',initials) FROM table_student_info");
										$stmt->execute();
									?>
									<select style="text-align:center; font-size:small; background-color:grey;" name="studentinfoid" class="form-control">
										<option value="">SELECTION</option>
										<?php foreach($stmt->fetchAll() as $sems) { ?>
										<option value="<?php echo $sems[0];?>"><?php echo $sems[1];?></option>
										<?php } ?>
									</select>
                                </div>
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
										$stmt2 = $pdo->prepare("SELECT table_subjects.id, table_subjects.subject_code FROM table_subjects LEFT JOIN table_student_info ON table_student_info.yearid = table_subjects.yearid AND table_student_info.semesterid = table_subjects.semesterid");
										$stmt2->execute();
									?>
									<div class="row">
										<?php foreach($stmt2->fetchAll() as $subjects) { ?>
										<div class="col-3">
											<input type="checkbox" id="<?php echo $subjects[0];?>" name="sbjid[]" value="<?php echo $subjects[0];?>" class="form-control" />
											<label for="<?php echo $subjects[0];?>" style="font-size:small;"><?php echo $subjects[1];?></label>
										</div>
										<?php } ?>
									</div>
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
		<script type="text/javascript">
		$('.btn[data-radio-name]').click(function() {
			$('.btn[data-radio-name="'+$(this).data('radioName')+'"]').removeClass('active');
			$('input[name="'+$(this).data('radioName')+'"]').val(
				$(this).text()
			);
		});
		
		$('.btn[data-checkbox-name]').click(function() {
			$('input[name="'+$(this).data('checkboxName')+'"]').val(
				$(this).hasClass('active') ? 0 : 1
			);
		});
		</script> 		
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