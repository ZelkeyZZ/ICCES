<?php
	session_start();
	include"../inc/info/sview-inc.php";
	
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
		<title>ICCES | View Clearance</title>
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
    <body > <!-- class="landing is-preload"-->
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
<!------------------------------------------------------------------------------------->
            <!-- Banner -->
            <section id="banner" style="height:100%;">
                <div class="inner">
                    <br/>
                    <h2>View Student Information</h2>
                    <div class="login-wrap">
<!------------------------------------------------------------------------------------->
                        <form method="post">
                            <!-- Student ID -->
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i> Student ID
                                    </div>
                                    <input style="text-align:center; font-size:small; background-color:#000000;" type="text" name="studentid" placeholder="Student ID" class="form-control" value="<?php echo $row["studentid"]; ?>" disabled readonly />
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
									<input style="text-align:center; font-size:small; background-color:#000000;" type="text" name="studentname" value="<?php echo $row["studentname"]; ?>" disabled readonly />
								</div>
							</div>
                            <!--  -->
                            <br/>
<!------------------------------------------------------------------------------------->
							<!-- Course/Year -->
							<div class="input-group-addon">
                                <i class="fas fa-graduation-cap"></i> Student Curriculum
                            </div>
							<div class="row">
								<!-- Student Course -->
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fab fa-leanpub"></i> Course
										</div>
										<input type="text" style="text-align:center; font-size:small; background-color:#000000;" name="studentcourse" class="form-control" value="<?php echo $row["studentcourse"]; ?>" disabled readonly />
									</div>
								</div>
								<!-- Student Year Level -->
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-user-graduate"></i> Year Level
										</div>
										<input type="text" style="text-align:center; font-size:small; background-color:#000000;" name="studentyear" class="form-control" value="<?php echo $row["studentyear"]; ?>" disabled readonly />
									</div>
								</div>
								<!-- Semester -->
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-list-ol"></i> Course Semester
										</div>
										<input type="text" style="text-align:center; font-size:14.5px; background-color:#000000;" name="studentsem" class="form-control" value="<?php echo $row["studentsem"]; ?>" disabled readonly />
									</div>
								</div>
								<!-- School Year -->
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-calendar-alt"></i> School Year
										</div>
										<input type="text" style="text-align:center; font-size:14.5px; background-color:#000000;" name="schoolyear" class="form-control" value="<?php echo $row["schoolyear"]; ?>" disabled readonly />
									</div>
								</div>
								<!-- SUBJECTS -->
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-id-card-alt"></i> Student Type
										</div>
										<input type="text" style="text-align:center; font-size:small; background-color:#000000;" name="studenttype" placeholder="Student Type" value="<?php echo $row['studenttype'];?>" disabled readonly />
									</div>
								</div>
								<!-- SUBJECTS -->
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-id-card-alt"></i> Curriculum Type
										</div>
										<input type="text" style="text-align:center; font-size:small; background-color:#000000;" name="curriculumtype" placeholder="Student Type" value="<?php echo $row['curriculumtype'];?>" disabled readonly />
									</div>
								</div>
							</div>
							<div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i> Subjects
                                    </div>
									<textarea name="subjects" style="text-align:center; resize: none; background-color:#000000;" disabled readonly ><?php echo $row['subjects'];?></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
<!------------------------------------------------------------------------------------->
					<h2>Student Requisites</h2>
                    <div class="login-wrap">
<!------------------------------------------------------------------------------------->
                        <form method="post">
