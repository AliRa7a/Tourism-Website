<?php 
    include "db.php";
    include "header1.php";
    include "navbar.php";
    //Fetch first 4 Tours
    $query = "SELECT  * FROM tours LIMIT 4" ;
    $output = mysqli_query($conn, $query);
    // Fetch all
    $total=mysqli_fetch_all($output, MYSQLI_ASSOC);
    mysqli_free_result($output);
    //Book A Tours
    ////////////////////////////
    if(isset($_POST['submit']))
    {
     //User is login or Not?   
        $email= $_SESSION['email'];
      if($_SESSION['email']==true){

        $uid=$_POST['uid'];
        $tid = $_POST['tid'];
        $insert =mysqli_query($conn,"INSERT INTO `cart`(`uid`, `tid`)
        VALUES ('$uid','$tid')");
    
            if(!$insert){
                echo mysqli_error();
            } 
            else{
                echo "<script> alert('Your Tour is Successfully Booked!');window.location.href='index.php' </script>";
            }
    
      }else{
        echo "<script> alert('Your Need to Login First!');window.location.href='signin.php' </script>";  }

    }
    mysqli_close($conn);
?>
<body onload="onfun()">
    <div class="heroimg">
    <img class="bus-img img-responsive" src="imgs/Asset 6.png" alt="bus img">
    </div>
    <!--Fiilter The Data-->
   
    <ul class="nav nav-tabs justify-content-center">
      <li onclick="flight()"><a id="btn1" class="btn " href="#flight">Flight</a></li>
      <li onclick="hotel()"><a  id="btn2" class="btn " href="#hotel">Hotel</a></li>
      <li  onclick="rent()"><a  id="btn3" class="btn " href="#rent">Car Rent</a></li>
    </ul>
    <div class="filter d-flex justify-content-center">
      <!--Flight tab-->
   <div class="row r1"  id="flight">
     <div class="clm-md-3 ml-5">
      <label for="#">From</label>
      <i class="fas fa-bullseye text-center"></i>
      <input type="text" class="form-control " placeholder="From">
     </div>
     <div class="clm-md-3 ml-5">
      <label for="#">Where</label>
      <i class="icon-my_location"></i>
      <input type="text" class="form-control" placeholder="Where">
     </div><div class="clm-md-3 ml-5">
      <label for="#">Check In</label>
      <i class="icon-my_location"></i>
      <input type="date" class="form-control checkin_date" placeholder="Check In">
     </div><div class="clm-md-3 ml-5">
      <label for="#">Check Out</label>
      <i class="icon-my_location"></i>
      <input type="date" class="form-control checkout_date" placeholder="Check Out">
     </div>
     <div class="clm-md-3 ml-5">
      <label for="#">Travelers</label>
     <i class="ion-ios-arrow-down"></i>
          <select name="" id=""  class="form-control">
          <option value="">1</option>
          <option value="">2</option>
          <option value="">3</option>
          <option value="">4</option>
          <option value="">5</option>
          </select> </div>
      <div class="clm-md-3 ml-5  mt-4">
        <input type="submit" value="Search" class="form-control btn-lg btn btn-primary">
        </div>
   </div>
    <!--Hotel tab-->
    <div class="row r1" id="hotel">
     <div class="clm-md-3 ml-5">
       <label for="#">Check In</label>
       <i class="icon-my_location"></i>
       <input type="date" class="form-control checkin_date" placeholder="Check In">
      </div><div class="clm-md-3 ml-5">
       <label for="#">Check Out</label>
       <i class="icon-my_location"></i>
       <input type="date" class="form-control checkout_date" placeholder="Check Out">
      </div>
      <div class="clm-md-3 ml-5">
       <label for="#">Guest</label>
      <i class="ion-ios-arrow-down"></i>
           <select name="" id=""  class="form-control">
           <option value="">1</option>
           <option value="">2</option>
           <option value="">3</option>
           <option value="">4</option>
           <option value="">5</option>
           </select> </div>
       <div class="clm-md-3 ml-5  mt-4">
         <input type="submit" value="Search" class="form-control btn-lg btn btn-primary">
         </div>
    </div> 
     <!--Rent tab-->
     <div class="row r1" id="rent">
      <div class="clm-md-3 ml-5">
     Sorry, Currntly Not Available
          <input type="submit" value="Search" class="form-control btn-lg btn btn-primary">
          </div>
     </div> 
    </div>
    <!--Services Section-->
    <section class="services-section bg-light">
   
      <div class="row d-flex justify-content-center text-center">
      <div class="col-md-3  ">
      <i class="fas fa-snowboarding serv-icons"></i>
      <h3 class="heading hd-3">Special Activities</h3>
      <p>A small river named Duden flows by their place and supplies.</p>
      </div>
     
      <div class="col-md-3  ">
     <i class="fas fa-route serv-icons"></i>
      <h3 class="heading hd-3">Travel Arrangements</h3>
      <p>A small river named Duden flows by their place and supplies.</p>
    
      </div>
      <div class="col-md-3  ">
     <i class="fas fa-compass serv-icons "></i>
      <h3 class="heading hd-3">Private Guide</h3>
      <p>A small river named Duden flows by their place and supplies.</p>
     
      </div>
      <div class="col-md-3  ">
     <i class="fas fa-map-marked-alt serv-icons "></i>
      <h3 class="heading hd-3">Location Manager</h3>
      <p>A small river named Duden flows by their place and supplies.</p>

      </div>
      </div>
      </section>

 <!--About Section-->
    <section class=" about-section bg-white">
      <div class="row">
      <div class=" col-md-6 "> <img class="imge-responsive w-100 " src="imgs/about.jpg" alt="About image"></div>
      <div class="col-sm-6 col-md-6  about-content mt-4 p-5">
      <h2 class="hd-4">The Best Travel Agency</h2>
      <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country. But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their.</p>
      </div>  </div>
      </section>

       <!--Popular Tours Section-->
      <section class="p-5 bg-white">
        <h4 class="hd-4 text-center">Most Popular Tours</h4> <br>
        
        <div class="row">
        <?php foreach( $total as $totl) { ?>
          
          <div class="col-md-3 shadow-sm">
           <div class="bgimg w-100  img-responsive" style="background-image: url('imgs/<?php echo $totl['picture'] ?>');
               background-size: cover;  height: 15rem !important;">
             <p class="ontext"><?php echo $totl['description']; ?>.... <a href="tour_detail.php?tid=<?php echo $totl['id']?> ">View More </a></p> </div>
            <h3 class="hd-3 "><?php echo $totl['destination']; ?> </h3>    <p class="price"><?php echo $totl['price']; ?></p>
             <!-- Form For Booking Tickets -->
            <form method=POST >
                <input type="hidden" name="tid" value="<?php echo $totl['id']?>">
                <input type="hidden" name="uid" value="<?php echo $uid?>"> 
              <input type="submit" name="submit" value="Book Now" class="add-to-cart btn btn-outline-primary btnbook w-100">
              </form>
         </div> 

         <?php } ?>
        </div>
      </section>
 <!--Counter Section-->
 <section class="counter-section ">
      <div class="row text-center " style="background-color:rgba(0, 0, 0, 0.6); padding: 8rem;">
          <div class="col-md-3 ">
                  <i class="fas fa-users count-icon"></i> 
                  <p class="count">1879</p>
                  <p class="hd-3" >Happy Customers</p>
             
          </div>

          <div class=" col-md-3 ">
                 <i class="fas fa-place-of-worship count-icon"></i>
                  <p class="count">1054</p>
                  <p class="hd-3">Destination Places</p>
              
          </div>

          <div class=" col-md-3 ">
                  <i class="fas fa-hotel count-icon"></i>
                  <p class="count">1250</p>
                  <p class="hd-3">Hotels</p>
              
          </div>

          <div class=" col-md-3 ">
                 <i class="fas fa-shuttle-van count-icon"></i>
                  <p  class="count">652</p>
                  <p class="hd-3">Vehicles</p>
              </div>
         
  </div>
 </section>
 
 <!--Customer Section-->
 <section class="customer-section text-center "> <br>
   <h4 class="hd-4">Our satisfied customer says</h4>
   <p>Far far away, behind the word mountains,
      far from the countries Vokalia and Consonantia,<br> there live the blind texts. Separated they live in</p>
      <!--Carousel Wrapper-->
<div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

  <!--Controls-->
  <div class="controls-top ">
    <a class="btn-floating hd-4 btn-info float-left" href="#multi-item-example" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
    <a class=" hd-4 btn-info float-right" href="#multi-item-example" data-slide="next"><i
        class="fas fa-chevron-right"></i></a>
  </div>
  <!--/.Controls-->

  <!--Indicators-->
  <ol class="carousel-indicators">
    <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
    <li data-target="#multi-item-example" data-slide-to="1"></li>
    <li data-target="#multi-item-example" data-slide-to="2"></li>
  </ol>
  <!--/.Indicators-->

  <!--Slides-->
  <div class="carousel-inner" role="listbox">

    <!--First slide-->
    <div class="carousel-item active mb-5">
      
  <div class="container">
<div class="row  ">
      <div class="col-md-4 ">
        <div class="testimony-wrap p-4 pb-5">
          <div class="user-img mb-5 ">
            <img class="img-responsive img-circle w-50 rounded-circle" src="imgs/person_1.jpg" alt="img">
          <span class="quote d-flex float-right ">
          <i class="fas fa-quote-left "></i>
          </span>
          </div>
          <div class="text">
          <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          <p class="hd-3">Mark Web</p>
          <span class="position">Marketing Manager</span>
          </div>
          </div>
       </div>
       <div class="col-md-4">
        <div class="testimony-wrap p-4 pb-5">
          <div class="user-img mb-5 ">
            <img class="img-responsive img-circle w-50 rounded-circle" src="imgs/person_2.jpg" alt="img">
          <span class="quote d-flex float-right ">
          <i class="fas fa-quote-left "></i>
          </span>
          </div>
          <div class="text">
          <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          <p class="hd-3">Bill Zuck</p>
          <span class="position">UI Designer</span>
          </div>
          </div>
       </div>
       <div class="col-md-4">
        <div class="testimony-wrap p-4 pb-5">
          <div class="user-img mb-5 ">
            <img class="img-responsive img-circle w-50 rounded-circle" src="imgs/person_3.jpg" alt="img">
          <span class="quote d-flex float-right ">
          <i class="fas fa-quote-left "></i>
          </span>
          </div>
          <div class="text">
          <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          <p class="hd-3">Mark Ben</p>
          <span class="position">IT Manager</span>
          </div>
          </div>
       </div>
</div>
    </div>
    </div>
    <!--/.First slide-->

   <!--Second slide-->
   <div class="carousel-item  mb-5">
      
    <div class="container">
  <div class="row  ">
        <div class="col-md-4 ">
          <div class="testimony-wrap p-4 pb-5">
            <div class="user-img mb-5 ">
              <img class="img-responsive img-circle w-50 rounded-circle" src="imgs/person_1.jpg" alt="img">
            <span class="quote d-flex float-right ">
            <i class="fas fa-quote-left "></i>
            </span>
            </div>
            <div class="text">
            <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            <p class="hd-3">Mark Web</p>
            <span class="position">Marketing Manager</span>
            </div>
            </div>
         </div>
         <div class="col-md-4">
          <div class="testimony-wrap p-4 pb-5">
            <div class="user-img mb-5 ">
              <img class="img-responsive img-circle w-50 rounded-circle" src="imgs/person_1.jpg" alt="img">
            <span class="quote d-flex float-right ">
            <i class="fas fa-quote-left "></i>
            </span>
            </div>
            <div class="text">
            <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            <p class="hd-3">Mark Web</p>
            <span class="position">Marketing Manager</span>
            </div>
            </div>
         </div>
         <div class="col-md-4">
          <div class="testimony-wrap p-4 pb-5">
            <div class="user-img mb-5 ">
              <img class="img-responsive img-circle w-50 rounded-circle" src="imgs/person_1.jpg" alt="img">
            <span class="quote d-flex float-right ">
            <i class="fas fa-quote-left "></i>
            </span>
            </div>
            <div class="text">
            <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            <p class="hd-3">Mark Web</p>
            <span class="position">Marketing Manager</span>
            </div>
            </div>
         </div>
  </div>
      </div>
      </div>
      <!--/.Second slide-->

  <!--Third slide-->
  <div class="carousel-item  mb-5">
      
    <div class="container">
  <div class="row  ">
        <div class="col-md-4 ">
          <div class="testimony-wrap p-4 pb-5">
            <div class="user-img mb-5 ">
              <img class="img-responsive img-circle w-50 rounded-circle" src="imgs/person_1.jpg" alt="img">
            <span class="quote d-flex float-right ">
            <i class="fas fa-quote-left "></i>
            </span>
            </div>
            <div class="text">
            <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            <p class="hd-3">Mark Web</p>
            <span class="position">Marketing Manager</span>
            </div>
            </div>
         </div>
         <div class="col-md-4">
          <div class="testimony-wrap p-4 pb-5">
            <div class="user-img mb-5 ">
              <img class="img-responsive img-circle w-50 rounded-circle" src="imgs/person_1.jpg" alt="img">
            <span class="quote d-flex float-right ">
            <i class="fas fa-quote-left "></i>
            </span>
            </div>
            <div class="text">
            <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            <p class="hd-3">Mark Web</p>
            <span class="position">Marketing Manager</span>
            </div>
            </div>
         </div>
         <div class="col-md-4">
          <div class="testimony-wrap p-4 pb-5">
            <div class="user-img mb-5 ">
              <img class="img-responsive img-circle w-50 rounded-circle" src="imgs/person_1.jpg" alt="img">
            <span class="quote d-flex float-right ">
            <i class="fas fa-quote-left "></i>
            </span>
            </div>
            <div class="text">
            <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            <p class="hd-3">Mark Web</p>
            <span class="position">Marketing Manager</span>
            </div>
            </div>
         </div>
  </div>
      </div>
      </div>
      <!--/.Third slide-->

  </div>
  <!--/.Slides-->

</div>
<!--/.Carousel Wrapper-->
 </section>
 <!--Subscribe Section-->
 <section class="subscribe-section text-center bg-white text-dark p-5">
  <h4 class="hd-4">Subcribe to our Newsletter</h4>
  <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,<br>
     there live the blind texts. Separated they live in</p>
   
     <input type="text" class="border border-dark bg-transparent p-1" size='40' placeholder="Enter email address">
     <input type="submit" class="btn btn-success" value="Subscribe" class="submit px-3">
    
 </section>
  <!--Footer Section-->
 <?php include "footer.php" ;?>


</body>

<script type="text/javascript">
  $(".count").counterUp({delay:10,time:1000});

</script>
</html>
<?php include "cart.php"; ?>