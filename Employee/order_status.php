<div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                     Order Status
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
                                    <th  style="text-align: center;">Order Id</th>
									<th style="text-align: center;">Customer Email</th>
                                    <th style="text-align: center;">Food Id</th>                                                           
                                    <th style="text-align: center;">Order Status</th>
                                    <th style="text-align: center;">Update Status</th>
                                </tr>
                            </thead>
                            <tbody>
  <?php
                                $sql = "select * from order";

                                $result = mysqli_query($con,$sql);

                               
                                $count = 0;

                                while($result)
                                {?>
                                  
								   <tr>
				 				 
				<td align="center"><img src="<?php echo 'image/'.$result[1];?>" height="100px" width="150px"></td>
				<td align="center" style="width:150px;"><?php  echo $result[3]."<br>";?></td>
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
			  
                        </tbody>
                    </table>
                </div>
           