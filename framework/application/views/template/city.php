<?php echo Section::start('ContentWrapper')?>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
    <!-- Content -->
    <div class="content" ng-controller="DestinationCtrl" id="Ctrl" ng-init="getVillas('<?php echo $city;?>');">
        <div class="row titlebar" >
        <h2 style="float:left">
            <?php echo ucfirst($city);?>
            <form onsubmit="return hai()" action="<?php echo URL::to_route('SearchValues'); ?>" method="get" class="form-inline">
                <select name="loc_id" id="" class="span1" style="padding: 3px">
                    <option value="">Select Destination</option>
                    <?php foreach(libvilla::cities() as $city){ ?>
                        <option value="<?php echo $city->location_id; ?>"><?php echo $city->loc_name; ?></option>
                        <!--            <input type="search" name="search" id="search" placeholder="Search Destination" />-->
                    <?php }?>
                </select>
                <select name="category" id="" class="span1" style="padding: 3px">
                    <option value="">Select Category</option>
                    <?php foreach(libvilla::subcategory() as $category){ ?>
                        <option value="<?php echo $category->cat_id; ?>"><?php echo $category->cat_name;?></option>
                    <?php }?>
                </select>
                <select name="min" id="min" class="span1" style="padding: 3px">
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
                <select name="max" id="max" onchange="hai()" class="span1" style="padding: 3px">
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
                <select name="bedroom" id="" class="span1" style="padding: 3px">
                    <option value="">No. of Bedroom</option>
                    <?php foreach($bedroom as $bedrooms){ ?>
                        <option value="<?php echo $bedrooms->fac_bedroom; ?>"><?php echo $bedrooms->fac_bedroom; ?>Bed Room</option>
                    <?php } ?>
                </select>
                <button type="submit" class="btn">Search</button>
            </form>



        <div class="line">
        </div>
    </div>
        <?php foreach($destinations as $dest){
        $image=libvilla::villa_cover_image_by_id($dest->dest_id);
        if($image=="http://t2.gstatic.com/images?q=tbn:ANd9GcSEUzYpB_WmWxQrA5F9HM2sp-nSTQpMV6ZFP0_Ah2t5fyYS6cAP87uAsg")
        {
            $image=$image;
        }
        else{

            $image=Config::get('application.url').'/'.Config::get('admin::admin_config.image_path').$image->image_filename;
        }
        ?>
        <div class="row white" style="padding: 40px 0px 20px">
            <!-- box -->
            <div class="box two portfolio">
                <!-- portfolio image -->
                            <span class="aligncenter">
                                <span class="border">
                                    <a href="<?php echo URL::to_route('destinationVilla').'/'.$dest->dest_id;?>">
                                        <img src="<?php echo $image;?>" alt="" width="434"
                                             height="280"/></a>
                                </span>
                            </span>
                <!-- / portfolio image -->
            </div>
            <div class="box two" >
                <!-- title-->
                <h3 style="font:Arial, Helvetica, sans-serif;color:#FF800 !important;">
                    <a href="<?php echo URL::to_route('destinationVilla').'/'.$dest->dest_id;?>" target="_blank" title=""><?php echo $dest->dest_name; ?></a>
                </h3>
                <!-- text-->
                <p style="font-size:12px;">
                    <?php echo $dest->dest_description; ?>
                </p>

                <!-- / text-->
                <!-- link -->
                <table border="0" style="border: none">
                    <tr style="border: none">
                        <td border="0" style="border: none"><span style="font-size:16px; color:#F30">INR <?php echo $dest->dest_charge; ?>/Ni</span></td>
                        <td style="border: none"><a href="" onclick="drawBookingForm();"><?php echo HTML::image('img/book_now.gif','',array('height'=>'60'));?></a></td>
                        <td style="border: none; width: 230px" ><a href="<?php echo URL::to_route('destinationVilla').'/'.$dest->dest_id;?>" title="" class="small_button nomargin" style="right: 0px">Read More</a></td>

                    </tr>
                </table>




                <!--BOOKING BUTTON-->


            </div>
            <div class="fb-like" data-href="https://www.facebook.com/EzzVillaRetreats?ref=hl"
                 data-send="false" data-width="150" data-show-faces="false"></div>
            <!-- /box -->
            <?php }?>
    </div>
    <!-- / row -->
    <div class="clear">
    </div>

    <!--END VILLA VIEW-->
    <script type="text/javascript">
        $("#but").button();

    </script>
    <!--Villa Booking Form Dialog-->
    <div id="dialog-form" title="Book villa">
        <form method="post" id="dform" onsubmit="return validation()">
            <table class="contact-form-table">
                <tr>
                    <td colspan="2">All fields are required</td>
                </tr>
                <tr>
                    <td>Villa Name</td><td><input type="text"  class="text ui-widget-content ui-corner-all" name="villa_name"  value="<?php echo $dest->dest_name;?>" readonly /></td>
                </tr>
                <tr>
                    <td>Your Name</td><td><input type="text" class="text ui-widget-content ui-corner-all" name="full_name" id="dform-cust-name"/></td>
                </tr>
                <tr>
                    <td>Number of Adults</td><td><input type="text" class="text ui-widget-content ui-corner-all" name="no_of_guest" id="dform-cust-guest"/></td>
                </tr><tr>
                    <td>Number of Children</td><td><input type="text" class="text ui-widget-content ui-corner-all" name="no_of_child" id="dform-cust-child"/></td>
                </tr>
                <tr>
                    <td><label for="email">Your Email</label></td><td><input type="text" name="email" class="text ui-widget-content ui-corner-all" id="dform-cust-email"/></td>
                </tr>
                <tr>
                    <td><label for="mobile">Mobile no.</label></td><td><input type="text" name="mobile" class="text ui-widget-content ui-corner-all" id="dform-cust-mobile"/></td>
                </tr>
                <tr>
                    <td><label for="start_date">Check In</label></td><td><input type="text" class="text ui-widget-content ui-corner-all" id="dform-cust-checkin" name="checkin"/></td>
                </tr>
                <tr>
                    <td><label for="start_date">Check Out</label></td><td><input type="text" class="text ui-widget-content ui-corner-all" id="dform-cust-checkout" name="checkout"/></td>
                </tr>
                <tr>
                    <td><label for="message">Comments/Special Request</label></td><td><textarea name="message" class="text ui-widget-content ui-corner-all" cols="30" id-
                           rows="4"></textarea></td>
                </tr>
                <tr>
                    <td></td><td><input type="checkbox" name="privacy" id="privacy"><label for="privacy">I Agree to EzzVillas <a href="#"> Terms of Service</a> and <a href="#"> Privacy Policy</a></label></td>
                </tr>
            </table>
        </form>
    </div>
    <script>
        $( "#dialog-form" ).dialog({
            autoOpen: false,
            height: 750,
            width: 600,
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

            if(email!='')
            {
                if (!filter.test(email))
                {
                    alert("Please enter Vaild email ID")
                    return false;
                }
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
                    $("#dform :input").each(function(){
                        $(this).val('');
                    });
                })
                .error(function(data)
                {
                    alert(data);
                });



        }

        function drawBookingForm(name)
        {
            $("#dialog-form").dialog("open");
            $("#dform-villa-name").val(name);
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
    </script>
    <!--Villa Booking Form END-->

    </div>
    </div>
    <!-- / Content -->
<?php echo render('template.footer');?>
<?php Section::stop();?>
<?php echo render('template.main');?>