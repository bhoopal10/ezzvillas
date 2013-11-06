
<?php echo Section::start('ContentWrapper')?>
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
    <div class="slides"></div>
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
</div>
    <!-- Content -->
<div class="content">

    <!-- / Page Title -->
    <div class="line"></div>
    <div class="blog single" >
        <!--Slideshow-->
        <div class="photo_gallery_cycle111"><br/>
            <div class="aligncenter ">
                <div id="links" >
                    <?php if(isset($cover_image['image_filename'])){ ?>

               <img src="<?php echo Config::get('application.url').'/'.Config::get('admin::admin_config.image_path').$cover_image['image_filename']?> " alt="<?php echo $cover_image['image_filename']; ?>" style="width:950px;height:550px;cursor: pointer;">

          <?php foreach($images as $album){ ?>

                    <a style="display:none" href="<?php echo Config::get('application.url').'/'.Config::get('admin::admin_config.image_path').$album['image_filename'] ?>" title="<?php echo $album['image_name'] ?>">
                    </a>
          <?php } }?>
                </div>

            </div>
        </div>
        
        <div class="row titlebar" >
            <h2 style="float:left;color:#8D743F;left:25px;font-size:24px;">
                 <?php

                 echo ucfirst($villa->dest_name);?>
            </h2><br/><br/><br/>
            <div style=" padding-right:3em;float:left;color:black; font-family:Arial, Helvetica, sans-serif; font-size:18px" class="filter-container">
                <ul class="ullist">
                    <li style="color:#F07A0F;left:0; font-size:24px; padding-right:3em; margin-left:35px;">
                        <label for="">Nightly Rates</label>
                        <div class=""><span><strong><i class="icon-inr"></i> <?php echo $villa->dest_charge;?> /Ni</strong></span></div>
                    </li>
                    <li >
                        <a style="cursor: pointer" onclick="drawBookingForm();" ><?php echo HTML::image('img/book_now.gif','',array('height'=>'50'));?></a>

                    </li>

                </ul>

            </div>

        </div>
        <div class="clear"></div>
        <div class="blog full" style="width:600px;float: left">
            <div class="box-title">
                <h3  class="zblack">Description</h3>
            </div>
            <div class="line nomargin"></div>
            <p style="text-align: justify; font-size:14px;"><?php echo $villa->dest_full_description;?></p>
        </div>
        <div class="blog full" style="width:300px; right:0; top:1025px; position:absolute;">
            <div class="box-title">
                <h3  class="zblack">At a Glance</h3>
            </div>
            <?php echo $villa->dest_at_glance ;?>
            <ul> <li style="list-style-type:none">
                        <a style="cursor: pointer" onclick="drawBookingForm();"><?php echo HTML::image('img/book_now.gif','',array('height'=>'50'));?></a>

                    </li></ul>



        </div>
        <div class="clear"></div>
        <div class="blog full" style="width:600px;float: left; height:300px;">
                    <div class="box-title">
            <h3 class="zblack" style="margin:0 0 !important;"> Ratings</h3>
            </div>
            <div style="width:50%; float:left;">
                <h4 style="background:#09F; color:white; text-align:center;margin:0 0 !important; line-height:1.7">Our Rating: <?php echo $villa->dest_cust_rating;?>/5</h4>
                <p style="color:#38410A; font-size:14px;text-align: justify">Company Ratings are based on the Government Ratings of Villas/Resorts/Home Stays and the marks given by  EzzVilla.com team after their personal inspection in these Villas/Homestays. By this we ensure you spend your holidays in the best Villas/Homestays of India.  Note that, Villas and Homestays that qualify our minimum standards are only enlisted in EzzVillas.com.</p>
            </div>
            <div style="width:50%; height:300px;float:right; text-align:center;">
                <h4 style="background:#060; color:white; alignment-adjust:central;margin:0 0 !important; line-height:1.7">Trip Advisor Ratings: <?php echo $villa->dest_trav_rating;?>/5</h4>
                <div>
                   
                  <?php echo HTML::image('images/tripadvisor.png')?>
                </div>

                <!--<h4 style="background:#FFB997;">Travellers Ratings:</h4><div class="rating"><span style="color:#CCC !important">&#9733;</span><span style="color:#CCC !important">&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span></div>
                  <p style="color:black; font-size:14px">Only those travellers who have actually stayed in the villa are given the authentication to write a review. This makes our traveller's review 100% genuiune</p>--></div><br />
        </div>
        <div class="blog full" style="width:600px;float: left">
            <div class="box-title">
                <h3  class="zblack">Location Map</h3>
            </div>
            <div " style="margin-top: 20px">
            <?php echo $villa->dest_trip_adviser_widget;?></div>
            <div class="line nomargin"></div>
            <?php echo $villa->dest_map_code;?></p>

        </div>

        <div class="clear">
        </div>
        <!--/Slideshow-->
        <script src="<?php echo Config::get('application.url')?>/js/blueimp-gallery.min.js"></script>
        <script>
            document.getElementById('links').onclick = function (event) {
                event = event || window.event;
                var target = event.target || event.srcElement,
                    link = target.src ? target.parentNode : target,
                    options = {index: link, event: event},
                    links = this.getElementsByTagName('a');
                blueimp.Gallery(links, options);
            };
            blueimp.Gallery(
                document.getElementById('links').getElementsByTagName('a'),
                {
                    container: '#blueimp-gallery-carousel',
                    carousel: true
                }
            );
        </script>
