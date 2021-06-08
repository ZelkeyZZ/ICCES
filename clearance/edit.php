<?php 
	session_start();
	include "../inc/func.php";
	include "../inc/config-inc.php";
	include "../inc/clearance/cedit-inc.php";
 
	// Check if the user is logged in, if not then redirect him to login page
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["status"] !== "Active"){
		header("location: ../user/logout.php");
		exit;
	}
	
	if($_SESSION['userrank'] == "STUDENT"){
	} 	else if($_SESSION['userrank'] !== "STUDENT") {
			header("location: ../user/overview");
			exit;
		}
?>

<!DOCTYPE HTML> 
<html> 
    <head> 
        <title>ICCES | Edit My Clearance</title>         
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
							<a href="../clearance/list"><span>Return</span></a>
						</li>
					</ul>
                </nav>
            </header>
            <!-- Banner -->
            <section id="banner" style="height:100%;">
                <div class="inner">
                    <br/>
                    <h2>Edit My Clearance</h2>
                    <div class="login-wrap">
						<?php if ($msg): ?>
						<p><?=$msg?></p>
						<?php endif; ?>
						<form action="edit.php?studentinfoid=<?=$clearance['studentinfoid']?>" method="post">
<!------------------------------------------------------------------------------------->
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-user"></i> Student ID
									</div>
									<input style="text-align:center; font-size:small;" type="text" value="<?=$clearance['studentid']?>" disabled readonly>
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
									<input style="text-align:center; font-size:small;" type="text" value="<?=$clearance['studentname']?>" disabled readonly>
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
										<input style="text-align:center; font-size:small;" type="text" value="<?=$clearance['course_type']; ?>" disabled readonly>
									</div>
								</div>
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-user-graduate"></i> Year Level
										</div>
										<input style="text-align:center; font-size:small;" type="text" name="yearlevel" value="<?=$clearance['yearlevel']; ?>" disabled readonly>
									</div>
								</div>
							</div>
                            <!--  -->
                            <br/>
<!------------------------------------------------------------------------------------->
							<!-- Library/Services -->
							<div class="row">
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-user-tie"></i> Library
										</div>
										<?php	
										if($clearance['library_status'] == "Not Cleared"){
											print '<input style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" name="library_status" type="text" value="';echo $clearance["library_status"]; print'" readonly>';
										} else if ($clearance['library_status'] == "Cleared"){
											print '<input style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" name="library_status" type="text" value="';echo $clearance["library_status"]; print'" readonly>';
										} 
										?>
									</div>
								</div>
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-user-cog"></i> Services
										</div>
										<?php 	
										if($clearance['services_status'] == "Not Cleared"){
											print '<input style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" name="services_status" type="text" value="';echo $clearance["services_status"]; print'" readonly>';
										} else if ($clearance['services_status'] == "Cleared"){
											print '<input style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" name="services_status" type="text" value="';echo $clearance["services_status"]; print'" readonly>';
										}
										?>
									</div>
								</div>
							</div>
							<!--  -->
                            <br/>
<!------------------------------------------------------------------------------------->
							<!-- Guidance/Cashier -->
							<div class="row">
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
												<i class="fas fa-user-shield"></i> Guidance
											</div>
										<?php 
										if($clearance['guidance_status'] == "Not Cleared"){
											print '<input style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" name="guidance_status" type="text" value="';echo $clearance["guidance_status"]; print'" readonly>';
										} else if ($clearance['guidance_status'] == "Cleared"){
											print '<input style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" name="guidance_status" type="text" value="';echo $clearance["guidance_status"]; print'" readonly>';
										}
										?>
									</div>
								</div>
								
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-user-edit"></i> Cashier
										</div>
										<?php 	
										if($clearance['cashier_status'] == "Not Cleared"){
											print '<input style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" name="cashier_status" type="text" value="';echo $clearance["cashier_status"]; print'" readonly>';
										} else if ($clearance['cashier_status'] == "Cleared"){
											print '<input style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" name="cashier_status" type="text" value="';echo $clearance["cashier_status"]; print'" readonly>';
										} 
										?>
									</div>
								</div>
							</div>
							<!--  -->
                            <br/>
