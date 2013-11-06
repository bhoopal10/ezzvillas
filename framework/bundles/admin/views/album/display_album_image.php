<?php echo Section::start('page-header');?>
<div id="page-content" class="clearfix">
    <div class="page-header position-relative">
        <h1>
           <a href="<?php echo URL::to_route('ViewAlbum'); ?>">Album</a>
            <small>
                <i class="icon-double-angle-right"></i>
<?php foreach($image as $images)?>
                <?php echo $images->album_name; ?>
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
<div class="row" style="margin-left: 20px">
    <div class="span10">
    <table class="table table-bordered">
        <thead>
        <th>Title</th><th>Name</th><th>Description</th><th>Image</th><th><p style="text-align: center">----ACTION----</p></th>
        </thead>
    <?php foreach($image as $images){?>
        <tr>
            <td><?php echo $images->image_title; ?></td>
            <td><?php echo $images->image_name; ?></td>
            <td><?php echo $images->image_description;?></td>
            <td>
        <div class="image">
            <img src="<?php echo Config::get('application.url').'/'.Config::get('admin::admin_config.image_path').$images->image_filename; ?>" alt="" style="height:50px; width:100px"/>                </div>
        </div>
            </td>
            <td style="text-align: center"><a href="<?php echo URL::to_route('EditAlbumImage').'/'.$images->image_id; ?>"><i style="color: blue;font-size: 20px" class="icon-pencil"></i></a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
            <a href="<?php echo URL::to_route('DeleteImage').'/'.$images->image_id.'/'.$images->image_filename; ?>" onclick="return confirm('Are You Sure to delete')"><i style="font-size: 20px;color:red" class="icon-trash"></i></a></td>
    </tr>
    <?php }?>
        </table>
        </div>
</div>
<?php  Section::stop();?>


<!-- Rendering Main -->
<?php echo render('admin::template.main');?>
