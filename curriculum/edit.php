<?php 
	session_start();
	include "../inc/func.php";
	include "../inc/config-inc.php";
	include "../inc/curriculum/edit-inc.php";
 
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
        <title>ICCES | Update Subject Curriculum</title>         
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
							<a href="../curriculum/list"><span>Return</span></a>
						</li>
					</ul>
                </nav>
            </header>
            <!-- Banner -->
            <section id="banner" style="height:100%;">
                <div class="inner">
                    <br/>
                    <h2>Update Subject Curriculum</h2>
                    <div class="login-wrap">
						<?php if ($msg): ?>
						<p><?=$msg?></p>
						<?php endif; ?>
						<form action="edit.php?id=<?=$sbjtcurri['id']?>" method="post">
<!------------------------------------------------------------------------------------->
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-user"></i> Subject Code
									</div>
									<input style="text-align:center; font-size:small; background-color:#000000;" type="text" value="<?=$sbjtcurri['subject_code']?>" disabled readonly>
								</div>
							</div>
                            <!--  -->
                            <br/>
<!------------------------------------------------------------------------------------->
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-address-card"></i> Subject Name
									</div>
									<input style="text-align:center; font-size:small; background-color:#000000;" type="text" value="<?=$sbjtcurri['subject_name']?>" disabled readonly>
								</div>
							</div>
                            <!--  -->
                            <br/>
<!------------------------------------------------------------------------------------->
							<div class="row">
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fab fa-leanpub"></i> Subject Unit
										</div>
										<input style="text-align:center; font-size:small; background-color:#000000;" type="text" value="<?=$sbjtcurri['subject_unit']; ?>" disabled readonly>
									</div>
								</div>
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-user-graduate"></i> Subject Laboratory Unit
										</div>
										<input style="text-align:center; font-size:small; background-color:#000000;" type="text" name="yearlevel" value="<?=$sbjtcurri['subject_labunit']; ?>" disabled readonly>
									</div>
								</div>
							</div>
                            <!--  -->
							<br/>
<!------------------------------------------------------------------------------------->
							<!-- YRLV/SEM -->
							<div class="row">
								<!-- YRLV -->
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-list-ol"></i> Year Level of Subject
										</div>
										<?php 
										$stmt151 = $pdo->query('SELECT yearlevel FROM table_yearlevel WHERE id = '.$sbjtcurri['yearid']);
										$result = $stmt151->fetch(PDO::FETCH_ASSOC);
										?>
										<input style="text-align:center; font-size:x-small; background-color:#000000;" type="text" value="Selected : <?=$result['yearlevel']; ?>" readonly>
										<?php 
											$stmt = $bruh->prepare("SELECT id, yearlevel FROM table_yearlevel");
											$stmt->execute();
										?>
										<select style="text-align:center; font-size:small; background-color:#50595f;" name="yearid" class="form-control">
											<option value="">YEAR LEVEL SELECTION</option>
										<?php foreach($stmt->fetchAll() as $yrlv) { ?>
											<option value="<?php echo $yrlv[0];?>"><?php echo $yrlv[1];?></option>
										<?php } ?>
										</select>
									</div>
								</div>
								<!-- SEM -->
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-list-ol"></i> Semester of Subject
										</div>
										<?php 
										$stmt152 = $pdo->query('SELECT semesters FROM table_semester WHERE id = '.$sbjtcurri['semesterid']);
										$result = $stmt152->fetch(PDO::FETCH_ASSOC);
										?>
										<input style="text-align:center; font-size:x-small; background-color:#000000;" type="text" value="Selected : <?=$result['semesters']; ?>" readonly>
										<?php 
											$stmt = $bruh->prepare("SELECT id, semesters FROM table_semester");
											$stmt->execute();
										?>
										<select style="text-align:center; font-size:small; background-color:#50595f;" name="semesterid" class="form-control">
											<option value="">SEMESTER SELECTION</option>
										<?php foreach($stmt->fetchAll() as $sem) { ?>
											<option value="<?php echo $sem[0];?>"><?php echo $sem[1];?></option>
										<?php } ?>
										</select>
									</div>
								</div>
							</div>
                            <!--  -->
                            <br/>
<!------------------------------------------------------------------------------------->
							<div class="row">
								<!-- School Year -->
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-book"></i> School Year
										</div>
										<input style="text-align:center; font-size:x-small; background-color:#000000;" type="text" value="Selected : <?=$sbjtcurri['schoolyear']; ?>" readonly>
										<select style="text-align:center; font-size:small; background-color:#50595f;" name="schoolyear" class="form-control" id="dropdownYear" onchange="getProjectReportFunc()">
										<option value="<?=$sbjtcurri['schoolyear']; ?>">Selected : <?php echo $sbjtcurri['schoolyear']; ?></option>
										</select>
									</div>
								</div>
								<!-- Curriculum Type -->
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-book"></i> Curriculum Type
										</div>
										<input style="text-align:center; font-size:x-small; background-color:#000000;" type="text" value="Selected : <?=$sbjtcurri['curriculumtype']; ?>" readonly>
										<select style="text-align:center; font-size:small; background-color:#50595f;" name="curriculumtype" class="form-control">
											<option value="">CURRICULUM SELECTION</option>
											<option value="New Curriculum">New Curriculum</option>
											<option value="Old Curriculum">Old Curriculum</option>
										</select>
									</div>
								</div>
							</div>
							<!-- -->
							<br/>
<!------------------------------------------------------------------------------------->
							<ul class="actions special">
								<li>
									<button type="submit" class="button primary" value="edit" name="edit"><i class="fas fa-pencil-alt"></i> Update Subject Curriculum </button>
								</li>
							</ul>
							<br/>
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

		<!-- Internal Scripts -->    
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
    </b