<!------------------------------------------------------------------------------------->
							<!-- Student Affair/Registrar -->
							<div class="row">
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-user-tie"></i> Student Affair
										</div>
										<?php 
										if($clearance['studentaffair_status'] == "Not Cleared"){
											print '<input style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" name="studentaffair_status" type="text" value="';echo $clearance["studentaffair_status"]; print'" readonly>';
										} else if ($clearance['studentaffair_status'] == "Cleared"){
											print '<input style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" name="studentaffair_status" type="text" value="';echo $clearance["studentaffair_status"]; print'" readonly>';
										} 
										?>
									</div>
								</div>
								
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-user-plus"></i> Registrar
										</div>
										<?php 	
										if($clearance['registrar_status'] == "Not Cleared"){
											print '<input style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" name="registrar_status" type="text" value="';echo $clearance["registrar_status"]; print'" readonly>';
										} else if ($clearance['registrar_status'] == "Cleared"){
											print '<input style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" name="registrar_status" type="text" value="';echo $clearance["registrar_status"]; print'" readonly>';
										}
										?>
									</div>
								</div>
							</div>
							<!--  -->
                            <br/>
<!------------------------------------------------------------------------------------->
							<!--Clinic/School Admin -->
							<div class="row">
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-user-nurse"></i> Clinic
										</div>
										<?php 
										if($clearance['clinic_status'] == "Not Cleared"){
											print '<input style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" name="clinic_status" type="text" value="';echo $clearance["clinic_status"]; print'" readonly>';
										} else if ($clearance['clinic_status'] == "Cleared"){
											print '<input style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" name="clinic_status" type="text" value="';echo $clearance["clinic_status"]; print'" readonly>';
										} 
										?>
									</div>
								</div>
								
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-user-lock"></i> School Admin
										</div>
										<?php 	
										if($clearance['schooladmin_status'] == "Not Cleared"){
											print '<input style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" name="schooladmin_status" type="text" value="';echo $clearance["schooladmin_status"]; print'" readonly>';
										} else if ($clearance['schooladmin_status'] == "Cleared"){
											print '<input style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" name="schooladmin_status" type="text" value="';echo $clearance["schooladmin_status"]; print'" readonly>';
										} 
										?>
									</div>
								</div>
							</div>
                            <!--  -->
							<br/>
<!------------------------------------------------------------------------------------->
							<!--Instructor1/2 -->
							<div class="row">
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-user-tie"></i> Instructor 1
										</div>
										<?php if($clearance["instructor1_name"] == "NONE"){?>
										<input style="text-align:center; font-size:x-small;" type="text" name="instructor1_name" placeholder="Instructor Name "class="form-control" value="<?php echo $clearance["instructor1_name"]; ?>" readonly>
										<?php } elseif($clearance["instructor1_name"] !== "NONE"){?>
										<?php 
										$stmt = $bruh->prepare("SELECT concat(table_employee_info.firstname, ' ', table_employee_info.initials, ' ', table_employee_info.lastname) AS NAME FROM table_employee_info LEFT JOIN table_users ON table_employee_info.userid = table_users.id WHERE table_users.userrank = 'INSTRUCTOR'");
										$stmt->execute();
										?>
										<select style="text-align:center; font-size:x-small; background-color:#3e4142;" name="instructor1_name" class="form-control  <?php echo (!empty($instructorname)) ? 'is-invalid' : ''; ?>">
											<option value="<?php echo $clearance["instructor1_name"]; ?>">Selected : <?php echo $clearance["instructor1_name"]; ?></option>
										<?php foreach($stmt->fetchAll() as $instructors) { ?>
											<option value="<?php echo $instructors[0];?>"><?php echo $instructors[0];?></option>
										<?php } ?>
										</select>
										<?php }?>
										<input style="text-align:center; font-size:x-small;" type="text" name="instructor1_subject" placeholder="Subject Code" class="form-control" value="<?php echo $clearance["instructor1_subject"]; ?>" disabled readonly>
										<?php 	
										if($clearance['instructor1_status'] == "Not Cleared"){
											print '<input style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" name="instructor1_status" type="text" value="';echo $clearance["instructor1_status"]; print'" readonly>';
										} else if ($clearance['instructor1_status'] == "Cleared"){
											print '<input style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" name="instructor1_status" type="text" value="';echo $clearance["instructor1_status"]; print'" readonly>';
										}
										?>
									</div>
								</div>
								
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-user-tie"></i> Instructor 2
										</div>
										<?php if($clearance["instructor2_name"] == "NONE"){?>
										<input style="text-align:center; font-size:x-small;" type="text" name="instructor2_name" placeholder="Instructor Name "class="form-control" value="<?php echo $clearance["instructor2_name"]; ?>" readonly>
										<?php } elseif($clearance["instructor2_name"] !== "NONE"){?>
										<?php 
										$stmt = $bruh->prepare("SELECT concat(table_employee_info.firstname, ' ', table_employee_info.initials, ' ', table_employee_info.lastname) AS NAME FROM table_employee_info LEFT JOIN table_users ON table_employee_info.userid = table_users.id WHERE table_users.userrank = 'INSTRUCTOR'");
										$stmt->execute();
										?>
										<select style="text-align:center; font-size:x-small; background-color:#3e4142;" name="instructor2_name" class="form-control  <?php echo (!empty($instructorname)) ? 'is-invalid' : ''; ?>">
											<option value="<?php echo $clearance["instructor2_name"]; ?>">Selected : <?php echo $clearance["instructor2_name"]; ?></option>
										<?php foreach($stmt->fetchAll() as $instructors) { ?>
											<option value="<?php echo $instructors[0];?>"><?php echo $instructors[0];?></option>
										<?php } ?>
										</select>
										<?php }?>
										
										<input style="text-align:center; font-size:x-small;" type="text" name="instructor2_subject" placeholder="Subject Code" class="form-control" value="<?php echo $clearance["instructor2_subject"]; ?>" disabled readonly>
										
										<?php 	
										if($clearance['instructor2_status'] == "Not Cleared"){
											print '<input style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" name="instructor2_status" type="text" value="';echo $clearance["instructor2_status"]; print'" readonly>';
										} else if ($clearance['instructor2_status'] == "Cleared"){
											print '<input style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" name="instructor2_status" type="text" value="';echo $clearance["instructor2_status"]; print'" readonly>';
										} else if ($clearance['instructor2_status'] == "None"){
											print '<input style="text-align:center; color:#ffffff; background-color:#000000; font-size:small;" name="instructor2_status" type="text" value="';echo $clearance["instructor2_status"]; print'" readonly>';
										}
										?>
									</div>
								</div>
							</div>
                            <!--  -->
							<br/>
