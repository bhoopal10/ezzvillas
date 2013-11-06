
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 
   

<?php
$variable = $_GET['pid'];

?>

                        
<?php
//***************************************************************************************************************************
mysql_connect('','ezzholidays','');
mysql_select_db('ezzholidays');
$idz=$variable;
$sqluname="select * from dest where id ='$idz'  ";
$rcode=mysql_query($sqluname) or die('oooooooooooorcodepzzz');
 $rows1=mysql_fetch_array($rcode);
 print $rows1['id'];
 
 
 //***************************************************************************************************************************
?>
 
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>
            EzzHolidays
        </title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/backgrounds/abstract-1.css" />
        <link rel="stylesheet" type="text/css" href="css/prettyPhoto.css" media="screen"
        />
        <link rel="stylesheet" type="text/css" href="css/jkmegamenu.css" />
        		<link rel="stylesheet" type="text/css" href="css/datepickr.css" />

        <script type='text/javascript' src='js/jquery-1.4.4.min.js'>
        </script>
        <script type='text/javascript' src='js/jquery.easing.1.3.js'>
        </script>
        <script type='text/javascript' src='js/jquery.cycle.all.min.js'>
        </script>
        <script type='text/javascript' src='js/jquery.validate.js'>
        </script>
        <script type="text/javascript" src="js/jquery.form.js">
        </script>
        <script type='text/javascript' src='js/jquery.prettyPhoto.js'>
        </script>
        <script type='text/javascript' src='js/cufon.js'>
        </script>
        <script type='text/javascript' src='js/aller.cufonfonts.js'>
        </script>
        <script type='text/javascript' src='js/jflickrfeed.min.js'>
        </script>
        <script type='text/javascript' src='js/jquery.tweet.js'>
        </script>
        <script type='text/javascript' src='js/jquery.tools.min.js'>
        </script>
        <script type='text/javascript' src='js/jquery.nivo.slider.pack.js'>
        </script>
        <script type='text/javascript' src='js/jquery.kwicks-1.5.1.pack.js'>
        </script>
        <script type='text/javascript' src='js/script.js'>
        </script>
        <script type='text/javascript' src='js/jquery.innerfade.js'>
        </script>
		<script type="text/javascript" src="js/datepickr.min.js">
		</script>
        <!--[if IE]>
            <link rel="stylesheet" type="text/css" href="css/ie-fix.css" />
        <![endif]-->
        <script type="text/javascript" src="js/jkmegamenu.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>




<script type="text/javascript">

//jkmegamenu.definemenu("anchorid", "menuid", "mouseover|click")
jkmegamenu.definemenu("megaanchor", "megamenu1", "mouseover")

</script>
         
    </head>
    
    <body>
         
        <!-- wrapper -->
        <div id="container">
            <!-- 100% Bakcground Image -->
            <div class="background_holder">
               <img src="images/black.jpg" alt="" height="3000" />
                
                            </div>
            <!-- / 100% Bakcground Image -->
            <!-- Top Bar -->
            <div id="top_bar">
                <div class="top_content">
                    <!-- Search -->
                    <div class="search_bar">
                        call:3453535353
                    </div>
                    <!-- / Search-->
                    <!-- Top Links -->
                    <ul class="top_links ">
                        <li class="first">
                            <a href="#" title="">Home</a>
                        </li>
                        <li>
                            <a href="#" title="">Our Team</a>
                        </li>
                        <li>
                            <a href="#" title="">Blog</a>
                        </li>
                    </ul>
                    <!-- / Top Links -->
                    <!-- / flags -->
                    <ul class="flags">
                        <li>
                            <a href="#" title="India" class="j_ttip"><img src="images/assets/flags/in.png" height="12" alt="in" width="18" /></a>
                        </li>
                        <li>
                            <a href="#" title="England" class="j_ttip"><img src="images/assets/flags/en.png" height="12" alt="en" width="18" /></a>
                        </li>
                    </ul>
                    <!-- / flags -->
                </div>
            </div>
            <!-- / Top Bar -->
            <!-- wrapper 2 -->
            <div id="wrapper">
                <!-- Header -->
                <div id="header">
                    <!-- logo -->
                    <div id="logo">
                        <a href="index.html" title="Ezzholidays"><img src="images/logo.jpg" alt="EzzHolidays" class="png" /></a>
                    </div>
                    <!-- /logo -->
                    <!-- header slogan -->
                    <div class="top_search">
                        
                    </div>
                    <!-- /header slogan -->
                    <div class="clear">
                    </div>
                </div>
                <!-- / Header -->
                <!-- Navigation -->
                <div id="navigation">
                 <!--Mega Menu Anchor-->
                 <ul>
