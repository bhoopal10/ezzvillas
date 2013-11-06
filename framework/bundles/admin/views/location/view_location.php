<?php echo Section::start('page-header');?>
<div id="page-content" class="clearfix">
    <div class="page-header position-relative">
        <h1>
            Location
            <small>
                <i class="icon-double-angle-right"></i>
                Edit Locations
            </small>
        </h1>
    </div>
</div>
<?php Section::stop();?>
<!-- Page Header End -->
<?php echo Section::start('contentWrapper');?>

<div class="span4">
    <div class="widget-box">
        <div class="widget-header">
            <h4>Cites</h4>
        </div>

        <div class="widget-body">
            <div class="widget-main no-padding">

                <!--<legend>Form</legend>-->

                <table class="table table-bordered" ng-controller="LocationCtrl" ng-init="LoadCities(0);">
                    <thead>
                    <th>City</th><th>Description</th><th>Edit</th>
                    </thead>
                    <tr ng-repeat="city in cities">
                        <td>{{city.loc_name}}</td>
                        <td>{{city.loc_description}}</td>
                        <td><a href="<?php echo URL::to_route('EditLocation');?>/{{city.location_id}}" class="icon-pencil">Edit</a> </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<!--End Cities-->
    <div class="span4">
        <div class="widget-box">
            <div class="widget-header">
                <h4>States</h4>
            </div>

            <div class="widget-body">
                <div class="widget-main no-padding">

                        <!--<legend>Form</legend>-->

                            <table class="table table-bordered" ng-controller="LocationCtrl" ng-init="LoadLocations(0);">
                                <thead>
                                <th>State</th><th>Description</th><th>Edit</th>
                                </thead>
                                <tr ng-repeat="location in locations">
                                   <td>{{location.loc_name}}</td>
                                    <td>{{location.loc_description}}</td>
                                    <td><a href="<?php echo URL::to_route('EditState'); ?>/{{location.location_id}}" class="icon-pencil">Edit</a> </td>
                                </tr>
                            </table>
                    </div>
            </div>
        </div>
    </div>
    <!--END State-->

<!--END ROW-->
<?php Section::stop();?>


<!-- Rendering Main -->
<?php echo render('admin::template.main');?>




