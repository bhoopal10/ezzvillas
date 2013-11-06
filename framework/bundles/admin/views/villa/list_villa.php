<?php echo Section::start('page-header');?>
<div id="page-content" class="clearfix">
    <div class="page-header position-relative">
        <h1>
            Villa
            <small>
                <i class="icon-double-angle-right"></i>
                View Villa
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

<div class="span9">
    <div class="widget-box">
        <div class="widget-body">
            <div class="widget-header">
                <h4>Villa</h4>
            </div>
            <div class="widget-main no-padding">

                <!--<legend>Form</legend>-->

                <table class="table table-bordered">
                    <thead>
                    <th >Name</th><th >Category</th><th >Location</th><th>Bed Room</th><th >Image</th><th style="text-align: center">Action</th>
                    </thead>
                    <?php foreach($villa->results as $villas){
                        $image=libvilla::villa_cover_image_by_id($villas->dest_id);
                        $loc=libvilla::get_city_by_id($villas->dest_location);
                        if($image=="http://t2.gstatic.com/images?q=tbn:ANd9GcSEUzYpB_WmWxQrA5F9HM2sp-nSTQpMV6ZFP0_Ah2t5fyYS6cAP87uAsg")
                        {
                          $images=$image;
                        }
                        else{
                            $images=Config::get('application.url').'/'.Config::get('admin::admin_config.image_path').$image->image_filename;
                        }

                        ?>

                        <tr>
                            <td ><?php echo $villas->dest_name;?></td>
                            <td ><?php echo $villas->dest_category; ?></td>
                            <td ><?php echo $loc->loc_name; ?></td>
                            <td ><?php echo $villas->fac_bedroom; ?></td>
                            <td ><img src="<?php echo $images; ?>" style="width: 100px;height: 80px"></td>
                            <td style="text-align: center" ><a href="<?php echo URL::to_route('EditVilla');echo "/".$villas->dest_id; ?>" class="icon-pencil"></a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                            <a href=""><i class="icon-trash"></i></a></td>

                        </tr>
                    <?php }?>
                </table>

            </div>
        </div>
    </div>
    <?php echo $villa->links(); ?>
</div>



<!--END ROW-->
<?php Section::stop();?>


<!-- Rendering Main -->
<?php echo render('admin::template.main');?>




