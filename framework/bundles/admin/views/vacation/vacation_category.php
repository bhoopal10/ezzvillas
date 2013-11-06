<?php echo Section::start('page-header');?>
    <div id="page-content" class="clearfix">
        <div class="page-header position-relative">
            <h1>
               Vacation
                <small>
                    <i class="icon-double-angle-right"></i>
                    Vacation Category
                </small>
            </h1>
        </div>
    </div>
<?php Section::stop();?>
    <!-- Page Header End -->

<?php echo Section::start('contentWrapper');?>
<?php
$asset= Asset::bundle('admin')
->add('choosen-js','js/chosen.jquery.min.js','jquery')
->add('choosen-css','css/chosen.css');
echo Asset::styles();
echo Asset::scripts();
?>
<form class="form-horizontal" action="<?php echo URL::to_route('AddCategory') ?>" method="post">
<div class="control-group">
    <label class="control-label" for="create_category">Enter Category</label>
    <div class="controls">
        <input id="create_category" type="text" placeholder="Category Name" name="cat_name">
        <input type="submit" name="submit" value="Add Category">
    </div>
</div>
</form>
<hr>
<form action="<?php  echo URL::to_route('AddSubCat')?>" method="post" class="form-horizontal">
    <div class="control-group">
    <label class="control-label" for="select_category">Select Category</label>
    <div class="controls">
        <select name="cat_pid" >
             <?php foreach ($cat as $category) {
                ?>
            <option value="<?php echo $category->cat_id;?>"><?php echo $category->cat_name;?></option>
<?php } ?>
        </select>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="add_villa">Add SubCategory</label>
    <div class="controls">
        <input id="add_villa" name="cat_name" placeholder="SubCategory">
    </div>
</div>
    <div class="control-group">
        <label class="control-label" for="cat_description">Description</label>
        <div class="controls">
            <input type="cat_description" name="cat_description" placeholder="Description"/>
        </div>
    </div>
<div class="controls">
<input type="submit" name="submit" value="Add SubCategory">
</div>
</form>
<hr>
<?php foreach($all as $cat_all){ ?>
<table>
    <tr>

        <td>
            <?php if($cat_all->cat_pid==0){echo $cat_all->cat_name;} ?>
        </td>
        <?php } ?>
    </tr>
</table>



<?php  Section::stop();?>


<!-- Rendering Main -->
<?php echo render('admin::template.main');?>