<!--Villa Booking Form Dialog-->
    <div id="dialog-form" title="Book villa">
        <form method="post" id="dform">
            <table class="contact-form-table">
                <tr>
                    <td colspan="2">All fields are required</td>
                </tr>
                <tr>
                    <td>Villa Name</td><td><input type="text"  value="<?php echo $villa->dest_name; ?>" class="text ui-widget-content ui-corner-all" name="villa_name" id="dform-villa-name" readonly /></td>
                </tr>
                <tr>
                    <td>Your Name</td><td><input type="text" class="text ui-widget-content ui-corner-all" name="full_name" id="dform-cust-name" style="color:#FFF"/></td>
                </tr>
                <tr>
                    <td>Number of Adults</td><td><input type="text" class="text ui-widget-content ui-corner-all" name="no_of_guest" id="dform-cust-guest" style="color:#FFF"/></td>
                </tr><tr>
                    <td>Number of Children</td><td><input type="text" class="text ui-widget-content ui-corner-all" name="no_of_child" id="dform-cust-child" style="color:#FFF"/></td>
                </tr>
                <tr>
                    <td><label for="email">Your Email</label></td><td><input type="text" name="email" class="text ui-widget-content ui-corner-all" id="dform-cust-email" style="color:#FFF"/></td>
                </tr>
                <tr>
                    <td><label for="mobile">Mobile no.</label></td><td><input type="text" name="mobile" class="text ui-widget-content ui-corner-all" id="dform-cust-mobile" style="color:#FFF"/></td>
                </tr>
                <tr>
                    <td><label for="start_date">Check In</label></td><td><input type="text" name="checkin" class="text ui-widget-content ui-corner-all" id="dform-cust-checkin"/></td>
                </tr>
                <tr>
                    <td><label for="start_date">Check Out</label></td><td><input type="text" name="checkout" class="text ui-widget-content ui-corner-all" id="dform-cust-checkout"/></td>
                </tr>
                <tr>
                    <td><label for="message">Comments/Special Request</label></td><td><textarea name="message" class="text ui-widget-content ui-corner-all" cols="30" id-
                                                                                                rows="4" ></textarea></td>
                </tr>
                <tr>
                    <td></td><td><input type="checkbox" name="privacy" id="privacy" value="true"><label for="privacy">I Agree to EzzVillas <a href="<?php echo URL::to_route('TermsAndConditions'); ?>"> Terms of Service</a> and <a href="<?php echo URL::to_route('Privacy'); ?>" id="privacy"> Privacy Policy</a></label></td>
                </tr>
            </table>
        </form>
    </div>

        <script>

            $( "#dialog-form" ).dialog({
                autoOpen: false,
                height: 750,
                width: 700,
                modal: true

            });

            $( "#dialog-form" ).dialog(
                {
                    buttons: [ { text: "Send", click: function()
                    {
                       send();
                    }
                             } ]
                });
            function send()
            {


                var name=$("#dform-cust-name").val(),
                    email=$("#dform-cust-email").val(),
                    adult=$('#dform-cust-guest').val(),
                    child=$('#dform-cust-child').val(),
                    mobile=$("#dform-cust-mobile").val(),
                    checkin=$("#dform-cust-checkin").val(),
                    checkout=$("#dform-cust-checkout").val(),
                    villa_name=$("#dform-villa-name").val();

                var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                var letters = /^[A-Za-z]+$/;
                var from=new Date(checkin);
                var to=new Date(checkout);
                var today=new Date();
                var tomorrow = new Date(new Date().getTime());
//                    if(!villa_name)
//                    {
//                        alert("Please Enter Villa Name");
//                        return false;
//                    }
                    if(!name)
                    {
                        alert("Please Enter Your Name");
                        return false;
                    }
                    if(!name.match(letters))
                    {
                        alert("Please Valid Name");
                        return false;
                    }
                if(!adult)
                {
                    alert("Please enter No.of guest");
                    return false;
                }
                if(isNaN(adult))
                {
                    alert("Please enter No.of guest as a numeric value");
                    return false;
                }
                if(!child)
                {
                    alert("Please enter No.of child");
                    return false;
                }
                if(isNaN(child))
                {
                    alert('Please enter No.of child as a numeric value');
                    return false;
                }

                    if(!email)
                    {
                        alert("Please Enter Email_ID");
                        return false;

                    }

                    if (!filter.test(email))
                    {
                        alert("Please enter Vaild email ID")
                       return false;
                    }

                    if(!mobile)
                    {
                        alert('Enter mobile Number');
                        return false;
                    }
                    if(isNaN(mobile))
                    {
                        alert('Enter valid Mobile Number');
                        return false;
                    }
                    if(mobile.length<10 || mobile.length>10)
                    {
                        alert("10 Digit Mobile Number");
                        return false;
                    }
                if(!checkin)
                {
                    alert("Please fill checkin field");
                    return false;
                }
                if(!checkout)
                {
                    alert("Please fill checkout field");
                    return false;
                }
                    if (from >= tomorrow && to > from) {

                    } else {
                        alert('Select Valid Date');
                        return false;
                    }
                if($("#privacy").is(':checked'))
                {

                }
                else
                {
                    alert("Please, Agree to Term and Condition");
                    return false;
                }


                $.post('<?php echo URL::to_route('CreateBooking');?>',
                    $("#dform").serialize())
                    .success(function(data)
                    {
                        alert(data);
                        $('#dialog-form').dialog("close");
                    })
                    .error(function(data)
                    {
                        alert(data);
                    });

            }

        </script>

        <script>
            $("#dform-cust-checkin").datepicker({
                 onClose: function( selectedDate )
                  {
                    $("#dform-cust-checkin").val(selectedDate);
                   }
            });
            $("#dform-cust-checkout").datepicker({
                 onClose: function( selectedDate )
                  {
                    $("#dform-cust-checkout").val(selectedDate);
                   }
            });


            function drawBookingForm()
            {
                $("#dialog-form").dialog("open");
                $("#dform-villa-name").val();
            }
        </script>
<!--Villa Booking Form END-->

    </div>
    <!--END ROW-->
<?php echo render('template.footer');?>
<?php Section::stop();?>
<?php echo render('template.main');?>