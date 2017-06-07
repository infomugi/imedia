<!-- END wrapper -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/admin/assets/js/modernizr.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/admin/assets/js/bootstrap.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/admin/assets/js/detect.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/admin/assets/js/fastclick.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/admin/assets/js/jquery.slimscroll.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/admin/assets/js/jquery.blockUI.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/admin/assets/js/waves.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/admin/assets/js/wow.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/admin/assets/js/jquery.nicescroll.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/admin/assets/js/jquery.scrollTo.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/admin/assets/js/jquery.app.js"></script>

<!-- Main  -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/admin/assets/js/moment-with-locales.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/admin/assets/plugins/summernote/dist/summernote.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/admin/assets/plugins/select2/dist/js/select2.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/admin/assets/plugins/tagsinput/jquery.tagsinput.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/admin/assets/plugins/toggles/toggles.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/admin/assets/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js" type="text/javascript"></script>

<script>
  var resizefunc = [];
  jQuery(document).ready(function(){

// Summernote
$('.summernote').summernote({
                  height: 200,                 // set editor height
                  minHeight: null,             // set minimum height of editor
                  maxHeight: null,             // set maximum height of editor
                });  

// function sendFile(file, editor, welEditable) {
// data = new FormData();
// data.append("file", file);
// $.ajax({
// data: data,
// type: "POST",
// url: 'savetheuploadedfile.php',
// cache: false,
// contentType: false,
// processData: false,
// success: function(url) {
//   editor.insertImage(welEditable, url);
// }
// });
// }

// Select2
jQuery(".select2").select2({
  width: '100%'
});

// Form Toggles
jQuery('.toggle').toggles({on: true});

// Tags Input       focus: true                 // set focus to editable area after initializing summernote
jQuery('#tags').tagsInput({width:'auto'});   

//Momen JS
if($('.format-date').length > 0){
  $('.format-date').each(function(){
    var ini = $(this);
    var tgl = ini.text();
  // moment.locale('id');
  if(moment(tgl,'YYYY-MM-DD',true).isValid() || moment(tgl,'YYYY-MM-DD HH:mm:ss',true).isValid()){
    var formatTgl = moment(tgl, "YYYY-MM-DD HH:mm:ss").fromNow();
    ini.html(formatTgl);
  }
});
}                           

});</script>    
</body>
</html>