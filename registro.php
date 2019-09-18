<?php include "conn.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <?php include("head.php");?>
    </head>
    <body>
       <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="index.php" target="_self">Admin panel</a>


                </div>
            </div>
            <!-- /navbar-inner -->
        </div><br />

            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div class="content">
                            <?php

			if(isset($_POST['input'])){

				$name	= mysqli_real_escape_string($conn,(strip_tags($_POST['name'], ENT_QUOTES)));
				$duration  	= mysqli_real_escape_string($conn,(strip_tags($_POST['duration'], ENT_QUOTES)));
				$director 		= mysqli_real_escape_string($conn,(strip_tags($_POST['director'], ENT_QUOTES)));
				$image  = mysqli_real_escape_string($conn,(strip_tags($_POST['image'], ENT_QUOTES)));
				$category= mysqli_real_escape_string($conn,(strip_tags($_POST['category'], ENT_QUOTES)));
        $protagonist= mysqli_real_escape_string($conn,(strip_tags($_POST['protagonist'], ENT_QUOTES)));

        $check=mysqli_query($conn,"select * from cards where name='$name' and duration='$duration'");
        $checkrows=mysqli_num_rows($check);

        if ($checkrows>0) {
        echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, La pelicula ya existe </div>';
        } else {

				$insert = mysqli_query($conn, "INSERT INTO cards(id, name, duration, director, image, category, protagonist)
															VALUES(NULL,'$name', '$duration', '$director', '$image', '$category', '$protagonist')") or die(mysqli_error());
						if($insert){
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>los datos han sido agregados correctamente.</div>';
						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo registrar los datos.</div>';
						}

          }
			}
			?>

            <blockquote>
            Agregar pelicula
            </blockquote>
                         <form name="form1" id="form1" class="form-horizontal row-fluid" action="registro.php" method="POST" >
										<div class="control-group">
											<label class="control-label" for="name">name</label>
											<div class="controls">
												<input type="text" name="name" id="name" placeholder="name" class="form-control span8 tip" maxlength="30" required>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="duration">duration</label>
											<div class="controls">
												<input type="number" min="0" name="duration" id="duration" placeholder="duration" class="form-control span8 tip" required>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="director">director</label>
											<div class="controls">
												<input name="director" id="director" class="form-control span8 tip" type="director" placeholder="director" maxlength="30"  required />
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="image">image url</label>
											<div class="controls">
												<input name="image" id="image" class=" form-control span8 tip" type="url" pattern="^(([^:/?#]+):)?(//([^/?#]*))?([^?#]*)(\?([^#]*))?(#(.*))?" placeholder="image url" required />
											</div>
										</div>

                    <div class="control-group">
											<label class="control-label" for="category">category</label>
											<div class="controls"> <!-- Cambiar por select o radio button-->
                        <label class="radio-inline">
                          <input type="radio" name="category" value="action" checked>action
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="category" value="love">love
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="category" value="horror">horror
                        </label>
											</div>
										</div>

                    <div class="control-group">
											<label class="control-label" for="protagonist">protagonist</label>
											<div class="controls">
												<input name="protagonist" id="protagonist" class=" form-control span8 tip" type="text" placeholder="protagonist" maxlength="90" required />
											</div>
										</div>



										<div class="control-group">
											<div class="controls">
												<button type="submit" name="input" id="input" class="btn btn-sm btn-primary">Registrar</button>
                                               <a href="dex.php" class="btn btn-sm btn-danger">Cancelar</a>
											</div>
										</div>
									</form>
                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->

        <!--/.wrapper--><br />
        <div class="footer span-12">
            <div class="container">
              <center> <b class="copyright"><a href="index.php"> DBMovies</a> &copy; <?php echo date("Y")?> </b></center>
            </div>
        </div>

        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

    </body>
