<?php
class AjaxUploader
{
    public function __construct()
    {
        $this->init();
    }

    private function init()
    {

        Asset::container('ajaxuploader')->bundle('AjaxUploader');
        Asset::container('ajaxuploader')->add('jquery-js','js/jquery.min.js');
        Asset::container('ajaxuploader')->add('jquery-uiwidget-js','js/jquery-ui-widget.js');


        Asset::container('ajaxuploader')->add('bootstrap-css','http://blueimp.github.io/cdn/css/bootstrap.min.css');
        Asset::container('ajaxuploader')->add('file-upload-css','css/file-upload-ui.css');
        Asset::container('ajaxuploader')->add('upload-ui-js','js/jquery.fileupload-ui.js');
        Asset::container('ajaxuploader')->add('image-load-js','js/load-image.min.js');

        Asset::container('ajaxuploader')->add('canvas-to-blob-js','js/canvas-to-blob.min.js');
        Asset::container('ajaxuploader')->add('iframe-transport-js','js/jquery.iframe-transport.js');

        Asset::container('ajaxuploader')->add('file-upload-js','js/jquery.fileupload.js');

        Asset::container('ajaxuploader')->add('upload-process-js','js/jquery.fileupload-process.js');

        Asset::container('ajaxuploader')->add('image-upload-js','js/jquery.fileupload-image.js');

        Asset::container('ajaxuploader')->add('audio-js','js/jquery.fileupload-audio.js');

        Asset::container('ajaxuploader')->add('video-upload-js','js/jquery.fileupload-video.js');
        Asset::container('ajaxuploader')->add('upload-validate-js','js/jquery.fileupload-validate.js');


    }

    public function put()
    {
        echo '<!DOCTYPE HTML><html><body>';
        $a=file_get_contents(__DIR__.'/html-body.php');
        echo Asset::container('ajaxuploader')->styles();
        echo Asset::container('ajaxuploader')->scripts();
        echo $a;

    }
    public function a()
    {
        echo 'ass';
    }
}
