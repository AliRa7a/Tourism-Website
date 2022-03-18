<?php
include "db.php";
include "header.php";
use PHPMailer\PHPMailer\PHPMailer;
$error='d-none';
if(isset($_POST['submit']))
  {
    $email =  $_POST['email'];
    $v_data = "SELECT * FROM Users WHERE Email = '$email' ";
    $result = mysql_query($v_data);
  $final=mysql_fetch_assoc($result);
   
    //PHP Mailer functions
    require 'C:\xampp\htdocs\ToursWebsite\PHPMailer/vendor/autoload.php';

$mail = new PHPMailer();
$mail->SMTPDebug =1;
 $mail->isSMTP();
//Set SMTP host name
$mail->Host = "smtp.gmail.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = TRUE;
//Provide username and password
$mail->Username = "mbilalshafiq13@gmail.com";
$mail->Password = "mianbilal";
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";
$mail->Port = 587 ;
//Set TCP port to connect to

$mail->From = 'mbilalshafiq13@gmail.com';
$mail->FromName = "Tours&Travels";

$mail->addAddress($final['Email']);

$mail->isHTML(true);

  $mail->Subject = "Forgot Password";
  $mail->Body = "<i>This is your password:</i>".$final["Password"];
  $mail->AltBody = "This is the plain text version of the email content";
  if(!$mail->send())
  {
   echo "Mailer Error: " . $mail->ErrorInfo;
  }
  else
  {
    echo "<script> alert('Congratulations ! Your password has been sent to your email.');window.location.href='signin.php' </script>";
  }
}


?>

<body>
    <div class="bg ">
    <div class="container shadow-sm">
        <div class="row bg-white cover"> 
          <!--Column 1.(Image) -->
            <div class="col-md-6 align-self-center">
                <img src="imgs/signin-image.jpg" class="singup_img img-responsive mx-auto d-block " alt="sign up img">
              
            </div>
                <!--Column 2.(Form) -->
            <div class="col-md-6">
            <!--Display error message -->
            <h6 class=" text-danger p-3 error  <?php echo $error ?> " style="background-color:rgba(255,0,0,0.1)">*  <?php echo $msg ?> *
</h6>
                <h2 class="form-title text-center mt-5 pt-4">Forgot Password</h2>
                <p class="text-center mb-5">Dont't be Panic. We will recoverd it for you.</p>
                    <div class="signin-form">
                  <!-- Forgot Form -->
                 <form method="POST" class="container" id="register-form">
                        
                    <div class="form-input">
                        <i class="fas fa-envelope mt-2"></i>
                        <input type="email" name="email" class="input-txt" placeholder="Your Email" required>
                    </div>
                    <div class="form-input mb-5 pb-4 pt-4">
                        <input type="submit" name="submit" class=" btn btn-outline-primary  py-2" value="Reset Password">
                        </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>