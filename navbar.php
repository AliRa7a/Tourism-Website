<?php 
	session_start();
    include "db.php";
    error_reporting(0);
    $nlog='d-none';
    $log='d-block';
   $email= $_SESSION['email'];
   if($_SESSION['email']==true){
    $log='d-none';
    $nlog='d-block';
   }
   else{
   	
   }
   $query="SELECT * FROM Users WHERE Email ='$email' ";
  $result=mysqli_query($conn, $query);
  $final=mysqli_fetch_assoc($result);
  $uid=$final['id'];
   //
   $sql="SELECT * FROM cart WHERE uid ='$uid' ";
   $result=mysqli_query($conn, $sql);
   $row =mysqli_num_rows($result);
  ?>
  
        <!--Nav Bar-->
        <nav class="navbar navbar-expand-lg  sticky-top" >
            <!-- Brand -->
            <a href="#" class="nav-head"><img class="logo-img" src="imgs/logo.png" alt="logo">&nbsp; Tours & Travels</a>
            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <i class="fas fa-bars "></i>
            </button>
          
            <!-- Navbar links -->
            <div class="collapse navbar-collapse ml-5" id="navbarNav">
              <ul class="navbar-nav " >
                <li class="nav-item active">
                  <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="tours.php">Tours</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">About Us</a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact Us</a>
                  </li> 
                
                 
              <li class="nav-item">
                   <h5> <a class=" ml-5 mt-2 text-uppercase	 <?php echo $nlog; ?>"  href="edit_user.php?id=<?php echo $final['id']; ?>">  <?php echo $final['name']; ?></a></h5>
                  </li>
                  <li class="nav-item">
                  <a href="#" class="nav-link" data-toggle="modal" data-target="#cart">  <i class='fas fa-shopping-cart'></i> (<span class="total-count"><?php echo $row;?></span>)</a>
                   
                  </li> 
                  <li class="nav-item"  >
                    <a class="nav-link <?php echo $nlog; ?>"  href="logout.php"><i class="fas fa-sign-out-alt"></i> </a>
                  </li>
                <li class="nav-item <?php echo $log; ?> " ><a class=" nav-link"  href="signup.php"><i class="fas fa-user"></i>&nbsp;Sign Up</a> </li>
                <li class="nav-item <?php echo $log; ?>"> <a class=" nav-link" href="signin.php"><i class="fas fa-sign-in-alt"></i>&nbsp;   Login</a></li>
               
              </ul>
            </div> 
          </nav>

