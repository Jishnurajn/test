<?php 
$dir = "images";
$file= $_POST['file'];
if(isset($file)){
	
	unlink("images/".$file);
	//unlink($dir/$file);
	echo "file deleted successfully";
}
else {
	echo "Oopss something went wrong. Please try again";
}
?>