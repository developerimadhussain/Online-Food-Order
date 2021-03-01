<?php
require('database/Db_Connection.php');
$employee_id=$_GET['id'];
	if(!empty($_POST))
	{
    $category = $_POST['category'];
    $name = $_POST['name'];
    $details = $_POST['details'];
    $price = $_POST['price'];
	$image=$_FILES['img']['name'];
	
  /*   move_uploaded_file($_FILES['img']['name'],"../employee/upload_image/".$_FILES['img']['name']);
	$image= "employee/upload_image/".$_FILES['img']['name']; */ 
    if ((strlen($name) == 0) || (strlen($category) == 0)  || (strlen($price) == 0)) {
        echo '<script language="javascript">';
        echo 'alert("Please fill all the fields")';
        echo '</script>';
    }
						
			  
			  else {
        $query = "SELECT item FROM food WHERE name='$name'";
        $result = mysqli_query($con,$query);
        
        $count = mysqli_num_rows($result);
        
        if ($count==0) {

            $query = 'INSERT INTO food(employee_id,category, name, details, price, image) VALUES ("'.$employee_id.'","'.$category.'","'.$name.'","'.$details.'","'.$price.'","'.$image.'")';

            mysqli_query($con,$query);
			move_uploaded_file($_FILES['img']['tmp_name'],"image/$email/foodimages/".$_FILES['img']['name']);
            header("location:success.php?ref=3");
        }
        else {
            echo '<script language="javascript">';
            echo 'alert("Sorry this item already exists.")';
            echo '</script>';
        }
    }
	}

?>