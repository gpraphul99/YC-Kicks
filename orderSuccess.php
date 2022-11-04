
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Bigyan Bista, Sushant Rahapal, Susant Basnet">
        <meta name="keywords" content="YC Kicks, Shoes">
        <meta name="description" content="Shoe Shop">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./assets/css/style.css"></link>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>YC KICKS</title>
    </head>
    <body>
        <?php 
            include "./header.php";
        ?>
    
    <div class="container allContent-section">
        <div class="card-account card-container text-center">
            <h3>Order Success</h3>
            <hr>
            <img id="profile-img" class="profile-img-card" src="./assets/images/accept.png" />
            <p id="profile-name" class="profile-name-card"> Your Order is successfully placed.</p>
            
            <button class="btn btn-lg btn-primary btn-block btn-signin" onclick="showMyOrders()" >View Orders</button>
          
          
        </div><!-- /card-container -->
    </div><!-- /container -->
    <?php 
            include "./footer.php";

        ?>
        
       
        <script type="text/javascript" src="./assets/js/ajaxWork.js"></script> 
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" ></script>
    </body>
</html>