<?php echo Section::start('page-header');?>
<link rel="stylesheet" href="http://blueimp.github.io/cdn/css/bootstrap.min.css">
<link rel="stylesheet" href="http://blueimp.github.io/cdn/css/bootstrap-responsive.min.css">
<link rel="stylesheet" href="http://blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
<div id="page-content" class="clearfix">
    <div class="page-header position-relative">
        <h1>
            Picture
            <small>
                <i class="icon-double-angle-right"></i>
                Add Pictures
            </small>
        </h1>
    </div>
</div>
<?php Section::stop();?>
<!-- Page Header End -->

<?php echo Section::start('contentWrapper');?>
<div class="row">
    <?php $status=Session::get('status');?>
    <div class="span9 offset1">
        <?php if(!empty($status) && is_array($status)){?>
            <div class="well alert-block alert-info">
                <?php foreach($status as $value){?>
                    <ul>
                        <li><?php echo $value;?></li>
                    </ul>
                <?php }?>
            </div>
        <?php } ?>
    </div>
</div>
<?php
$asset= Asset::bundle('admin')
    ->add('choosen-js','js/chosen.jquery.min.js','jquery')


    ->add('style-css','css/style.css')
    ->add('jquery','css/jquery.fileupload-ui.css')
    ->add('choosen-css','css/chosen.css');
echo Asset::styles();
echo Asset::scripts();
?>
<div class="span12">
<div class="row">
    <div class="span8">

<form action="<?php echo URL::to_route('AddImage'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">


               <div class="row fileupload-buttonbar">
                <div class="span7">
                    <!-- The fileinput-button span is used to style the file input field as button -->
                <span class="btn btn-success fileinput-button">
                    <i class="icon-plus icon-white"></i>
                    <span>Add Images</span>
                    <input type="file" name="pic_image[]" multiple>
                </span>
                    <button type="submit" class="btn btn-primary start">
                        <i class="icon-upload icon-white"></i>
                        <span>Start upload</span>
                    </button>
                    <button type="reset" class="btn btn-warning cancel">
                        <i class="icon-ban-circle icon-white"></i>
                        <span>Cancel upload</span>
                    </button>
                    <button type="button" class="btn btn-danger delete">
                        <i class="icon-trash icon-white"></i>
                        <span>Delete</span>
                    </button>
                    <input type="checkbox" class="toggle">
                    <!-- The loading indicator is shown during file processing -->
                    <span class="fileupload-loading"></span>
                </div>

              </form>

    </div>


    <script>
        /*jslint unparam: true, regexp: true */
        /*global window, $ */
        $(function () {
            'use strict';
            // Change this to the location of your server-side upload handler:
            var url = window.location.hostname === 'blueimp.github.io' ?
                    '//jquery-file-upload.appspot.com/' : 'server/php/',
                uploadButton = $('<button/>')
                    .addClass('btn')
                    .prop('disabled', true)
                    .text('Processing...')
                    .on('click', function () {
                        var $this = $(this),
                            data = $this.data();
                        $this
                            .off('click')
                            .text('Abort')
                            .on('click', function () {
                                $this.remove();
                                data.abort();
                            });
                        data.submit().always(function () {
                            $this.remove();
                        });
                    });
            $('#fileupload').fileupload({
                url: url,
                dataType: 'json',
                autoUpload: false,
                acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
                maxFileSize: 5000000, // 5 MB
                // Enable image resizing, except for Android and Opera,
                // which actually support image resizing, but fail to
                // send Blob objects via XHR requests:
                disableImageResize: /Android(?!.*Chrome)|Opera/
                    .test(window.navigator.userAgent),
                previewMaxWidth: 100,
                previewMaxHeight: 100,
                previewCrop: true
            }).on('fileuploadadd', function (e, data) {
                    data.context = $('<div/>').appendTo('#files');
                    $.each(data.files, function (index, file) {
                        var node = $('<p/>')
                            .append($('<span/>').text(file.name));
                        if (!index) {
                            node
                                .append('<br>')
                                .append(uploadButton.clone(true).data(data));
                        }
                        node.appendTo(data.context);
                    });
                }).on('fileuploadprocessalways', function (e, data) {
                    var index = data.index,
                        file = data.files[index],
                        node = $(data.context.children()[index]);
                    if (file.preview) {
                        node
                            .prepend('<br>')
                            .prepend(file.preview);
                    }
                    if (file.error) {
                        node
                            .append('<br>')
                            .append(file.error);
                    }
                    if (index + 1 === data.files.length) {
                        data.context.find('button')
                            .text('Upload')
                            .prop('disabled', !!data.files.error);
                    }
                }).on('fileuploadprogressall', function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $('#progress .bar').css(
                        'width',
                        progress + '%'
                    );
                }).on('fileuploaddone', function (e, data) {
                    $.each(data.result.files, function (index, file) {
                        var link = $('<a>')
                            .attr('target', '_blank')
                            .prop('href', file.url);
                        $(data.context.children()[index])
                            .wrap(link);
                    });
                }).on('fileuploadfail', function (e, data) {
                    $.each(data.result.files, function (index, file) {
                        var error = $('<span/>').text(file.error);
                        $(data.context.children()[index])
                            .append('<br>')
                            .append(error);
                    });
                }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');
        });
    </script>
    <script src="http://blueimp.github.io/JavaScript-Load-Image/js/load-image.min.js"></script>
    <!-- The Canvas to Blob plugin is included for image resizing functionality -->
    <script src="http://blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
    <?php
    $asset= Asset::bundle('admin')
        ->add('fileupload','js/jquery.fileupload.js','jquery')
        ->add('imagefileupload','js/jquery.fileupload-image.js','jquery')
        ->add('fileuploadprocess','js/jquery.fileupload-process.js','jquery')
        ->add('widget','js/vendor/jquery.ui.widget.js','jquery')
        ->add('iframe','js/jquery.iframe-transport.js','jquery')
        ->add('video','js/jquery.fileupload-video.js','jquery')
        ->add('validate','js/jquery.fileupload-validate.js','jquery')
        ->add('audio','js/jquery.fileupload-audio.js','jquery');

    echo Asset::styles();
    echo Asset::scripts();
    ?>
     <!-- End Row -->
    <div class="container-row">
        <div class="row">
            <div class="span10 offset1">
                <table class="table table-bordered">
                    <thead>
                    <th>Image title</th><th>Image Name</th><th>Image Description</th><th>Current Image</th><th>Edit</th>
                    </thead>

                    <?php foreach($content as $pics){?>
                    <tr>
                        <td><?php echo $pics->pic_title; ?></td><td><?php echo $pics->pic_name; ?></td><td><?php echo $pics->pic_description; ?></td>
                        <td><img src="http://localhost/villa1/public/img/<?php echo $pics->pic_image; ?>" width="50" height="50" alt=""></td>
                    <td><a href="<?php echo URL::to_route('EditImage');?>/<?php echo $pics->pic_id ?>" class="icon-pencil">Edit</a></td>
                    </tr>
                    <?php }  ?>
                </table>
            </div>
        </div>
    </div>

    <?php  Section::stop();?>


    <!-- Rendering Main -->
    <?php echo render('admin::template.main');?>
