<?php 
	session_start();
	include "../../../inc/func.php";
	include "inc/uedit-inc.php";
 
	// Check if the user is logged in, if not then redirect him to login page
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
		header("location: ../user/login");
		exit;
	}
	
	if($_SESSION['userrank'] !== "STUDENT"){
	} else if($_SESSION['userrank'] == "STUDENT") {
			header("location: ../user/login");
			exit;
	}

?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>ICCES | Edit User</title>
        <meta charset="utf-8"/> 
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/> 
        <link rel="stylesheet" href="../../../assets/css/main.css"/> 
        <link rel="stylesheet" href="../../../assets/css/fontawesome.css"/> 
        <link rel="stylesheet" href="../../../assets/css/v4-shims.css"/> 
        <link rel="stylesheet" href="../../../assets/css/brands.css"/> 
        <link rel="stylesheet" href="../../../assets/css/all.css"/> 
        <link rel="stylesheet" href="../../../assets/css/regular.css"/> 
        <link rel="stylesheet" href="../../../assets/css/solid.css"/> 
        <link rel="stylesheet" href="../../../assets/css/svg-with-js.css"/>
        <link rel="shortcut icon" type="image/png" href="../../../images/icon/favicon.png"/>
        <noscript>
            <link rel="stylesheet" href="../../../assets/css/noscript.css"/>
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
							<a href="../view/users"><span>Return</span></a>
						</li>
					</ul>
                </nav>
            </header>
            <!-- Banner -->
            <section id="banner" style="height:100%;">
                <div class="inner">
                    <br/>
                    <h2>Edit User</h2>
                    <div class="login-wrap">
						<?php if ($msg): ?>
						<p><?=$msg?></p>
						<?php endif; ?>
						<form action="edit.php?id=<?=$user['id']?>" method="post">
<!------------------------------------------------------------------------------------->
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">
                                        <i class="fa fa-user"></i> ID Number
                                    </div>
									<input style="text-align:center; font-size:small;" type="text" name="user_id" value="<?=$user['user_id']?>" disabled readonly>
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
									<?php if($user['employee_name'] !== NULL){ ?>
									<input style="text-align:center; font-size:small;"type="text" name="fullname" value="<?=$user['employee_name'];?>" disabled readonly>
									<?php } 	else { ?>
									<input style="text-align:center; font-size:small;"type="text" name="fullname" value="<?=$user['student_name']?>" disabled readonly>
										<?php 	} ?>
								</div>
							</div>
							<!--  -->
							<br/>
<!------------------------------------------------------------------------------------->
							<div class="row">
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-envelope"></i> Email
										</div>
										<input style="text-align:center; font-size:small;" type="text" name="user_email" value="<?=$user['user_email']?>" disabled readonly>
									</div>
								</div>
								<div class="col-6 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fas fa-users"></i> User Level
										</div>
										<input style="text-align:center; font-size:small;"type="text" name="user_rank" value="<?=$user['user_rank']?>" disabled readonly>
									</div>
								</div>
							</div>
							<!--  -->
							<br/>
<!------------------------------------------------------------------------------------->
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fas fa-book"></i> Account Status
									</div>
									<select style="text-align:center; font-size:small; background_color:grey;" name="user_status">
										<option value="<?=$user['user_status']?>">Set : <?=$user['user_status']?></option>
										<option value="Active">Activated</option>
										<option value="Disabled">Deactivated</option>
									</select>
								</div>
							</div>
							<!--  -->
							<br/>
<!------------------------------------------------------------------------------------->
							<ul class="actions special">
								<li>
									<button type="submit" class="button primary" value="update" name="Submit"><i class="fas fa-pencil-alt"></i> Update User </button>
								</li>
							</ul>
							<br/>
                        </form>
                    </div>
                </div>
            </section>
        </div>         
        <!-- Scripts -->         
        <script src="../../../assets/js/jquery.min.js"></script>         
        <script src="../../../assets/js/jquery.scrollex.min.js"></script>         
        <script src="../../../assets/js/jquery.scrolly.min.js"></script>         
        <script src="../../../assets/js/browser.min.js"></script>         
        <script src="../../../assets/js/breakpoints.min.js"></script>         
        <script src="../../../assets/js/util.js"></script>         
        <script src="../../../assets/js/main.js"></script>         
        <script src="../../../assets/js/all.js"></script>         
        <script src="../../../assets/js/brands.js"></script>         
        <script src="../../../assets/js/fontawesome.js"></script>         
        <script src="../../../assets/js/regular.js"></script>         
        <script src="../../../assets/js/solid.js"></script>         
        <script src="../../../assets/js/v4-shims.js"></script>         
    </body>     
</html