<form enctype="multipart/form-data" method="post" action="upload.php">
    <div class="row">
      <label for="fileToUpload">Select Files to Upload</label><br />
      <input type="file" name="filesToUpload[]" id="filesToUpload" multiple="multiple" />
      <output id="filesInfo"></output>
    </div>
  </form>

  <script>
  if (window.File && window.FileReader && window.FileList && window.Blob) {
    document.getElementById('filesToUpload').onchange = function(){
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function(ev){
            document.getElementById('filesInfo').innerHTML = 'Done!';
        };
        xhr.open('POST', 'h5upload.php', true);
        var files = document.getElementById('filesToUpload').files;
        var data = new FormData();
        for(var i = 0; i < files.length; i++) data.append('file' + i, files[i]);
        xhr.send(data);
    };
} else {
    alert('The File APIs are not fully supported in this browser.');
}
  </script>