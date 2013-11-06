<?php

class Admin_Home_Controller extends Admin_Base_Controller
{
    public $restful=true;

	public function get_index()
	{
		return View::make('admin::template.main');
//        $a=new AjaxUploader();
//        $a->put();
	}

    public function post_UploadProjectImage()
    {
        echo 'iec';
    }

    public function get_a_b()
    {
        echo 'a-b';
    }

}


 ?>