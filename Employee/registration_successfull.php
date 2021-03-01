           <div id="message1">

                                  <?php
											if(isset($_GET['error']))
											{
												echo '<p><font color="red">'.$_GET['error'].'</font></p>';
												echo '<br><br>';
											}
											
											if(isset($_GET['msg']))
											{
											echo '<p><font color="green">'.$_GET['msg'].'</font><a href="index.php">Login</a></p>';
												echo '<br><br>';
												
											}                         
										
										?>
										</div>