<?php echo Section::start('page-header');?>

<div id="page-content" class="clearfix">
    <div class="page-header position-relative">
        <h1>
            Posts
            <small>
                <i class="icon-double-angle-right"></i>
                Add Posts
            </small>
        </h1>
    </div>
</div>
<?php Section::stop(); ?>
<!-- Page Header End -->

<?php echo Section::start('contentWrapper'); ?>
<div class="row">
    <?php if(isset($status)){?>
     <div class="span9 offset1">

            <div class="well alert-block alert-info">

                    <ul>
                        <li><?php  echo $status; ?></li>
                    </ul>

            </div>

    </div>
    <?php }?>
</div>

<div class="san4">
    <div class="widget-box">
    <div class="widget-header">
        <h4> Update Posts</h4>
    </div>
    <div class="widget-body">
        <div class="widget-main no-padding">
    <form action="<?php echo URL::to_route('UpdatePosts'); ?>" method="post" class="form-horizontal">
        <fieldset>
               
               <div class="control-group">
            <label class="control-label" for="box1">Box1 Contents</label>
            <div class="controls">
                <textarea name="post_box1" id="box1" cols="20" rows="5" placeholder="Contents"><?php echo $posts->post_box1; ?></textarea>
            </div>
        </div> <div class="control-group">
            <label class="control-label" for="box2">Box2 Contents</label>
            <div class="controls">
                <textarea name="post_box2" id="box2" cols="20" rows="5" placeholder="Contents"><?php echo $posts->post_box2;?></textarea>
            </div>
        </div> <div class="control-group">
            <label class="control-label" for="box3">Box3 Contents</label>
            <div class="controls">
                <textarea name="post_box3" id="contents" cols="20" rows="5" placeholder="Contents"><?php echo $posts->post_box3; ?></textarea>
            </div>
        </div> <div class="control-group">
            <label class="control-label" for="box4">Box4 Contents</label>
            <div class="controls">
                <textarea name="post_box4" id="box4" cols="20" rows="5" placeholder="Contents"><?php echo $posts->post_box4;?></textarea>
            </div><div class="control-group">
            <label class="control-label" for="box5">Box5 Contents</label>
            <div class="controls">
                <textarea name="post_box5" id="box5" cols="20" rows="5" placeholder="Contents"><?php echo $posts->post_box5;?></textarea>
            </div><div class="control-group">
            <label class="control-label" for="box6">Box6 Contents</label>
            <div class="controls">
                <textarea name="post_box6" id="box6" cols="20" rows="5" placeholder="Contents"><?php echo $posts->post_box6;?></textarea>
            </div>


        <div class="form-actions left">
            <button class="btn btn-small btn-success">
                Update
                <i class="icon-arrow-right icon-on-right bigger-110"></i>
            </button>
        </div>
            </div>
        </fieldset>
    </form>
            </div>
        </div>
</div>
</div>



<?php  Section::stop();?>
    <!--END CONTENT WRAPPER-->


<?php echo 	Asset::container('sub-footer')->scripts();?>

    <!-- Rendering Main -->
<?php echo render('admin::template.main');?>