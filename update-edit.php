<?php
include "conn.php";
if(isset($_POST['update'])){
				$id			= intval($_POST['id']);
				$name	= mysqli_real_escape_string($conn,(strip_tags($_POST['name'], ENT_QUOTES)));
				$duration  	= mysqli_real_escape_string($conn,(strip_tags($_POST['duration'], ENT_QUOTES)));
				$director 		= mysqli_real_escape_string($conn,(strip_tags($_POST['director'], ENT_QUOTES)));
				$image  = mysqli_real_escape_string($conn,(strip_tags($_POST['image'], ENT_QUOTES)));
				$category = mysqli_real_escape_string($conn,(strip_tags($_POST['category'], ENT_QUOTES)));
				$protagonist = mysqli_real_escape_string($conn,(strip_tags($_POST['protagonist'], ENT_QUOTES)));

				$check=mysqli_query($conn,"select * from cards where name='$name' and duration='$duration'");
        $checkrows=mysqli_num_rows($check);

				if ($checkrows>0) {
        echo "<script>alert('Error, La pelicula ya existe'); window.location = 'dex.php'</script>";
        } else {

				$update = mysqli_query($conn, "UPDATE cards SET name='$name', duration='$duration', director='$director', image='$image' , category='$category', protagonist='$protagonist' WHERE id='$id'") or die(mysqli_error());
				if($update){
					echo "<script>alert('Los datos han sido actualizados!'); window.location = 'dex.php'</script>";
				}else{
					echo "<script>alert('Error, no se pudo actualizar los datos'); window.location = 'dex.php'</script>";
				}

			}
		}
  ?>
