<?php
	$err = $_FILES['uploadedFile']['error'];
	if($err > 0){
		echo "There is an error ". $err;
	} else {
		echo "File name is: " . $_FILES['uploadedFile']['name']. "<br>";
		echo "File type is: " . $_FILES['uploadedFile']['type']. "<br>";
		echo "File size is: " . $_FILES['uploadedFile']['size']. "<br>";
		echo "Temp file stored in: " . $_FILES['uploadedFile']['tmp_name']. "<br>";
	}
	
	// keeping the file
	echo '<h1>move_uploaded_file($temp_file, $new_location)</h1>';
	move_uploaded_file($_FILES['uploadedFile']['tmp_name'], "./uploads/". $_FILES['uploadedFile']['name']);
	echo "file uploaded to : uploads/".$_FILES['uploadedFile']['name'];
	echo "<br> file type is : ".$_FILES['uploadedFile']['type'];

?>