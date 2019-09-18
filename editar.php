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
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="index.php" target="_self">DBMovies</a>


                </div>
            </div>
            <!-- /navbar-inner -->
        </div><br />

            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div class="content">
                            <?php
           $id = intval($_GET['id']);
			$sql = mysqli_query($conn, "SELECT * FROM cards WHERE id='$id'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			?>

            <blockquote>
            Actualizar datos pelicula
            </blockquote>
                         <form name="form1" id="form1" class="form-horizontal row-fluid" action="update-edit.php" method="POST" >
										<div class="control-group">
											<label class="control-label" for="basicinput">ID</label>
											<div class="controls">
												<input type="text" name="id" id="id" value="<?php echo $row['id']; ?>" placeholder="Tidak perlu di isi" class="form-control span8 tip" readonly="readonly">
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">name</label>
											<div class="controls">
												<input type="text" name="name" id="name" value="<?php echo $row['name']; ?>" placeholder="" class="form-control span8 tip" maxlength="30" required>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">duration</label>
											<div class="controls">
												<input type="number" min="0" name="duration" id="duration" value="<?php echo $row['duration']; ?>" placeholder="" class="form-control span8 tip" required>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">director</label>
											<div class="controls">
												<input name="director" id="director" value="<?php echo $row['director']; ?>" class="form-control span8 tip" type="director" maxlength="30" required />
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">image</label>
											<div class="controls">
												<input name="image" id="image" value="<?php echo $row['image']; ?>" class="form-control span8 tip" type="url" pattern="^(([^:/?#]+):)?(//([^/?#]*))?([^?#]*)(\?([^#]*))?(#(.*))?" required />
											</div>
										</div>

                    <div class="control-group">
											<label class="control-label" for="basicinput">category</label>
											<div class="controls">
                        <label class="radio-inline">
                          <input type="radio" name="category" value="action" <?php if ($_POST['category'] === 'action') { echo "checked"; } ?>>action
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="category" value="love" <?php if ($_POST['category'] === 'love') { echo "checked"; } ?>>love
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="category" value="horror" <?php if ($_POST['category'] === 'horror') { echo "checked"; } ?>>horror
                        </label>
											<!--	<input name="category" id="category" value=">?php echo $row['category']; ?>" class=" form-control span8 tip" type="text" required  /> -->
											</div>
										</div>

                    <div class="control-group">
                      <label class="control-label" for="basicinput">protagonist</label>
                      <div class="controls">
                        <input name="protagonist" id="protagonist" value="<?php echo $row['protagonist']; ?>" class=" form-control span8 tip" maxlength="90" type="text" required  />
                      </div>
                    </div>

										<div class="control-group">
											<div class="controls">
												<input type="submit" name="update" id="update" value="Actualizar" class="btn btn-sm btn-primary"/>
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
              <center> <b class="copyright"><a href="index.php"> Admin panel</a> &copy; <?php echo date("Y")?> </b></center>
            </div>
        </div>

        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>




    </body>
