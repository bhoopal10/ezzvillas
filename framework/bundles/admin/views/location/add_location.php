<?php echo Section::start('page-header');?>
    <div id="page-content" class="clearfix">
        <div class="page-header position-relative">
            <h1>
                Location
                <small>
                    <i class="icon-double-angle-right"></i>
                    Add Location's
                </small>
            </h1>
        </div>
    </div>
<?php Section::stop();?>
    <!-- Page Header End -->
<?php echo Section::start('contentWrapper');?>
<div class="row-fluid">
    <div class="span4">
        <div class="widget-box">
            <div class="widget-header">
                <h4>Add State</h4>
            </div>

            <div class="widget-body">
                <div class="widget-main no-padding">
                    <form action="<?php echo URL::to_route('StateSave');?>" method="post">
                        <!--<legend>Form</legend>-->

                        <fieldset>

                            <label>Name</label>

                            <input placeholder="Name of STATE ?" type="text" name="state_name">
                            <span class="help-block">It should be unique.</span>
                            <label for="">Description</label>
                            <textarea name="state_description"  cols="30" rows="5" maxlength="500"></textarea>
                                <span class="help-block">(Character: 500 max)</span>


                        </fieldset>

                        <div class="form-actions center">
                            <button class="btn btn-small btn-success" type="submit" name="state_submit">
                                Submit
                                <i class="icon-arrow-right icon-on-right bigger-110"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--END STATE-->

    <div class="span4">
        <div class="widget-box">
            <div class="widget-header">
                <h4>Add City</h4>
            </div>

            <div class="widget-body">
                <div class="widget-main no-padding">
                    <form action="<?php echo URL::to_route('CitySave');?>" method="post">
                        <!--<legend>Form</legend>-->

                        <fieldset ng-controller="LocationCtrl" ng-init="LoadLocations('0')">
                            <label>Select State</label>
                            <select name="state_id" id="">
                                <option value="{{location.location_id}}" ng-repeat="location in locations">{{location.loc_name}}</option>
                            </select>
                            <label for="">Name</label>
                            <input type="text" name="city_name" placeholder="Name of the city ?"/>
                            <span class="help-block">It should be unique!</span>

                            <label for="">Description</label>
                            <textarea name="city_description"  cols="30" rows="5" maxlength="500"></textarea>
                            <span class="help-block">character: 500 max</span>


                        </fieldset>

                        <div class="form-actions center">
                            <button class="btn btn-small btn-success">
                                Submit
                                <i class="icon-arrow-right icon-on-right bigger-110"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--END CITY-->
</div>
<!--END ROW-->
<?php Section::stop();?>


    <!-- Rendering Main -->
<?php echo render('admin::template.main');?>




