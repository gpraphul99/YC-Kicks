<?php
   session_start();
   include_once "./config/dbconnect.php";

?>
       
 <!-- nav -->
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    
    <a class="navbar-brand ml-5" href="./index.php">
        <img src="./assets/images/YCLogo.png" width="100" height="70" alt="YC Kicks">
    </a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            
            <a class="nav-item nav-link active" href="./index.php">Home</a>
            <a class="nav-item nav-link" href="#myorders" onclick="showMyOrders()" >My Orders</a>
            <a class="nav-item nav-link" href="#aboutus"  onclick="showAboutUs()" >About Us</a>
            <a class="nav-item nav-link" href="#contactus"  onclick="showContactUs()" >Contact Us</a>
        </div>
    </div>
    <form class="form-inline my-2 my-lg-0 " >
      <input class="form-control mr-sm-2" id="search_data" type="search" placeholder="Search" aria-label="Search">
      <i class="fa fa-search" aria-hidden="true" style="margin-left:-40px" id="myBtn" onclick="topSearch()"></i>
    </form>
    <div class="user-cart">      
        <a href="#myCart" onclick="showMyCart()" >
            <i class="fa fa-shopping-cart mr-sm-3" style="font-size:30px; color:#fff;" aria-hidden="true">
                <span> 
                    <?php
                       if(isset($_SESSION['user_id']))
                       {
                           $count=0;
                           $id=$_SESSION['user_id'];
                           $sql="SELECT * from cart WHERE user_id=$id";
                           $result=$conn-> query($sql);
                         
                           if ($result-> num_rows > 0){
                               while ($row=$result-> fetch_assoc()) {
                       
                                   $count=$count+1;
                               }
                           }
                           echo $count;
                       } else{
                            echo 0;
                       }
                        ?>  
                </span>
            </i>
        </a>
       
        <a href=" <?php
        
                    if(isset($_SESSION['user_id'])){
                        echo'./profile.php';
                    } else {
                        echo'./login.php';
                    } ?>" style="text-decoration:none;">
            <i class="fa fa-user mr-5" style="font-size:30px; color:#fff;" aria-hidden="true"></i>
        </a>
    </div>  
</nav>
<script>
var input = document.getElementById("search_data");
input.addEventListener("keypress", function(event) {
  if (event.key === "Enter") {
    event.preventDefault();
    document.getElementById("myBtn").click();
  }
});
</script>