<?php

    if(isset($_SESSION['valid'])==True){?>
 
        <div class="container-fluid">


            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Add Food Category
                    </h1>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-6">

                    <form role="form" action="add_category_process.php" method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <label>Category</label>
                             <input name="cat" class="form-control" placeholder="Enter food category">
                        </div>

            
                        <input type="submit" class="btn btn-default" name="add" value="Add">

                    </form>

                </div>
                
            </div>

    <?php
}
?>
</div>

