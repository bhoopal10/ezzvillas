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
            <h4>Edit location</h4>
        </div>

        <div class="widget-body">
            <div class="widget-main no-padding">

                <!--<legend>Form</legend>-->
                <form action="<?php echo URL::to_route('CitySave');?>" method="post">

                <fieldset ng-controller="LocationCtrl" ng-init="getLocationById('<?php echo $id;?>')">

                   <label>City</label>
                   <input type="text" value="{{locations.loc_name}}" />
                </fieldset>

            </div>
        </div>
    </div>
</div>
<!--End Edit Location-->

<!--END ROW-->
<?php Section::stop();?>


<!-- Rendering Main -->
<?php echo render('admin::template.main');?>




