
<?php
require('database/Db_Connection.php');

if(!empty($_POST))
	{
	$food_id=$_GET['id'];
    $category = $_POST['category'];
    $name = $_POST['name'];
    $details = $_POST['details'];
    $price = $_POST['price'];
	$image=$_FILES['img']['name'];
	 
    if ((strlen($name) == 0) || (strlen($category) == 0)  || (strlen($price) == 0)) {
        echo '<script language="javascript">';
        echo 'alert("Please fill all the fields")';
        echo '</script>';
    }
						
			  
	 else {
		   if($image){
           $query = "update  food  set name='$name',price='$price',category='$category',details='$details',image='$image' where food_id='$food_id'";
		   }
		   else
			  $query = "update  food  set name='$name',price='$price',category='$category',details='$details' where food_id='$food_id'";  
            mysqli_query($con,$query);
			move_uploaded_file($_FILES['img']['tmp_name'],"image/$email/foodimages/".$_FILES['img']['name']);
            header("location:success.php?ref=5");
        }
       
    }
	

?>
	