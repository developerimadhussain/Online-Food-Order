<div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Manage Food 
                    </h1>

                </div>
            </div>

            <?php
            if(isset($_SESSION['valid'])==True){?>
            <div class="row">

                <div class="col-lg-6" style="width: 100%">
                  
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th  style="text-align: center;">Food Image</th>
									<th style="text-align: center;">Food Name</th>
                                    <th style="text-align: center;">Food Price</th>
                                    <th style="text-align: center;">Food Category</th>                                   
                                    <th style="text-align: center;">Delete Food</th>
                                    <th style="text-align: center;">Update item Details</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $sql = "select * from food";

                                $result = mysqli_query($con,$sql);

                                $response = array();
                                $count = 0;

                                while($row = mysqli_fetch_array($result))
                                {?>
                                  
								   <tr>
				 				 
				<td align="center"><img src="<?php echo 'image/'.$row[6];?>" height="100px" width="150px"></td>
				<td align="center" style="width:150px;"><?php  echo $row[3]."<br>";?></td>
				<td align="center" style="width:150px;"><?php  echo $row[5]."<br>";?></td>
				<td  align="center" style="width:150px;"><?php  echo $row[2]."<br>";?></td>
			
				<td align="center" style="width:150px;">
				
				<a href="delete.php?value=1&id=<?php echo $row[0];?>"><button type="button" class="btn btn-warning">Delete </button></a>
				
				</td>
				<td align="center" style="width:150px;">
				
				<a href="index.php?page=4&id=<?php echo $row[0];?>"><button type="button" class="btn btn-danger">Update </button></a>
				
				</td>
				</tr>
								
							<?php	
                            }
 $count++;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>