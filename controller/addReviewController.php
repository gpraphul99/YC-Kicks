<?php

    include_once "../config/dbconnect.php";
    session_start();
        
    $user_id=$_SESSION['user_id'];
    if($user_id){
        if(isset($_POST['sendReview']))
        {
            $id=$_POST['id'];
            $review=$_POST['review'];

            $insert = " INSERT into review (user_id, product_id, review_desc) 
            values($user_id,$id,'$review')";
            $Query =mysqli_query($conn,$insert);
            if($Query){
                header('location: ../index.php?review=success');
            }else{
                header('location: ../index.php?review=error');
                echo mysqli_error($conn);
           }
        }
       
   }
   else{
        header('location: ../login.php?error=cart');
   }
?>