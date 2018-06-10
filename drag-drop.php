<div id="dropTarget" style="width: 100%; height: 100px; border: 1px #ccc solid; padding: 10px;">Drop some files here</div>
<output id="filesInfo"></output>
<script>
function fileSelect(evt) {
    evt.stopPropagation();
    evt.preventDefault();
    if (window.File && window.FileReader && window.FileList && window.Blob) {
        var files = evt.dataTransfer.files;
 
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
 
function dragOver(evt) {
    evt.stopPropagation();
    evt.preventDefault();
    evt.dataTransfer.dropEffect = 'copy';
}
 
var dropTarget = document.getElementById('dropTarget');
dropTarget.addEventListener('dragover', dragOver, false);
dropTarget.addEventListener('drop', fileSelect, false);
</script>