<?php 
	session_start();
	include "../inc/info/studentcor-inc.php";
 
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
        <title>ICCES | C.O.R Creation</title>         
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
        <!-- Banner -->
        <section id="banner" style="height:100%;">
            <div class="inner">
                <br/>
                <h2> C.O.R Creation </h2>
                <div class="login-wrap">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <!-- Student ID -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-user"></i> Student ID
                            </div>
                            <?php 
$stmt = $bruh->prepare("
SELECT 
table_student_info.id, concat(table_student_info.lastname,', ',table_student_info.firstname,' ',table_student_info.initials) AS fullname,
table_student_info.studenttype, table_student_info.schoolyear, 
table_courses.course_type, table_yearlevel.yearlevel, 
table_semester.semesters
FROM table_student_info 
LEFT JOIN table_courses ON table_courses.id = table_student_info.courseid 
LEFT JOIN table_yearlevel ON table_yearlevel.id = table_student_info.yearid 
LEFT JOIN table_semester ON table_semester.id = table_student_info.semesterid");
$stmt->execute();
							?>
							<select style="text-align:center; font-size:x-small; background-color:#3e4142;" name="studentinfoid" class="form-control">
								<option value="">STUDENT SELECTION</option>
							<?php foreach($stmt->fetchAll() as $students) { ?>
								<option value="<?php echo $students[0];?>"><?php echo $students[1],' ',$students[2],' Student, School Year: ',$students[3],', Course: ',$students[4],', ',$students[5],', ',$students[6];?></option>
							<?php } ?>
							</select>
                        </div>
                    </div>
					<!--  -->
                    <br/>
                    <!-- Button -->
                    <ul class="actions special">
                        <li>
                            <button type="submit" class="button primary"><i class="fa fa-check"></i>Create</button>
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