<div class="container">
    
  <h2>Product Reviews</h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th>S.N.</th>
            <th>Product Image</th>
            <th>Product Name</th>
            <th>Reviewed By</th>
            <th>Review Description</th>
            <th>Review Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <?php
        include_once "../config/dbconnect.php";
        $sql="select * from review, users, products where review.user_id=users.user_id and review.product_id=products.product_id";
        $result=$conn-> query($sql);
        $count=1;
        if ($result-> num_rows > 0){
            while ($row=$result-> fetch_assoc()) {
                
    ?>
                <tr>
                    <td><?=$count?></td>
                    
                    <td><img width="100px" height="80px" src="<?=$row["product_image"]?>"></td>
                    <td><?=$row["product_name"] ?></td>
                    <td><?=$row["username"] ?></td>
                    <td><?=$row["review_desc"]?></td>
                    <td><?=$row["review_date"]?></td>
                    <td><button class="btn btn-danger" onclick="reviewDelete('<?=$row['review_id']?>')">Delete</button></td>
                </tr>
    <?php
                $count=$count+1;
            }
        }else{
            echo "No data";
        }
    ?>
</table>
</div>
