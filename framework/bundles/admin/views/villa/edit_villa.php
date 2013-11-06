<?php echo Section::start('page-header');?>

<div id="page-content" class="clearfix">
    <div class="page-header position-relative">
        <h1>
            Villa
            <small>
                <i class="icon-double-angle-right"></i>
                Edit Villa
            </small>
        </h1>
    </div>
</div>
<?php Section::stop(); ?>
<!-- Page Header End -->

<?php echo Section::start('contentWrapper'); ?>
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
<!--FORM-->
<?php
$asset= Asset::bundle('admin')
    ->add('choosen-js','js/chosen.jquery.min.js','jquery')
    ->add('choosen-css','css/chosen.css');
echo Asset::styles();
echo Asset::scripts();
?>
<div class="row">
    <div class="span7">
        <?php foreach($villa as $villas) ?>
        <?php echo Form::open_for_files(URL::to_route('VillaUpdate').'/'.$villas->dest_id,'POST',array('class'=>'form-horizontal'));?>
        <div class="control-group">
            <label class="control-label" for="form-field-1">Name</label>

            <div class="controls">
                <input id="form-field-1" value="<?php echo $villas->dest_name; ?>" placeholder="Name of Villa" type="text" name="name" pattern="([a-zA-Z]\s*)+" required="required">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="form-field-1">Rent</label>

            <div class="controls">
                    <span class="input-icon">
                    <input id="form-field-1" value="<?php echo $villas->dest_charge;?>" placeholder="Per night" type="text" class="input-mini" name="charge" pattern="([0-9]*)">
                        <i class="icon-inr"></i>
                    </span>
            </div>
        </div>
        <!--Bedrooms-->
        <div class="control-group">
            <label class="control-label" for="form-field-1">Bedroom</label>
            <div class="controls">
                <input id="form-field-1" value="<?php echo $villas->fac_bedroom; ?>" placeholder="Bedrooms?" type="text" class="input-mini" name="fac_bedroom" pattern="([0-9]{1,2})">
            </div>
        </div>
        <!--Customer Rate-->
        <div class="control-group">
            <label class="control-label" for="form-field-1">Customer Rating</label>
            <div class="controls">
                <select name="cust_rate" id="" class="input input-mini">
                    <option value="<?php echo $villas->dest_cust_rating; ?>"><?php echo $villas->dest_cust_rating; ?></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
        </div>
        <!--Travellers Ratings-->
        <div class="control-group">
            <label class="control-label" for="form-field-1">Travellers Rating</label>
            <div class="controls">
                <select name="traveller_rating" id="" class="input input-mini">
                    <option value="<?php echo $villas->dest_trav_rating;?>"><?php echo $villas->dest_trav_rating;?></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
        </div>
        <!--Full Address-->
        <div class="control-group">
            <label class="control-label" for="form-field-2">Full Address</label>

            <div class="controls">
                <textarea  cols="30" rows="3" name="address"><?php echo $villas->dest_address;?></textarea>
            </div>
        </div>
        <div class="control-group" ng-controller="LocationCtrl" ng-init="LoadCities()">
            <label class="control-label" for="form-field-1">Location</label>

            <div class="controls">
                <select name="location_id" id="">
                    <option value="<?php echo $villas->location_id ?>"><?php echo ucfirst($villas->loc_name); ?></option>
                    <?php foreach($locations as $key){?>
                        <option value="<?php echo $key->location_id?>"><?php echo ucfirst($key->loc_name);?> </option>
                    <?php };?>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="form-field-1">Category</label>

            <div class="controls">
                <select  id="" name="category">
                    <option value="<?php echo $villas->dest_category; ?>"><?php echo ucfirst($villas->dest_category); ?></option>
                    <option value="featured">Featured</option>
                    <option value="premium">Premium</option>
                    <option value="basic">Basic</option>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="form-field-2">Villa Highlights</label>

            <div class="controls">
                <textarea  cols="30" rows="5" name="description"><?php echo $villas->dest_description; ?></textarea>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="form-field-2">Villa Description</label>

            <div class="controls">
                <textarea  cols="30" rows="5" name="full_description"><?php echo $villas->dest_full_description; ?></textarea>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="map">Destination Map</label>

            <div class="controls">
                <input type="text" name="dest_map_code" placeholder="Destination Map Code" value="<?php echo $villas->dest_map_code; ?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="trip_adviser_widget">Trip Adviser Widget</label>

            <div class="controls">
                <input id="trip_adviser_widget" type="text" name="trip_adviser_widget" placeholder="Trip Adviser Widget" value="<?php echo $villas->dest_trip_adviser_widget; ?>">
            </div>
        </div>
    </div>
    <!-- End Span -->
    <div class="span4">
        <img src="http://localhost/villa1/public/images/destinations/<?php echo $villas->dest_cover_image; ?>" width="50" height="50">
        <input id="id-input-file-3" type="file" multiple="multiple" name="image[]">
        <hr>
        <div class="span6">
            <label>
                <input class="ace-switch ace-switch-5" value="1" type="checkbox" name="fac_swimmingpool" <?php if($villas->fac_swimmingpool!=0){?>checked="checked" <?php }?>>
                <span class="lbl">Swimming Pool</span>
            </label>
            <label>
                <input class="ace-switch ace-switch-5" value="1" type="checkbox" name="fac_spa" <?php if($villas->fac_spa!=0){?>checked="checked" <?php }?>>
                <span class="lbl">Spa Center</span>
            </label>
            <label>
                <input  class="ace-switch ace-switch-5" value="1" type="checkbox" name="fac_laundry" <?php if($villas->fac_laundry!=0){?>checked="checked" <?php }?>>
                <span class="lbl">Laundry Service</span>
            </label>
            <label>
                <input class="ace-switch ace-switch-5" value="1" type="checkbox" name="fac_transport" <?php if($villas->fac_transport!=0){?>checked="checked" <?php }?>>
                <span class="lbl">Transportation</span>
            </label>
            <hr>
            <h4>Select Category</h4>
            <div>
                <?php foreach($category as $cat) {?>
                    <label>

                        <input  type="checkbox" name="category_id[]" multiple="multiple" value="<?php echo $cat->cat_id; ?>">
                        <label for="" class="lbl"><?php echo $cat->cat_name; ?></label>

                    </label>
                <?php }?>
            </div>
        </div>
    </div>


    <!--end span-->
    <div class="span12">
        <div class="form-actions">
            <div class="offset1">
                <button class="btn btn-info" type="submit">
                    <i class="icon-ok bigger-110"></i>
                    Update
                </button>

                &nbsp; &nbsp; &nbsp;
                <button class="btn" type="reset">
                    <i class="icon-undo bigger-110"></i>
                    Reset
                </button>
            </div>
        </div>
    </div>
    </form>
</div>
<!-- End Row -->
<!--END FORM-->
<?php  Section::stop();?>
<!--END CONTENT WRAPPER-->


<?php echo 	Asset::container('sub-footer')->scripts();?>

<!-- Rendering Main -->
<?php echo render('admin::template.main');?>
