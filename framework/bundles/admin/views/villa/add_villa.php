<?php echo Section::start('page-header');?>

<div id="page-content" class="clearfix">
    <div class="page-header position-relative">
        <h1>
            Villa
            <small>
                <i class="icon-double-angle-right"></i>
                Add Villa
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
        <?php echo Form::open_for_files(URL::to_route('VillaSave'),'POST',array('class'=>'form-horizontal'));?>
        <div class="control-group">
            <label class="control-label" for="form-field-1">Name</label>

            <div class="controls">
                <input id="form-field-1" placeholder="Name of Villa" type="text" name="name" required="required">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="form-field-1">Rent</label>

            <div class="controls">
                    <span class="input-icon">
                    <input id="form-field-1" placeholder="Per night" type="text" class="input-mini" name="charge" pattern="([0-9]*)">
                        <i class="icon-inr"></i>
                    </span>
            </div>
        </div>
        <!--Bedrooms-->
        <div class="control-group">
            <label class="control-label" for="form-field-1">Bedroom</label>
            <div class="controls">
                <input id="form-field-1" placeholder="Bedrooms?" type="text" class="input-mini" name="bedroom" pattern="([0-9]{1,2})">
            </div>
        </div>
        <!--Customer Rate-->
        <div class="control-group">
            <label class="control-label" for="form-field-1">Customer Rating</label>
            <div class="controls">
                <select name="cust_rate" id="" class="input input-mini">
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
                <textarea  cols="30" rows="3" name="address"></textarea>
            </div>
        </div>
        <div class="control-group" ng-controller="LocationCtrl" ng-init="LoadCities()">
            <label class="control-label" for="form-field-1">Location</label>

            <div class="controls">
                <select name="location_id" id="">
                    <?php foreach($locations as $key){?>
                        <option value="<?php echo $key->location_id?>"><?php echo ucfirst($key->loc_name);?> </option>
                    <?php };?>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="form-field-1">Type</label>

            <div class="controls">
                <select  id="" name="type">
                    <option value="featured">Featured</option>
                    <option value="premium">Premium</option>
                    <option value="basic">Basic</option>
                </select>
            </div>
        </div>


        <div class="control-group">
            <label class="control-label" for="form-field-2">Villa Highlights</label>

            <div class="controls">
                <textarea  cols="30" rows="5" name="description"></textarea>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="form-field-2">Villa Description</label>

            <div class="controls">
                <textarea  cols="30" rows="5" name="full_description">You can also put HTML code here.</textarea>
            </div>
        </div>
         <div class="control-group">
                <label class="control-label" for="at_a_glance">At A Glance</label>

                <div class="controls">
                    <textarea name="at_a_glance"  id="at_a_glance" cols="10" rows="5"></textarea>
                </div>
            </div>


    </div>
    <!-- End Span -->

    <div class="span4">
        <label for="">
             Select Album
            <select name="image" id="">
                <?php foreach($album as $albums){ ?>
                <option value="<?php echo $albums->album_id; ?>"><?php echo $albums->album_name; ?></option>
                <?php } ?>
            </select>
        </label>
        <hr>
        <div class="span6">
            <label>
                <span class="lbl">Swimming Pool</span>
                <select name="fac_swimmingpool" id="">
                    <option value="yes">Yes</option>
                    <option value="yes">No</option>
                </select>
            </label>
            <label>
                <span class="lbl">Spa Center</span>
                <select name="fac_spa" id="">
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </label>
            <label>
                Laundry Service
                <select name="fac_laundry" id="">
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </label>
            <label>
                <span class="lbl">Transportation</span>
                <select name="fac_transport" id="">
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </label>

            <div class="control-group">
                <label class="control-label" for="trip_adviser_widget">Trip Adviser Widget</label>

                <div class="controls">
                    <textarea name="trip_adviser_widget"  cols="10" rows="5"></textarea>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="map">Destination Map</label>

                <div class="controls">
                    <textarea name="dest_map_code" cols="10" rows="5"></textarea>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="form-field-1">Category</label>

                <div class="controls">
                    <select  id="" name="category[]" multiple="multiple">
                        <?php foreach($category as $cat){ ?>
                        <option value="<?php echo $cat->cat_id; ?>"><?php echo $cat->cat_name; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

        </div>

    </div>
    <!--end span-->
    <div class="span12">
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
