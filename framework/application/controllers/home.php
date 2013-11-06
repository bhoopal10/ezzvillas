<?php

class Home_Controller extends Base_Controller 
{
    public $restful=true;

	public function get_index()
	{

		return View::make('home.index')
            ->with('slider',Images::Get_image_by_album_name('slider'))
            ->with('posts',Posts::getposts());


	}

	public function get_about()
	{
		return View::make('home.about');
	}

	public function get_contact_us()
	{
		return View::make('home.contact_us');
	}

	public function post_SendContactForm()
	{
		$name=Input::get('name','');
		$email=Input::get('email','');
		$mobile=Input::get('mobile','');
		$text=Input::get('message','');

        $message="\nCustomer Name: ".$name;
        $message.="\nCustomer Mobile: ".$mobile;
        $message.="\nCustomer Email:". $email;
        $message.="\nMessage".$text;
        $mail=mail('bookings@ezzvillas.com','Conatct From',$message);
        if($mail)
        {
        	$status= 'Thank you for contacting us.';
        }
        else
        {
            $status= 'Unable send request at this time.Please try again later';
        }

        return Redirect::to('contact-us')->with('status',$status);
	}
}