<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
		<link href="style.css" rel="stylesheet">
		<title>DBMovies</title>
		<?php include('container.php');?>
		<div class="container">
			<h2>Movies Cards</h2>
			<div class="col-lg">
		</head>
		<body>
			<form method="post" action="index.php">
				<input type="text" name="q" placeholder="Search by...">
				<select name="column">
					<option value="">Select Filter</option>
					<option value="name">Name</option>
					<option value="director">director</option>
				<option value="category">category</option>
				</select>
				<input type="submit" name="submit" value="Find">
			</form>
		</body>
	</html>
<?php
$connection = new mysqli("localhost", "root", "root", "phpzag_demos");
$sql = "SELECT id, name, image, duration, director, category, protagonist FROM cards";
$resultset = mysqli_query($connection, $sql) or die("database error:". mysqli_error($connection));

		$q = $connection->real_escape_string($_POST['q']);
		$column = $connection->real_escape_string($_POST['column']);
		if ($column == "" || ($column != "name" && $column != "director" && $column != "category")){
			while( $record = mysqli_fetch_assoc($resultset) )
			{?>
				<div class="col-lg-3 col-sm-6">
	            <div class="card hovercard">
	                <div class="cardheader">
										<img alt="" src="<?php echo $record['image']; ?>" width="100%" height="auto">
					 </div>
	                <div class="card-body info">
	                    <div class="title">
	                        <p><?php echo $record['name']; ?></p>
	                    </div>
						<div class="desc"> <a target="_blank" href="<?php echo $record['website']; ?>"><?php echo $record['website']; ?></a></div>
	                    <div class="desc"><?php echo $record['duration']; ?> minutos</div>
						<div class="desc"><?php echo $record['director']; ?></div>
						<div class="desc"><?php echo $record['protagonist']; ?></div>
	                </div>
	                <div class="card-footer bottom">
										<div>
												<p class="<?php echo $record['category'];?>"><?php echo $record['category']; ?></p>
										</div>
	                </div>
	            </div>
						</div>
		<?php	}
	}?>

<?php
		if (isset($_POST['submit']))
		{
		$sql = $connection->query("SELECT id, name, image, duration, director, category, protagonist FROM cards WHERE $column LIKE '%$q%'");
		if ($sql->num_rows > 0 && $column != "")
		{
			while ($data = $sql->fetch_array())
			{?>
				<div class="col-lg-3 col-sm-6">
	            <div class="card hovercard">
	                <div class="cardheader">
										<img alt="" src="<?php echo $data['image']; ?>" width="100%" height="auto">
					 </div>
	                <div class="card-body info">
	                    <div class="title">
	                        <p><?php echo $data['name']; ?></p>
	                    </div>
						<div class="desc"> <a target="_blank" href="<?php echo $data['website']; ?>"><?php echo $data['website']; ?></a></div>
	                    <div class="desc"><?php echo $record['duration']; ?> minutos</div>
						<div class="desc"><?php echo $data['director']; ?></div>
						<div class="desc"><?php echo $data['protagonist']; ?></div>
	                </div>
	                <div class="card-footer bottom">
										<div>
												<p class="<?php echo $data['category'];?>"><?php echo $data['category']; ?></p>
										</div>
	                </div>
	            </div>
						</div>
			<?php	}
		}
	}?>

	</div>
</div>
<?php include('footer.php');?>
