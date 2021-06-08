<?php 
	session_start();
	include "../inc/func.php";
	include "../inc/grade/gupdate-inc.php";
 
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
		<title>ICCES | Update Student Grade</title>
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
						<form action="update.php?id=<?=$grade['id']?>" method="post">
<!------------------------------------------------------------------------------------->
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">
                                        <i class="fa fa-user"></i> Student ID
                                    </div>
									<input style="text-align:center; font-size:small;" type="text" value="<?=$grade['studentid']?>" disabled readonly>
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
									<input style="text-align:center; font-size:small;"type="text" value="<?=$grade['studentname']?>" disabled readonly>
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
										<input style="text-align:center; font-size:small;" type="text" value="<?=$grade['course_type']?>" disabled readonly>
									</div>
								</div>
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-user-graduate"></i> Year Level
										</div>
										<input style="text-align:center; font-size:small;"type="text" value="<?=$grade['yearlevel']?>" disabled readonly>
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
									<input style="text-align:center; font-size:small;"type="text" value="<?=$grade['subjectsname']?>" disabled readonly>
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
										<input style="text-align:center; font-size:small;" type="text" id="prelim" name="prelim_score" value="<?=$grade['prelim_score']?>">
									</div>
								</div>
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="far fa-chart-bar"></i> Midterm Grade
										</div>
										<input style="text-align:center; font-size:small;" type="text" id="midterm" name="midterm_score" value="<?=$grade['midterm_score']?>">
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
										<input style="text-align:center; font-size:small;" type="text" id="final" name="finals_score" value="<?=$grade['finals_score']?>">
									</div>
								</div>
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="far fa-chart-bar"></i> Average Grade
										</div>
										<input style="text-align:center; font-size:small;" type="text" id="average" name="average_score" value="<?php echo $grade['average_score']; ?>" />
									</div>
								</div>
							</div>
							<br/>
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">
										<i class="far fa-chart-bar"></i> Overall Grade
									</div>
									<input style="text-align:center; font-size:small;" type="text" id="overall" name="overall_score" value="<?php echo $grade['overall_score']; ?>" />
								</div>
							</div>
							<br/>
							<div class="col-6 form-group">
								<div class="input-group">
									<div class="input-group-addon">
										<i class="far fa-chart-bar"></i> Remarks
									</div>
									<select style="text-align:center; font-size:small; background-color:grey;" name="remarks" class="form-control">
										<option value="Pending" <?php echo ($grade['remarks'] == 'Pending') ? 'Selected' : '' ; ?>><?php echo ($grade['remarks'] == 'Pending') ? 'Selected: Pending' : 'Pending' ; ?></option>
										<option value="Passed" <?php echo ($grade['remarks'] == 'Passed') ? 'Selected' : '' ; ?>><?php echo ($grade['remarks'] == 'Passed') ? 'Selected: Passed' : 'Passed' ; ?></option>
										<option value="Failed" <?php echo ($grade['remarks'] == 'Failed') ? 'Selected' : '' ; ?>><?php echo ($grade['remarks'] == 'Failed') ? 'Selected: Failed' : 'Failed' ; ?></option>
										<option value="INC" <?php echo ($grade['remarks'] == 'INC') ? 'Selected' : '' ; ?>><?php echo ($grade['remarks'] == 'INC') ? 'Selected: INC' : 'INC' ; ?></option>
									</select>
								</div>
							</div>
							<br/>
							<button id="calculate" type="button">calculate</button>
							<!--  -->
							<br/>
							<br/>
<!------------------------------------------------------------------------------------->
							<p>
							<?php
								echo "Last Edited by ".$grade['editorname']." - ".$grade['editorrank']."";
								echo '<br/>';
								echo "on ".$grade['datesigned']."";
							?>
							</p>
<!------------------------------------------------------------------------------------->
							<ul class="actions special">
								<li>
									<button type="submit" class="button primary" value="submit" name="submit"><i class="fas fa-pencil-alt"></i> Update Subject Grade </button>
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
        <script src="../assets/js/calcgrade.js"></script>         
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