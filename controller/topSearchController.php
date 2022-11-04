
<div class="row px-5 py-4" >
    <?php
    session_start();

    include_once "../config/dbconnect.php";
    $ID=$_POST['record'];
   
    $query = "SELECT * from products where product_name LIKE '$ID%' ";
   
    $all = mysqli_query($conn,$query);
    if($all-> num_rows > 0){
    while($res = mysqli_fetch_array($all))
    {
        $product_id=$res['product_id'];
        
    ?>
    <div class="col-sm-3" >
        <div class="card" style="height:25rem;">
            <div class="box">
                <img src="<?= $res['product_image']?>" class="image" >
                <div class="middle">
                    <div class="text" onclick="eachDetailsForm('<?= $res['product_id']?>');">View Details</div>
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title" style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis; "><?= $res['product_name']?></h5>
                <p class="card-text">
                    <form action="./controller/addToCartController.php" method="POST">
                        
                        <div class="form-group">
                        <label>Size:</label>
                        <select name="size" >
                            <option disabled selected>Select size</option>
                            <?php

                            $sql="SELECT * from product_size_variation v, products p, sizes s WHERE p.product_id=v.product_id AND v.size_id=s.id AND p.product_id=$product_id";
                            $result = $conn-> query($sql);

                            if ($result-> num_rows > 0){
                                while($row = $result-> fetch_assoc()){
                                echo"<option value='".$row['id']."'>".$row['size_number'] ."</option>";
                                }
                            }
                            ?>
                        </select>
                        </div>
                        <div class="currency" >Rs. <?= $res['unit_price'] ?></div>
                        <input type="hidden" name="id" value = "<?= $res['product_id'] ?>">
                        <input type="hidden" name="price" value = "<?= $res['unit_price'] ?>">
                        <?php
                        if(isset($_SESSION['user_id']))
                        {
                        ?>
                        <button type="submit" class="btn btn-success mt-1 " name="addToCart" style="height:40px">Add To Cart</button>
                        <?php
                        }else{
                        ?>
                            <!-- Trigger the modal with a button -->
                            <button type="button" class="btn btn-success mt-1" style="height:40px" data-toggle="modal" data-target="#myModal">
                                Add To Cart
                            </button>
                        <?php
                        }
                        ?>
                    </form>
                </p>
            
            </div>
            
        </div>
    </div>
    <?php
    }}
    else{
        ?>
        <div class="px-3">No products of such names.</div>
        <?php
    }
    ?>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
  <h4 class="modal-title">Login</h4>
  <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
    <form class="form-signin" action="./controller/loginValidateController.php" method="post">
        <span id="reauth-email" class="reauth-email"></span>
        <input type="text" name="usernameemail" class="form-control" placeholder="Username /Email address" required autofocus>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        
        <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="login-submit">Sign in</button>
    </form><!-- /form -->
    <p>Don't have an account? <a href="./register.php">Sign Up</a></p>

</div>
<div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>

</div>
</div>