<?php 
 include "db.php";
 $query="SELECT * FROM Users WHERE Email ='$email' ";
 $result=mysqli_query($conn, $query);
 $final=mysqli_fetch_assoc($result);
 $uid=$final['id'];
 //Show cart iterms
 $output =mysqli_query($conn,"SELECT *
 FROM tours  JOIN cart ON tours.id =cart.tid WHERE uid ='$uid' ");
 $data=mysqli_fetch_all($output, MYSQLI_ASSOC);

//Del from cart query
 if(isset($_POST['remove'])){
  $id=$_POST['id'];
$del=mysqli_query($conn,"Delete from cart  where id='$id'");
if(!$del){
  
 echo  "Error: ";
}
else{
  echo "<script> alert('Your Cart Item Successfully Removed!');window.location.href='index.php' </script>";
}
 }

//Update Cart Quantity
if(isset($_POST['update'])){
  $id=$_POST['id'];
   $tkt=$_POST['tkt'];
$update=mysqli_query($conn,"Update cart set tickets='$tkt'  where id='$id'");
if(!$update){
  
 echo  "Error: ";
}
else{
  echo "<script> alert('Your Cart Item Successfully Update!');window.location.href='index.php' </script>";
}
}

mysqli_close($conn);
    
 ?>

 <!-- Modal -->
 <div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cart</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-sm">
         <thead> <tr>
          <th>#</th>
          <th>Tour</th>
          <th>Price (Rs.)</th>
          <th style="width:12%">Tickets</th>
          <th>Total Price</th>
          <th>Action</th>
          </tr> </thead>
          <tbody> 
            <?php $i=1;  foreach($data as $dta){?>   <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $dta['destination'];?></td> 
            <td id="pr"><?php echo $pr=$dta['price']; ?></td>
            <form action="" method="post">
            <td>   <input class="w-100"  type="number"  min="1" name="tkt"  value="<?php echo $tick=$dta['tickets'];?>">
          </td>
            <td id="tpr"><?php echo $tpr=$pr*$tick; $gpr+=$tpr;?> </td>
            <td>
         
            <input type="hidden" name='id' value="<?php echo $dta['id'];?>" class="btn btn-sm btn-danger"> 
            <input type="submit" value="Remove" name="remove" class="btn btn-sm btn-danger"> 
            <input type="submit" value="update" name="update" class="btn btn-sm btn-info"></td>
            </form>
        </tbody> </tr> <?php }?>
        </table>
        <h5>Grand Total : Rs.<?php echo $gpr;?> <span class="total-cart"></span></h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Order now</button>
      </div>

    </div>
     </div>
</div> 


<script>

var tpr=0;
function myfun(){
  
var pr=document.getElementById('pr').innerHTML;
var tck=document.getElementById('ticket').value;
var tpr=pr*tck
document.getElementById('tpr').innerHTML=tpr;
}


</script>
