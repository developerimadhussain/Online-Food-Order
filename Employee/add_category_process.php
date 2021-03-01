<?php
require('database/Db_Connection.php');
	if(!empty($_POST))
	{
    $category = $_POST['cat'];
 
    if ( (strlen($category) == 0) ) {
        echo '<script language="javascript">';
        echo 'alert("Please fill all the fields")';
        echo '</script>';
    }
						
			  
			  else {
        $query = "SELECT * FROM category WHERE category_name='$category'";
        $result = mysqli_query($con,$query);
        
        $count = mysqli_num_rows($result);
        
        if ($count==0) {

            $query = 'INSERT INTO category(category_name) VALUES ("'.$category.'")';

            mysqli_query($con,$query);
            header("location:success.php?ref=2");
        }
        else {			  
			 echo' <script language="javascript">';
             echo'alert("Sorry this category already exists.")'; 
             echo '</script>';
			 }
             
   
    }
	 
	}
	    

?>