<!------------------------------------------------------------------------------------->
							<!--Instructor3/4 -->
							<div class="row">
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-user-tie"></i> Instructor 3
										</div>
										<?php if($clearance["instructor3_name"] == "NONE"){?>
										<input style="text-align:center; font-size:x-small;" type="text" name="instructor3_name" placeholder="Instructor Name "class="form-control" value="<?php echo $clearance["instructor3_name"]; ?>" readonly>
										<?php } elseif($clearance["instructor3_name"] !== "NONE"){?>
										<?php 
										$stmt = $bruh->prepare("SELECT concat(table_employee_info.firstname, ' ', table_employee_info.initials, ' ', table_employee_info.lastname) AS NAME FROM table_employee_info LEFT JOIN table_users ON table_employee_info.userid = table_users.id WHERE table_users.userrank = 'INSTRUCTOR'");
										$stmt->execute();
										?>
										<select style="text-align:center; font-size:x-small; background-color:#3e4142;" name="instructor3_name" class="form-control  <?php echo (!empty($instructorname)) ? 'is-invalid' : ''; ?>">
											<option value="<?php echo $clearance["instructor3_name"]; ?>">Selected : <?php echo $clearance["instructor3_name"]; ?></option>
										<?php foreach($stmt->fetchAll() as $instructors) { ?>
											<option value="<?php echo $instructors[0];?>"><?php echo $instructors[0];?></option>
										<?php } ?>
										</select>
										<?php }?>
										
										<input style="text-align:center; font-size:x-small;" type="text" name="instructor3_subject" placeholder="Subject Code" class="form-control" value="<?php echo $clearance["instructor3_subject"]; ?>" disabled readonly>
										
										<?php 	
										if($clearance['instructor3_status'] == "Not Cleared"){
											print '<input style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" name="instructor3_status" type="text" value="';echo $clearance["instructor3_status"]; print'" readonly>';
										} else if ($clearance['instructor3_status'] == "Cleared"){
											print '<input style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" name="instructor3_status" type="text" value="';echo $clearance["instructor3_status"]; print'" readonly>';
										} else if ($clearance['instructor3_status'] == "None"){
											print '<input style="text-align:center; color:#ffffff; background-color:#000000; font-size:small;" name="instructor3_status" type="text" value="';echo $clearance["instructor3_status"]; print'" readonly>';
										} 
										?>
									</div>
								</div>
								
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-user-tie"></i> Instructor 4
										</div>
										<?php if($clearance["instructor4_name"] == "NONE"){?>
										<input style="text-align:center; font-size:x-small;" type="text" name="instructor4_name" placeholder="Instructor Name "class="form-control" value="<?php echo $clearance["instructor4_name"]; ?>" readonly>
										<?php } elseif($clearance["instructor4_name"] !== "NONE"){?>
										<?php 
										$stmt = $bruh->prepare("SELECT concat(table_employee_info.firstname, ' ', table_employee_info.initials, ' ', table_employee_info.lastname) AS NAME FROM table_employee_info LEFT JOIN table_users ON table_employee_info.userid = table_users.id WHERE table_users.userrank = 'INSTRUCTOR'");
										$stmt->execute();
										?>
										<select style="text-align:center; font-size:x-small; background-color:#3e4142;" name="instructor4_name" class="form-control  <?php echo (!empty($instructorname)) ? 'is-invalid' : ''; ?>">
											<option value="<?php echo $clearance["instructor4_name"]; ?>">Selected : <?php echo $clearance["instructor4_name"]; ?></option>
										<?php foreach($stmt->fetchAll() as $instructors) { ?>
											<option value="<?php echo $instructors[0];?>"><?php echo $instructors[0];?></option>
										<?php } ?>
										</select>
										<?php }?>
										
										<input style="text-align:center; font-size:x-small;" type="text" name="instructor4_subject" placeholder="Subject Code" class="form-control" value="<?php echo $clearance["instructor4_subject"]; ?>" disabled readonly>
										
										<?php 	
										if($clearance['instructor4_status'] == "Not Cleared"){
											print '<input style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" name="instructor4_status" type="text" value="';echo $clearance["instructor4_status"]; print'" readonly>';
										} else if ($clearance['instructor4_status'] == "Cleared"){
											print '<input style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" name="instructor4_status" type="text" value="';echo $clearance["instructor4_status"]; print'" readonly>';
										} else if ($clearance['instructor4_status'] == "None"){
											print '<input style="text-align:center; color:#ffffff; background-color:#000000; font-size:small;" name="instructor4_status" type="text" value="';echo $clearance["instructor4_status"]; print'" readonly>';
										}
										?>
									</div>
								</div>
							</div>
                            <!--  -->
							<br/>
