[<?php echo Section::start('ContentWrapper')?>

<!-- Content -->

<div class="content">

    <!-- Left Side -->

    <div class="titlebar">

        <!-- Page Title -->



        <h2 style="float:left">

            <?php if($location!=NULL){echo ucfirst($location->loc_name);}?>

            <?php  if($location!=NULL AND $_GET['category']!='') {  ?>

            <small>

                    <i class="icon-double-angle-right"></i></small>



            <?php }?>

            <?php if( $_GET['category']!=''){ ?>



            <?php echo ucfirst($cat_description->cat_name);?>

            Vacation



            <?php }?>



        <form onsubmit="return hai()" action="<?php echo URL::to_route('SearchValues'); ?>" method="get" class="form-inline">

            <select name="loc_id" class="span2" style="padding: 3px;width: 150px">

                <option value="">Select Destination</option>

                <?php foreach(libvilla::cities() as $city){ ?>

                    <option value="<?php echo $city->location_id; ?>"><?php echo $city->loc_name; ?></option>

                    <!--            <input type="search" name="search" id="search" placeholder="Search Destination" />-->

                <?php }?>

            </select>

            <select name="category" id="" class="span2" style="padding: 3px;width: 130px">

                <option value="">Select category</option>

                <?php foreach(libvilla::subcategory() as $category){ ?>

                    <option value="<?php echo $category->cat_id; ?>"><?php echo $category->cat_name;?></option>

                <?php }?>

            </select>

            <select name="min" id="min" class="span2" style="padding: 3px;width: 100px">

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

            <select name="max" id="max" onchange="hai()" class="span2" style="padding: 3px;width:100px">

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

            <select name="bedroom" id="" class="span2" style="padding: 3px;width: 130px">

                <option value="">No. of Bedroom</option>

                <?php foreach($bedroom as $bedrooms){ ?>

                    <option value="<?php echo $bedrooms->fac_bedroom; ?>"><?php echo $bedrooms->fac_bedroom; ?>Bed Room</option>

                <?php } ?>

            </select>

            <button type="submit" class="btn">Search</button>

        </form>



        </div>



        <div class="line">



        </div>

        <?php if(!$villa){?>

                    <b style="color: red;font-size: 18px;text-align: center">Sorry, we could not meet your criteria. Try some different Vacation Theme. Thanks :-)  </b>

        <?php }else {?>



        <b><?php if($_GET['category']!=0){ echo $cat_description->cat_description; }?></b><br>



<!--        --><?php //echo "<pre>";print_r($villa); exit;

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

                                    <a href="<?php echo URL::to_route('destinationVilla').'/'.$villas->dest_id; ?>" title="" class="imgeffect plus"><img src="<?php echo $images;?>" style="width: 250px;height: 150px" alt="" /></a>

                                </span>

                            </span>

                <!-- product name -->

                <h5 style="margin-left: 20px">
<?php $name=$villas->dest_name;

                    $ul=URL::to_route('destinationVilla').'/'.$villas->dest_id;

                    echo stringlib::Trunc($name,25,$ul);

                    ?>


                </h5>

                <p style="font-family:Verdana, Geneva, sans-serif; font-size:12px; color:#669E1B;margin-left: 20px">
                    Nightly Rates: <i class="icon-1x icon-inr"></i> <?php echo $villas->dest_charge; ?><br/>
                    No. of Bedrooms:<?php $bed=libvilla::get_facility($villas->dest_id); echo $bed->fac_bedroom;?>

                </p>      
                    


               

            </div>

        <?php }}?>

        <!-- / three column -->

        <div class="line">

        </div>

        <!-- paging-->



        <!-- / paging-->

        <div class="clear">

        </div>





    <!-- / Left -->

    <!-- Sidebar -->



    <!-- / Sidebar -->

    <div class="clear">

    </div>

</div>

<!-- / Content -->



<!-- / wrapper end-->

<?php echo render('template.footer');?>

<?php Section::stop(); ?>

<?php echo render('template.main'); ?>

