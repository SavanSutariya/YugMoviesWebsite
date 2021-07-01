<?php
include '../../includes/connect_db.php';
if(isset($_POST['add_product'])){
    $title = $_POST['title'];
    if(isset($_POST['description'])){
        $desc = $_POST['description'];
    }
    else{
        $desc = "Yug movies lets you customize and create your own Photo Printed stuff on our website";
    }

    $price = $_POST['price'];
    if (isset($_FILES['image'])) {
        $file = $_FILES['image'];
	    if ($file != '') {
            $fileName = $_FILES['image']['name'];
            $fileTmpName = $_FILES['image']['tmp_name'];
            $fileSize = $_FILES['image']['size'];
            $fileError = $_FILES['image']['error'];
            $fileType = $_FILES['image']['type'];
            $fileExt = explode('.',$fileName);
            $fileActualExt = strtolower(end($fileExt));

            $allow = array('jpg','jpeg','png','gif');

	        if (in_array($fileActualExt, $allow)) {

		        if ($fileError === 0) {
			        if ($fileSize < 5000000) {
					    $fileNameNew = uniqid('', true).".".$fileActualExt;
					    $fileDestination = 'uploads/'.$fileNameNew;
                        move_uploaded_file($fileTmpName, '../../'.$fileDestination);
					    $isimage = true;
				    }
			        else{
				        $msg = "Size Must be less then 2MB <-";
			        }	
		        }
		        else{
			        $msg = "EEERRROOOOORRR!";
		        }
	        }
            else{
                $msg = "UPLOAD FILES WITH EXTENSIONS .JPG/ .JPEG/ .PNG !";
            }
        }
        else{
            $msg = "Image is not changed";
        }
    }
    if ($isimage) {
        $qry = "INSERT INTO `products`(`title`, `description`, `price`, `product_img`) VALUES ('$title','$desc','$price','$fileDestination')";
    }
    else{
        $qry = "INSERT INTO `products`(`title`, `description`, `price`) VALUES ('$title','$desc','$price')";
    }
    $update = mysqli_query($conn,$qry);
    if ($update) {
        header("location: ../pages/tables/products.php?msg=$msg");
    }
}
else{
    header("location: ../../admin");
}
?>