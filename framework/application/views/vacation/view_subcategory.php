<?php echo Section::start('ContentWrapper')?>

<!-- Content -->

<div class="content sub">

    <!-- Left Side -->

    <div class="left">

        <!-- Page Title -->



        <h2>



             <?php echo ucfirst($cat_description->cat_name); ?>  Vacation





        </h2>

        <form onsubmit="return hai()" action="<?php echo URL::to_route('SearchValues'); ?>" method="get" class="form-inline">

            <select name="loc_id" class="span2" style="padding: 3px;width: 130px">

                <option value="">Select Destination</option>

                <?php foreach(libvilla::cities() as $city){ ?>

                    <option value="<?php echo $city->location_id; ?>"><?php echo $city->loc_name; ?></option>

                    <!--            <input type="search" name="search" id="search" placeholder="Search Destination" />-->

                <?php }?>

            </select>

            <select name="category" id="" class="span2" style="padding: 3px;width: 120px">

                <option value="">Select category</option>

                <?php foreach(libvilla::subcategory() as $category){ ?>

                    <option value="<?php echo $category->cat_id; ?>"><?php echo $category->cat_name;?></option>

                <?php }?>

            </select>

            <select name="min" id="min" class="span2" style="padding: 3px;width:80px">

                <option value="">Min Price</option>

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

            <select name="max" id="max" onchange="hai()" class="span2" style="padding: 3px;width:80px">

                <option value="">Max Price</option>

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

            <select name="bedroom" id="" class="span2" style="padding: 3px;width: 120px">

                <option value="">No. of Bedroom</option>

                <?php foreach($bedroom as $bedrooms){ ?>

                    <option value="<?php echo $bedrooms->fac_bedroom; ?>"><?php echo $bedrooms->fac_bedroom; ?>Bed Room</option>

                <?php } ?>

            </select>

            <button type="submit" class="btn">Search</button>

        </form>



        <div class="line">



        </div>

        <?php if(!$villa){?>

            <b style="color: red;font-size: 18px;text-align: center">Sorry, we con't meet your criteria  </b>

        <?php }else {?>

        <p style="font-family:Verdana, Geneva, sans-serif; font-size:16px; color:#F30;"><?php if(isset($cat_description)){ echo $cat_description->cat_description; }?></p><br>

        <?php

        foreach($villa->results as $villas){

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
                                <a href="<?php echo URL::to_route('destinationVilla').'/'.$villas->dest_id; ?>" title="" class="imgeffect plus"><img src="<?php echo $images; ?>" style="width: 200px;height: 150px" alt="" /></a><br/>

                                </span>


                            </span>

                    <!-- product name -->

                    <h5>
                    <?php $name=$villas->dest_name;

                      $ul=URL::to_route('destinationVilla').'/'.$villas->dest_id;

                      echo stringlib::Trunc($name,25,$ul);

                      ?>    

					

                   </h5>

                    <p style="font-family:Verdana, Geneva, sans-serif; font-size:12px; color:#669E1B" >
                      Nightly Rates: <i class="icon-inr"></i> <?php echo $villas->dest_charge;?><br/>
                      No. of Bedrooms:<?php $bed=libvilla::get_facility($villas->dest_id); echo $bed->fac_bedroom;?>
                    </p>

                </div>

        <?php }}?>

        <!-- / three column -->

        <div class="line">

        </div>

        <!-- paging-->

        <?php echo $villa->links(); ?>





        <!-- / paging-->

        <div class="clear">

        </div>

    </div>

    <!-- / Left -->

    <!-- Sidebar -->

    <div class="sidebar">

        <div class="sidebar_back">

            <!-- Sub Navigation -->

            <div class="box">

                <!-- Title-->

                <h4>

                    <a href="#">Featured Villas</a>

                </h4>

                <!-- Links -->

                <?php foreach($villa_featured as $featured_villa){

                if($featured_villa->dest_category=='featured'){

                    $images=libvilla::villa_cover_image_by_id($featured_villa->dest_id);

                    if($images=="http://t2.gstatic.com/images?q=tbn:ANd9GcSEUzYpB_WmWxQrA5F9HM2sp-nSTQpMV6ZFP0_Ah2t5fyYS6cAP87uAsg")

                    {

                        $images1=$images;

                    }

                    else{

                        $images1=Config::get('application.url').'/'.Config::get('admin::admin_config.image_path').$images->image_filename;

                    }

                ?>

                <ul class="sub_navigation">

                    <li><img src="<?php echo $images1; ?>" style="width:130px;height: 100px"><br>

                        <b><?php echo $featured_villa->dest_name; ?></b><br>

                    <?php $des=$featured_villa->dest_description;

                             $len=95;

                            $link=URL::to_route('destinationVilla').'/'.$featured_villa->dest_id;

                        echo stringlib::ReadMore($des,$len,$link);

                        ?>



                   </li>

                </ul>

                <?php } } ?>

                <!-- / Links -->

            </div>

            <!-- / Sub Navigation -->

            <!-- new product -->



            <!-- new product -->

        </div>

    </div>

    <!-- / Sidebar -->

    <div class="clear">

    </div>

</div>

<!-- / Content -->



<!-- / wrapper end-->

<?php echo render('template.footer');?>

<?php Section::stop(); ?>

<?php echo render('template.main'); ?>

