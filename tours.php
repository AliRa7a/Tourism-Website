<?php 
    include "db.php";
    include "header1.php";
    include "navbar.php";
    //Dropdown Values
    $query = "SELECT * FROM tours" ;
    $output = mysqli_query($conn, $query);
    // Fetch all
    $total=mysqli_fetch_all($output, MYSQLI_ASSOC);
    mysqli_free_result($output);
    /////////////////////////////////////
  
    //Filter Data along Destination
      if(!empty($_POST['destination'])) {
        $dest =  $_POST['destination'];
        $v_data = "SELECT * FROM tours WHERE destination = '$dest' ";
        $result = mysqli_query($conn,$v_data);
        $final=mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        $filter='Destination'. $dest;
      }
      //Filter Data along Price
      elseif(!empty($_POST['max_price'])){
        $min_price = $_POST['min_price'];
         $max_price = $_POST['max_price'];
        $v_data = "SELECT * FROM tours WHERE price BETWEEN ' $min_price'  AND '$max_price ' ";
        $result = mysqli_query($conn,$v_data);
        $final=mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        $filter='Price: From '. $min_price." To ". $max_price;
      }
       //Filter Data along Date
      elseif(!empty($_POST['checkin_date'])){
        $checkin_date = $_POST['checkin_date'];
         $checkout_date = $_POST['checkout_date'];
        $v_data = "SELECT * FROM tours WHERE tdate BETWEEN ' $checkin_date'  AND '$checkout_date ' ";
        $result = mysqli_query($conn,$v_data);
        $final=mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        $filter='Date: From '. $checkin_date." To ". $checkout_date;
      }
      //Else Show all tours
      else{
        $query = "SELECT * FROM tours" ;
        $result = mysqli_query($conn, $query);
        // Fetch all
        $final=mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        $filter='All';
      }
      //Check tour is in Cart?
      $query = "SELECT id FROM cart " ;
      $result = mysqli_query($conn, $query);
      $tours=mysqli_fetch_all($result, MYSQLI_ASSOC);
     
      ////////////////////////////

      if(isset($_POST['submit']))
          {
            
            $uid=$_POST['uid'];
            $tid = $_POST['tid'];
           //User is login or Not?   
              $email= $_SESSION['email'];
            if(!$_SESSION['email']==true){
              echo "<script> alert('Your Need to Login First!');window.location.href='signin.php' </script>"; 
            }  
            //IS Tour  Alredy Booked?
            elseif(array_key_exists($tid, $tours)){
          
                  echo "<script> alert('Tour is already Booked!. You can Increase the ticket.');window.location.href='tours.php' </script>";  }
             
            
              else{
                
              $insert =mysqli_query($conn,"INSERT INTO `cart`(`uid`, `tid`)
              VALUES ('$uid','$tid')");
          
                  if(!$insert){
                      echo mysqli_error();
                  } 
                  else{
                      echo "<script> alert('Your Tour is Successfully Booked!');window.location.href='tours.php' </script>";
                  }
                }
            
          }
      mysqli_close($conn);
    
?>
<!-- Banner Image -->
<div class=" banner_img">
<div class=" banner"><p  class="display-1 text-white text-center"> Tours Packages</p> </div>
</div>
<div class="row ">
    <!-- Fiilter Sidebar column -->
    <div class="col-md-2 offset-md-1 text-center bg-white border "  >
  
            <h3 class="heading m-4 hd-3 ">Find Tour</h3>
            <!-- Search  Form -->
            <form  method="POST">
            <div class="fields">
            <div class="form-group">
            <div class="select-wrap one-third">
            <div class="icon"><span class="ion-ios-arrow-down"></span></div>  
            <select name="destination" id="" class="form-control" placeholder="Keyword search">
            <option value="">Select Destination</option>
           <?php foreach( $total as $totl) { ?>
            <option value="<?php echo $totl['destination']; ?>"><?php echo $totl['destination']; ?></option> <?php } ?>
            </select>
            </div>
         
            </div>
            <div class="form-group">
            <input type="text" name="checkin_date" onfocus="(this.type='date')" class="form-control checkin_date" placeholder="Date from">
            </div>
            <div class="form-group">
            <input type="text" name="checkout_date"  onfocus="(this.type='date')" class="form-control checkout_date" placeholder="Date to">
            </div>
            <div class="form-group">
            <div class="range-slider">
            <span> <p>Price</p>
            <input type="number" placeholder="2500" name="min_price" min="0" max="120000"> -
            <input type="number" placeholder="50000" name="max_price" min="0" max="120000">
            </span>
            
            </div>
            </div>
            <div class="form-group">
            <input type="submit" value="Search" name="search" class="btn btn-outline-primary py-2 px-4">
            </div>
            </div>
            </form>

    </div>
    <div class="col-md-9 ">
     <!--Popular Tours Section-->
 <section class="tours-sectioin">

        <h4 class="hd-4 text-center mt-4">Upcoming Tours</h4> <br>
        <div class="bg-white p-3 mt-4 "> <h5>Showing Result:</h5><?php echo $filter; ?> 
         </div> <br>
        <div class="row " >
          <?php foreach ($final as $last) { ?>
            
            <!--Dispaly tours blocks -->
          <div class="col-md-3 m-2 shadow border  p-0">
            <div class="bgimg w-100  img-responsive" style="background-image: url('imgs/<?php echo $last['picture'] ?>');
    background-size: cover;
    height: 15rem !important;">
          
             <p class="ontext"> <?php echo $last['description'] ?>.... <a href="tour_detail.php?tid=<?php echo $last['id']?> ">View More </a> </p> </div>
            <h3 class="hd-3 "><a class="text-reset text-decoration-none" href="tour_detail.php?tid=<?php echo $last['id']?> "><?php echo $last['destination'] ?></a></h3> 
            <p class="price"><?php echo $last['price'] ?> Pkr / <?php echo $last['nights'] ?> nights </p>
              <!-- Form For Booking Tickets -->
              <form method="POST">
                <input type="hidden" name="tid" value="<?php echo $last['id']?>">
                <input type="hidden" name="uid" value="<?php echo $uid?>"> 
              <input type="submit" name="submit" value="Book Now" class="add-to-cart btn btn-outline-primary btnbook w-100">
              </form>
          </div>
          <?php } ?>
         
        </div>
      </section>
    </div>
</div>

<?php 
    include "cart.php";
    include "footer.php";
?>