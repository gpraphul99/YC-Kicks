    <?php
    
    session_start();
        include_once "../config/dbconnect.php";

        $ID=$_POST['record'];

        $query = "select * from products where product_id='$ID'";
        $all = mysqli_query($conn,$query);
        while($res = mysqli_fetch_array($all))
        {
            
    ?>
    <style>
        .rating .fa {
            color: lightsalmon;
        }
    </style>
    
    
    <div class="container py-5">
        
        <h3 class="pl-2">Product Details</h3>
    
        <div class="row img-zoom-container">
            <div class="col pr-5">
                <div class="card" >
                    <img class="card-img-top"id="myimage" style="object-fit: cover;" src="<?= $res['product_image']?>" >               
                </div>
            </div>
            <div class="col">
                <h4 ><?= $res['product_name']?></h4>
                <div><?= $res['product_desc']?></div>
                <p class="card-text">
                    
                    <form action="./controller/addToCartController.php" method="POST">
                    <div class="form-group">
                        <label>Size:</label>
                        <select name="size" >
                            <option disabled selected>Select size</option>
                            <?php

                            $sql="SELECT * from product_size_variation v, products p, sizes s WHERE p.product_id=v.product_id AND v.size_id=s.id AND p.product_id=$ID";
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
                <!-- Rating star -->
                <div class="rating">
                    <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col pr-5">
                <div  id="myresult"class="img-zoom-result card"></div>
            </div>

            <div class="col py-5">
                <h5 style="color: #584e46">Write your review</h5>

                <div>
                    <form action="./controller/addReviewController.php" method="POST">
                        <input type="hidden" name="id" value = "<?= $res['product_id'] ?>">
                        <textarea name="review" rows="4" class="form-control" required></textarea>
                        <button class="btn btn-primary mt-3" type="submit" name="sendReview">Send Review</button>
                    </form>
                </div>

            </div>
        </div>
        
        <div class="row">
            
            <div class=" container my-4">
                    <h5 class="mx-3"> Customer Reviews </h5>
                    <div>
                        <!-- w-100 means 100% width. -->
                        <div class="customer-review w-100">  
                            <?php
                                $query = "select * from review, users where review.user_id=users.user_id and product_id='$ID'";
                                $response = mysqli_query($conn,$query);
                                while($res = mysqli_fetch_array($response))
                                {
                            ?>
                            <div class="card">
                                <h6 class="mb-1"><?= $res['username'] ?></h6>
                                <span class="date text-muted float-right"><?= $res['review_date'] ?></span>
                                <div class="rating">
                                    <span>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>

                                    </span>
                                </div>

                                <div class="mt-3">
                                    <p style="margin-bottom: 0rem;">
                                    <?= $res['review_desc'] ?>
                                    </p>
                                </div>
                            </div>

                            <?php
                                }
                            ?>
                        </div>
                    </div>

                    
            </div>
                
        </div>
      </div>
    <?php
    }
    ?>




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



<script>
    function imageZoom(imgID, resultID) {
        var img, lens, result, cx, cy;
        img = document.getElementById(imgID);
        result = document.getElementById(resultID);
        /*create lens:*/
        lens = document.createElement("DIV");
        lens.setAttribute("class", "img-zoom-lens");
        /*insert lens:*/
        img.parentElement.insertBefore(lens, img);
        /*calculate the ratio between result DIV and lens:*/
        cx = result.offsetWidth / lens.offsetWidth;
        cy = result.offsetHeight / lens.offsetHeight;
        /*set background properties for the result DIV:*/
        result.style.backgroundImage = "url('" + img.src + "')";
        result.style.backgroundSize = (img.width * cx) + "px " + (img.height * cy) + "px";
        /*execute a function when someone moves the cursor over the image, or the lens:*/
        lens.addEventListener("mousemove", moveLens);
        img.addEventListener("mousemove", moveLens);
        /*and also for touch screens:*/
        lens.addEventListener("touchmove", moveLens);
        img.addEventListener("touchmove", moveLens);
    
        function moveLens(e) {
            var pos, x, y;
            /*prevent any other actions that may occur when moving over the image:*/
            e.preventDefault();
            /*get the cursor's x and y positions:*/
            pos = getCursorPos(e);
            /*calculate the position of the lens:*/
            x = pos.x - (lens.offsetWidth / 2);
            y = pos.y - (lens.offsetHeight / 2);
            /*prevent the lens from being positioned outside the image:*/
            if (x > img.width - lens.offsetWidth) {x = img.width - lens.offsetWidth;}
            if (x < 0) {x = 0;}
            if (y > img.height - lens.offsetHeight) {y = img.height - lens.offsetHeight;}
            if (y < 0) {y = 0;}
            /*set the position of the lens:*/
            lens.style.left = x + "px";
            lens.style.top = y + "px";
            /*display what the lens "sees":*/
            result.style.backgroundPosition = "-" + (x * cx) + "px -" + (y * cy) + "px";
        }
        function getCursorPos(e) {
            var a, x = 0, y = 0;
            e = e || window.event;
            /*get the x and y positions of the image:*/
            a = img.getBoundingClientRect();
            /*calculate the cursor's x and y coordinates, relative to the image:*/
            x = e.pageX - a.left;
            y = e.pageY - a.top;
            /*consider any page scrolling:*/
            x = x - window.pageXOffset;
            y = y - window.pageYOffset;
            return {x : x, y : y};
        }
        
    }
    // Initiate zoom effect:
    imageZoom("myimage", "myresult");

</script>