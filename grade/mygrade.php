<?php
	session_start();
	require_once "../inc/config-inc.php";
	
	// Check if the user is logged in, if not then redirect him to login page
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
		header("location: ../user/login");
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
        <title>ICCES | Create Clearance</title>         
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
    <body class="landing is-preload">
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
			<section id="banner" style="overflow:auto">
				<h2>My Grades</h2>
				<?php 
					$sql = "SELECT table_student_grade.id, concat(table_subjects.subject_code, ' : ', table_subjects.subject_name) as subjects_name, table_student_grade.prelim_score, table_student_grade.midterm_score, table_student_grade.finals_score, table_student_grade.average_score, table_student_grade.overall_score, table_student_grade.remarks FROM table_student_grade LEFT JOIN table_subjects ON table_subjects.id = table_student_grade.sbjid WHERE table_student_grade.studentinfoid = '".$_SESSION['infoid']."'";
					if($result = $pdo->query($sql)){
						if($result->rowCount() > 0){
				?>
					<table>
						<thead>
							<tr>
								<td>Subjects</td>
								<td>Prelim Grade</td>
								<td>Midterm Grade</td>
								<td>Finals Grade</td>
								<td>Average Grade</td>
								<td>Overall Grade</td>
								<td>Grade Remark</td>
								<td></td>
							</tr>
						</thead>
						<tbody>
					<?php 	while($row = $result->fetch()){ ?>
							<tr>
							
								<td><?php echo $row["subjects_name"];?></td>
								<td><?php echo $row["prelim_score"];?></td>
								<td><?php echo $row["midterm_score"];?></td>
								<td><?php echo $row["finals_score"];?></td>
								<td><?php echo $row["average_score"];?></td>
								<td><?php echo $row["overall_score"];?></td>
								<td><?php echo $row["remarks"];?></td>
								<td><a href="../grade/edit.php?id=<?=$row['id']?>"><span class="fas fa-pen"></span></a></td>
							</tr>
					<?php 	} unset($result);?>
						</tbody>
					</table>
					<?php
						}	else { 
					?>
					<div class="alert alert-danger"><em>No records were found.</em></div>
					<?php
							}
					}	else {
								echo "Oops! Something went wrong. Please try again later.";
						} unset($pdo);
					?>
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