<!------------------------------------------------------------------------------------->
							<!--Instructor5/6 -->
							<div class="row">
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-user-tie"></i> Instructor 5
										</div>
										<?php if($clearance["instructor5_name"] == "NONE"){?>
										<input style="text-align:center; font-size:x-small;" type="text" name="instructor5_name" placeholder="Instructor Name "class="form-control" value="<?php echo $clearance["instructor5_name"]; ?>" readonly>
										<?php } elseif($clearance["instructor5_name"] !== "NONE"){?>
										<?php 
										$stmt = $bruh->prepare("SELECT concat(table_employee_info.firstname, ' ', table_employee_info.initials, ' ', table_employee_info.lastname) AS NAME FROM table_employee_info LEFT JOIN table_users ON table_employee_info.userid = table_users.id WHERE table_users.userrank = 'INSTRUCTOR'");
										$stmt->execute();
										?>
										<select style="text-align:center; font-size:x-small; background-color:#3e4142;" name="instructor5_name" class="form-control  <?php echo (!empty($instructorname)) ? 'is-invalid' : ''; ?>">
											<option value="<?php echo $clearance["instructor5_name"]; ?>">Selected : <?php echo $clearance["instructor5_name"]; ?></option>
										<?php foreach($stmt->fetchAll() as $instructors) { ?>
											<option value="<?php echo $instructors[0];?>"><?php echo $instructors[0];?></option>
										<?php } ?>
										</select>
										<?php }?>
										
										<input style="text-align:center; font-size:x-small;" type="text" name="instructor5_subject" placeholder="Subject Code" class="form-control" value="<?php echo $clearance["instructor5_subject"]; ?>" disabled readonly>
										
										<?php 	
										if($clearance['instructor5_status'] == "Not Cleared"){
											print '<input style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" name="instructor5_status" type="text" value="';echo $clearance["instructor5_status"]; print'" readonly>';
										} else if ($clearance['instructor5_status'] == "Cleared"){
											print '<input style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" name="instructor5_status" type="text" value="';echo $clearance["instructor5_status"]; print'" readonly>';
										} else if ($clearance['instructor5_status'] == "None"){
											print '<input style="text-align:center; color:#ffffff; background-color:#000000; font-size:small;" name="instructor5_status" type="text" value="';echo $clearance["instructor5_status"]; print'" readonly>';
										}
										?>
									</div>
								</div>
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-user-tie"></i> Instructor 6
										</div>
										<?php if($clearance["instructor6_name"] == "NONE"){?>
										<input style="text-align:center; font-size:x-small;" type="text" name="instructor6_name" placeholder="Instructor Name "class="form-control" value="<?php echo $clearance["instructor6_name"]; ?>" readonly>
										<?php } elseif($clearance["instructor6_name"] !== "NONE"){?>
										<?php 
										$stmt = $bruh->prepare("SELECT concat(table_employee_info.firstname, ' ', table_employee_info.initials, ' ', table_employee_info.lastname) AS NAME FROM table_employee_info LEFT JOIN table_users ON table_employee_info.userid = table_users.id WHERE table_users.userrank = 'INSTRUCTOR'");
										$stmt->execute();
										?>
										<select style="text-align:center; font-size:x-small; background-color:#3e4142;" name="instructor6_name" class="form-control  <?php echo (!empty($instructorname)) ? 'is-invalid' : ''; ?>">
											<option value="<?php echo $clearance["instructor6_name"]; ?>">Selected : <?php echo $clearance["instructor6_name"]; ?></option>
										<?php foreach($stmt->fetchAll() as $instructors) { ?>
											<option value="<?php echo $instructors[0];?>"><?php echo $instructors[0];?></option>
										<?php } ?>
										</select>
										<?php }?>
										
										<input style="text-align:center; font-size:x-small;" type="text" name="instructor6_subject" placeholder="Subject Code" class="form-control" value="<?php echo $clearance["instructor6_subject"]; ?>" disabled readonly>
										
										<?php 	
										if($clearance['instructor6_status'] == "Not Cleared"){
											print '<input style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" name="instructor6_status" type="text" value="';echo $clearance["instructor6_status"]; print'" readonly>';
										} else if ($clearance['instructor6_status'] == "Cleared"){
											print '<input style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" name="instructor6_status" type="text" value="';echo $clearance["instructor6_status"]; print'" readonly>';
										} else if ($clearance['instructor6_status'] == "None"){
											print '<input style="text-align:center; color:#ffffff; background-color:#000000; font-size:small;" name="instructor6_status" type="text" value="';echo $clearance["instructor6_status"]; print'" readonly>';
										}
										?>
									</div>
								</div>
							</div>
                            <!--  -->
							<br/>
