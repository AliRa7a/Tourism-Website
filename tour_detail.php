<?php 
    include "db.php";
    include "header1.php";
    include "navbar.php";
    
     $tid= $_GET['tid'];
    $query = "SELECT * FROM tours where id=$tid" ;
    $output = mysqli_query($conn, $query);
    // Fetch all
    $total=mysqli_fetch_all($output, MYSQLI_ASSOC);
    mysqli_free_result($output);
?>

<!-- Banner Image -->
<div class=" banner_img">
    <div class=" banner"><p  class="display-1 text-white text-center"> Tour Package | Details</p> </div>
</div>
<div class="container p-5 bg-white ">
   <?php foreach($total as $totl) {?>
   <h4 class="hd-4 text-center">Tour To: <?php  echo $totl['destination']?></h4>
  <h4 class="hd-3 float-left m-2 "> <b> Pictures </h4>  
   <img class="img-responsive img-thumbnail w-75" src="imgs/<?php echo $totl['picture']?>" alt="Tour img">

   <h3 class="mt-5">Details: </h3>
   <div class="details p-4">
        <p>
       <b> Tour Destination:</b> <?php  echo $totl['destination']?> <br>
       <b> Tour Location: </b><?php  echo $totl['loc']?> <br>
       <b> Hotel: </b><?php  echo $totl['hotel']?> <br>
       <b> Total Nights Stay:</b> <?php  echo $totl['nights']?> <br>
       <b> Checkin Date:</b>  <?php  echo $totl['tdate']?> <br>
       <b> Total Price: </b> <?php  echo $totl['price']?> <br>
       <b>Description: </b> 
        <?php  echo $totl['description']?> 
        </p>
   </div>
   <a href="#" class="btn btn-outline-primary btnbook w-25 ">Book Now</a>
   
  <?php }?>
    
</div>
<style>
.details p{
    font-size:20px; line-height:50px;
    font-weight: 400; 
}
</style>