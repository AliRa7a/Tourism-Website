<?php 
    include "db.php";
    include "header.php";
    $error='d-none';
    error_reporting(0);
   $id= $_GET['id'];
   $query="SELECT * FROM Users WHERE id =$id ";
   $result1 = mysqli_query($conn, $query);
   // Fetch all
   $final=mysqli_fetch_all($result1, MYSQLI_ASSOC);
   mysqli_free_result($result1);

//Submit the form data
    if(isset($_POST['submit']))
  {
  $nam=$_POST['name'];
  $mail=$_POST['email'];
  $phoneno=$_POST['phoneno'];
   $pass=$_POST['password'];
   
   $filename= $_FILES["image"]["name"];
  $tempname=$_FILES["image"]["tmp_name"];
  $folder="imgs/".$filename;
  move_uploaded_file($tempname, $folder);
  $sql = "UPDATE `users` SET `name`='$nam',`email`='$mail',`password`='$pass',`phoneno`= '$phoneno',`picture`= '$filename' WHERE id='$id'";
  $result = mysql_query($sql);
  
  if(!$result)
{
 echo  "Error: ";
}
else {
    echo "<script> alert('Congratulations $nam! Your information successfully updated.');window.location.href='index.php' </script>";
  
}
}
?>
<body>
    <div class="bg  ">
    <div class="container shadow-sm">
        <div class="row bg-white cover"> 
          <!--Column 1.(Image) -->
            <div class="col-md-6 align-self-center">
                <img src="imgs/signin-image.jpg" class="singup_img img-responsive mx-auto d-block " alt="sign up img">
               <p class="text-center mt-5"><a href="index.php">Back to Home page</a></p> 
            </div>
                <!--Column 2.(Form) -->
            <div class="col-md-6">
            <!--Display error message -->
            <h6 class=" text-danger p-3 error  <?php echo $error ?> " style="background-color:rgba(255,0,0,0.1)">*  <?php echo $msg ?> *
</h6>
                <h2 class=" text-center m-5 p-4"><b> Complete your Profile Information </b></h2>
                    <div class="signin-form">
                  
            <?php foreach($final as $finl){ ?>
                 <form method="POST" class="container" id="register-form" enctype="multipart/form-data">
                 <div class="form-input">
                        <i class="fas fa-user mt-2"></i>
                    <input type="text" name="name" class="input-txt " placeholder="Full Name" required value="<?php echo $finl['name']; ?>">
                </div>
                    <div class="form-input">
                        <i class="fas fa-envelope mt-2"></i>
                        <input type="email" name="email" class="input-txt" placeholder="Your Email" required value="<?php echo $finl['email']; ?>">
                    </div>
                        <div class="form-input" id="show_hide_password">
                            <i class="fas fa-unlock mt-2"></i><i class="fas fa-eye reveal mt-3"></i>
                        <input type="password" name="password" class="input-txt pwd" placeholder="Password" required value="<?php echo $finl['password']; ?>">
                        </div>
                        <div class="form-input">
                        <i class="fas fa-phone mt-2"></i>
                        <input type="text" name="phoneno" class="input-txt" placeholder="Contact Number" value="<?php echo $finl['phoneno']; ?>" title="Example:03XXXXXXXXX (11 letters)"
                         pattern="^\s*\(?(020[7,8]{1}\)?[ ]?[1-9]{1}[0-9{2}[ ]?[0-9]{4})|(0[1-8]{1}[0-9]{3}\)?[ ]?[1-9]{1}[0-9]{2}[ ]?[0-9]{3})\s*$" required>
                    </div>
                        <div class="form-input">
                        <div class="custom-file ">
                        <input type="file" class="custom-file-input"  name="image">
                        <label class="custom-file-label" for="customFile">Upload profile Picture</label>
                        </div>
                        </div>
                    <div class="form-input mb-5 pb-4 pt-4">
                        <input type="submit" name="submit" class=" btn btn-outline-primary px-4" value="Update">
                        </div>
                </form>
            <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
//Show-Hide Password
$(".reveal").on('click',function() {
  var $pwd = $(".pwd");
  if ($pwd.attr('type') === 'password') {
      $pwd.attr('type', 'text');
      $('#show_hide_password i').addClass( "fa-eye-slash" );
       $('#show_hide_password i').removeClass( "fa-eye" );
  } else {
      $pwd.attr('type', 'password');
      $('#show_hide_password i').addClass( "fa-eye" );
       $('#show_hide_password i').removeClass( "fa-eye-slash" );
  }
});
</script>