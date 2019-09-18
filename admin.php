<?php
include_once('db_connect.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>

<?php
// define variables and set to empty values
$nameErr = $directorErr = $categoryErr = $imageErr = $durationErr = "";
$name = $director = $category = $protagonist = $image = $duration = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Solo Letras";
    }
  }

  if (empty($_POST["director"])) {
    $directorErr = "director is required";
  } else {
    $director = test_input($_POST["director"]);
    // check if e-mail address is well-formed
    if (!filter_var($director, FILTER_VALIDATE_director)) {
      $directorErr = "Invalid director format";
    }
  }

  if (empty($_POST["image"])) {
    $image = "";
  } else {
    $image = test_input($_POST["image"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$image)) {
      $imageErr = "Invalid URL";
    }
  }

  if (empty($_POST["protagonist"])) {
    $protagonist = "";
  } else {
    $protagonist = test_input($_POST["protagonist"]);
  }

  if (empty($_POST["duration"])) {
    $duration = "";
  } else {
    $duration = test_input($_POST["duration"]);
  }

  if (empty($_POST["category"])) {
    $categoryErr = "category is required";
  } else {
    $category = test_input($_POST["category"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="director" value="<?php echo $director;?>">
  <span class="error">* <?php echo $directorErr;?></span>
  <br><br>
  image: <input type="text" name="image" value="<?php echo $image;?>">
  <span class="error"><?php echo $imageErr;?></span>
  <br><br>
  protagonist: <textarea name="protagonist" rows="5" cols="40"><?php echo $protagonist;?></textarea>
  <br><br>
  duration: <textarea name="duration" rows="5" cols="40"><?php echo $duration;?></textarea>
  <br><br>
  category:
  <input type="radio" name="category" <?php if (isset($category) && $category=="female") echo "checked";?> value="female">Female
  <input type="radio" name="category" <?php if (isset($category) && $category=="male") echo "checked";?> value="male">Male
  <input type="radio" name="category" <?php if (isset($category) && $category=="other") echo "checked";?> value="other">Other
  <span class="error">* <?php echo $categoryErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $director;
echo "<br>";
echo $image;
echo "<br>";
echo $protagonist;
echo "<br>";
echo $category;
echo "<br>";
echo $category;
?>

</body>
</html>
