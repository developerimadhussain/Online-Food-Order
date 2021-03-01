<div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Manage Customer
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
                                    <th id="th">Username</th>
									<th id="th">Email</th>
                                    <th id="th">Mobile</th>
                                    <th id="th">Address</th>                                   
                                    <th id="th">City</th>
                                    <th id="th">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $sql = "select * from customer";

                                $result = mysqli_query($con,$sql);

                                $response = array();
                                $count = 0;

                                while($row = mysqli_fetch_array($result))
                                {
                                    echo "<tr>
                                    <td>".$row[1]."</td>
                                    <td>".$row[2]."</td>
                                    <td>".$row[5]."</td>
                                    <td>".$row[6]."</td>
                                    <td>".$row[7]."</td>
                                    <td><a href=\"delete.php?value=2&id=".$row['0']."\" class=\"delete\"><input type=\"button\" class=\"btn-warning\" value=\"Delete\"></a></td>
                                </tr>";
                                $count++;
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