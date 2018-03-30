$(document).ready(function() {

    // Календарь
    $('#date_start, #date_end, #created_at').datetimepicker({
      format: 'dd/mm/yyyy',
      autoclose: true,
      todayBtn: true,
      minView: 'month', 
    });
    // Мультиселект на дропдаун
    $('#mult_boot, .emails_forms').multiselect();
    // Окно подтверждения при удалении
    $('.form-item-delete').on('click', function() {
        var redirectUrl = $(this).data('href');
        console.log('2');
        bootbox.confirm({
            message: "Are you sure?",
            buttons: {
                confirm: {
                    label: 'Yes, delete',
                    className: 'btn-danger'
                },
                cancel: {
                    label: 'No, stay',
                    className: 'btn-success'
                }
            },
            callback: function (result) {
                console.log('1');
                if(result){
                    location.href = redirectUrl;
                }
            }
        });
    }); 
  
    // Нажатие на кнопку ссылки
    $('[name="export_url"]').on('click', function() {

        if($('[name="export_url"]:checked')){
          $('#url').attr('disabled', false);  
        }
        if( $('[name="export_url"]:checked').length == 0 ){
          $('#url').attr('disabled', true);  
          $('#url').val(null);  
        }
        $('[name="page_id"]').val(null);
        $('[name="slug"]').val(null);
    })
    // Добавление существующей страницы
    $('.add-menu').on('click', function() {
      var id = $(this).data('id');
      $('[name="page_id"]').val(null);
      $('#url').val(null);
      if($('[name="export_url"]:checked')){
          $('#url').attr('disabled', true);  
          $('#url').val(null);  
          $('[name="export_url"]').attr('checked', false);
        }
      var CSRF_TOKEN = $('input[name="_token"]').val();
      $.ajax({
          url: "add/menu",
          type: "POST",
          data: "_token=" + CSRF_TOKEN + "&page_id=" + id,
          success: function(data) {
              var Page = jQuery.parseJSON(data);
              $('#title').val(Page.title);
              $('[name="page_id"]').val(Page.id);
              $('[name="slug"]').val(Page.slug);
          }
      })
    })
});

$(document).ready(function(){
  // $('.table').DataTable();
  var editor_config = {
  path_absolute: "/",
  selector: "textarea.tiny",
  theme: "modern",
  width: 680,
  forced_root_block: "",
  height: 300,
  verify_html: false,
  autoresize_on_init: true,
  subfolder: "",
  extended_valid_elements: "span[*]",
  force_p_newlines: false,
  force_br_newlines: false,
  convert_newlines_to_brs: false,
  remove_linebreaks: true,
  plugins: [
    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
    "searchreplace wordcount visualblocks visualchars code fullscreen",
    "insertdatetime media nonbreaking save table contextmenu directionality",
    "emoticons template paste textcolor colorpicker textpattern"
  ],
  toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
  relative_urls: false,
  file_browser_callback: function(field_name, url, type, win) {
    var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
    var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

    var cmsURL = editor_config.path_absolute + '/l/f/m/s/t/u/b/laravel-filemanager?field_name=' + field_name;
    console.log(cmsURL);
    if (type == 'image') {
      cmsURL = cmsURL + "&type=Images";
    } else {
      cmsURL = cmsURL + "&type=Files";
    }

    tinyMCE.activeEditor.windowManager.open({
      file: cmsURL,
      title: 'Filemanager',
      width: x * 0.8,
      height: y * 0.8,
      resizable: "yes",
      close_previous: "no"
    });
  }
};

tinymce.init(editor_config);

// opt = {'prefix' : '/l/f/m/s/t/u/b/laravel-filemanager'};
// $('#lfm').filemanager('image', opt);

});