<!------------------------------------------------------------------------------------->
							<!--Instructor7/8 -->
							<div class="row">
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-user-tie"></i> Instructor 7
										</div>
										<?php if($clearance["instructor7_name"] == "NONE"){?>
										<input style="text-align:center; font-size:x-small;" type="text" name="instructor7_name" placeholder="Instructor Name "class="form-control" value="<?php echo $clearance["instructor7_name"]; ?>" readonly>
										<?php } elseif($clearance["instructor7_name"] !== "NONE"){?>
										<?php 
										$stmt = $bruh->prepare("SELECT concat(table_employee_info.firstname, ' ', table_employee_info.initials, ' ', table_employee_info.lastname) AS NAME FROM table_employee_info LEFT JOIN table_users ON table_employee_info.userid = table_users.id WHERE table_users.userrank = 'INSTRUCTOR'");
										$stmt->execute();
										?>
										<select style="text-align:center; font-size:x-small; background-color:#3e4142;" name="instructor7_name" class="form-control  <?php echo (!empty($instructorname)) ? 'is-invalid' : ''; ?>">
											<option value="<?php echo $clearance["instructor7_name"]; ?>">Selected : <?php echo $clearance["instructor7_name"]; ?></option>
										<?php foreach($stmt->fetchAll() as $instructors) { ?>
											<option value="<?php echo $instructors[0];?>"><?php echo $instructors[0];?></option>
										<?php } ?>
										</select>
										<?php }?>
										
										<input style="text-align:center; font-size:x-small;" type="text" name="instructor7_subject" placeholder="Subject Code" class="form-control" value="<?php echo $clearance["instructor7_subject"]; ?>" disabled readonly>
										
										<?php 	
										if($clearance['instructor7_status'] == "Not Cleared"){
											print '<input style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" name="instructor7_status" type="text" value="';echo $clearance["instructor7_status"]; print'" readonly>';
										} else if ($clearance['instructor7_status'] == "Cleared"){
											print '<input style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" name="instructor7_status" type="text" value="';echo $clearance["instructor7_status"]; print'" readonly>';
										} else if ($clearance['instructor7_status'] == "None"){
											print '<input style="text-align:center; color:#ffffff; background-color:#000000; font-size:small;" name="instructor7_status" type="text" value="';echo $clearance["instructor7_status"]; print'" readonly>';
										}
										?>
									</div>
								</div>
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-user-tie"></i> Instructor 8
										</div>
										<?php if($clearance["instructor8_name"] == "NONE"){?>
										<input style="text-align:center; font-size:x-small;" type="text" name="instructor8_name" placeholder="Instructor Name "class="form-control" value="<?php echo $clearance["instructor8_name"]; ?>" readonly>
										<?php } elseif($clearance["instructor8_name"] !== "NONE"){?>
										<?php 
										$stmt = $bruh->prepare("SELECT concat(table_employee_info.firstname, ' ', table_employee_info.initials, ' ', table_employee_info.lastname) AS NAME FROM table_employee_info LEFT JOIN table_users ON table_employee_info.userid = table_users.id WHERE table_users.userrank = 'INSTRUCTOR'");
										$stmt->execute();
										?>
										<select style="text-align:center; font-size:x-small; background-color:#3e4142;" name="instructor8_name" class="form-control  <?php echo (!empty($instructorname)) ? 'is-invalid' : ''; ?>">
											<option value="<?php echo $clearance["instructor8_name"]; ?>">Selected : <?php echo $clearance["instructor8_name"]; ?></option>
										<?php foreach($stmt->fetchAll() as $instructors) { ?>
											<option value="<?php echo $instructors[0];?>"><?php echo $instructors[0];?></option>
										<?php } ?>
										</select>
										<?php }?>
										
										<input style="text-align:center; font-size:x-small;" type="text" name="instructor8_subject" placeholder="Subject Code" class="form-control" value="<?php echo $clearance["instructor8_subject"]; ?>" disabled readonly>
										
										<?php 	
										if($clearance['instructor8_status'] == "Not Cleared"){
											print '<input style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" name="instructor8_status" type="text" value="';echo $clearance["instructor8_status"]; print'" readonly>';
										} else if ($clearance['instructor8_status'] == "Cleared"){
											print '<input style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" name="instructor8_status" type="text" value="';echo $clearance["instructor8_status"]; print'" readonly>';
										} else if ($clearance['instructor8_status'] == "None"){
											print '<input style="text-align:center; color:#ffffff; background-color:#000000; font-size:small;" name="instructor8_status" type="text" value="';echo $clearance["instructor8_status"]; print'" readonly>';
										}
										?>
									</div>
								</div>
							</div>
                            <!--  -->
							<br/>
<!------------------------------------------------------------------------------------->
							<!-- Clearance Status -->
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">
                                        <i class="fas fa-tasks"></i> Clearance Status
                                    </div>
									<?php 	
									if($clearance['clearance_status'] == "Incomplete"){
										print '<input style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" name="clearance_status" type="text" value="';echo $clearance["clearance_status"]; print'" readonly>';
									} else if ($clearance['clearance_status'] == "Completed"){
										print '<input style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" name="clearance_status" type="text" value="';echo $clearance["clearance_status"]; print'" readonly>';
									}
									?>
                                </div>
                            </div>
							<!--  -->
							<br/>
<!------------------------------------------------------------------------------------->
							<p>
							<?php
								echo "Last Edited by ".$clearance['editorname']." - ".$clearance['editorrank']."";
								echo '<br/>';
								echo "on ".$clearance['datesigned']."";
							?>
							</p>
<!------------------------------------------------------------------------------------->
							<ul class="actions special">
								<li>
									<button type="submit" class="button primary" value="submit" name="Submit"><i class="fas fa-pencil-alt"></i> Update Clearance </button>
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
    </body>
</html>