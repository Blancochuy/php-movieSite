<?php
include_once 'db_connect.php';
if(isset($_POST['save']))
{
	 $name = $_POST['name'];
	 $duration = $_POST['duration'];
	 $director = $_POST['director'];
	 $image = $_POST['image'];
	 $category = $_POST['category'];
	 $protagonist = $_POST['protagonist'];
	 $sql = "INSERT INTO cards (name,duration,director,image,category,protagonist)
	 VALUES ('$name','$duration','$director','$image','$category','$protagonist')";
	 if (mysqli_query($conn, $sql)) {
		echo "New record created successfully !";
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
?>
