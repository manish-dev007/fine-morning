
<?php 

require 'include/dbconfig.php';

$pid = $_POST['pid'];
$c = $con->query("select * from orders where id=".$pid."")->fetch_assoc();
$uinfo = $con->query("select * from address where id=".$c['address_id']."")->fetch_assoc();
$user = $con->query("select * from user where id=".$c['uid']."")->fetch_assoc();


?>
<a id='btn' class="btn btn-primary text-right" target="_blank" href="print_bill.php?bill_id=<?php echo base64_encode($pid); ?>" style="float:right;">Print</a>
<div id="divprint">
<h5><b>Order Id :- <?php echo $c['oid'];?></b></h5>
<h5><b>Customer Name :- <?php echo $uinfo['name'];?></b></h5>
<h5><b>Customer Mobile :- <?php echo $user['mobile'];?></b></h5>
<h5><b>Address :- <?php echo $uinfo['hno'].','.$uinfo['society'].','.$uinfo['area'].'-'.$uinfo['pincode'];?></b></h5>
<h5><b>Landmark:- <?php echo $uinfo['landmark'];?></b></h5>

<h5><b>Payment Method :- <?php echo $c['p_method'];?></b></h5>

<h5><b>Order Status :-</b> <?php echo $c['status'];?>
</h5>
<?php 
$t = $con->query("select * from payments where order_parent_id='".$c['oid']."'")->fetch_assoc();
if($c['p_method'] == 'Cash on delivery' or $c['p_method'] == 'Cash On Delivery' or $c['p_method'] == 'Pickup myself' or $c['p_method'] == 'Pickup Myself')
{
}
else
{
	?>
	<h5><b>Transaction Id :- <?php echo $t['payment_id'];?></b></h5>
	<?php 
}
?>
<div class="table-responsive">
<table class="table">
<tr>
<th>Sr No.</th>
<th>Prodct Name</th>
<th>Prodct Image</th>
<th>Prodct Price</th>
<th>Product Qty</th>
<th>Product Total</th>
</tr>
<?php 
$prid = explode('$;',$c['pid']);
$qty = explode('$;',$c['qty']);
$ptype = explode('$;',$c['ptype']);
$pprice = explode('$;',$c['pprice']);
$pcount = count($qty);

$op = 0;
$subtotal = 0;
	 $ksub = array();
	 
for($i=0;$i<$pcount;$i++)
{
	$op = $op + 1;
$pinfo = $con->query("select * from product where id=".$prid[$i]."")->fetch_assoc();
$discount = $pprice[$i] * $pinfo['discount']*$qty[$i] /100;
	?>
<tr>
<td><?php echo $op;?></td>
<td><?php echo $pinfo['pname'];?></td>
<td><img src="<?php echo $pinfo['pimg'];?>" width="100px"/></td>
<td><?php echo $pprice[$i];?></td>
<td><?php echo $qty[$i];?></td>
<td><?php echo ($pprice[$i] * $qty[$i]) - $discount;?></td>
</tr>
<?php


        $ksub [] = $subtotal  + ($qty[$i] * $pprice[$i]) - $discount;
        
} ?>
</table>
</div>
<?php
$subtotal = number_format((float)array_sum($ksub), 2, '.', '');
$tax = number_format((float) $subtotal * $c['tax']/100, 2, '.', '');

 
?>
<ul class="list-group">
  <li class="list-group-item">
    <span class="badge bg-primary float-right budge-own" ><?php echo $c['p_method'];?></span> Payment Method
  </li>
  <li class="list-group-item">
    <span class="badge bg-info float-right budge-own" ><?php echo $subtotal?></span> Sub Total Price
  </li>
  
   <li class="list-group-item">
    <span class="badge bg-info float-right budge-own" ><?php echo $c['tax'];?></span> Tax
  </li>
  
  <li class="list-group-item">
    <span class="badge bg-info float-right budge-own" ><?php echo $c['ship_charge'];?></span> Delivery Charge
  </li>
  <?php if($c['promocode'] != ''){ ?>
  <li class="list-group-item">
    <span class="badge bg-warning float-right budge-own" ><?php echo '-'.$c['promocode'];?></span> Promocode Applied
  </li>
  
  <?php } ;?>
  
   <li class="list-group-item">
    <span class="badge bg-info float-right budge-own" ><?php echo $c['total'];?></span> Net Amount
  </li>
  <li class="list-group-item">
    <span class="badge bg-warning float-right budge-own" ><?php echo $c['status'];?></span> Order Status
  </li>
 
</ul>
</div>