<li><a href="#" id="megaanchor">Destinations</a><span>Our Villas and home stays</span></li>



<!--Mega Drop Down Menu HTML. Retain given CSS classes-->
<div id="megamenu1" class="megamenu">
<div class="column">
	<h3><a href="kerala.html">Kerala</a></h3>
	<ul>
	<li><a href="wayned.php">Waynad</a></li>
	<li><a href="alleppey.php">Alleppey</a></li>
	<li><a href="#">Munnar</a></li>
	<li><a href="#">Kumarakom</a></li>
	<li><a href="#">Kochi</a></li>
    <li><a href="#">Wagamon</a></li>
    <li><a href="#">Kovalam</a></li>
    <li><a href="#">Silent Valley</a></li><br/><br/>
    
	</ul>
</div>
<br/>

<div class="column">
	<h3><a href="karnataka.html">Karnataka</a></h3>
	<ul>
	<li><a href="#">Coorg</a></li>
	<li><a href="#">Chikmanglur</a></li>
	<li><a href="#">Shimoga</a></li>
	</ul>
</div>

<div class="column">
	<h3><a href="rajasthan.html">Rajasthan</a></h3>
	<ul>
	<li><a href="#">Jaipur</a></li>
	<li><a href="#">Jaisalmer</a></li>
	<li><a href="#">Udaipur</a></li>
	<li><a href="#">Jodhpur</a></li>
	</ul>
</div>

<br style="clear: left" /> <!--Break after 3rd column. Move this if desired-->

<div class="column">
	<h3><a href="jnk.html">Jammu &amp; Kashmir</a></h3>
	<ul>
	<li><a href="#">Kashmir</a></li>
	<li><a href="#">Srinagar</a></li>
	<li><a href="#">Leh</a></li>
	<li><a href="#">Gulmarg</a></li>
	</ul>
</div>

<div class="column">
	<h3><a href="himachal.html">Himachal Pradesh</a></h3>
	<ul>
	<li><a href="#">Shimla</a></li>
	<li><a href="#">Kullu</a></li>
	<li><a href="#">Manali</a></li>
	<li><a href="#">Kasauli</a></li>
	</ul>
</div>

<div class="column">
	<h3><a href="tamilnadu.html">Tamil Nadu</a></h3>
	<ul>
	<li><a href="#">Ooty</a></li>
	<li><a href="#">Kodaikanal</a></li>
	<li><a href="#">Cuddalore</a></li>
	</ul>
</div>
<br style="clear: left" />
<div class="column">
<h3><a href="#">Arunachal Pradesh</a></h3>
</div>
<div class="column">
<h3><a href="#">Pondicherry</a></h3>
</div>
<div class="column">
<h3><a href="#">Uttaranchal</a></h3>
</div>
</div>  
<li><a href="#"> Vacation Ideas</a><span>Ezz Ways of Holidays</span></li>
<li><a href="#">Hot Deals</a><span>Best Vacation Offers</span></li>
<li><a href="#">About Us</a><span>Why Ezz Villas Rentals</span></li>
<li><a href="#">Contact Us</a></li>

</ul>
                </div> 
                <!-- / Navigation -->
                <!-- / Navigation -->
                <!-- Page navigation-->
               
                <!-- /Page navigation-->
                <!-- Content -->
                <div class="content sub">
                    <!-- Left Side -->
                    <div class="left">
                        <!-- blog box-->
                        <div class="blog single">
                            <!-- blog image-->
                            <div class="photo_gallery_cycle">
                            <div class="aligncenter">
                                <div class="border">
                                <ul>
                                    <li><a href="<? print $rows1['pic2']; ?>" rel="prettyPhoto[photo_gal2]" title="AquaBliss Villa front view"
                                    class="imgeffect plus"><img src="<? print $rows1['pic2']; ?>" alt=""  width="936" /></a></li>
                                    
                                    <li><a href="<? print $rows1['pic3']; ?>" rel="prettyPhoto[photo_gal2]" title="AquaBliss Villa is the best"
                                    class="imgeffect plus"><img src="<? print $rows1['pic3']; ?>" alt=""  width="936" /></a></li>
                                    
                                    <li><a href="<? print $rows1['pool']; ?>" rel="prettyPhoto[photo_gal2]" title="AquaBliss Villa"
                                    class="imgeffect plus"><img src="<? print $rows1['pool']; ?>" alt=""  width="936" /></a></li>
                                
                                </ul>
                               </div>
                               </div>
                               </div>
                               
                            <!-- / blog image -->
                            <div class="clear">
                            </div>
                            <div class="box blog_full first">
                                <!-- blog headline-->
                                <h3>
                                    <a href="#" title="AquaBliss Villa"> <? print $rows1['name']; ?>
