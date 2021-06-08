<?php 
	session_start();
	include "../inc/func.php";
	include "../inc/config-inc.php";
	include "../inc/clearance/csign-inc.php";
 
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
        <title>ICCES | Sign Student Clearance</title>         
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
                    <h2>Update Student Clearance</h2>
                    <div class="login-wrap">
						<?php if ($msg): ?>
						<p><?=$msg?></p>
						<?php endif; ?>
						<form action="sign.php?id=<?=$clearance['id']?>" method="post">
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
										<?php if($_SESSION['userrank'] == "LIBRARIAN"){?>
										<select style="text-align:center; background-color:gray; font-size:small;" name="library_status" class="form-control">
											<option value="Not Cleared" <?php echo ($clearance['library_status'] == 'Not Cleared') ? 'Selected' : '' ; ?>><?php echo ($clearance['library_status'] == 'Not Cleared') ? 'Selected: Not Cleared' : 'Not Cleared' ; ?></option>
											<option value="Cleared" <?php echo ($clearance['library_status'] == 'Cleared') ? 'Selected' : '' ; ?>><?php echo ($clearance['library_status'] == 'Cleared') ? 'Selected: Cleared' : 'Cleared' ; ?></option>
										</select>
										<?php } elseif($_SESSION['userrank'] !== "LIBRARIAN") { 
											if($clearance['library_status'] == "Not Cleared"){
												print '<input style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" name="library_status" type="text" value="';echo $clearance["library_status"]; print'" readonly>';
											} else if ($clearance['library_status'] == "Cleared"){
												print '<input style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" name="library_status" type="text" value="';echo $clearance["library_status"]; print'" readonly>';
											}
										} ?>
									</div>
								</div>
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-user-cog"></i> Services
										</div>
										<?php if($_SESSION['userrank'] == "SERVICES"){?>
										<?php if($clearance["studentaffair_status"] == "Cleared"){?>
										<select style="text-align:center; background-color:gray; font-size:small;" name="services_status" class="form-control">
											<option value="Not Cleared" <?php echo ($clearance['services_status'] == 'Not Cleared') ? 'Selected' : '' ; ?>><?php echo ($clearance['services_status'] == 'Not Cleared') ? 'Selected: Not Cleared' : 'Not Cleared' ; ?></option>
											<option value="Cleared" <?php echo ($clearance['services_status'] == 'Cleared') ? 'Selected' : '' ; ?>><?php echo ($clearance['services_status'] == 'Cleared') ? 'Selected: Cleared' : 'Cleared' ; ?></option>
										</select>
										<?php } elseif($clearance["studentaffair_status"] == "Not Cleared"){?>
										<input style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" name="services_status" type="text" value="<?php echo $clearance["services_status"]; ?>" readonly>
										<?php } ?>
										
										<?php } elseif($_SESSION['userrank'] !== "SERVICES") { 
											if($clearance['services_status'] == "Not Cleared"){
												print '<input style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" name="services_status" type="text" value="';echo $clearance["services_status"]; print'" readonly>';
											} else if ($clearance['services_status'] == "Cleared"){
												print '<input style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" name="services_status" type="text" value="';echo $clearance["services_status"]; print'" readonly>';
											}
										} ?>
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
										<?php if($_SESSION['userrank'] == "GUIDANCE"){?>
										<?php if($clearance["clinic_status"] == "Cleared"){?>
										<select style="text-align:center; background-color:gray; font-size:small;" name="guidance_status" class="form-control">
											<option value="Not Cleared" <?php echo ($clearance['guidance_status'] == 'Not Cleared') ? 'Selected' : '' ; ?>><?php echo ($clearance['guidance_status'] == 'Not Cleared') ? 'Selected: Not Cleared' : 'Not Cleared' ; ?></option>
											<option value="Cleared" <?php echo ($clearance['guidance_status'] == 'Cleared') ? 'Selected' : '' ; ?>><?php echo ($clearance['guidance_status'] == 'Cleared') ? 'Selected: Cleared' : 'Cleared' ; ?></option>
										</select>
										<?php } elseif($clearance["clinic_status"] == "Not Cleared") { ?>
										<input style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" name="guidance_status" type="text" value="<?php echo $clearance["guidance_status"]; ?>" readonly>
										<?php } ?>
										
										<?php } elseif($_SESSION['userrank'] !== "GUIDANCE") { 
											if($clearance['guidance_status'] == "Not Cleared"){
												print '<input style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" name="guidance_status" type="text" value="';echo $clearance["guidance_status"]; print'" readonly>';
											} else if ($clearance['guidance_status'] == "Cleared"){
												print '<input style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" name="guidance_status" type="text" value="';echo $clearance["guidance_status"]; print'" readonly>';
											}
										} ?>
									</div>
								</div>
								
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-user-edit"></i> Cashier
										</div>
										<?php if($_SESSION['userrank'] == "CASHIER"){?>
										<?php if($clearance["services_status"] == "Cleared"){?>
										<select style="text-align:center; background-color:gray; font-size:small;" name="cashier_status" class="form-control">
											<option value="Not Cleared" <?php echo ($clearance['cashier_status'] == 'Not Cleared') ? 'Selected' : '' ; ?>><?php echo ($clearance['cashier_status'] == 'Not Cleared') ? 'Selected: Not Cleared' : 'Not Cleared' ; ?></option>
											<option value="Cleared" <?php echo ($clearance['cashier_status'] == 'Cleared') ? 'Selected' : '' ; ?>><?php echo ($clearance['cashier_status'] == 'Cleared') ? 'Selected: Cleared' : 'Cleared' ; ?></option>
										</select>
										<?php } elseif($clearance["services_status"] == "Not Cleared") { ?>
										<input style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" name="cashier_status" type="text" value="<?php echo $clearance["cashier_status"]; ?>" readonly>
										<?php } ?>
										
										<?php } elseif($_SESSION['userrank'] !== "CASHIER") { 
											if($clearance['cashier_status'] == "Not Cleared"){
												print '<input style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" name="cashier_status" type="text" value="';echo $clearance["cashier_status"]; print'" readonly>';
											} else if ($clearance['cashier_status'] == "Cleared"){
												print '<input style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" name="cashier_status" type="text" value="';echo $clearance["cashier_status"]; print'" readonly>';
											}
										} ?>
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
										<?php if($_SESSION['userrank'] == "STUDENTAFFAIR"){?>
										<?php if($clearance["guidance_status"] == "Cleared"){?>
										<select style="text-align:center; background-color:gray; font-size:small;" name="studentaffair_status" class="form-control">
											<option value="Not Cleared" <?php echo ($clearance['studentaffair_status'] == 'Not Cleared') ? 'Selected' : '' ; ?>><?php echo ($clearance['studentaffair_status'] == 'Not Cleared') ? 'Selected: Not Cleared' : 'Not Cleared' ; ?></option>
											<option value="Cleared" <?php echo ($clearance['studentaffair_status'] == 'Cleared') ? 'Selected' : '' ; ?>><?php echo ($clearance['studentaffair_status'] == 'Cleared') ? 'Selected: Cleared' : 'Cleared' ; ?></option>
										</select>
										<?php } elseif($clearance["guidance_status"] == "Not Cleared") { ?>
										<input style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" name="studentaffair_status" type="text" value="<?php echo $clearance["studentaffair_status"]; ?>" readonly>
										<?php } ?>
										
										<?php } elseif($_SESSION['userrank'] !== "STUDENTAFFAIR") { 
											if($clearance['studentaffair_status'] == "Not Cleared"){
												print '<input style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" name="studentaffair_status" type="text" value="';echo $clearance["studentaffair_status"]; print'" readonly>';
											} else if ($clearance['studentaffair_status'] == "Cleared"){
												print '<input style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" name="studentaffair_status" type="text" value="';echo $clearance["studentaffair_status"]; print'" readonly>';
											}
										} ?>
									</div>
								</div>
								
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-user-plus"></i> Registrar
										</div>
										<?php if($_SESSION['userrank'] == "ADMIN" || $_SESSION['userrank'] == "SUPERADMIN"){?>
										<?php if($clearance["cashier_status"] == "Cleared") {?>
										<select style="text-align:center; background-color:gray; font-size:small;" name="registrar_status" class="form-control">
											<option value="Not Cleared" <?php echo ($clearance['registrar_status'] == 'Not Cleared') ? 'Selected' : '' ; ?>><?php echo ($clearance['registrar_status'] == 'Not Cleared') ? 'Selected: Not Cleared' : 'Not Cleared' ; ?></option>
											<option value="Cleared" <?php echo ($clearance['registrar_status'] == 'Cleared') ? 'Selected' : '' ; ?>><?php echo ($clearance['registrar_status'] == 'Cleared') ? 'Selected: Cleared' : 'Cleared' ; ?></option>
										</select>
										<?php } elseif($clearance["cashier_status"] == "Not Cleared") { ?>
										<input style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" name="registrar_status" type="text" value="<?php echo $clearance["registrar_status"]; ?>" readonly>
										<?php } ?>
										
										<?php } elseif($_SESSION['userrank'] !== "ADMIN") { 
											if($clearance['registrar_status'] == "Not Cleared"){
												print '<input style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" name="registrar_status" type="text" value="';echo $clearance["registrar_status"]; print'" readonly>';
											} else if ($clearance['registrar_status'] == "Cleared"){
												print '<input style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" name="registrar_status" type="text" value="';echo $clearance["registrar_status"]; print'" readonly>';
											}
										} ?>
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
										<?php if($_SESSION['userrank'] == "CLINIC"){?>
										<?php if($clearance["library_status"] == "Cleared"){?>
										<select style="text-align:center; background-color:gray; font-size:small;" name="clinic_status" class="form-control">
											<option value="Not Cleared" <?php echo ($clearance['clinic_status'] == 'Not Cleared') ? 'Selected' : '' ; ?>><?php echo ($clearance['clinic_status'] == 'Not Cleared') ? 'Selected: Not Cleared' : 'Not Cleared' ; ?></option>
											<option value="Cleared" <?php echo ($clearance['clinic_status'] == 'Cleared') ? 'Selected' : '' ; ?>><?php echo ($clearance['clinic_status'] == 'Cleared') ? 'Selected: Cleared' : 'Cleared' ; ?></option>
										</select>
										<?php } elseif($clearance["library_status"] == "Not Cleared") { ?>
										<input style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" name="clinic_status" type="text" value="<?php echo $clearance["clinic_status"]; ?>" readonly>
										<?php } ?>
										
										<?php } elseif($_SESSION['userrank'] !== "CLINIC") { 
											if($clearance['clinic_status'] == "Not Cleared"){
												print '<input style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" name="clinic_status" type="text" value="';echo $clearance["clinic_status"]; print'" readonly>';
											} else if ($clearance['clinic_status'] == "Cleared"){
												print '<input style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" name="clinic_status" type="text" value="';echo $clearance["clinic_status"]; print'" readonly>';
											}
										} ?>
									</div>
								</div>
								
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-user-lock"></i> School Admin
										</div>
										<?php if($_SESSION['userrank'] == "SCHOOLADMIN"){?>
										<?php if($clearance["registrar_status"] == "Cleared"){?>
										<select style="text-align:center; background-color:gray; font-size:small;" name="schooladmin_status" class="form-control">
											<option value="Not Cleared" <?php echo ($clearance['schooladmin_status'] == 'Not Cleared') ? 'Selected' : '' ; ?>><?php echo ($clearance['schooladmin_status'] == 'Not Cleared') ? 'Selected: Not Cleared' : 'Not Cleared' ; ?></option>
											<option value="Cleared" <?php echo ($clearance['schooladmin_status'] == 'Cleared') ? 'Selected' : '' ; ?>><?php echo ($clearance['schooladmin_status'] == 'Cleared') ? 'Selected: Cleared' : 'Cleared' ; ?></option>
										</select>
										<?php } elseif($clearance["registrar_status"] == "Not Cleared") { ?>
										<input style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" name="schooladmin_status" type="text" value="<?php echo $clearance["schooladmin_status"]; ?>" readonly>
										<?php } ?>
										
										<?php } elseif($_SESSION['userrank'] !== "SCHOOLADMIN") { 
											if($clearance['schooladmin_status'] == "Not Cleared"){
												print '<input style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" name="schooladmin_status" type="text" value="';echo $clearance["schooladmin_status"]; print'" readonly>';
											} else if ($clearance['schooladmin_status'] == "Cleared"){
												print '<input style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" name="schooladmin_status" type="text" value="';echo $clearance["schooladmin_status"]; print'" readonly>';
											}
										} ?>
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
										<input style="text-align:center; font-size:x-small;" type="text" name="instructor1_name" placeholder="Instructor Name "class="form-control" value="<?php echo $clearance["instructor1_name"]; ?>" disabled readonly>
										<input style="text-align:center; font-size:x-small;" type="text" name="instructor1_subject" placeholder="Subject Code" class="form-control" value="<?php echo $clearance["instructor1_subject"]; ?>" disabled readonly>
										
										<?php if($_SESSION['fullname'] == $clearance["instructor1_name"] && $_SESSION['userrank'] == "INSTRUCTOR"){?>
										<?php if($clearance["services_status"] == "Cleared"){?>
										<select style="text-align:center; background-color:gray; font-size:small;" name="instructor1_status" class="form-control">
											<option value="Not Cleared" <?php echo ($clearance['instructor1_status'] == 'Not Cleared') ? 'Selected' : '' ; ?>><?php echo ($clearance['instructor1_status'] == 'Not Cleared') ? 'Selected: Not Cleared' : 'Not Cleared' ; ?></option>
											<option value="Cleared" <?php echo ($clearance['instructor1_status'] == 'Cleared') ? 'Selected' : '' ; ?>><?php echo ($clearance['instructor1_status'] == 'Cleared') ? 'Selected: Cleared' : 'Cleared' ; ?></option>
										</select>
										<?php } elseif($clearance["services_status"] == "Not Cleared") { ?>
										<input style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" name="instructor1_status" type="text" value="<?php echo $clearance["instructor1_status"]; ?>" readonly>
										<?php } elseif($clearance["services_status"] == "None") { ?>
										<input style="text-align:center; color:#ffffff; background-color:#000000; font-size:small;" name="instructor1_status" type="text" value="<?php echo $clearance["instructor1_status"]; ?>" readonly>
										<?php } ?>
										
										<?php } elseif($_SESSION['fullname'] !== $clearance["instructor1_name"] || $_SESSION['userrank'] !== "INSTRUCTOR") { 
											if($clearance['instructor1_status'] == "Not Cleared"){
												print '<input style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" name="instructor1_status" type="text" value="';echo $clearance["instructor1_status"]; print'" readonly>';
											} else if ($clearance['instructor1_status'] == "Cleared"){
												print '<input style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" name="instructor1_status" type="text" value="';echo $clearance["instructor1_status"]; print'" readonly>';
											}
										} ?>
									</div>
								</div>
								
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-user-tie"></i> Instructor 2
										</div>
										<input style="text-align:center; font-size:x-small;" type="text" name="instructor2_name" placeholder="Instructor Name "class="form-control" value="<?php echo $clearance["instructor2_name"]; ?>" disabled readonly>
										<input style="text-align:center; font-size:x-small;" type="text" name="instructor2_subject" placeholder="Subject Code" class="form-control" value="<?php echo $clearance["instructor2_subject"]; ?>" disabled readonly>
										
										<?php if($_SESSION['fullname'] == $clearance["instructor2_name"] && $_SESSION['userrank'] == "INSTRUCTOR"){?>
										<?php if($clearance["services_status"] == "Cleared"){?>
										<select style="text-align:center; background-color:gray; font-size:small;" name="instructor2_status" class="form-control">
											<option value="Not Cleared" <?php echo ($clearance['instructor2_status'] == 'Not Cleared') ? 'Selected' : '' ; ?>><?php echo ($clearance['instructor2_status'] == 'Not Cleared') ? 'Selected: Not Cleared' : 'Not Cleared' ; ?></option>
											<option value="Cleared" <?php echo ($clearance['instructor2_status'] == 'Cleared') ? 'Selected' : '' ; ?>><?php echo ($clearance['instructor2_status'] == 'Cleared') ? 'Selected: Cleared' : 'Cleared' ; ?></option>
										</select>
										<?php } elseif($clearance["services_status"] == "Not Cleared") { ?>
										<input style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" name="instructor2_status" type="text" value="<?php echo $clearance["instructor2_status"]; ?>" readonly>
										<?php } elseif($clearance["services_status"] == "None") { ?>
										<input style="text-align:center; color:#ffffff; background-color:#000000; font-size:small;" name="instructor2_status" type="text" value="<?php echo $clearance["instructor2_status"]; ?>" readonly>
										<?php } ?>
										
										<?php } elseif($_SESSION['fullname'] !== $clearance["instructor2_name"] || $_SESSION['userrank'] !== "INSTRUCTOR") { 
											if($clearance['instructor2_status'] == "Not Cleared"){
												print '<input style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" name="instructor2_status" type="text" value="';echo $clearance["instructor2_status"]; print'" readonly>';
											} else if ($clearance['instructor2_status'] == "Cleared"){
												print '<input style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" name="instructor2_status" type="text" value="';echo $clearance["instructor2_status"]; print'" readonly>';
											} else if ($clearance['instructor2_status'] == "None"){
												print '<input style="text-align:center; color:#ffffff; background-color:#000000; font-size:small;" name="instructor2_status" type="text" value="';echo $clearance["instructor2_status"]; print'" readonly>';
											}
										} ?>
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
										<input style="text-align:center; font-size:x-small;" type="text" name="instructor3_name" placeholder="Instructor Name "class="form-control" value="<?php echo $clearance["instructor3_name"]; ?>" disabled readonly>
										<input style="text-align:center; font-size:x-small;" type="text" name="instructor3_subject" placeholder="Subject Code" class="form-control" value="<?php echo $clearance["instructor3_subject"]; ?>" disabled readonly>
										
										<?php if($_SESSION['fullname'] == $clearance["instructor3_name"] && $_SESSION['userrank'] == "INSTRUCTOR"){?>
										<?php if($clearance["services_status"] == "Cleared"){?>
										<select style="text-align:center; background-color:gray; font-size:small;" name="instructor3_status" class="form-control">
											<option value="Not Cleared" <?php echo ($clearance['instructor3_status'] == 'Not Cleared') ? 'Selected' : '' ; ?>><?php echo ($clearance['instructor3_status'] == 'Not Cleared') ? 'Selected: Not Cleared' : 'Not Cleared' ; ?></option>
											<option value="Cleared" <?php echo ($clearance['instructor3_status'] == 'Cleared') ? 'Selected' : '' ; ?>><?php echo ($clearance['instructor3_status'] == 'Cleared') ? 'Selected: Cleared' : 'Cleared' ; ?></option>
										</select>
										<?php } elseif($clearance["services_status"] == "Not Cleared") { ?>
										<input style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" name="instructor3_status" type="text" value="<?php echo $clearance["instructor3_status"]; ?>" readonly>
										<?php } elseif($clearance["services_status"] == "None") { ?>
										<input style="text-align:center; color:#ffffff; background-color:#000000; font-size:small;" name="instructor3_status" type="text" value="<?php echo $clearance["instructor3_status"]; ?>" readonly>
										<?php } ?>
										
										<?php } elseif($_SESSION['fullname'] !== $clearance["instructor3_name"] || $_SESSION['userrank'] !== "INSTRUCTOR") { 
											if($clearance['instructor3_status'] == "Not Cleared"){
												print '<input style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" name="instructor3_status" type="text" value="';echo $clearance["instructor3_status"]; print'" readonly>';
											} else if ($clearance['instructor3_status'] == "Cleared"){
												print '<input style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" name="instructor3_status" type="text" value="';echo $clearance["instructor3_status"]; print'" readonly>';
											} else if ($clearance['instructor3_status'] == "None"){
												print '<input style="text-align:center; color:#ffffff; background-color:#000000; font-size:small;" name="instructor3_status" type="text" value="';echo $clearance["instructor3_status"]; print'" readonly>';
											}
										} ?>
									</div>
								</div>
								
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-user-tie"></i> Instructor 4
										</div>
										<input style="text-align:center; font-size:x-small;" type="text" name="instructor4_name" placeholder="Instructor Name "class="form-control" value="<?php echo $clearance["instructor4_name"]; ?>" disabled readonly>
										<input style="text-align:center; font-size:x-small;" type="text" name="instructor4_subject" placeholder="Subject Code" class="form-control" value="<?php echo $clearance["instructor4_subject"]; ?>" disabled readonly>
										
										<?php if($_SESSION['fullname'] == $clearance["instructor4_name"] && $_SESSION['userrank'] == "INSTRUCTOR"){?>
										<?php if($clearance["services_status"] == "Cleared"){?>
										<select style="text-align:center; background-color:gray; font-size:small;" name="instructor4_status" class="form-control">
											<option value="Not Cleared" <?php echo ($clearance['instructor4_status'] == 'Not Cleared') ? 'Selected' : '' ; ?>><?php echo ($clearance['instructor4_status'] == 'Not Cleared') ? 'Selected: Not Cleared' : 'Not Cleared' ; ?></option>
											<option value="Cleared" <?php echo ($clearance['instructor4_status'] == 'Cleared') ? 'Selected' : '' ; ?>><?php echo ($clearance['instructor4_status'] == 'Cleared') ? 'Selected: Cleared' : 'Cleared' ; ?></option>
										</select>
										<?php } elseif($clearance["services_status"] == "Not Cleared") { ?>
										<input style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" name="instructor4_status" type="text" value="<?php echo $clearance["instructor4_status"]; ?>" readonly>
										<?php } elseif($clearance["services_status"] == "None") { ?>
										<input style="text-align:center; color:#ffffff; background-color:#000000; font-size:small;" name="instructor4_status" type="text" value="<?php echo $clearance["instructor4_status"]; ?>" readonly>
										<?php } ?>
										
										<?php } elseif($_SESSION['fullname'] !== $clearance["instructor4_name"] || $_SESSION['userrank'] !== "INSTRUCTOR") { 
											if($clearance['instructor4_status'] == "Not Cleared"){
												print '<input style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" name="instructor4_status" type="text" value="';echo $clearance["instructor4_status"]; print'" readonly>';
											} else if ($clearance['instructor4_status'] == "Cleared"){
												print '<input style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" name="instructor4_status" type="text" value="';echo $clearance["instructor4_status"]; print'" readonly>';
											} else if ($clearance['instructor4_status'] == "None"){
												print '<input style="text-align:center; color:#ffffff; background-color:#000000; font-size:small;" name="instructor4_status" type="text" value="';echo $clearance["instructor4_status"]; print'" readonly>';
											}
										} ?>
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
										<input style="text-align:center; font-size:x-small;" type="text" name="instructor5_name" placeholder="Instructor Name "class="form-control" value="<?php echo $clearance["instructor5_name"]; ?>" disabled readonly>
										<input style="text-align:center; font-size:x-small;" type="text" name="instructor5_subject" placeholder="Subject Code" class="form-control" value="<?php echo $clearance["instructor5_subject"]; ?>" disabled readonly>
										
										<?php if($_SESSION['fullname'] == $clearance["instructor5_name"] && $_SESSION['userrank'] == "INSTRUCTOR"){?>
										<?php if($clearance["services_status"] == "Cleared"){?>
										<select style="text-align:center; background-color:gray; font-size:small;" name="instructor5_status" class="form-control">
											<option value="Not Cleared" <?php echo ($clearance['instructor5_status'] == 'Not Cleared') ? 'Selected' : '' ; ?>><?php echo ($clearance['instructor5_status'] == 'Not Cleared') ? 'Selected: Not Cleared' : 'Not Cleared' ; ?></option>
											<option value="Cleared" <?php echo ($clearance['instructor5_status'] == 'Cleared') ? 'Selected' : '' ; ?>><?php echo ($clearance['instructor5_status'] == 'Cleared') ? 'Selected: Cleared' : 'Cleared' ; ?></option>
										</select>
										<?php } elseif($clearance["services_status"] == "Not Cleared") { ?>
										<input style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" name="instructor5_status" type="text" value="<?php echo $clearance["instructor5_status"]; ?>" readonly>
										<?php } elseif($clearance["services_status"] == "None") { ?>
										<input style="text-align:center; color:#ffffff; background-color:#000000; font-size:small;" name="instructor5_status" type="text" value="<?php echo $clearance["instructor5_status"]; ?>" readonly>
										<?php } ?>
										
										<?php } elseif($_SESSION['fullname'] !== $clearance["instructor5_name"] || $_SESSION['userrank'] !== "INSTRUCTOR") { 
											if($clearance['instructor5_status'] == "Not Cleared"){
												print '<input style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" name="instructor5_status" type="text" value="';echo $clearance["instructor5_status"]; print'" readonly>';
											} else if ($clearance['instructor5_status'] == "Cleared"){
												print '<input style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" name="instructor5_status" type="text" value="';echo $clearance["instructor5_status"]; print'" readonly>';
											} else if ($clearance['instructor5_status'] == "None"){
												print '<input style="text-align:center; color:#ffffff; background-color:#000000; font-size:small;" name="instructor5_status" type="text" value="';echo $clearance["instructor5_status"]; print'" readonly>';
											}
										} ?>
									</div>
								</div>
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-user-tie"></i> Instructor 6
										</div>
										<input style="text-align:center; font-size:x-small;" type="text" name="instructor6_name" placeholder="Instructor Name "class="form-control" value="<?php echo $clearance["instructor6_name"]; ?>" disabled readonly>
										<input style="text-align:center; font-size:x-small;" type="text" name="instructor6_subject" placeholder="Subject Code" class="form-control" value="<?php echo $clearance["instructor6_subject"]; ?>" disabled readonly>
										
										<?php if($_SESSION['fullname'] == $clearance["instructor6_name"] && $_SESSION['userrank'] == "INSTRUCTOR"){?>
										<?php if($clearance["services_status"] == "Cleared"){?>
										<select style="text-align:center; background-color:gray; font-size:small;" name="instructor6_status" class="form-control">
											<option value="Not Cleared" <?php echo ($clearance['instructor6_status'] == 'Not Cleared') ? 'Selected' : '' ; ?>><?php echo ($clearance['instructor6_status'] == 'Not Cleared') ? 'Selected: Not Cleared' : 'Not Cleared' ; ?></option>
											<option value="Cleared" <?php echo ($clearance['instructor6_status'] == 'Cleared') ? 'Selected' : '' ; ?>><?php echo ($clearance['instructor6_status'] == 'Cleared') ? 'Selected: Cleared' : 'Cleared' ; ?></option>
										</select>
										<?php } elseif($clearance["services_status"] == "Not Cleared") { ?>
										<input style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" name="instructor6_status" type="text" value="<?php echo $clearance["instructor6_status"]; ?>" readonly>
										<?php } elseif($clearance["services_status"] == "None") { ?>
										<input style="text-align:center; color:#ffffff; background-color:#000000; font-size:small;" name="instructor6_status" type="text" value="<?php echo $clearance["instructor6_status"]; ?>" readonly>
										<?php } ?>
										
										<?php } elseif($_SESSION['fullname'] !== $clearance["instructor6_name"] || $_SESSION['userrank'] !== "INSTRUCTOR") { 
											if($clearance['instructor6_status'] == "Not Cleared"){
												print '<input style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" name="instructor6_status" type="text" value="';echo $clearance["instructor6_status"]; print'" readonly>';
											} else if ($clearance['instructor6_status'] == "Cleared"){
												print '<input style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" name="instructor6_status" type="text" value="';echo $clearance["instructor6_status"]; print'" readonly>';
											} else if ($clearance['instructor6_status'] == "None"){
												print '<input style="text-align:center; color:#ffffff; background-color:#000000; font-size:small;" name="instructor6_status" type="text" value="';echo $clearance["instructor6_status"]; print'" readonly>';
											}
										} ?>
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
										<input style="text-align:center; font-size:x-small;" type="text" name="instructor7_name" placeholder="Instructor Name "class="form-control" value="<?php echo $clearance["instructor7_name"]; ?>" disabled readonly>
										<input style="text-align:center; font-size:x-small;" type="text" name="instructor7_subject" placeholder="Subject Code" class="form-control" value="<?php echo $clearance["instructor7_subject"]; ?>" disabled readonly>
										
										<?php if($_SESSION['fullname'] == $clearance["instructor7_name"] && $_SESSION['userrank'] == "INSTRUCTOR"){?>
										<?php if($clearance["services_status"] == "Cleared"){?>
										<select style="text-align:center; background-color:gray; font-size:small;" name="instructor7_status" class="form-control">
											<option value="Not Cleared" <?php echo ($clearance['instructor7_status'] == 'Not Cleared') ? 'Selected' : '' ; ?>><?php echo ($clearance['instructor7_status'] == 'Not Cleared') ? 'Selected: Not Cleared' : 'Not Cleared' ; ?></option>
											<option value="Cleared" <?php echo ($clearance['instructor7_status'] == 'Cleared') ? 'Selected' : '' ; ?>><?php echo ($clearance['instructor7_status'] == 'Cleared') ? 'Selected: Cleared' : 'Cleared' ; ?></option>
										</select>
										<?php } elseif($clearance["services_status"] == "Not Cleared") { ?>
										<input style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" name="instructor7_status" type="text" value="<?php echo $clearance["instructor7_status"]; ?>" readonly>
										<?php } elseif($clearance["services_status"] == "None") { ?>
										<input style="text-align:center; color:#ffffff; background-color:#000000; font-size:small;" name="instructor7_status" type="text" value="<?php echo $clearance["instructor7_status"]; ?>" readonly>
										<?php } ?>
										
										<?php } elseif($_SESSION['fullname'] !== $clearance["instructor7_name"] || $_SESSION['userrank'] !== "INSTRUCTOR") { 
											if($clearance['instructor7_status'] == "Not Cleared"){
												print '<input style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" name="instructor7_status" type="text" value="';echo $clearance["instructor7_status"]; print'" readonly>';
											} else if ($clearance['instructor7_status'] == "Cleared"){
												print '<input style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" name="instructor7_status" type="text" value="';echo $clearance["instructor7_status"]; print'" readonly>';
											} else if ($clearance['instructor7_status'] == "None"){
												print '<input style="text-align:center; color:#ffffff; background-color:#000000; font-size:small;" name="instructor7_status" type="text" value="';echo $clearance["instructor7_status"]; print'" readonly>';
											}
										} ?>
									</div>
								</div>
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-user-tie"></i> Instructor 8
										</div>
										<input style="text-align:center; font-size:x-small;" type="text" name="instructor8_name" placeholder="Instructor Name "class="form-control" value="<?php echo $clearance["instructor8_name"]; ?>" disabled readonly>
										<input style="text-align:center; font-size:x-small;" type="text" name="instructor8_subject" placeholder="Subject Code" class="form-control" value="<?php echo $clearance["instructor8_subject"]; ?>" disabled readonly>
										
										<?php if($_SESSION['fullname'] == $clearance["instructor8_name"] && $_SESSION['userrank'] == "INSTRUCTOR"){?>
										<?php if($clearance["services_status"] == "Cleared"){?>
										<select style="text-align:center; background-color:gray; font-size:small;" name="instructor8_status" class="form-control">
											<option value="Not Cleared" <?php echo ($clearance['instructor8_status'] == 'Not Cleared') ? 'Selected' : '' ; ?>><?php echo ($clearance['instructor8_status'] == 'Not Cleared') ? 'Selected: Not Cleared' : 'Not Cleared' ; ?></option>
											<option value="Cleared" <?php echo ($clearance['instructor8_status'] == 'Cleared') ? 'Selected' : '' ; ?>><?php echo ($clearance['instructor8_status'] == 'Cleared') ? 'Selected: Cleared' : 'Cleared' ; ?></option>
										</select>
										<?php } elseif($clearance["services_status"] == "Not Cleared") { ?>
										<input style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" name="instructor8_status" type="text" value="<?php echo $clearance["instructor8_status"]; ?>" readonly>
										<?php } elseif($clearance["services_status"] == "None") { ?>
										<input style="text-align:center; color:#ffffff; background-color:#000000; font-size:small;" name="instructor8_status" type="text" value="<?php echo $clearance["instructor8_status"]; ?>" readonly>
										<?php } ?>
										
										<?php } elseif($_SESSION['fullname'] !== $clearance["instructor8_name"] || $_SESSION['userrank'] !== "INSTRUCTOR") { 
											if($clearance['instructor8_status'] == "Not Cleared"){
												print '<input style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" name="instructor8_status" type="text" value="';echo $clearance["instructor8_status"]; print'" readonly>';
											} else if ($clearance['instructor8_status'] == "Cleared"){
												print '<input style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" name="instructor8_status" type="text" value="';echo $clearance["instructor8_status"]; print'" readonly>';
											} else if ($clearance['instructor8_status'] == "None"){
												print '<input style="text-align:center; color:#ffffff; background-color:#000000; font-size:small;" name="instructor8_status" type="text" value="';echo $clearance["instructor8_status"]; print'" readonly>';
											}
										} ?>
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
									<?php if($_SESSION['userrank'] == "ADMIN" || $_SESSION['userrank'] == "SUPERADMIN"){?>
									<select style="text-align:center; background-color:gray; font-size:small;" name="clearance_status" class="form-control">
										<option value="Incomplete" <?php echo ($clearance['clearance_status'] == 'Incomplete') ? 'Selected' : '' ; ?>><?php echo ($clearance['clearance_status'] == 'Incomplete') ? 'Selected: Incomplete' : 'Incomplete' ; ?></option>
										<option value="Completed" <?php echo ($clearance['clearance_status'] == 'Completed') ? 'Selected' : '' ; ?>><?php echo ($clearance['clearance_status'] == 'Completed') ? 'Selected: Completed' : 'Completed' ; ?></option>
									</select>
									<?php } elseif($_SESSION['userrank'] !== "ADMIN") { 
										if($clearance['clearance_status'] == "Incomplete"){
											print '<input style="text-align:center; color:#000000; background-color:#ff6565; font-size:small;" name="clearance_status" type="text" value="';echo $clearance["clearance_status"]; print'" readonly>';
										} else if ($clearance['clearance_status'] == "Completed"){
											print '<input style="text-align:center; color:#000000; background-color:#00ad45; font-size:small;" name="clearance_status" type="text" value="';echo $clearance["clearance_status"]; print'" readonly>';
										}
									} ?>
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
    </b