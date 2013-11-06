<?php echo Section::start('page-header');?>
    <div id="page-content" class="clearfix">
        <div class="page-header position-relative">
            <h1>
                Album
                <small>
                    <i class="icon-double-angle-right"></i>
                    Create Album
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
    ->add('choosen-css','css/chosen.css');
echo Asset::styles();
echo Asset::scripts();
?>
<div class="row">
    <div class="span7">
<form class="form-horizontal" action="<?php echo URL::to_route('SaveAlbum')?>" method="post">
<div class="control-group">
    <label class="control-label" for="album_name">Enter Album Name</label>
    <div class="controls">
        <input id="album_name" type="text" name="album_name" placeholder="Album Name">
        <input type="submit" class="btn" value="Create Album" name="submit">
    </div>
</div>
</form>
</div>
    <!--- span7 completed---->
    <div class="span5">
        <form class="form-horizontal" action="<?php echo URL::to_route('UploadAlbumImage'); ?>" method="post" enctype="multipart/form-data">
            <div class="control-group">

                <label class="control-label" for="album_name">Select Album</label>
                <div class="controls">
                    <select id="album_id" name="album_id">
                       <?php if(isset($album)) { ?>
                             <?php foreach($album as $photos){ ?>
                        <option value="<?php echo $photos->album_id; ?>"><?php echo $photos->album_name; ?></option>
                        <?php } ?>
                       <?php } ?>
                    </select>
                </div>
            </div>

            <!-------Select completes-------->
            <div class="control-group">
                <label class="control-label" for="album_photo">Select Photos</label>
           <div class="controls">
            <input type="file" id="album_photo" name="album_photo[]" multiple="multiple">
            </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <input type="submit" value="AddPhotos" name="Submit">
                </div>
            </div>
        </form>
    </div>
    </div>
<hr>


<?php  Section::stop();?>


<!-- Rendering Main -->
<?php echo render('admin::template.main');?>
