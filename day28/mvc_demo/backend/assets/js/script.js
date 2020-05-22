$(document).ready(function () {
    var obj_ckfinder = {
        filebrowserBrowseUrl: 'assets/ckfinder/ckfinder.html',
        filebrowserUploadUrl : 'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
    };
  CKEDITOR.replace('description',obj_ckfinder);
});