<div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Food Manage
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
                                    <th id="th">Food Image</th>
									<th id="th">Food Name</th>
                                    <th id="th">Food Price</th>
                                    <th id="th">Food Category</th>                                   
                                    <th id="th"">Action</th>
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
				 				 
				<td style="width:120px;"><img src="<?php echo 'image/'.$row[6];?>" height="100px" width="150px"></td>
				<td  style="width:150px;"><?php  echo $row[3]."<br>";?></td>
				<td  style="width:150px;"><?php  echo $row[5]."<br>";?></td>
				<td  style="width:150px;"><?php  echo $row[2]."<br>";?></td>
			
				<td  style="width:150px;">
				
				<a href="delete.php?id=<?php echo $row[0];?>&value=3"><button type="button" class="btn btn-warning">Delete </button></a>
				
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