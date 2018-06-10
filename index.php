<!DOCTYPE html>
<html>
<head>
    <title>Upload Files using normal form and PHP</title>
</head>
<body>
  <form enctype="multipart/form-data" method="post" action="upload.php">
    <div class="row">
    <input type="file" name="filesToUpload[]" id="filesToUpload" multiple="multiple" />
      <output id="filesInfo"></output>
    </div>
    <div class="row">
      <input type="submit" value="Upload" />
    </div>
  </form>
  <script>
  function fileSelect(evt) {
    if (window.File && window.FileReader && window.FileList && window.Blob) {
        var files = evt.target.files;
        var result = '';
        var file;
    for (var i = 0; file = files[i]; i++) {
        result += '<li>' + file.name + ' ' + file.size + ' bytes</li>';
        }
    document.getElementById('filesInfo').innerHTML = '<ul>' + result + '</ul>';
    } else {
    alert('The File APIs are not fully supported in this browser.');
    }
}
document.getElementById('filesToUpload').addEventListener('change', fileSelect, false);
</script>
</body>
</html>