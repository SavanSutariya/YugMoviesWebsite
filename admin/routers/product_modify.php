<?php
include '../../includes/connect_db.php';
if(isset($_POST['save_product'])){
    $sr_no = $_POST['id'];
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $price = $_POST['price'];
    if (isset($_POST['available'])) {
        $available = 1;
    }
    else {
        $available = 0;
    }

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
			        if ($fileSize < 2000000) {
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
    }
    else {
        $isimage = false;
    }
    if ($isimage) {
        $qry = "UPDATE `products` SET `title`='$title',`description`='$desc',`price`=$price,`product_img`='$fileDestination',`available`=$available WHERE id = $sr_no";
    }
    else{
        $qry = "UPDATE `products` SET `title`='$title',`description`='$desc',`price`=$price,`available`=$available WHERE id = $sr_no";
    }
    $update = mysqli_query($conn,$qry);
    if ($update) {
        header("location: ../pages/tables/products.php?image=$isimage&msg=$msg");
    }
}
else{
    header("location: ../../admin");
}
?>