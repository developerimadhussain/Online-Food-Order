<div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Manage Category
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
                                    <th  style="text-align: center;">SL</th>								
                                    <th style="text-align: center;">Category Name</th>                                   
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $sql = "select * from category";

                                $result = mysqli_query($con,$sql);

                                $response = array();
                                $count = 1;

                                while($row = mysqli_fetch_array($result))
                                {?>
                                  
								   <tr>				 				 			
				<td align="center" style="width:50px;"><?php  echo $count++."<br>";?></td>
				<td align="center" style="width:70px;"><?php  echo $row[1]."<br>";?></td>						
				<td align="center" style="width:50px;">
				
				<a href="delete.php?value=2&cat=<?php echo $row[1];?>"><button type="button" class="btn btn-warning">Delete </button></a>
				
				
				</td>
			
				</tr>
								
							<?php	
                            }

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

					