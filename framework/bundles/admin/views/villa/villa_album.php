<?php echo Section::start('page-header');?>
<div id="page-content" class="clearfix">
    <div class="page-header position-relative">
        <h1>
            Villa
            <small>
                <i class="icon-double-angle-right"></i>
                View Villa-Album
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
<div class="wrapper "></div>
    <div class="span4">
        <form action="<?php echo URL::to_route('ViewVillaAlbum'); ?>" class="form-horizontal" method="post">
            <div class="control-group">
                <label class="control-label" for="select_villa"> Select Villa</label>
                <div class="controls">
                    <select name="villa_album" id="">
                        <?php foreach($villa as $villa_album){ ?>
                            <option value="<?php echo $villa_album->dest_album_id;?>"><?php echo $villa_album->dest_name; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </form>
   </div>


<!--END ROW-->
<?php Section::stop();?>


<!-- Rendering Main -->
<?php echo render('admin::template.main');?>




