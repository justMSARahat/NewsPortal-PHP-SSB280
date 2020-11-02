<?php
	$db = mysqli_connect("localhost","root","","newsproject");
	if ($db) {
		// echo "Connected Successfully";
	}else{
		die("Something Error " . mysqli_error($db));
	}
?>