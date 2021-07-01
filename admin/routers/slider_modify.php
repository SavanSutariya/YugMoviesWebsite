<?php
if(isset($_POST['save_slider'])){
    include '../../includes/connect_db.php';
    $sr_no = $_POST['id'];
    $title = $_POST['title'];

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
        $qry = "UPDATE `slider_img` SET `title`='$title',`image_link`='$fileDestination' WHERE id = $sr_no";
    }
    else{
        $qry = "UPDATE `slider_img` SET `title`='$title' WHERE id = $sr_no";
    }
    $update = mysqli_query($conn,$qry);
    if ($update) {
        header("location: ../pages/tables/services.php?image=$isimage&msg=$msg");
    }
}
else{
    header("location: ../../admin");
}
?>