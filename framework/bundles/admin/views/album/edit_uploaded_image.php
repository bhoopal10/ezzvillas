<?php echo Section::start('page-header');?>
<div id="page-content" class="clearfix">
    <div class="page-header position-relative">
        <h1>
            Picture
            <small>
                <i class="icon-double-angle-right"></i>
                Add Picture
            </small>
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

<div class="span12">
    <form action="<?php echo URL::to_route('UpdateImageData'); ?>" method="post" enctype="multipart/form-data">
        <div class="control-group">
            <?php  foreach($images as $pic){ ?>
                <div class="controls">
                    <input type="hidden" name="pic_id[]" multiple="multiple" value="<?php  echo $pic->image_id;?>">
                    <input type="text" name="pic_title[]"  placeholder="Image Title" value="<?php echo $pic->image_title; ?>" multiple="multiple">
                    <input type="text" name="pic_name[]" placeholder="Image Name" value="<?php echo $pic->image_name; ?>" multiple="multiple">
                    <input type="text" name="pic_description[]" placeholder="Image Description" value="<?php echo $pic->image_description; ?>" multiple="multiple" >
                    <img src="<?php echo Config::get('application.url').'/'.Config::get('admin::admin_config.image_path').$pic->image_filename; ?>" alt="" height="50" width="50"/>                </div>
                <hr>
            <?php }?>

    </form>
    <div class="form-actions">
        <div class="offset1">
            <button class="btn btn-info" type="submit">
                <i class="icon-ok bigger-110"></i>
                Submit
            </button>

            &nbsp; &nbsp; &nbsp;
            <button class="btn" type="reset">
                <i class="icon-undo bigger-110"></i>
                Reset
            </button>
        </div>
    </div>


    </form>
</div>
<!-- End Row -->
<?php  Section::stop();?>


<!-- Rendering Main -->
<?php echo render('admin::template.main');?>
