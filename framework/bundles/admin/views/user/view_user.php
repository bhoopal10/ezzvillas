<?php echo Section::start('page-header');?>
<div id="page-content" class="clearfix">
    <div class="page-header position-relative">
        <h1>
            User
            <small>
                <i class="icon-double-angle-right"></i>
                View Users
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
<div class="container-row">
    <div class="row">
        <div class="span10 offset1">
            <input type="text" ng-model="search" placeholder="search"/>
            <table class="table table-bordered" ng-controller="UserCtrl" ng-init="getUsers();">
                <thead>
                <th>Name</th><th>Email</th><th>Gender</th><th>City</th><th>Address</th><th>Mobile</th><th>Status</th><th>Edit</th>
                </thead>
                <tr ng-repeat="u in users|filter:search">
                    <td>{{u.user_name}}</td><td>{{u.user_email}}</td><td>{{u.user_gender}}</td><td>{{u.user_city}}</td><td>{{u.user_address}}</td>
                    <td>{{u.user_mobile}}</td><td>{{u.user_status}}</td>
                    <td><a href="<?php echo URL::to_route('EditUser')?>/{{u.user_id}}" class="icon-pencil">Edit</a></td>
                </tr>
            </table>
        </div>
    </div>
</div>
<?php  Section::stop();?>


<!-- Rendering Main -->
<?php echo render('admin::template.main');?>

