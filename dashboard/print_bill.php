<?php 
$order_id = base64_decode($_GET['bill_id']); 
require 'include/dbconfig.php';

$c = $con->query("select * from orders where id=".$order_id."")->fetch_assoc();

$uinfo = $con->query("select * from address where id=".$c['address_id']."")->fetch_assoc();
$user = $con->query("select * from user where id=".$c['uid']."")->fetch_assoc();
$order_date  = date("d F Y",strtotime($c['order_date']));
$t = $con->query("select * from payments where order_parent_id='".$c['oid']."'")->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Order Information</title>
    <link rel="stylesheet" href="style.css" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <style type="text/css">
        .clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #5D6975;
  text-decoration: underline;
}

body {
  position: relative;
  width: 21cm;  
  /*height: 29.7cm; */
  margin: 0 auto; 
  color: #001028;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 12px; 
  font-family: Arial;
}

header {
  padding: 10px 0;
  margin-bottom: 30px;
}

#logo {
  text-align: center;
  margin-bottom: 10px;
}

h1 {
  border-top: 1px solid  #5D6975;
  border-bottom: 1px solid  #5D6975;
  color: #5D6975;
  font-size: 2.4em;
  line-height: 1.4em;
  font-weight: normal;
  text-align: center;
  margin: 0 0 20px 0;
  background: url(dimension.png);
}

#project {
  float: left;
}

#project span {
  color: #5D6975;
  text-align: right;
  width: 80px;
  margin-right: 10px;
  display: inline-block;
  font-size: 0.8em;
}

#company {
  float: right;
  text-align: right;
}

#project div,
#company div {
  white-space: nowrap;        
}

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table tr:nth-child(2n-1) td {
  background: #F5F5F5;
}

table th,
table td {
  text-align: center;
}

table th {
  padding: 5px 20px;
  color: #5D6975;
  border-bottom: 1px solid #C1CED9;
  white-space: nowrap;        
  font-weight: normal;
}

table .service,
table .desc {
  text-align: left;
}

table td {
  padding: 20px;
  text-align: center;
}

table td.service,
table td.desc {
  vertical-align: top;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table td.grand {
  border-top: 1px solid #5D6975;;
}

#notices .notice {
  color: #5D6975;
  font-size: 1.2em;
}

footer {
  color: #5D6975;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #C1CED9;
  padding: 8px 0;
  text-align: center;
}
.th_to{
  font-weight: 700;text-align: right;
}
      </style>
      <div id="logo">
        <img src="https://www.finemorningpharma.com/dashboard/website/logo.png">
      </div>
      <h1>Invoice <b><?php echo $c['oid'];?></b></h1>
      <div id="company" class="clearfix">
        <div><b>Fine Morning Pharma</b></div>
        <div>D-9 Narayani, Laxminagar,<br>
          Nagpur - 440022, Maharashtra.</div>
        <div>+91 8767287918</div>
        <div><a href="mailto:company@example.com">finemorningpharma@gmail.com</a></div>
      </div>
      <div id="project">
        <div><span>NAME</span> <?php echo $uinfo['name'];?></div>
        <div><span>ADDRESS</span> <?php echo $uinfo['hno'].','.$uinfo['society'].','.$uinfo['area'].'-'.$uinfo['pincode'];?></div>
        <div><span>MOBILE</span> <?php echo $user['mobile'];?></div>
        <div><span>DATE</span> <?php echo $order_date; ?></div>
        <?php 
        if($c['p_method'] == 'Cash on delivery' or $c['p_method'] == 'Cash On Delivery' or $c['p_method'] == 'Pickup myself' or $c['p_method'] == 'Pickup Myself')
        {
        }
        else
        {
          ?>
          <div><span>TRANSACTION ID</span> <?php echo $t['payment_id'];?></div>
          <?php 
        }
        ?>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th>#</th>
            <th class="desc">Prodct Name</th>
            <th>PRICE</th>
            <th>QTY</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>
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
            <td class="desc"><?php echo $pinfo['pname'];?></td>
            <td class="unit">₹<?php echo $pprice[$i];?></td>
            <td class="qty"><?php echo $qty[$i];?></td>
            <td class="total">₹<?php echo ($pprice[$i] * $qty[$i]) - $discount;?></td>
          </tr>
          <?php


        $ksub [] = $subtotal  + ($qty[$i] * $pprice[$i]) - $discount;
        
} ?>

<?php
$subtotal = number_format((float)array_sum($ksub), 2, '.', '');
$tax = number_format((float) $subtotal * $c['tax']/100, 2, '.', '');

 
?>
          <tr>
            <td class="th_to" colspan="4">SUBTOTAL</td>
            <td class="total">₹<?php echo $subtotal?></td>
          </tr>
          <tr>
            <td class="th_to" colspan="4">CGST (6%)</td>
            <td class="total">₹<?php echo $c['tax']/2;?></td>
          </tr>
          <tr>
            <td class="th_to" colspan="4">SGST (6%)</td>
            <td class="total">₹<?php echo $c['tax']/2;?></td>
          </tr>
          <tr>
            <td class="th_to" colspan="4">SHIPPING CHARGE</td>
            <td class="total">₹<?php echo $c['ship_charge'];?></td>
          </tr>
          <?php if($c['promocode'] != ''){ ?>
            <tr>
            <td class="th_to" colspan="4">PROMOCODE APPLIED</td>
            <td class="total"><?php echo '- ₹'.$c['promocode'];?></td>
          </tr>
            
            <?php } ;?>
          <tr>
            <td class="th_to" colspan="4" class="grand total">GRAND TOTAL</td>
            <td class="grand total">₹ <?php echo $c['total'];?></td>
          </tr>
        </tbody>
      </table>
      <button type="button" class="btn_print" onclick="print_btn()">Print</button>
      <!-- <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div> -->
    </main>
   <!--  <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer> -->
    <script type="text/javascript">
      function print_btn(){
        window.print();
      }
      window.print();
    </script>
  </body>
</html>