</a>

                                  </h3>
                                <!-- / blog headline-->
                                <div class="line nomargin">
                                </div>
                                <!-- date and cathegory bar -->
                                <div class="dateandcategories nomargin">
<? print $rows1['subcateg']; ?>                                    <b>
                                        Kerela
                                    </b>
                                    
                                </div>
                                <!-- / date and cathegory bar -->
                                <div class="line nomargin">
                                </div>
                            </div>
                            <div class="clear">
                            </div>
                            <!-- blog text-->
                            
                            
                            <? print $rows1['details']; ?>
                            
                            
                            
                            
                            
                            <!-- /blog text-->
                        </div>
                        <!-- blog box-->
                        <div class="clear">
                        </div>
                        
                        <!-- about the author -->
                        
                        <!-- / about the author -->
                        <!-- top link-->
                        <div class="line">
                            <span class="top">
                                [top]
                            </span>
                        </div>
                        <!-- / top link-->
                        <!-- COMMENTARY -->
                        
                        <div class="clear">
                        </div>
                        <br />
                    </div>
                    
                    
                    <!-- / Left -->
                    <!-- Sidebar -->
                   
                    <!-- / Sidebar -->
                    
                    <div class="clear">
                    </div>
                    
                </div>
                <!-- / Content -->
            </div>
            <!-- / wrapper 2 end-->
        </div>
        <!-- / wrapper end-->
        <!-- Footer -->
         <div id="footer">
            <div class="bottom_corners">
            </div>
            <!-- banner bar with button -->
            
            <!-- / banner bar with button -->
            <!-- First Row -->
            <div class="row footer">
                <!-- box -->
                <div class="box four first">
                    <!-- Latest News -->
                    <h5>
                        <a href="#">Featured Villas</a>
                    </h5>
                    <ul class="footer_list">
                        <li>
                            <a href="#" title="">Villas in Goa</a>
                        </li>
                        <li>
                            <a href="#" title="">Villas in Ooty </a>
                        </li>
                        <li>
                            <a href="#" title="">Villas in Allepy</a>
                        </li>
                        <li>
                            <a href="#" title="">Villas in Koorg</a>
                        </li>
                        <li>
                            <a href="#" title="">Villas in Kochi</a>
                        </li>
                        <li>
                            <a href="#" title="">Villas in Kodaikanal </a>
                        </li>
                    </ul>
                </div>
                <!-- /box -->
                <!-- box -->
                <div class="box four">
                    <!-- Links -->
                    <h5>
                        <a href="#">Try our Theme Villas</a>
                    </h5>
                    <ul class="footer_list">
                        <li>
                            <a href="#" title="">Honeymoon</a>
                        </li>
                        <li>
                            <a href="#" title="">Family Outings </a>
                        </li>
                        <li>
                            <a href="#" title="">Wildlife Adventure</a>
                        </li>
                        <li>
                            <a href="#" title="">Luxury at its best</a>
                        </li>
                        <li>
                            <a href="#" title="">Some Exotic Theme</a>
                        </li>
                       
                    </ul>
                </div>
                <!-- /box -->
                <!-- box -->
                <div class="box four">
                    <!-- box title-->
                    <h5>
                        <a href="about_us.html">Some more content can go here</a>
                    </h5>
                    <!-- text-->
                    <p>
                       --------
                    </p>
                </div>
                <!-- /box -->
                <!-- box -->
                <div class="box four last">
                    <!-- box title-->
                    <h5>
                        <a href="portfolio.html">Even More COntent</a>
                    </h5>
                    <div id="result_footer">
                    </div>
                    --------------------------------
                        <!--/ form -->
                    </div>
                </div>
                <!-- /box -->
                <div class="clear">
                </div>
            </div>
            <!-- / First Row -->
            <!-- Second Row -->
            <div class="second_footer">
                <div class="row sfooter">
                    Copyright © 2013 Ezzholidays.com
                    <!-- footer menu -->
                   
                    <!-- / footer menu -->
                    <!-- social media icons -->
                    <div class="social_media_icons">
                        <a href="#" class="j_ttip" title="folllow us on twitter"><img src="images/social_media/twitter_16.png" alt="" /></a>
                        <a href="#" class="j_ttip" title="folllow us on facebook"><img src="images/social_media/facebook_16.png" alt="" /></a>
                        <a href="#" class="j_ttip" title="subscribe to our rss feeds"><img src="images/social_media/rss_16.png" alt="" /></a>
                    </div>
                    <!-- / social media icons -->
                </div>
            </div>
            <!-- / Second Row -->
        </div>
        <!-- / Footer -->
    </body>
 

</html>