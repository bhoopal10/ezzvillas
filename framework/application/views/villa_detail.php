<?php echo Section::start('javascript');?>
    <script type="text/javascript">

    </script>
<?php Section::stop();?>
<?php echo Section::start('ContentWrapper')?>

    <!-- Content -->
<div class="content" ng-controller="VillaCtrl" id="Ctrl" ng-init="getVillaDetail('<?php echo $villa_id;?>');">

    <!-- / Page Title -->
    <div class="line"></div>
    <div class="blog single" >
        <!--Slideshow-->
        <div class="photo_gallery_cycle111" ng-init="getImages('<?php echo $villa_id;?>');"><br/>
            <div class="aligncenter ">
                <div id="links" >
                    <a href="{{base_url}}/images/destinations/{{villa.dest_cover_image}}" title="{{villa.dest_name}}" class="border">
                        <img src="{{base_url}}/images/destinations/{{villa.dest_cover_image}}" alt="{{villa.dest_name}}" style="width:930px;height:400px">
                    </a>
                    <a style="display:none" href="{{base_url}}/images/destinations/{{p.image_name}}" title="{{villa.dest_name}}" ng-repeat="p in pics">
                        <img src="{{base_url}}/images/destinations/{{p.image_name}}" alt="{{villa.dest_name}}">
                    </a>

                </div>

            </div>
        </div>
        <div class="clear"></div>
        <div class="row titlebar" >
            <h2 style="float:left;color:black;" class="zblack">
                {{villa.dest_name|uppercase}}
            </h2><br/><br/>
            <div style=" padding-right:3em;float:left;color:black; font-family:Arial, Helvetica, sans-serif; font-size:18px" class="filter-container">
                <ul class="ullist">
                    <li>
                        <label for="">Nightly Rates</label>
                        <div class=""><span><strong>INR {{villa.dest_charge|number}} /Ni</strong></span></div>
                    </li>
                    <li >
                        <a href="" ng-click="drawBookingForm();"><?php echo HTML::image('img/book_now.gif','',array('height'=>'50'));?></a>

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
            <p style="text-align: justify" ng-bind-html-unsafe="villa.dest_full_description"></p>
        </div>
        <div class="blog full" style="width:300px;float: left;">
            <div class="box-title">
                <h3  class="zblack">At a Glance</h3>
            </div>
            <div class="line nomargin"></div>
            <p style="text-align: justify">
            <ul>
                <li>Bedrooms: {{facility.fac_bedroom}}</li>
                <li>Transport: {{facility.fac_transport|uppercase}}</li>
                <li>Laundry: {{facility.fac_laundry|uppercase}}</li>
                <li>Spa: {{facility.fac_spa|uppercase}}</li>
                <li>Swimming Pool: {{facility.fac_swimminpool|uppercase}}</li>
            </ul>
            </p>



        </div>
        <div class="clear"></div>
        <div class="blog full" style="width:600px;float: left">
            <h3 style="background:#FF7533"> Ratings</h3>
            <div style="width:50%; float:left;">
                <h4 style="background:#FFB997">Company Rating:</h4><div class="rating"><span style="color:#CCC !important">&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span></div>
                <p style="color:black; font-size:14px;text-align: justify">Company Ratings are based on the government ratings of Villas/Cottages/Home Stays and by the personal inspection of Ezz Villa Retreats Team to these Villas. Note that Villas that qualify our minimum standards are enlisted in EzzVillaRetreats.com because YOUR SATISFACTION IS OUR GOAL</p>
            </div>
            <div style="width:50%; height:300px;float:right;">
                <h4 style="background:#FFB997;">Trip Advisor Ratings:</h4>
                <div ng-bind-html-unsafe="villa.dest_trip_adviser_widget">

                </div>

                <!--<h4 style="background:#FFB997;">Travellers Ratings:</h4><div class="rating"><span style="color:#CCC !important">&#9733;</span><span style="color:#CCC !important">&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span></div>
                  <p style="color:black; font-size:14px">Only those travellers who have actually stayed in the villa are given the authentication to write a review. This makes our traveller's review 100% genuiune</p>--></div><br />
        </div>
        <div class="blog full" style="width:600px;float: left" ng-init="getFacility('<?php echo $villa_id;?>');">
            <div class="box-title">
                <h3  class="zblack">Location Map</h3>
            </div>
            <div ng-bind-html-unsafe="villa.dest_map_code" style="margin-top: 20px"></div>
            <div class="line nomargin"></div>
            <p style="text-align: justify">{{villa.dest_address}}</p>

        </div>

        <div class="clear">
        </div>
        <!--/Slideshow-->
        <script src="http://ezzvillaretreats.com/js/blueimp-gallery.min.js"></script>
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
            <form>
                <table class="contact-form-table">
                    <tr>
                        <td colspan="2">All fields are required</td>
                    </tr>
                    <tr>
                        <td>Your Name</td><td><input type="text" class="text ui-widget-content ui-corner-all" name="full_name" /></td>
                    </tr>
                    <tr>
                        <td><label for="email">Your Email</label></td><td><input type="text" name="email" class="text ui-widget-content ui-corner-all"/></td>
                    </tr>
                    <tr>
                        <td><label for="mobile">Mobile no.</label></td><td><input type="text" name="mobile" class="text ui-widget-content ui-corner-all"/></td>
                    </tr>
                    <tr>
                        <td><label for="start_date">Check In</label></td><td><input type="text" id="checkin" class="text ui-widget-content ui-corner-all"/></td>
                    </tr>
                    <tr>
                        <td><label for="start_date">Check Out</label></td><td><input type="text" id="checkout" class="text ui-widget-content ui-corner-all"/></td>
                    </tr>
                    <tr>
                        <td><label for="message">Message</label></td><td><textarea name="" class="text ui-widget-content ui-corner-all" cols="30"
                                                                                   rows="4"></textarea></td>
                    </tr>
                </table>
            </form>
        </div>
        <script>
            $( "#dialog-form" ).dialog({
                autoOpen: false,
                height: 450,
                width: 400,
                modal: true

            });

            $( "#dialog-form" ).dialog(
                {
                    buttons: [ { text: "Ok", click: function()
                    {
                        $( this ).dialog( "close" );
                    }
                    } ]
                });
            $( "#checkin" ).datepicker();$( "#checkout" ).datepicker();
        </script>
        <!--Villa Booking Form END-->
    </div>
    <!--END ROW-->
<?php echo render('template.footer');?>
<?php Section::stop();?>
<?php echo render('template.main');?>