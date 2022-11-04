<?php
session_start();

include_once "../config/dbconnect.php";
$ID=$_POST['record'];

$query = "SELECT quantity, variation_id from cart where cart_id= $ID";
$all = mysqli_query($conn,$query);

    while($res = mysqli_fetch_array($all))
    {
        $q=$res['quantity'];
        $v=$res['variation_id'];
        
        $qry="SELECT stock_quantity from product_size_variation where variation_id = $v";
        $st = mysqli_query($conn,$qry);

        while($res2 = mysqli_fetch_array($st))
        {
            $sq=$res2['stock_quantity'];
        }
    }
    if($q<$sq-1){
        $q++;
        
        $finalqry = mysqli_query($conn,"UPDATE cart SET quantity=$q where cart_id= $ID");
        if($finalqry){
            echo "true";
        }
    }else{
        echo '<script>alert("No more quantity left")</script>';
    }

    ?>

    