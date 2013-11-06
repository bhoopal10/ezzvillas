
<?php echo Section::start('contentWrapper');?>
<div class="span10">
    <div id="main-content" class="clearfix">

</div>
<div class="span4">
<form action="<?php echo URL::to_route('LoginValidate'); ?>" style="text-align: center" method="post">
    UserName:<input type="text" name="username" /><br>
    PassWord:<input type="password" name="password"><br>
    <input type="submit" value="Login" name="submit"><input type="reset" value="Reset" name="rest">

</form>
    </div>
<div class="span10">
    <?php if(isset($status)){?>
    <span><?php echo $status;}?></span>
</div>
