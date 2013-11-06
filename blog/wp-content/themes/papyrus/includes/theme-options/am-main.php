<?php

$pageinfo = array('full_name' => __("Papyrus Options",'papyrus_wdl'), 'optionname'=>'main', 'child'=>false, 'filename' => basename(__FILE__));

$options = array (
	
	
	array(	"type" => "sliderouteropen"),
	
			array(	"name" => __("General Settings",'papyrus_wdl'),
			"type" => "sliderpanelopen"),
			
										
					array(	"name" => __("How many posts in Featured posts Slider?",'papyrus_wdl'),
							"desc" => __("Enter a number.",'papyrus_wdl'),
							"id" => "number_posts",
							"std" => "5",
							"type" => "newtexttwo"),
							
					array(	"name" => __("How many 125x125 Ads in sidebar?",'papyrus_wdl'),
							"desc" => __("Enter a number.",'papyrus_wdl'),
							"id" => "number_125_ads",
							"std" => "4",
							"type" => "newtexttwo"),
			
			array(	"type" => "sliderpanelclose"),
			
			array(	"name" => __("Social Settings",'papyrus_wdl'),
			"type" => "sliderpanelopen"),
			
					array(	"name" => __("Twitter ID",'papyrus_wdl'),
							"desc" => __("Enter your Twitter Id.",'papyrus_wdl'),
							"id" => "twitter_id",
							"std" => "",
							"type" => "newtexttwo"),
								
					array(	"name" => __("Reddit Url",'papyrus_wdl'),
							"desc" => __("Enter your Reddit url.",'papyrus_wdl'),
							"id" => "reddit_id",
							"std" => "",
							"type" => "newtexttwo"),
										
					array(	"name" => __("Technorati Url",'papyrus_wdl'),
							"desc" => __("Enter your Technorati url.",'papyrus_wdl'),
							"id" => "technorati_id",
							"std" => "",
							"type" => "newtexttwo"),
										
					array(	"name" => __("Facebook Url",'papyrus_wdl'),
							"desc" => __("Enter your Facebook url.",'papyrus_wdl'),
							"id" => "facebook_id",
							"std" => "",
							"type" => "newtexttwo"),
										
					array(	"name" => __("Stumbleupon Url",'papyrus_wdl'),
							"desc" => __("Enter your Stumbleupon url.",'papyrus_wdl'),
							"id" => "stumbleupon_id",
							"std" => "",
							"type" => "newtexttwo"),
										
					array(	"name" => __("Digg Url",'papyrus_wdl'),
							"desc" => __("Enter your Digg url.",'papyrus_wdl'),
							"id" => "digg_id",
							"std" => "",
							"type" => "newtexttwo"),
			
			array(	"type" => "sliderpanelclose"),
			
			array(	"name" => __("Ad Settings",'papyrus_wdl'),
			"type" => "sliderpanelopen"),
			
						array(	"name" => __("468x60 Ad below post title in home/category pages.",'papyrus_wdl'),
								"desc" => __("Enter Ad Code.",'papyrus_wdl'),
								"id" => "ads_archives_468",
								"std" => '',
								"type" => "newtextarea"),
											
						array(	"name" => __("468x60 Ad below post in Single page",'papyrus_wdl'),
								"desc" => __("Enter Ad Code.",'papyrus_wdl'),
								"id" => "ads_single_468",
								"std" => '',
								"type" => "newtextarea"),
											
						array(	"name" => __("300x250 Ad above post in Single page.",'papyrus_wdl'),
								"desc" => __("Enter Ad Code.",'papyrus_wdl'),
								"id" => "ads_single_300",
								"std" => '',
								"type" => "newtextarea"),
											
			
			array(	"type" => "sliderpanelclose"),
			
			array(	"name" => __("125x125 Ad Settings",'papyrus_wdl'),
			"type" => "sliderpanelopen"),
			
					array(		"std" => '',
								"type" => "ads125"),
			
			array(	"type" => "sliderpanelclose"),						
	
	array(	"type" => "sliderouterclose"),

	
);

$options_page = new papyrus_option_pages($options, $pageinfo);

?>