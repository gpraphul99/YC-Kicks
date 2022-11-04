
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
    <div class="container-fluid  px-0 allContent-section">
        <div class="card-account card-container text-center">
            <h3>Register</h3>
            <hr>
            <img id="profile-img" class="profile-img-card" src="./assets/images/profile-pic.svg" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" action="./controller/registerValidateController.php" method="post">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" name="username" class="form-control" placeholder="Username" required>
                <input type="email" name="email" class="form-control" placeholder="Email address" required autofocus>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
                <input type="password" name="confirm-password" class="form-control" placeholder="Confirm Password" required>
                <input type="text" name="user_address" class="form-control" placeholder="Address" required>
                <input type="number" name="contact_no" class="form-control" placeholder="Contact" required>
                <br>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="signup-submit">Sign Up</button>
            </form><!-- /form -->
            <p>Already have an account? <a href="./login.php">Sign In</a></p>
        </div><!-- /card-container -->
    </div><!-- /container -->
    <?php 
            include "./footer.php";
        ?>
        
        <?php
    if (isset($_GET['error'])) {
        if ($_GET['error'] == "emptyfields") {
            echo '<script>alert("Empty")</script>';
            //errormessage
        }
        else if ($_GET['error'] == "invaliduidandmail") {
            echo '<script> alert("Invalid id and email.")</script>';
          
        }
        else if ($_GET['error'] == "invalidmail") {
            echo '<script> alert("invalid email")</script>';
           
        }
        else if ($_GET['error'] == "invaliduid") {
            echo '<script> alert("invalid username")</script>';
            //errormessage for invalid username
        }
        else if ($_GET['error'] == "passwordcheck") {
            echo '<script> alert("password mismatch")</script>';
            //errormessage for password mismatch
        }
        else if ($_GET['error'] == "usernametaken") {
            echo '<script> alert("username already taken")</script>';
            //errormessage for username already taken
        }                          
    }
   
?>
        <script type="text/javascript" src="./assets/js/ajaxWork.js"></script> 
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" ></script>
    </body>
</html>