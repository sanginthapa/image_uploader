<!DOCTYPE html> 
<html> 
 <head> 
  <title> Ajax JavaScript File Upload Example </title> 
   <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
 </head> 
 <body>
  <!-- HTML5 Input Form Elements -->
  <form action="#" method="post" enctype="multipart/form-data">
  <input id="fileupload" type="file" name="fileupload" onchange="uploadFile()"/> 
  <!-- <button id="upload-button" onclick="uploadFile()"> Upload </button> -->
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- Ajax JavaScript File Upload Logic -->
  <script>
    async function uploadFile() {
      // alert('i am called');
    let formData = new FormData(); 
    formData.append("file", fileupload.files[0]);
    await fetch('uploader.php', {
      method: "POST", 
      body: formData
    }); 
    alert('The file has been uploaded successfully.');
    var name = $('#fileupload').val().replace(/C:\\fakepath\\/i, 'upload/');
      alert(name);
      location.reload();
    }
  </script>


<?php
function display_image_in_folder(){
  //get current directory
	$working_dir = getcwd();
  //get image directory
	$img_dir = $working_dir . "/upload/";
  //change current directory to image directory
	chdir($img_dir);
  //using glob() function get images 
	$files = glob("*.{jpg,jpeg,png,gif,JPG,JPEG,PNG,GIF}", GLOB_BRACE );
  //again change the directory to working directory
	chdir($working_dir);
  ?>
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xxl-6 mt-5 text-center">
    <?php
    //iterate over image files
    foreach ($files as $file) {
    ?>
      <div class="col mb-3"> <img src="<?php echo "upload/" . $file ?>" style="height: 200px; width: 200px;"/></div>
    <?php }
    ?>
  </div>
  <?php
  }
?>

<!-- reload Page  -->
<?php 
function refresh_page($time){
  ?>
  <script type="text/javascript">  
    setTimeout(function(){  
        location.reload();  
    },<?php echo $time; ?>);  
  </script>
  <?php
  }
?>

<?php
// display_image_in_folder();
// refresh_page(5000);
?>

<?php
    function mtimecmp($a, $b) {
        $mt_a = filemtime($a);
        $mt_b = filemtime($b);

        if ($mt_a == $mt_b)
            return 0;
        else if ($mt_a < $mt_b)
            return -1;
        else
            return 1;
    }
    $dirname = "upload/";
    $images = glob($dirname."*.jpg");
    usort($images, "mtimecmp");
    $images=array_reverse($images);
    echo '<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xxl-6 my-5 mx-3 text-center">';
    foreach ($images as $image) {
        echo '<div class="col mb-3"><img class="w-100" src="'.$image.'"s/><br /></div>';
    }
    echo '</div>';
?>


 </body> 
</html>