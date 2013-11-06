<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
    <div class="slides"></div>
    <h3 class="title"></h3>
    <a class="prev"></a>
    <a class="next"></a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
</div>
<!-- wrapper -->
<div id="container">
    <!-- Bakcground Slider -->

    <!-- / Bakcground Slider -->
    <!-- Top Bar -->
    <div id="top_bar">
        <div class="top_content">

            <!-- Search -->
            <div class="search_bar" style="width: 150px">
                <span style="font-size:12px !important;">Call:<strong> +91 740 6555 055</strong></span>

            </div>
            <!-- / Search-->
            <!-- Top Links -->
            <ul class="top_links ">
                <li class="first">
                    <a href="<?php echo URL::to_route('home');?>" title="">Home</a>
                </li>
                <!-- <li>
                     <a href="index-2.html" title="">Career</a>
                 </li>-->
                <li>
                    <a href="<?php echo URL::to_route('about'); ?>" title="">About Us</a>
                </li>
                <li>
                    <a href="http://www.ezzvillas.com/blog" title="Our Blog">Blog</a>
                </li>
<!--                <li>-->
<!--                    <a href="#" title="Owners">Owners</a></li>-->
            </ul>
            <!-- / Top Links -->
            <!-- / flags -->
<!--            <ul class="flags">-->
<!--                <li>-->
<!--                    <a href="#" title="India" class="j_ttip">--><?php //echo HTML::image('img/in.png','',array('height'=>'12','width'=>'18'));?><!--</a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="#" title="English" class="j_ttip">--><?php //echo HTML::image('img/en.png','',array('height'=>'12','width'=>'18'));?><!--</a>-->
<!--                </li>-->
<!---->
<!--            </ul>-->
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
                <a href="<?php echo URL::to_route('home');?>" title=""><?php echo HTML::image('img/logo.jpg','',array('class'=>'png'));?></a>
            </div>
            <!-- /logo -->
            <!-- header slogan -->
            <div  class="top_search">
            <form action="<?php echo URL::to_route('SearchVilla'); ?>" method="get" class="form-horizontal">
            <input style="margin-top: 30px" type="search" name="search" id="search" placeholder="Search Villa or Cities" onsubmit=""/>
            </form>
            <div style="position:relative; text-align:right;">
            <!-- Twitter Integration Begin-->
            <a href="https://twitter.com/ezzvillas" class="twitter-follow-button" data-show-count="false" data-lang="en">Follow @ezzvillas</a>
            <!-- End of Twitter Integration-->
<!-- Facebook Integration Begin-->
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    <div class="fb-like" data-href="https://facebook.com/ezzvillas" data-width="100" data-height="The pixel height of the plugin" data-colorscheme="light" data-layout="button_count" data-action="like" data-show-faces="true" data-send="false"></div>
    <!-- End of Facebook Integration -->
    
    <!-- Google plus -->
    <!-- Place this tag where you want the +1 button to render. -->
<div class="g-plusone" data-annotation="none" data-href="https://plus.google.com/102001816058381019417"></div>

<!-- Place this tag after the last +1 button tag. -->
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
<!-- End of Google Plus-->

</div>
                
            </div>
            <!-- /header slogan -->
            <div class="clear">
            </div>
        </div>
        <!-- / Header -->