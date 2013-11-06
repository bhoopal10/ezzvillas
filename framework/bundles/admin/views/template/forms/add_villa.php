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
                    <input id="form-field-1" placeholder="Name of Villa" type="text" name="name" pattern="([a-zA-Z]\s*)+" required="required">
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

            <div class="control-group" ng-controller="LocationCtrl" ng-init="LoadCities()">
                <label class="control-label" for="form-field-1">Location</label>

                <div class="controls">

                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="form-field-1">Category</label>

                <div class="controls">
                    <select  id="" name="category">
                        <option value="featured">Featured</option>
                        <option value="premium">Premium</option>
                        <option value="basic">Basic</option>
                    </select>
                </div>
            </div>



            <div class="control-group">
                <label class="control-label" for="form-field-2">Villa Detail</label>

                <div class="controls">
                    <textarea  cols="30" rows="5" name="description"></textarea>
                </div>
            </div>
    </div>
    <!-- End Span -->
    <div class="span4">
        <input id="id-input-file-3" type="file" multiple="multiple" name="image[]" required="required">
        <hr>
        <div class="span6">
            <label>
                <input class="ace-switch ace-switch-5" type="checkbox" name="fac_swimmingpool">
                <span class="lbl">Swimming Pool</span>
            </label>
            <label>
                <input class="ace-switch ace-switch-5" type="checkbox" name="fac_spa">
                <span class="lbl">Spa Center</span>
            </label>
            <label>
                <input  class="ace-switch ace-switch-5" type="checkbox" name="fac_laundry">
                <span class="lbl">Laundry Service</span>
            </label>
            <label>
                <input class="ace-switch ace-switch-5" type="checkbox" name="fac_transport">
                <span class="lbl">Transportation</span>
            </label>
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
<?php echo Section::start('javascript-footer');?>

<?php Section::stop();?>