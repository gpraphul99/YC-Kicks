<?php

    include_once "../config/dbconnect.php";
    session_start();
        
    $user_id=$_SESSION['user_id'];
    if($user_id){
        if(isset($_POST['orderConfirm']))
        {
            $name=$_POST['username'];
            $address=$_POST['address'];
            $contact=$_POST['contact'];            
            $note=$_POST['note'];                       
            $pay=$_POST['pay'];

            if (empty($note)){
                $note="";
            }

            $insert = " INSERT into orders (user_id, delivered_to, phone_no, address, pay_method, pay_status, order_note) 
            values($user_id,'$name',$contact, '$address','$pay',0,'$note');";
            $Query =mysqli_query($conn,$insert);
            
            $last_id = mysqli_insert_id($conn);
            if($Query){

                $qry = "select * from cart where user_id=$user_id";
                $query=mysqli_query($conn,$qry);
    
                while($result=mysqli_fetch_array($query))
                {
                    $variation_id=$result['variation_id'];
                    $quantity=$result['quantity'];
                    $price=$result['price'];
                    
                    $insert2 = " INSERT into order_details (order_id, variation_id,quantity, price) 
                    values($last_id,$variation_id,$quantity, $price)";
                    $Query2 =mysqli_query($conn,$insert2);
                    if($Query2){
                        $qry2 = "DELETE from cart where user_id=$user_id";
                        $query2=mysqli_query($conn,$qry2);
                        
                        $qry3="SELECT stock_quantity from product_size_variation where variation_id = $variation_id";
                        $st = mysqli_query($conn,$qry3);

                        while($res2 = mysqli_fetch_array($st))
                        {
                            $sq=$res2['stock_quantity'];
                        }
                        $finalq=$sq-$quantity;
                        
                        $query3=mysqli_query($conn,"UPDATE product_size_variation Set stock_quantity=$finalq where variation_id = $variation_id");

                    }else{
                        echo mysqli_error($conn);
                    }

                }

                header('location: ../orderSuccess.php');
            }else{
               // header('location: ../index.php?order=error');
                echo mysqli_error($conn);
           }
        }
       
   }
   else{
        header('location: ../login.php?error=cart');
   }
?>