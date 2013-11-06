<!doctype html>
<html lang="en" ng-app="EzzVilla">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Ezz Villa  is one stop destination for all you vacation needs. Look for Vacation Villas & Homestays, Houseboats, Best Resorts, Goa Villas" />
<meta name="keywords" content="Vacation Villas & Homestays, Houseboats, Desert Tents, Tree Houses, Villas in Goa, Luxury Resorts, Honeymoon, Coorg, , Alleppey,  Kumarakom, Jaipur, Wayanad, Munnar, Ooty, Kodaikanal, Jodhpur, Udaipur, Jaisalmer, Kullu, Manali, Shimla, Mussorie, Nainital, Ranikhet, Almora" />
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link rel="icon" href="images/favicon.ico" type="image/x-icon">
<title>EzzVillas.com-Vacation Villas & Homestays, Houseboats, Best Resorts, Goa Villas</title>

    <?php
    echo Asset::container('header')->styles();

    echo Asset::container('header')->scripts();

    ?>
<?php echo Section::yield('javascript'); ?>
    <script type="text/javascript">

        //jkmegamenu.definemenu("anchorid", "menuid", "mouseover|click")
        jkmegamenu.definemenu("megaanchor", "megamenu1", "mouseover");
        jkmegamenu.definemenu("vacation", "megamenu2", "mouseover");
    </script>
    <script>
        $(function(){
            var names;
            $.ajax({

                url: '<?php echo URL::to_route('VillaName');?>',
                dataType: 'json'
            }).success(function(data){
                    names=data;
            }).done(function(){
                    $("#search").autocomplete({
                        source: names,
                        minLength: 1
            }).error(function(msg){
             alert("Search is not available currently, Please try again later.")
                        });

                });

            });
    </script>
    <!--Start of Zopim Live Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){
z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
$.src='//v2.zopim.com/?1cJyltMUFVIAFps5sDCJVNPqsrtV2QRI';z.t=+new Date;$.
type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
</script>
<!--End of Zopim Live Chat Script-->
</head>


<body>
<div class="a">
    <div class="b">
        <p style="color:red"></p>
    </div>
</div>

<?php echo render('template.header');
      echo render('template.menu');
?>

<?php echo Section::yield('ContentWrapper');?>

<?php echo Asset::container('footer')->scripts();?>

</body>
</html>
