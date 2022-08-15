<!DOCTYPE html> 
<html> 
 <head> 
  <title> Ajax JavaScript File Upload Example </title> 
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
  var name = $('#fileupload').val().replace(/C:\\fakepath\\/i, '');
    alert(name);
  }
  </script>

 </body> 
</html>