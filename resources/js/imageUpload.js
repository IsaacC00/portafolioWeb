
document.getElementById('imageUpload').addEventListener('change', function(e) {
var imagePreview = document.getElementById('imagePreview');
imagePreview.innerHTML = ''; // Limpiar el contenedor de previsualización

var files = e.target.files;

for(var i = 0; i < files.length; i++) {
(function(file) {
  var reader = new FileReader();
  reader.onload = function(e) {
      var imgContainer = document.createElement('div');
      var img = document.createElement('img');
      img.src = e.target.result;
      img.style.width = '100px';
      img.style.height = 'auto';

      imgContainer.appendChild(img);
      
      imagePreview.appendChild(imgContainer);
  };
  reader.readAsDataURL(file);
})(files[i]);
}
});
