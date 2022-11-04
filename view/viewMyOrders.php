<div class="container py-4">
<?php
session_start();
    if(isset($_SESSION['user_id']))
    {
      include_once "../config/dbconnect.php";
      $id=$_SESSION['user_id'];
      $sql="SELECT * from orders where user_id=$id";
      $result=$conn-> query($sql);

        if ($result-> num_rows > 0){
        ?>
            <h2>My Orders</h2>
            <?php
            while($row = $result-> fetch_assoc()){
                $order_id=$row['order_id'];
            ?>
           
                <div class="card">
                    <div class="row">
                        <div class="col-md-9">
                        <label>#<?=$order_id?></label>
                        </div>
                        <div class="col-md-3 ">
                        <label>Order Date: <?=$row['order_date']?></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                        <label>Name: <?=$row['delivered_to']?></label>
                        </div>
                        <div class="col-md-5">
                        <label>Contact Number: <?=$row['phone_no']?></label>
                        </div>
                        <div class="col-md-3">
                        <label>Address: <?=$row['address']?></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                        <label>Payment Method: <?=$row['pay_method']?></label>
                        </div>
                        <div class="col-md-5">
                        <label>Pay Status: <?php 
                            if($row['pay_status']==0){
                                echo "<label style='color:red;'>Unpaid</label>";
                            }else{
                                echo "<label style='color:green;'>Paid</label>";
                            }?>
                        </label>
                        </div>
                        <div class="col-md-3">
                        <label>Order Status: <?php 
                            if($row['order_status']==0){
                                echo "<label style='color:red;'>Pending</label>";
                            }else{
                                echo "<label style='color:grey;'>Delivered</label>";
                            }?>
                        </label>
                        </div>
                    </div>
                    <hr>
                    <?php
                        $subqry="SELECT * from product_size_variation v, order_details d 
                        where v.variation_id=d.variation_id AND d.order_id=$order_id";
                        $res=$conn-> query($subqry);
                        while($row2 = $res-> fetch_assoc()){
                            $v_id=$row2['variation_id'];

                            ?>
                            <div class="row">
                                <?php
                                $subqry2="SELECT * from products p, product_size_variation v
                                where p.product_id=v.product_id AND v.variation_id=$v_id";
                                $res2=$conn-> query($subqry2);
                                if($row3 = $res2-> fetch_assoc()){
                                ?>
                                <div class="col-md-4">
                                <img src="<?=$row3['product_image']?>" height="100"/>
                                </div>
                                <div class="col-md-2">
                                <label> <?=$row3['product_name']?></label>
                                </div>
                                <?php
                                }

                                $subqry3="SELECT * from sizes s, product_size_variation v
                                where s.id=v.size_id AND v.variation_id=$v_id";
                                $res3=$conn-> query($subqry3);
                                if($row4 = $res3-> fetch_assoc()){
                                ?>
                                <div class="col-md-2">
                                <label>Size: <?=$row4['size_number']?></label>
                                </div>
                                <?php
                                }
                                ?>
                                <div class="col-md-2">
                                <label>Qty: <?=$row2['quantity']?></label>
                                </div>
                                <div class="col-md-2">
                                <label> Rs.<?=$row2['price']?></label>
                                </div>
                                
                            </div>
                            <hr>
                            
                            <?php
                        }
                    ?>
                </div>
            
            <?php                
            }
        }else{
        ?>
    <div class="card-account card-container text-center mt-5 mb-5 py-4">
        Sorry, Your order history is empty!!
        <div class="btn">
            
            <a href="./index.php" title="Back To Home" class="btn btn-success">Continue Shopping</a>
            
        </div>
    </div>
<?php
}

}else{
    ?>
    <div class="card-account card-container text-center mt-5 mb-5 py-4">
        Please, Login first to see your order history!!
        <div class="cart-login-btn">
            
            <a href="./login.php" title="Login"><i class="fa fa-sign-in " aria-hidden="true"></i></a>
            
        </div>
    </div>
    <?php
}
    ?>
</div>