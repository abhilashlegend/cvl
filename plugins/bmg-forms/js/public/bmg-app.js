jQuery(document).ready(function(){
tinymce.init({
    selector: '.tinymce-enabled'
  });
});


  var quill = new Quill('#snow-container', {
    placeholder: 'Compose an epic...',
    theme: 'snow'
  });
