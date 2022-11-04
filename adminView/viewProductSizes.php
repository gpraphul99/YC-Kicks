
<div >
  <h2>Product Items</h2>
  <table class="table ">
    <thead>
      <tr>
        <th>S.N.</th>
        <th>Product Name</th>
        <th>Size</th>
        <th>Stock Quantity</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from product_size_variation v, products p, sizes s WHERE p.product_id=v.product_id AND v.size_id=s.id ";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["product_name"]?></td>
      <td><?=$row["size_number"]?></td>      
      <td><?=$row["stock_quantity"]?></td>     
      <td><button class="btn btn-primary" onclick="variationEditForm('<?=$row['variation_id']?>')">Edit</button></td>
      <td><button class="btn btn-danger" onclick="variationDelete('<?=$row['variation_id']?>')">Delete</button></td>
      </tr>
      <?php
            $count=$count+1;
          }
        }
      ?>
  </table>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-success " style="height:40px" data-toggle="modal" data-target="#myModal">
    Add Size Variation
  </button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Product Size Variation</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form  enctype='multipart/form-data' action="./controller/addVariationController.php" method="POST">
            
            <div class="form-group">
              <label>Product:</label>
              <select name="product" >
                <option disabled selected>Select product</option>
                <?php

                  $sql="SELECT * from products";
                  $result = $conn-> query($sql);

                  if ($result-> num_rows > 0){
                    while($row = $result-> fetch_assoc()){
                      echo"<option value='".$row['product_id']."'>".$row['product_name'] ."</option>";
                    }
                  }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label>Size:</label>
              <select name="size" >
                <option disabled selected>Select size</option>
                <?php

                  $sql="SELECT * from sizes";
                  $result = $conn-> query($sql);

                  if ($result-> num_rows > 0){
                    while($row = $result-> fetch_assoc()){
                      echo"<option value='".$row['id']."'>".$row['size_number'] ."</option>";
                    }
                  }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="qty">Stock Quantity:</label>
              <input type="number" class="form-control" name="qty" required>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-success" name="upload" style="height:40px">Add Variation</button>
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  
</div>
   