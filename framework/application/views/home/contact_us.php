<?php echo Section::start('ContentWrapper')?>

                <div class="breadcrumb">
                    Home->Contact Us
                </div>
                <!-- /Page navigation-->
                <!-- Content -->
                <div class="content sub">
                    <!-- Left Side -->
                    <div class="left">
                        <!-- Page Title -->
                        <h2 style="color:#006">
                            Contact Us
                        </h2>
                        <div class="line">
                        </div>
                        <!-- / Page Title -->
                        <!-- Column Left - Contact Details -->
                        <div class="box two first">
                            <p style=" font-size:14px; color:#003;">
                                At Ezz Villas, we take care of every aspect of the villla booking. We strive hard to make sure that each holiday villa rental that you book through ezzvillas.com becomes one of the most memorable moment of your life.
                            </p>
                            <ul class="lined">
                                <li style="font-size:14px; color:#003;">
                                    <strong>
                                        <span style="color:#006">Address:</span>
                                    </strong><br/>
50/1,<br/> Venkatapura, Kormangala 1st Block,<br/> Bangalore-560034                                </li>
                                <li style="font-size:16px; color:#003;">
                                    <strong><span style="color:#006">
                                        Mobile:</span></strong><br/>
                                    </strong>
                                    <strong>+91 740 6555 055 </strong><br/> or<br/> <strong>+91 740 6555 155</strong>
                                </li>
                                
                                <li style="font-size:14px; color:#003;">
                                    <strong>
                                        <span style="color:#006">E-Mail:</span>
                                    </strong><br/>
                                    care@ezzvillas.com<br/>bookings@ezzvillas.com
                                </li>
                                <li style=" font-size:14px; color:#003;">
                                <strong>
                                <span style="color:#006">Hosts:</span>
                                </strong><br/>
                                listing@ezzvillas.com
                                </li>
                            </ul>
                        </div>
                        <!-- / Column Left - Contact Details -->
                        <!-- Column Right - Google Map -->
                        <div class="box two last">
                            <p style="float:right">
                                <img src="http://ezzvillas.com/images/help.jpg" style="right:100px; position:absolute; top:1050px;" />

                                <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?q=kormangla&amp;ie=UTF8&amp;hq=&amp;hnear=Koramangala,+Bangalore,+Bangalore+Urban,+Karnataka&amp;t=m&amp;iwloc=A&amp;ll=12.931656,77.622696&amp;spn=0.036525,0.06287&amp;output=embed"></iframe><br /><small><a href="https://maps.google.co.in/maps?q=kormangla&amp;ie=UTF8&amp;hq=&amp;hnear=Koramangala,+Bangalore,+Bangalore+Urban,+Karnataka&amp;t=m&amp;iwloc=A&amp;ll=12.931656,77.622696&amp;spn=0.036525,0.06287&amp;source=embed" style="color:#0000FF;text-align:left">View Larger Map</a></small>
                            </p>
                        </div>
                        <!-- / Column Right - Google Map -->
                        <div class="clear">
                        </div>
                        <!-- contact form -->
                        <h3 style="color:#006">
                            Contact Form
                        </h3>
                        <div class="line">
                        </div>
                        <p style="color:red;">
                            <i>
                                Please fill this contact form and we shall contact you shortly. All fields are required. Thanks.
                            </i>
                        </p>
                        <div id="result">
                        </div>
                        <div id="contact_form">
                            <form action="<?php echo URL::to_route('SendContactForm');?>" id="validate_form"
                            method="post" class="showtextback">
                                <ul>
                                    <li>
                                        <input id="name_field" type="text" placeholder="Your Name." name="name" 
                                         />
                                    </li>
                                    <li>
                                        <input id="email_field" type="text" placeholder="Valid Email" name="email"
                                          />
                                    </li>
                                    <li>
                                        <input id="phone_field" type="text" placeholder="Phone Number" name="phone"
                                          />
                                    </li>
                                    
                                    <li>Type in your message below:<br/>
                                        <textarea id="message_field" name="message" rows="8" cols="40"  placeholder="Type in your message">
                                            
                                        </textarea>
                                    </li>
                                    <li><p><?php if(Session::has('status')) echo Session::get('status');?></p></li>
                                    <li>
                                        <input type="submit" class="button" value="Send" />
                                        <span class="loading">
                                        </span>
                                    </li>
                                </ul>
                            </form>
                        </div>
                        <!-- /contact form -->
                        <div class="clear">
                        </div>
                    </div>
                    <!-- / Left -->
                    <!-- Sidebar -->
                    
                    <div class="clear">
                    </div>
                                            <img src="http://ezzvillas.com/images/help.jpg" style="right:100px; position:absolute; top:1050px;" />

                </div>

        <!-- / wrapper end-->
        <?php echo render('template.footer');?>

<?php Section::stop();?>

<?php echo render('template.main');?>