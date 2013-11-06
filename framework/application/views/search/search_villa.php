<?php echo Section::start('ContentWrapper')?>
<!-- Content -->
<div class="content sub">
    <!-- Left Side -->
    <div class="left">
        <!-- Page Title -->
        <form onsubmit="return hai()" action="<?php echo URL::to_route('SearchValues'); ?>" method="get" class="form-inline">
            <select name="loc_id" id="" class="span1" style="padding: 3px">
                <?php foreach(libvilla::cities() as $city){ ?>
                    <option value="<?php echo $city->location_id; ?>"><?php echo $city->loc_name; ?></option>
                    <!--            <input type="search" name="search" id="search" placeholder="Search Destination" />-->
                <?php }?>
            </select>
            <select name="category" id="" class="span1" style="padding: 3px">
                <option value="">Select category</option>
                <?php foreach(libvilla::subcategory() as $category){ ?>
                    <option value="<?php echo $category->cat_id; ?>"><?php echo $category->cat_name;?></option>
                <?php }?>
            </select>
            <select name="min" id="min" class="span1" style="padding: 3px">
                <option value="">minprice</option>
                <option value="1000">1000</option>
                <option value="2000">2000</option>
                <option value="3000">3000</option>
                <option value="4000">4000</option>
                <option value="5000">5000</option>
                <option value="6000">6000</option>
                <option value="7000">7000</option>
                <option value="8000">8000</option>
                <option value="9000">9000</option>
                <option value="10000">10000</option>
            </select>
            <select name="max" id="max" onchange="hai()" class="span1" style="padding: 3px">
                <option value="">Maxprice</option>
                <option value="2000">2000</option>
                <option value="3000">3000</option>
                <option value="4000">4000</option>
                <option value="5000">5000</option>
                <option value="6000">6000</option>
                <option value="7000">7000</option>
                <option value="8000">8000</option>
                <option value="9000">9000</option>
                <option value="10000">10000</option>
                <option value="100000">above 10000</option>
            </select>
            <script>
                function hai()
                {
                    var max=document.getElementById("max").value;
                    var min=document.getElementById("min").value;
                    if(min <= max)
                    {
                        return true;
                    }
                    else
                    {
                        alert("Select Maximum value");
                        return false;
                    }


                }
            </script>
            <select name="bedroom" id="" class="span1" style="padding: 3px">
                <option value="">Select BedRoom</option>
                <?php foreach($bedroom as $bedrooms){ ?>
                    <option value="<?php echo $bedrooms->fac_bedroom; ?>"><?php echo $bedrooms->fac_bedroom; ?>Bed Room</option>
                <?php } ?>
            </select>
            <button type="submit" class="btn">Search</button>
        </form>



        <div class="line">

        </div>
        </div>
        <?php if(($villa=='')){?>
            <b style="color: red;font-size: 18px;text-align: center">Sorry, we con't meet your criteria  </b>
        <?php }else {?>

            <?php
            foreach($villa as $villas){
                $image=libvilla::villa_cover_image_by_id($villas->dest_id);
                if($image=="http://t2.gstatic.com/images?q=tbn:ANd9GcSEUzYpB_WmWxQrA5F9HM2sp-nSTQpMV6ZFP0_Ah2t5fyYS6cAP87uAsg")
                {
                    $images=$image;
                }
                else{
                    $images=Config::get('application.url').'/'.Config::get('admin::admin_config.image_path').$image->image_filename;
                }
                ?>
                <!-- / Page Title -->
              <!--three column first-->

                <div class="box three products first">
                    <!-- product image ---->
                            <span class="aligncenter">
                                <span class="border">
                                    <a href="<?php echo URL::to_route('destinationVilla').'/'.$villas->dest_id; ?>" title="" class="imgeffect plus"><img src="<?php echo $images; ?>" style="width: 250px;height: 150px" alt="" /></a>
                                </span>
                            </span>
                    <!-- product name -->
                    <h6>

                    </h6>
                    <p style="text-align: center">
                        <!-- product description -->
                        <?php $name=$villas->dest_name;
                        $ul=URL::to_route('destinationVilla').'/'.$villas->dest_id;
                        echo stringlib::Trunc($name,25,$ul);
                        ?>                              <!-- price -->
                        <br />

                    </p>
                </div>


            <?php }}?>
        <!-- / three column -->
        <div class="line">
        </div>
        <!-- paging-->

<?php echo render('template.footer');?>
<?php Section::stop(); ?>
<?php echo render('template.main'); ?>
