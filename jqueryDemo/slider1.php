<?php
include "dbslide.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Slider Demo</title>
	<script type="text/javascript" src="jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="slidescript.js"></script>
	<script type="text/javascript">
		jQuery(function($) { 

  			// settings
		  var $slider = $('.slider'); // class or id of carousel slider
		  var $slide = 'li'; // could also use 'img' if you're not using a ul
		  var $transition_time = 1000; 
		  var $time_between_slides = 2000; 

		  function slides(){
		    return $slider.find($slide);
		  }

		  slides().fadeOut();

		  // set active classes
		  slides().first().addClass('active');
		  slides().first().fadeIn($transition_time);

		  // auto scroll 
		  $interval = setInterval(
		    function(){
		      var $i = $slider.find($slide + '.active').index();

		      slides().eq($i).removeClass('active');
		      slides().eq($i).fadeOut($transition_time);

		      if (slides().length == $i + 1) $i = -1; // loop to start

		      slides().eq($i + 1).fadeIn($transition_time);
		      slides().eq($i + 1).addClass('active');
		    }
		    , $transition_time +  $time_between_slides 
		  );

		});
	</script>
	<style type="text/css">
		.slider {
		  margin: 10px 0;
		  width: 800px; /* Update to your slider width */
		  height: 500px; /* Update to your slider height */
		  position: relative;
		  overflow: hidden;
		}

		.slider li {
		  display: none;
		  position: absolute; 
		  top: 0px; 
		  left:0px; 
		}
		img{
			width: 800px; /* Update to your slider width */
		  height: 400px; /* Update to your slider height */
		}
	</style>
</head>

<body>
<div id="insertImage">
<br/>
	<form action="" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>
</div>
<center>
<ul class="slider" id="slide">
 <li>
   <img src="images/pic1.jpg" />
 </li>
 <li>
   <img src="images/pic2.jpg" />
 </li>
 <li>
   <img src="images/pic1.jpg" />
 </li>
 <li>
   <img src="images/pic3.jpg" />
 </li>
</ul></center>
<?php
if(isset($_REQUEST['submit'])){

$target_dir = "/var/www/html/jqueryDemo/uploads/";
$infile=basename($_FILES["fileToUpload"]["name"]);
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo '<script>alert("File is not an image.")</script>';
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo '<script>alert("Sorry, file already exists.")</script>';
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo '<script>alert("Sorry, your file was not uploaded.")</script>';
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        //echo '<script>alert("The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.")</script>';
        $str='insert into Slider(imageName) values("'.$infile.'")';
        $sql=$conn->query($str);
 
		  if($sql==true)
		 {
		   echo '<script>alert("Image is inserted successfully")</script>';
		 }
    } else {
        echo '<script>alert("Sorry, there was an error uploading your file.")</script>';
    }
}

}
?>
</body>
</html> 