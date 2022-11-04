<?php

    include_once "../config/dbconnect.php";
    session_start();
        
    $user_id=$_SESSION['user_id'];
    if($user_id){
        if(isset($_POST['addToCart']))
        {
            $id=$_POST['id'];
            $Size=$_POST['size'];
            $unitprice=$_POST['price'];

            $q = "select * from product_size_variation where product_id=$id AND size_id=$Size";
            $query=mysqli_query($conn,$q);

            while($result=mysqli_fetch_array($query))
            {
                $variation_id=$result['variation_id'];
            }

            $insert = " INSERT into cart (user_id, quantity, price, variation_id) 
            values($user_id,1,$unitprice,$variation_id)";
            $Query =mysqli_query($conn,$insert);
            if($Query){
                header('location: ../index.php?cart=success');
            }else{
                header('location: ../index.php?cart=error');
                echo mysqli_error($conn);
           }
        }
       
   }
   else{
        header('location: ../login.php?error=cart');
   }
?>