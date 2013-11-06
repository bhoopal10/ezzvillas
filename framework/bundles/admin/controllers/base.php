<?php

class Admin_Base_Controller extends Controller {

	/**
	 * Catch-all method for requests that can't be matched.
	 *
	 * @param  string    $method
	 * @param  array     $parameters
	 * @return Response
	 */

	public function __construct()
	{

        Asset::container('header')->bundle('admin');
        Asset::container('header')->add('bootstrap','http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css');
        Asset::container('header')->add('bootstrap-res', 'css/bootstrap-responsive.min.css');
//        Asset::container('header')->add('jquery', 'js/jquery.js');
/*        Asset::container('header')->add('site-js', 'js/jansy.min.js');*/
        Asset::container('header')->add('site-css','css/style.css');
        Asset::container('header')->add('jbootstrapjs', 'js/bootstrap.min.js','jquery');
        Asset::container('header')->add('jquery','js/jquery.min.js');

         Asset::container('header')->add('angular-js','https://ajax.googleapis.com/ajax/libs/angularjs/1.0.5/angular.min.js');
//        Asset::container('header')->add('angular-js','js/angular.js');
        Asset::container('header')->add('font-awesome','http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css');
//        Asset::container('header')->add('Google-css','http://fonts.googleapis.com/css?family=Open+Sans:400,300');
        Asset::container('header')->add('Ace-css','css/ace.min.css');
        Asset::container('header')->add('Ace-Res','css/ace-responsive.min.css');
        Asset::container('header')->add('ace-skin-css','css/ace-skins.min.css');
        Asset::container('footer')->bundle('admin');

        Asset::container('footer')->add('jquery-ui','js/jquery-ui-1.10.3.custom.min.js');
        Asset::container('footer')->add('ace-elements-js','js/ace-elements.min.js');
        Asset::container('footer')->add('jquery-ui-ounch','js/jquery.ui.touch-punch.min.js');
        Asset::container('footer')->add('ace-js1','js/ace.min.js');
        Asset::container('footer')->add('app-js','js/app.js','angular-js');
        Asset::container('footer')->add('controller-js','js/controller.js','service-js');
        Asset::container('footer')->add('service-js','js/service.js','app-js');


        parent::__construct();
    }
	public function __call($method, $parameters)
	{
		return Response::error('404');
	}
	
	

}