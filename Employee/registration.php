

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Employee Panel</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/sty.css" rel="stylesheet">

    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    </head>

    <body>

        <div id="wrapper">

            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="?adp=0">Employee</a>
                </div>
             
 </nav>
        <div class="container-fluid" style="background:white;">


            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Sign up
                    </h1>
                </div>
            </div>
 <div id="message1">

                                  <?php
											if(isset($_GET['error']))
											{
												echo '<p><font color="red">'.$_GET['error'].'</font></p>';
												echo '<br><br>';
											}
											
											if(isset($_GET['msg']))
											{
											echo '<p><font color="green">'.$_GET['msg'].'</font></p>';
												echo '<br><br>';
												
											}                         
										
										?>
										</div>

            <div class="row">
               

                    <form role="form" action="registration_process.php" method="POST">
						 <div class="col-md-6">
						 <div class="form-group">
                            <label>Name</label>
                            <input name="name" type="text" class="form-control" placeholder="Enter name">
                        </div>
						 <div class="form-group">
                            <label>Email</label>
                            <input name="email" type="email" class="form-control" placeholder="Enter email">
                        </div>
                        </div>
						 <div class="col-md-6">
                        
						 <div class="form-group">
                            <label>Mobile</label>
                            <input name="mobile" class="form-control" placeholder="Enter mobile">
                        </div>
						
						<div class="form-group">
						     <label>Gender</label>
									<select  name="gender" id="gender" class="form-control" required>
									<option selected>Male</option>
									<option>Female</option>
								     </select>
									
						</div>
						</div>
						 <div class="col-lg-6">					
						<div class="form-group">
                            <label>Password</label>
                            <input name="password" type="password" class="form-control" placeholder="Enter password">
                        </div>
                        </div>
						 <div class="col-lg-6">		
						<div class="form-group">
						    <label>Address</label>
							<input class="form-control"name="address" placeholder="Enter address" type="text" required>
						</div>
							
						</div>
							
                        <input type="submit" class="btn btn-primary" style="float:right;margin-right: 15px;margin-bottom: 15px;" name="register" value="Register">
                        <br>
                    </form>

                </div>

            </div>

        </div>


<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/morris/raphael.min.js"></script>
<script src="js/plugins/morris/morris.min.js"></script>
<script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
