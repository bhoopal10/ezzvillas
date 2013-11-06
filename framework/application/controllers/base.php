<?php

class Base_Controller extends Controller {

	/**
	 * Catch-all method for requests that can't be matched.
	 *
	 * @param  string    $method
	 * @param  array     $parameters
	 * @return Response
	 */
    public function __construct()
    {
        Asset::container('header')->add('style-css','css/style.css');
        Asset::container('header')->add('custom-css','css/custom.css');
        Asset::container('header')->add('preetyphoto-css','css/prettyPhoto.css');
        Asset::container('header')->add('mega-menu-css','css/jkmegamenu.css');
        Asset::container('header')->add('mega-menu-js','js/jkmegamenu.js','jquery');
        Asset::container('header')->add('jquery', 'js/jquery.js');
        Asset::container('header')->add('jquery-ui-css','css/dark-hive/jquery.custom.min.css');
        Asset::container('header')->add('jquery-ui-js','js/jquery-ui.min.js','jquery');
        Asset::container('header')->add('font-awesome','http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css');
        Asset::container('header')->add('bootstrap','http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css');


        Asset::container('header')->add('jquery-easing','js/jquery.easing.1.3.js');
        Asset::container('header')->add('jquery-cycle','js/jquery.cycle.all.min.js');
        Asset::container('header')->add('jquery-validate','js/jquery.validate.js');
        Asset::container('header')->add('preetyphoto-js','js/jquery.prettyPhoto.js');
        Asset::container('header')->add('cufon','js/cufon.js');
        Asset::container('header')->add('cuf','js/aller.cufonfonts.js');
        Asset::container('header')->add('jquery-tools-js','js/jquery.tools.min.js');
        Asset::container('header')->add('nivo-js','js/jquery.nivo.slider.pack.js');
        Asset::container('header')->add('kwick-js','js/jquery.kwicks-1.5.1.pack.js');
        Asset::container('header')->add('innerfade-js','js/jquery.innerfade.js');



        Asset::container('footer')->add('app-js','js/app.js');
        Asset::container('footer')->add('controller-js','js/controller.js');
        Asset::container('footer')->add('service-js','js/service.js');
        Asset::container('header')->add('gallery-css','css/blueimp-gallery.min.css');

    }
	public function __call($method, $parameters)
	{
		return Response::error('404');
	}

}