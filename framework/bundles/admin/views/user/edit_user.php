<?php echo Section::start('page-header');?>
<div id="page-content" class="clearfix">
    <div class="page-header position-relative">
        <h1>
            User
            <small>
                <i class="icon-double-angle-right"></i>
                Edit user
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
<?php
$asset= Asset::bundle('admin')
    ->add('choosen-js','js/chosen.jquery.min.js','jquery')
    ->add('choosen-css','css/chosen.css');
echo Asset::styles();
echo Asset::scripts();
?>
<div class="row">
    <div class="span7">
        <?php echo Form::open_for_files(URL::to_route('AddUser'),'POST',array('class'=>'form-horizontal'));?>
  <fieldset ng-controller="UserCtrl" ng-init="getuser('<?php echo $id; ?>')">
        <div class="control-group">
            <label class="control-label" for="user_name">User Name</label>

            <div class="controls">
                <input value="{{user.user_name}}" id="user_name" placeholder="User Name of Villa" type="text" name="user_name" pattern="([a-zA-Z]\s*)+" required="required">
            </div>
        </div>
        <!--user dob-->
        <div class=" control-group">
            <label class="control-label" for="dob">Date of Birth</label>
            <div class="controls">
                <input value="{{user.user_dob}}" id="dob" type="text" placeholder="YYYY/MM/DD" name="user_dob" />
            </div>
        </div>
        <!-- Gender -->
        <div class=control-group>
            <label class="control-label" for="gender">Gender</label>
            <div class="controls">
                <label>
                    <input id="gender" type="radio" name="user_gender" value="male"/>
                    <label class="lbl">male</label>
                </label>
                <label>
                    <input id="gender" type="radio" name="user_gender" value="female"/>
                    <label class="lbl">Female</label>
                </label>
            </div>
        </div>
        <!---user mobile--->
        <div class="control-group">
            <label class="control-label" for="user_mobile">Mobile</label>

            <div class="controls">
                <input  value="{{user.user_mobile}}" id="user_mobile" placeholder="User Mobile" type="text" name="user_mobile" pattern="([0-9]*)" required="required">
            </div>
        </div>
        <!-- User Email_ID-->
        <div class="control-group">
            <label class="control-label" for="user_email">Email ID</label>

            <div class="controls">
                <input value="{{user.user_email}}" id="user_email" placeholder="User Email ID" type="text" name="user_email" required="required">
            </div>
        </div>
        <!-- User City--->
        <div class="control-group">
            <label class="control-label" for="user_city">City</label>
            <div class="controls">
                <input value="{{user.user_city}}" id="user_city" type="text" name="user_city" placeholder="User City" required="required"/>
            </div>
        </div>
        <!-- User Address---->
        <div class="control-group">
            <label class="control-label" for="user_address">Address</label>
            <div class="controls">
                <input value="{{user.user_address}}" id="user_address" type="text" name="user_address" placeholder="User Address"/>
            </div>
        </div>
        <!-- User Organisation-->
        <div class="control-group">
            <label class="control-label" for="user_organisation">Organisation</label>
            <div class="controls">
                <input value="{{user.user_organisation}}" id="user_organisation" type="text" name="user_organisation" placeholder="User Organisation" />
            </div>
        </div>

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
  </fieldset>
        </form>
    </div>
    <!-- End Row -->
    <?php  Section::stop();?>


    <!-- Rendering Main -->
    <?php echo render('admin::template.main');?>
