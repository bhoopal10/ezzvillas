<?php echo Section::start('page-header');?>
<div id="page-content" class="clearfix">
    <div class="page-header position-relative">
        <h1>
            Image
            <small>
                <i class="icon-double-angle-right"></i>
                Edit Image
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
    <form action="<?php echo URL::to_route('EditImageData'); ?>" method="post" enctype="multipart/form-data">
        <?php  foreach($image as $images){ ?>
        <div class="control-group">
                <div class="controls">
                    <input type="hidden" name="pic_id" value="<?php  echo $images->image_id;?>">
                    <input type="hidden" name="album_id" value="<?php  echo $images->image_album_id;?>">
                    </div>
        </div>
        <div class="control-group">
            <label for="Title" class="control-label">Title</label>
            <div class="controls">
                    <input type="text" name="pic_title"  placeholder="Image Title" value="<?php echo $images->image_title; ?>" multiple="multiple">
            </div>
        </div>
        <div class="control-group">
            <label for="name" class="control-label">Name</label>
            <div class="controls">
                    <input type="text" name="pic_name" placeholder="Image Name" value="<?php echo $images->image_name; ?>" multiple="multiple">
                </div>
            </div>
        <div class="control-group">
            <label for="description" class="control-label">Description</label>
            <div class="controls">
                    <input type="text" name="pic_description" placeholder="Image Description" value="<?php echo $images->image_description; ?>" multiple="multiple" >
            </div>
         </div>
        <div class="control-group">
                    <img src="<?php echo Config::get('application.url').'/'.Config::get('admin::admin_config.image_path').$images->image_filename;?>" width="90" height="50"  alt=""/>
            <input type="hidden" value="<?php echo $images->image_filename; ?>" name="image_file"/>
                    <input type="file" name="image">
                </div>
                <hr>
            <?php }?>


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
