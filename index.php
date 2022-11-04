
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
        <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>

        

    </head>
    <body>
        <?php 
        if(isset($_SESSION['isAdmin']) == 1){
            include "./adminHeader.php";
        }else{
            include "./header.php";
        }
           
        ?>
        
        <div id="main-content" class="allContent-section ">

            <?php 
                include_once "./view/viewProduct.php";
               
            ?>
            
        </div>  
        <?php 
            include "./footer.php";

            if (isset($_GET['cart']) && $_GET['cart'] == "success") {
                echo '<script> alert("Added to Cart")</script>';
            }else if (isset($_GET['cart']) && $_GET['cart'] == "error") {
                echo '<script> alert("Size is not selected or Already added to Cart")</script>';
            }

            if (isset($_GET['review']) && $_GET['review'] == "success") {
                echo '<script> alert("Review submitted successfully")</script>';
            }else if (isset($_GET['review']) && $_GET['review'] == "error") {
                echo '<script> alert("Review submitting fail")</script>';
            }
        ?>
        
        
        <script type="text/javascript" src="./assets/js/ajaxWork.js"></script>  
        
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" ></script>

        
    </body>
</html>