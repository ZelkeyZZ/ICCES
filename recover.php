<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

require 'inc/config-inc.php';

$msg = " ";

if(isset($_POST["email"])){
	$emailTo = $_POST["email"];
	$hashcode = password_hash(uniqid(true),PASSWORD_BCRYPT);
	
	$sql = "INSERT INTO table_reset(hashcode, email) VALUES ('$hashcode','$emailTo')";
	
	$stmt = $pdo->query($sql);
	if(!$stmt){
		exit("location: ../404/404.php");
	}
	
	//Instantiation and passing `true` enables exceptions
	$mail = new PHPMailer(true);
	
	try {
		//Server settings
		$mail->isSMTP();                                            //Send using SMTP
		$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
		$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
		$mail->Username   = 'cyronkaizkher@gmail.com';                     //SMTP username
		$mail->Password   = 'vapidqjtqsvfhmbh';                               //SMTP password
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
		$mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
	
		//Recipients
		$mail->setFrom('info@informatics.edu.ph', 'ICCES Admin');
		$mail->addAddress($emailTo);     //Add a recipient
		$mail->addReplyTo('no-reply@informatics.edu.ph', 'No-Reply');
		
		//Content
		$url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "reset.php?hashcode=$hashcode";
		$mail->isHTML(true);                                  //Set email format to HTML
		$mail->Subject = 'Reset Password Request';
		$mail->Body    = "	<h2>You have requested a Reset Password</h2>
							<p>
								Click the Reset Password to proceed, <a href='$url'>Reset Password</a> If you did not Request the Reset Password. Please Ignore this mail.
							</p>";
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
	
		$mail->send();
		$msg = "YOUR REQUEST TO RESET YOUR PASSWORD <br/> 
				HAS BEEN SENT TO YOUR EMAIL : $emailTo. <br/> 
				CHECK YOUR EMAIL NOW.";
	} catch (Exception $e) {
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
}
?>
<!DOCTYPE HTML> 
<html> 
    <head> 
        <title>ICCES | Forgotten Password</title>         
        <meta charset="utf-8"/> 
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/> 
        <link rel="stylesheet" href="assets/css/main.css"/> 
        <link rel="stylesheet" href="assets/css/fontawesome.css"/> 
        <link rel="stylesheet" href="assets/css/v4-shims.css"/> 
        <link rel="stylesheet" href="assets/css/brands.css"/> 
        <link rel="stylesheet" href="assets/css/all.css"/> 
        <link rel="stylesheet" href="assets/css/regular.css"/> 
        <link rel="stylesheet" href="assets/css/solid.css"/> 
        <link rel="stylesheet" href="assets/css/svg-with-js.css"/>
        <link rel="shortcut icon" type="image/png" href="images/icon/favicon.png"/>
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
                            <a href="../index.html"><span>Home</span></a>
                        </li>
                    </ul>
                </nav>
            </header>
            <!-- Banner -->
            <section id="banner">
                <div class="inner">
                    <br/>
                    <h2>Request Reset Password</h2>
					<br/>
					<?php
						echo $msg;
					?>
                    <div class="login-wrap">
                        <form method="post">
                            <!-- Username -->
                            <div class="form-group">
                                <div class="input-group">
                                    <p style="font-size:15px">Enter email to request a reset password.</p>
                                    <div class="input-group-addon">
                                        <i class="fa fa-envelope"></i> Email Address
                                    </div>
                                    <input style="text-align:center;" type="email" name="email" class="form-control" placeholder="Enter Email" autocomplete="off">
                                </div>
                                <span class="help-block" style="color:red;"></span>
                            </div>
                            <!--  -->
                            <br/>
                            <!-- Button -->
                            <ul class="actions special">
                                <li>
                                    <button class="button primary" type="submit" name="Submit">Send Request</button>
                                    <br/>
                                    <br/>
                                    <a href="../user/login" class="button">Cancel</a>
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
        <script src="assets/js/jquery.min.js"></script>         
        <script src="assets/js/jquery.scrollex.min.js"></script>         
        <script src="assets/js/jquery.scrolly.min.js"></script>         
        <script src="assets/js/browser.min.js"></script>         
        <script src="assets/js/breakpoints.min.js"></script>         
        <script src="assets/js/util.js"></script>         
        <script src="assets/js/main.js"></script>         
        <script src="assets/js/all.js"></script>         
        <script src="assets/js/brands.js"></script>         
        <script src="assets/js/fontawesome.js"></script>         
        <script src="assets/js/regular.js"></script>         
        <script src="assets/js/solid.js"></script>         
        <script src="assets/js/v4-shims.js"></script>         
    </body>     
</html>