<?php 
$stmt100 = $bruh->query('SELECT studentinfoid FROM table_student_req WHERE studentinfoid = "'.$row['id'].'"');
$result = $stmt100->fetch(PDO::FETCH_ASSOC);
		if (!is_array($result))  { 
?>
		No Requisites Created.
<?php 	} elseif($result['studentinfoid'] == $row['id']) { ?>
	
							<div class="row">
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-smile"></i> Good Moral
										</div>
<?php 
$stmt1 = $bruh->query("
SELECT 
table_student_info.id,
table_student_req.goodmoral 
FROM table_student_req 
LEFT JOIN table_student_info ON table_student_info.id = table_student_req.studentinfoid
WHERE studentinfoid = ".$row['id']);
$result = $stmt1->fetch(PDO::FETCH_ASSOC);
?>
<?php if($result['goodmoral'] == "Submitted"){ ?>
<input type="text" style="text-align:center; font-size:12px;  background-color:#00ad45; color:#000000;" name="goodmoral" class="form-control" value="<?php echo $result['goodmoral']; ?>" disabled readonly />
<?php } else if($result['goodmoral'] == "Not Submitted"){ ?>
<input type="text" style="text-align:center; font-size:12px;  background-color:#ff6565; color:#000000;" name="goodmoral" class="form-control" value="<?php echo $result['goodmoral']; ?>" disabled readonly />
<?php } else if($result['goodmoral'] == "Pending"){ ?>
<input type="text" style="text-align:center; font-size:12px;  background-color:#000000; color:#ffffff;" name="goodmoral" class="form-control" value="<?php echo $result['goodmoral']; ?>" disabled readonly />
<?php } ?>
									</div>
								</div>
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="far fa-clipboard"></i> T.O.R
										</div>
<?php 
$stmt1 = $bruh->query("
SELECT 
table_student_info.id,
table_student_req.tor 
FROM table_student_req 
LEFT JOIN table_student_info ON table_student_info.id = table_student_req.studentinfoid
WHERE studentinfoid = ".$row['id']);
$result = $stmt1->fetch(PDO::FETCH_ASSOC);
?>
<?php if($result['tor'] == "Submitted"){ ?>
<input type="text" style="text-align:center; font-size:12px;  background-color:#00ad45; color:#000000;" name="tor" class="form-control" value="<?php echo $result['tor']; ?>" disabled readonly />
<?php } else if($result['tor'] == "Not Submitted"){ ?>
<input type="text" style="text-align:center; font-size:12px;  background-color:#ff6565; color:#000000;" name="tor" class="form-control" value="<?php echo $result['tor']; ?>" disabled readonly />
<?php } else if($result['tor'] == "Pending"){ ?>
<input type="text" style="text-align:center; font-size:12px;  background-color:#000000; color:#ffffff;" name="tor" class="form-control" value="<?php echo $result['tor']; ?>" disabled readonly />
<?php } ?>
									</div>
								</div>
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-clipboard"></i> Form 137
										</div>
<?php 
$stmt1 = $bruh->query("
SELECT 
table_student_info.id,
table_student_req.form137 
FROM table_student_req 
LEFT JOIN table_student_info ON table_student_info.id = table_student_req.studentinfoid
WHERE studentinfoid = ".$row['id']);
$result = $stmt1->fetch(PDO::FETCH_ASSOC);
?>
<?php if($result['form137'] == "Submitted"){ ?>
<input type="text" style="text-align:center; font-size:12px;  background-color:#00ad45; color:#000000;" name="form137" class="form-control" value="<?php echo $result['form137']; ?>" disabled readonly />
<?php } else if($result['form137'] == "Not Submitted"){ ?>
<input type="text" style="text-align:center; font-size:12px;  background-color:#ff6565; color:#000000;" name="form137" class="form-control" value="<?php echo $result['form137']; ?>" disabled readonly />
<?php } else if($result['form137'] == "Pending"){ ?>
<input type="text" style="text-align:center; font-size:12px;  background-color:#000000; color:#ffffff;" name="form137" class="form-control" value="<?php echo $result['form137']; ?>" disabled readonly />
<?php } ?>
									</div>
								</div>
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fab fa-wpforms"></i> Application Form
										</div>
<?php 
$stmt1 = $bruh->query("
SELECT 
table_student_info.id,
table_student_req.appform 
FROM table_student_req 
LEFT JOIN table_student_info ON table_student_info.id = table_student_req.studentinfoid
WHERE studentinfoid = ".$row['id']);
$result = $stmt1->fetch(PDO::FETCH_ASSOC);
?>
<?php if($result['appform'] == "Submitted"){ ?>
<input type="text" style="text-align:center; font-size:12px; background-color:#00ad45; color:#000000;" name="appform" class="form-control" value="<?php echo $result['appform']; ?>" disabled readonly />
<?php } else if($result['appform'] == "Not Submitted"){ ?>
<input type="text" style="text-align:center; font-size:12px; background-color:#ff6565; color:#000000;" name="appform" class="form-control" value="<?php echo $result['appform']; ?>" disabled readonly />
<?php } else if($result['appform'] == "Pending"){ ?>
<input type="text" style="text-align:center; font-size:12px; background-color:#000000; color:#ffffff;" name="appform" class="form-control" value="<?php echo $result['appform']; ?>" disabled readonly />
<?php } ?>
									</div>
								</div>
							</div>
<?php } ?>
                        </form>
                    </div>
<!------------------------------------------------------------------------------------->
                    <h2>Certificate of Registration</h2>
                    <div class="login-wrap">
<!------------------------------------------------------------------------------------->
                        <form method="post">
<?php 
$stmt101 = $bruh->query('SELECT studentinfoid FROM table_student_cor WHERE studentinfoid = "'.$row['id'].'"');
$result = $stmt101->fetch(PDO::FETCH_ASSOC);
		if (!is_array($result))  { 
?>
		No Requisites Created.
<?php 	} elseif($result['studentinfoid'] == $row['id']) { ?>
                            <!-- Scholar/Pay Status -->
							<div class="row">
								<!-- Scholarship Type -->
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-scroll"></i> Scholarship
										</div>
<?php 
$stmt1 = $bruh->query("
SELECT 
table_student_info.id,
table_student_cor.scholartype 
FROM table_student_cor 
LEFT JOIN table_student_info ON table_student_info.id = table_student_cor.studentinfoid
WHERE studentinfoid = ".$row['id']);
$result = $stmt1->fetch(PDO::FETCH_ASSOC);
?>
<input type="text" style="text-align:center; font-size:12px; background-color:#000000;" name="scholartype" class="form-control" value="<?php echo $result['scholartype']; ?>" disabled readonly />
									</div>
								</div>
								<!-- Payment Method -->
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-dollar-sign"></i> Payment Method
										</div>
<?php 
$stmt1 = $bruh->query("
SELECT 
table_student_info.id,
table_student_cor.payment_type 
FROM table_student_cor 
LEFT JOIN table_student_info ON table_student_info.id = table_student_cor.studentinfoid
WHERE studentinfoid = ".$row['id']);
$result = $stmt1->fetch(PDO::FETCH_ASSOC);
?>
<input type="text" style="text-align:center; font-size:12px; background-color:#000000;" name="payment_type" class="form-control" value="<?php echo $result['payment_type']; ?>" disabled readonly />
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
<?php 
$stmt1 = $bruh->query("
SELECT 
table_student_info.id,
table_student_cor.misc_fee 
FROM table_student_cor 
LEFT JOIN table_student_info ON table_student_info.id = table_student_cor.studentinfoid
WHERE studentinfoid = ".$row['id']);
$result = $stmt1->fetch(PDO::FETCH_ASSOC);
?>
<input style="text-align:center; font-size:small; background-color:#000000;" type="number" name="misc_fee" placeholder="Amount" value="<?php echo $result["misc_fee"]; ?>" disabled readonly />
									</div>
								</div>
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-dollar-sign"></i> Thesis Fee
										</div>
<?php 
$stmt1 = $bruh->query("
SELECT 
table_student_info.id,
table_student_cor.thesis_fee 
FROM table_student_cor 
LEFT JOIN table_student_info ON table_student_info.id = table_student_cor.studentinfoid
WHERE studentinfoid = ".$row['id']);
$result = $stmt1->fetch(PDO::FETCH_ASSOC);
?>
<input style="text-align:center; font-size:small; background-color:#000000;" type="number" name="thesis_fee" placeholder="Amount" value="<?php echo $result["thesis_fee"]; ?>" disabled readonly />
									</div>
								</div>
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-dollar-sign"></i> NSTP Fee
										</div>
<?php 
$stmt1 = $bruh->query("
SELECT 
table_student_info.id,
table_student_cor.nstp_fee 
FROM table_student_cor 
LEFT JOIN table_student_info ON table_student_info.id = table_student_cor.studentinfoid
WHERE studentinfoid = ".$row['id']);
$result = $stmt1->fetch(PDO::FETCH_ASSOC);
?>
<input style="text-align:center; font-size:small; background-color:#000000;" type="number" name="nstp_fee" placeholder="Amount" value="<?php echo $result["nstp_fee"]; ?>" disabled readonly />
									</div>
								</div>
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-dollar-sign"></i> Laboratory Fee
										</div>
<?php 
$stmt1 = $bruh->query("
SELECT 
table_student_info.id,
table_student_cor.lab_fee 
FROM table_student_cor 
LEFT JOIN table_student_info ON table_student_info.id = table_student_cor.studentinfoid
WHERE studentinfoid = ".$row['id']);
$result = $stmt1->fetch(PDO::FETCH_ASSOC);
?>
<input style="text-align:center; font-size:small; background-color:#000000;" type="number" name="lab_fee" placeholder="Amount" value="<?php echo $result["lab_fee"]; ?>" disabled readonly />
									</div>
								</div>
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-list-ol"></i> Total Units
										</div>
<?php 
$stmt1 = $bruh->query("
SELECT 
table_student_info.id,
table_student_cor.total_units 
FROM table_student_cor 
LEFT JOIN table_student_info ON table_student_info.id = table_student_cor.studentinfoid
WHERE studentinfoid = ".$row['id']);
$result = $stmt1->fetch(PDO::FETCH_ASSOC);
?>
<input style="text-align:center; font-size:small; background-color:#000000;" type="number" name="total_units" placeholder="Amount" value="<?php echo $result["total_units"]; ?>" disabled readonly />
									</div>
								</div>
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-dollar-sign"></i> Total Tuition Fee
										</div>
<?php 
$stmt1 = $bruh->query("
SELECT 
table_student_info.id,
table_student_cor.tuiton_fee 
FROM table_student_cor 
LEFT JOIN table_student_info ON table_student_info.id = table_student_cor.studentinfoid
WHERE studentinfoid = ".$row['id']);
$result = $stmt1->fetch(PDO::FETCH_ASSOC);
?>
<input style="text-align:center; font-size:small; background-color:#000000;" type="number" name="tuiton_fee" placeholder="Amount" value="<?php echo $result["tuiton_fee"]; ?>" disabled readonly />
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fas fa-dollar-sign"></i> Total Fee
									</div>
<?php 
$stmt1 = $bruh->query("
SELECT 
table_student_info.id,
table_student_cor.totaltuiton_fee 
FROM table_student_cor 
LEFT JOIN table_student_info ON table_student_info.id = table_student_cor.studentinfoid
WHERE studentinfoid = ".$row['id']);
$result = $stmt1->fetch(PDO::FETCH_ASSOC);
?><input style="text-align:center; font-size:small; background-color:#000000;" type="number" name="totaltuiton_fee" placeholder="Amount" value="<?php echo $result["totaltuiton_fee"]; ?>" disabled readonly />
								</div>
							</div>
							<div class="row">
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-dollar-sign"></i> 15% Surcharge
										</div>
<?php 
$stmt1 = $bruh->query("
SELECT 
table_student_info.id,
table_student_cor.surcharge 
FROM table_student_cor 
LEFT JOIN table_student_info ON table_student_info.id = table_student_cor.studentinfoid
WHERE studentinfoid = ".$row['id']);
$result = $stmt1->fetch(PDO::FETCH_ASSOC);
?>
<input style="text-align:center; font-size:small; background-color:#000000;" type="number" name="surcharge" placeholder="Amount" value="<?php echo $result["surcharge"]; ?>" disabled readonly />
									</div>
								</div>
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-dollar-sign"></i> Prelim
										</div>
<?php 
$stmt1 = $bruh->query("
SELECT 
table_student_info.id,
table_student_cor.prelim_date 
FROM table_student_cor 
LEFT JOIN table_student_info ON table_student_info.id = table_student_cor.studentinfoid
WHERE studentinfoid = ".$row['id']);
$result = $stmt1->fetch(PDO::FETCH_ASSOC);
?>
<input style="text-align:center; font-size:small; background-color:#000000;" type="date" name="prelim_date" placeholder="Due Date" value="<?php echo $result["prelim_date"]; ?>" disabled readonly />
<?php 
$stmt1 = $bruh->query("
SELECT 
table_student_info.id,
table_student_cor.prelim_installment 
FROM table_student_cor 
LEFT JOIN table_student_info ON table_student_info.id = table_student_cor.studentinfoid
WHERE studentinfoid = ".$row['id']);
$result = $stmt1->fetch(PDO::FETCH_ASSOC);
?>
<input style="text-align:center; font-size:small; background-color:#000000;" type="number" name="prelim_installment" placeholder="Amount" value="<?php echo $result["prelim_installment"]; ?>" disabled readonly />
									</div>
								</div>
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-dollar-sign"></i> Midterm
										</div>
<?php 
$stmt1 = $bruh->query("
SELECT 
table_student_info.id,
table_student_cor.midterm_date 
FROM table_student_cor 
LEFT JOIN table_student_info ON table_student_info.id = table_student_cor.studentinfoid
WHERE studentinfoid = ".$row['id']);
$result = $stmt1->fetch(PDO::FETCH_ASSOC);
?>
<input style="text-align:center; font-size:small; background-color:#000000;" type="date" name="midterm_date" placeholder="Due Date" value="<?php echo $result["midterm_date"]; ?>" disabled readonly />
<?php 
$stmt1 = $bruh->query("
SELECT 
table_student_info.id,
table_student_cor.midterm_installment 
FROM table_student_cor 
LEFT JOIN table_student_info ON table_student_info.id = table_student_cor.studentinfoid
WHERE studentinfoid = ".$row['id']);
$result = $stmt1->fetch(PDO::FETCH_ASSOC);
?>
<input style="text-align:center; font-size:small; background-color:#000000;" type="number" name="midterm_installment" placeholder="Amount" value="<?php echo $result["midterm_installment"]; ?>" disabled readonly />
									</div>
								</div>
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-dollar-sign"></i> Final
										</div>
<?php 
$stmt1 = $bruh->query("
SELECT 
table_student_info.id,
table_student_cor.finals_date 
FROM table_student_cor 
LEFT JOIN table_student_info ON table_student_info.id = table_student_cor.studentinfoid
WHERE studentinfoid = ".$row['id']);
$result = $stmt1->fetch(PDO::FETCH_ASSOC);
?>
<input style="text-align:center; font-size:small; background-color:#000000;" type="date" name="finals_date" placeholder="Due Date" value="<?php echo $result["finals_date"]; ?>" disabled readonly />
<?php 
$stmt1 = $bruh->query("
SELECT 
table_student_info.id,
table_student_cor.finals_installment 
FROM table_student_cor 
LEFT JOIN table_student_info ON table_student_info.id = table_student_cor.studentinfoid
WHERE studentinfoid = ".$row['id']);
$result = $stmt1->fetch(PDO::FETCH_ASSOC);
?>
<input style="text-align:center; font-size:small; background-color:#000000;" type="number" name="finals_installment" placeholder="Amount" value="<?php echo $result["finals_installment"]; ?>" disabled readonly />
									</div>
								</div>
							</div>
							<!--  -->
                            <br/>
<?php } ?>
                        </form>
<!------------------------------------------------------------------------------------->
                    </div>
                </div>
            </section>
<!------------------------------------------------------------------------------------->
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
</html