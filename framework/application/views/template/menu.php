<!-- Navigation -->

<div id="navigation" >
    <!--Mega Menu Anchor-->
    <ul>
        <li><a href="#" id="megaanchor">Destinations</a><span>Our Villas and Home Stays</span></li>
        <div id="megamenu1" class="megamenu" style="background-color: red !important;">
            <div class="column">

                <h3 class="mega-header"><a href="kerala.html">Kerala</a></h3>
                <ul>
                    <li><a href="<?php echo URL::to('destination/wayanad');?>">Wayanad</a></li>
                    <li><a href="<?php echo URL::to('destination/alleppey')?>">Alleppey</a></li>
                    <li><a href="<?php echo URL::to('destination/munnar');?>">Munnar</a></li>
                    <li><a href="<?php echo URL::to('destination/kumarakom');?>">Kumarakom</a></li>
                    <li><a href="<?php echo URL::to('destination/kochi');?>">Kochi</a></li>
                    <li><a href="<?php echo URL::to('destination/munnar');?>">Wagamon</a></li>
                    <li><a href="#">Kovalam</a></li>
                    <li><a href="#">Silent Valley</a></li>
                </ul>
            </div>

            <div class="column">
                <h3><a>Karnataka</a></h3>
                <ul>
                    <li><a href="/destination/coorg">Coorg</a></li>
                    <li><a href="<?php echo URL::to('destination/chikmagalur');?>">Chikmagalur</a></li>
                    <li><a href="<?php echo URL::to('destination/kabini');?>">Kabini</a></li>
                    <li><a href="<?php echo URL::to('destination/bandipur');?>">Bandipur</a></li>
                </ul>
            </div>

            <div class="column">
                <h3><a>Rajasthan</a></h3>
                <ul>
                    <li><a href="<?php echo URL::to('destination/jaipur');?>">Jaipur</a></li>
                    <li><a href="<?php echo URL::to('destination/jaisalmer');?>">Jaisalmer</a></li>
                    <li><a href="<?php echo URL::to('destination/udaipur');?>">Udaipur</a></li>
                    <li><a href="<?php echo URL::to('destination/jodhpur');?>">Jodhpur</a></li>
                    <li><a href="<?php echo URL::to('destination/ranthambore');?>">Ranthambore</a></li>
                </ul>
            </div>

            <br style="clear: left"/> <!--Break after 3rd column. Move this if desired-->
            <br/>
            <div class="column">
                <h3><a>Jammu &amp; Kashmir</a></h3>
                <ul>
                    <li><a href="#">Kashmir</a></li>
                    <li><a href="#">Srinagar</a></li>
                    <li><a href="#">Leh</a></li>
                    <li><a href="#">Gulmarg</a></li>
                </ul>
            </div>

            <div class="column" >
                <h3><a>Himachal Pradesh</a></h3>
                <ul>
                    <li><a href="#">Shimla</a></li>
                    <li><a href="#">Kullu</a></li>
                    <li><a href="#">Manali</a></li>
                    <li><a href="#">Kasauli</a></li>
                </ul>
            </div>

            <div class="column">
                <h3><a>Tamil Nadu</a></h3>
                <ul>
                    <li><a href="<?php echo URL::to('destination/ooty');?>">Ooty</a></li>
                    <li><a href="<?php echo URL::to('destination/kodaikanal');?>">Kodaikanal</a></li>
                </ul>
            </div>
            <br style="clear: left"/>

            <div class="column">
                <h3><a href="<?php echo URL::to('destination/goa');?>">Goa</a></h3>
            </div>
            <div class="column">
                <h3><a href="<?php echo URL::to('destination/pondicherry');?>">Pondicherry</a></h3>
            </div>
            <div class="column">
                <h3><a href="#">Uttaranchal</a></h3>
            </div>
        </div>
        <li id="vacation"><a href="#"> Vacation Ideas</a><span>Ezz Way of Holidays!</span></li>
        <div id="megamenu2" class="megamenu" style="background-color: red !important;">

            <?php $i=1;  foreach(libvilla::category() as $cat){ $n=$i;  ?>
                <div class="column">
                    <ul><h3 class="mega-header"><a href="#"><?php echo $cat->cat_name;?></a></h3>
                        <?php foreach(libvilla::subcategory() as $sub){ ?>
                            <?php if($cat->cat_id==$sub->cat_pid){?>
                                <li><a href="<?php echo URL::to_route('vacationCategory').'/'.$sub->cat_id; ?>"><?php echo $sub->cat_name;?></a></li>
                            <?php }?>
                        <?php }?>
                    </ul>
                </div>
                <?php
               $i=$n+1;
                if($n%3==0)
                {
                    echo '<br style="clear: left"/>';
                }
                ?>
            <?php }?>
            </div>


        <!--<li><a href="#">Hot Deals</a><span>Best Vacation Offers</span></li>-->
        <li><a href="<?php echo URL::to_route('about');?>">About Us</a><span>Why Ezz Villas.com?</span></li>
        <li><a href="<?php echo URL::to_route('contact-us');?>">Contact Us</a></li>

    </ul>
</div>

<!-- / Navigation -->