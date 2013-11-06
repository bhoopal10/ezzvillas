<?php
if ( ! isset( $content_width ) )
	$content_width = 530;
global $papyrus_option;

$papyrus_themename = "papyrus_wdl";
$papyrus_shortname = "papyrus_wdl";
$papyrus_textdomain = "papyrus_wdl";

$papyrus_option['url']['includes_path'] = 'includes';
$papyrus_option['url']['themeoptions_path'] = $papyrus_option['url']['includes_path'].'/theme-options';
$papyrus_option['url']['themeoptions_url'] = get_template_directory_uri().'/'.$papyrus_option['url']['themeoptions_path'];

// Functions
require_once($papyrus_option['url']['includes_path'].'/fn-core.php');
require_once($papyrus_option['url']['includes_path'].'/fn-custom.php');

/* Theme Init */
require_once($papyrus_option['url']['includes_path'].'/theme-init.php');

/* Admin */
require_once($papyrus_option['url']['themeoptions_path'].'/fn-admin.php');
require_once($papyrus_option['url']['themeoptions_path'].'/am-main.php');

?>