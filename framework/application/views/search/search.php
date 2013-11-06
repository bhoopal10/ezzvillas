<?php echo Section::start('ContentWrapper'); ?>
<div class="row">
    <div class="text-boxes">
        <form action="<?php echo URL::to_route('SearchValues') ?>" method="post" class="form-horizontal">
    <div class="control-group">
               <select name="location_id" id="">
                   <option value="">Location</option>
                   <?php foreach($states as $state){ ?>
                <option disabled><?php echo $state->loc_name; ?></option>
                       <?php foreach($cities as $city){
                           /*State Contain Cities*/
                           if($city->loc_parent_id == $state->location_id){
                       ?>
                <option value="<?php echo $city->location_id; ?>"><?php echo $city->loc_name;  ?></option>
                      <?php }}}?>

            </select>
                <!-- Vacation type       -->
                    <select name="vacation_id" id="">
                <option value="">Vacation Type</option>
                <?php foreach(libvilla::category() as $cat){ ?>
                <option disabled><?php echo $cat->cat_name;?></option>
                 <?php foreach(libvilla::subcategory() as $sub){ ?>
                 <?php if($cat->cat_id==$sub->cat_pid){?>
                <option value="<?php echo $sub->cat_id; ?>"><?php echo $sub->cat_name;?></option>
                 <?php }}}?>
            </select>

        <select name="bedroom" id="">
                <option value="">BedRooms</option>
                <option value="1">1BedRoom</option>
                <option value="2">2BedRoom</option>
                <option value="3">3BedRoom</option>
                <option value="4">4BedRoom</option>
                <option value="5">5BedRoom</option>
                <option value="6">6BedRoom</option>
                <option value="7">7BedRoom</option>
                <option value="8">8BedRoom</option>
                <option value="9">9+BedRoom</option>
         </select>
            <select name="rates" id="">
                <option value="">Rates</option>
                <option value="50000">Less then50Thousand</option>
                <option value="100000">50Thousand-1 Lakh</option>
                <option value="200000">1 Lakh-2 Lakh</option>
            </select>
        <input type="submit" value="Search" name="submit" class="btn-primary"/>
    </div>
          </form>
    </div>
</div>

<?php Section::stop(); ?>
<?php echo render('template.main');?>