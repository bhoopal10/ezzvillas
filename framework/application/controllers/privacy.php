<?php
/**
 * Created by JetBrains PhpStorm.
 * User: root
 * Date: 21/10/13
 * Time: 12:37 PM
 * To change this template use File | Settings | File Templates.
 */

class Privacy_Controller extends Base_Controller{
    public $restful=true;
    public function get_privacy()
    {
        return View::make('privacy_policy.privacy');
    }
    public function get_termsAndCondition()
    {
        return View::make('privacy_policy.terms_and_condition');
    }

}