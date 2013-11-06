
<?php echo Section::start('ContentWrapper');?>
    <div id="slider">

        <div id="slider_area" class="cycle">
            <!-- slide-->

            <?php foreach($slider as $slide){ ?>
            <!-- slide-->
            <div class="slide">
                <!-- slide description -->
                <div class="desc transparent_background dark ">
                    <!-- dark background -->
                    <!-- title -->
                    <b class="title">
                        <a href="#" title="" id=""><?php echo $slide->image_title; ?></a>
                    </b>
                    <br />
                    <!-- subtitle -->
                    <b class="subtitle">


                    </b>
                    <br />
                    <!-- text -->

                    <!-- text -->
                    <a href="#" title=""></a>
                </div>
                <!-- /slide description -->
                <!-- background image-->
                <img src="<?php echo Config::get('application.url').'/'.Config::get('admin::admin_config.image_path').$slide->image_filename; ?>" style="width: 1000px;height: 600px" alt="" />
                <!-- /background image -->
            </div>
            <!--/ slide-->
            <!-- slide-->

            <!--/ slide-->
            <?php } ?>
        </div>

    </div>

    <!-- / slider buttons -->
    <div id="numbers">
    </div>
    <!-- / Content Slider -->
    <img src="images/home_content_top.png" alt="" class="home_content_top" />
    <!-- Home Page Content -->
    <div class="content home" style="padding: 12px 33px 0px; width: 914px;">
        <!-- First Row - White -->
        <div class="row white " style="padding: 40px 17px 18px; width: 940px;">
            <!-- box -->
            <div class="box two first">
                <!-- box image-->
                <img src="images/java.jpg" class="alignleft" alt="Java Hills Luxury Villa" />
                <!-- box title-->
                <h5>
                    <a href="http://ezzvillas.com/destination/villa/58">Java Hills Luxury Villa, Coorg</a>
                </h5>
                <!-- text-->
                <ul>
                
                <li>4 Bedroom Villa</li>
				<li>Maximum  Occupancy - 12 Guests</li>
<li>Amidst Coffee Plantation</li>
<li>Core Privacy</li>
<li>Rs.3,400 per room per night (for two people)</li>
<li>Estate Trails</li>

                
                </ul>
                <a href="http://ezzvillas.com/destination/villa/58" title="Read More" class="small_button">Read More</a>
            </div>
            <!-- /box -->
            <!-- box -->
            <div class="box two last">
                <!-- box image-->
                <img src="images/kerala-house-boats.jpg" class="alignleft" alt="House Boats in Kerala" />
                <!-- box title-->
                <h5>
                    <a href="http://ezzvillas.com/destination/alleppey">Kerala House Boats</a>
                </h5>
                <!-- text-->
                <ul>
                    <li>Houseboats ranging from 1 Bedroom Houseboat to 5 Bedroom Houseboat</li>
<li>Price starting from Rs.7000 for one entire Houseboat</li>
<li>Air Conditioned Rooms</li>
<li>Attached Western Style Bathrooms</li>
<li>Lounge and Dining Room</li>
<li>Package includes Lunch, Dinner and Breakfast</li>
<li>Houseboats for 2 Guests to 15 Guests</li></ul>

                    <a href="http://ezzvillas.com/destination/alleppey" class="small_button">Enquire Now</a>
            </div>
            <!-- /box -->

        </div>

        <!-- Second Row - Silver -->
        <div class="row silver"  style="padding: 40px 17px 18px; width: 940px;">
            <!-- box -->
            <div class="box four first">
                <!-- box title-->
                <h5>
                    <a href="http://ezzvillas.com/destination/villa/61">Villa Evening  Primrose, Goa</a>
                    <img src="images/home2.jpg" width="200" height="150" />
                </h5>
                <!-- text-->
             <p>
                 <?php echo $posts->post_box1; ?> </p>
                 <a href="http://ezzvillas.com/destination/villa/61" class="small_button">Read More</a></li>

            </div>
            <!-- /box -->
            <!-- box -->
            <div class="box four">
                <!-- box title-->
                <h5>
                    <a href="http://ezzvillas.com/destination/villa/4">Aqua Bliss Villa, Alleppey</a>
                    <img src="images/home1.jpg" height="150" width="200" />
                </h5>
                <!-- text-->
                <p><?php echo $posts->post_box2; ?></p>
                <a href="http://ezzvillas.com/destination/villa/4" title="" class="small_button">Read More</a>
            </div>
            <!-- /box -->
            <!-- box -->
            <div class="box four">
                <!-- box title-->
                <h5>
                    <a href="http://ezzvillas.com/destination/jaisalmer">Desert Tents, Jaisalmer</a>
                    <img src="images/home4.JPG" width="200" height="150" />
                </h5>
                <!-- text-->
                <p>
                    <?php echo $posts->post_box3; ?></p>
                <a href="http://ezzvillas.com/destination/jaisalmer" title="" class="small_button">Read More</a>
            </div>
            <!-- /box -->
            <!-- box -->
            <div class="box four last">
                <!-- box title-->
                <h5>
                    <a href="http://ezzvillas.com/destination/villa/48">Whispering Palms Villa, Kumarakom</a>
                    <img src="images/home3.jpg" width="200" height="150" />
                </h5>
                <!-- text-->
                <p><?php echo $posts->post_box4; ?></p>
                <a href="http://ezzvillas.com/destination/villa/48" title="" class="small_button">Read More</a>
            </div>
            <!-- /box -->
            <div class="clear">
            </div>

        <!-- / Second Row -->


    <!-- / Home Page Content -->
    </div>
    <!-- / wrapper 2 end-->
    </div>
    <!-- / wrapper end-->
<script type="text/javascript">
    var rttheme_effect_options = 'fade'; // content slider translation effect

    /* CONTENT AND NIVO ALIDER */
    var rttheme_slider_time_out = 3000; // translation timeout (ms)


    //Content slider
    jQuery(document).ready(function(){
        var slider_area;
        var slider_buttons;

        if (jQuery('.cycle').length>0){
            // Home Page Slider
            slider_area="#slider_area";
            slider_buttons="#numbers";

            jQuery(slider_area).cycle({
                fx:     rttheme_effect_options,
                timeout:  rttheme_slider_time_out,
                easing: 'backout',
                pager:  slider_buttons,
                cleartype:  1,
                pause:           true,     // true to enable "pause on hover"
                pauseOnPagerHover: true,   // true to pause when hovering over pager link
                pagerAnchorBuilder: function(idx) {
                    return '<a href="#" title=""><img src="images/pixel.gif" width="14" heigth="14"></a>';
                }
            });
        }
    });
</script>

<?php echo render('template.footer');?>
<?php Section::stop();?>

<?php echo render('template.main');?>


