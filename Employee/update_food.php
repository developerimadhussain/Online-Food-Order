<?php

    if(isset($_SESSION['valid'])==True){?>
 
        <div class="container-fluid">


            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                       Update Food
                    </h1>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-6">

                    <form role="form" action="food_update_process.php?id=<?php echo $_GET['id'];?>" method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <label>Category</label>
                            <select name="category" class="form-control">
                             
                                <?php
								require('database/Db_Connection.php');
                                $sql = "select * from category";

                                $result = mysqli_query($con,$sql);

                                $response = array();
                                $count = 0;

                                while($row = mysqli_fetch_array($result))
                                {
                                    echo "
                                    <option>".$row[1]."</option>";
                                $count++;
                            }

                            ?>
							
                          </select>
                        </div>
						<?php
						require('database/Db_Connection.php');
							$food_id=$_GET['id'];
							$query = "SELECT * FROM food WHERE food_id='$food_id'";
						       $result = mysqli_query($con,$query);								
								   while($row = mysqli_fetch_array($result))
                                {
									?>
                        <div class="form-group">
                            <label>Name</label>
                            <input name="name" class="form-control" placeholder="Enter food name" value="<?php echo $row['name'];?>">
                        </div>

                        <div class="form-group">
                            <label>Details</label>
                            <input name="details" class="form-control" placeholder="Enter details" value="<?php echo $row['details'];?>">
                        </div>

                        <div class="form-group">
                            <label>Price</label>
                            <input name="price" type="number" class="form-control" placeholder="Enter Price" value="<?php echo $row['price'];?>">
                        </div>

                       <div class="form-group">
						<label for="exampleFormControlFile1">Image:</label>
						<input type="file" class="form-control-file" name="img" id="img" >
					  </div>
					
								  <?php	}?>
                    <input type="submit" class="btn btn-default" name="update" value="Update">

                    </form>

                </div>
                
            </div>
            </div>
            

    <?php
}
?>
</div>

