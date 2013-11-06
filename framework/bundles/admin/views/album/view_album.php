<?php echo Section::start('page-header');?>
<div id="page-content" class="clearfix">
    <div class="page-header position-relative">
        <h1>
            <a href="<?php echo URL::to_route('ViewAlbum'); ?>">Albums</a>

        </h1>
    </div>
</div>
<?php Section::stop();?>
<!-- Page Header End -->

<?php echo Section::start('contentWrapper');?>
<div class="row">
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
    ->add('choosen-css','css/chosen.css');
echo Asset::styles();
echo Asset::scripts();
?>

<ul class="thumbnails">
    <?php foreach($album->results as $albums){
        $images=libvilla::album_cover_image_by_id($albums->album_id);
        if($images=="http://t2.gstatic.com/images?q=tbn:ANd9GcSEUzYpB_WmWxQrA5F9HM2sp-nSTQpMV6ZFP0_Ah2t5fyYS6cAP87uAsg")
        {
        $images=$images;
        }
        else{
        $images=Config::get('application.url').'/'.Config::get('admin::admin_config.image_path').$images->image_filename;
        }
        ?>
        <li class="span3">
            <div class="thumbnail ">
                <img src="<?php echo $images; ?>" alt="" style="width: 250px;height: 150px">
                <div class="caption">
                   <h4><?php $link=URL::to_route('DisplayAlbumImage').'/'.$albums->album_id;
                       echo stringlib::Trunc($albums->album_name,15,$link);?>

                         <a style="float: right"  href="<?php echo URL::to_route('DeleteAlbum').'/'.$albums->album_id; ?>"  onclick="return confirm('Are you Sure to Delete')"><i style="color: red;font-size: 20px" class="icon-trash"></i></a> </h4>



                </div>
            </div>
        </li>
    <?php }?>
</ul>
<?php echo $album->links(); ?>


<!-- End Row -->
<?php  Section::stop();?>


<!-- Rendering Main -->
<?php echo render('admin::template.main');?>
