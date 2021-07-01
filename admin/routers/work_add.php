<?php
include '../../includes/connect_db.php';
if(isset($_POST['add_work'])){
    $title = $_POST['name'];
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
                $msg = "UPLOAD FILES WITH EXTENSIONS .JPG/ .JPEG/ .PNG/ .gif !";
            }
        }
        else{
            $msg = "Image is not changed";
        }
    }
    if ($isimage) {
        $qry = "INSERT INTO `services_img`(`name`, `image_link`) VALUES ('$title','$fileDestination')";
    }
    else{
        $qry = "INSERT INTO `services_img`(`name`) VALUES ('$title')";
    }
    $update = mysqli_query($conn,$qry);
    if ($update) {
        header("location: ../pages/tables/services.php?msg=$msg");
    }
}
else{
    header("location: ../../admin");
}
?>