<?php
class Destination_Controller extends Base_Controller
{
    public $restful=true;

    public function get_city($city)
    {
        $des=Destinations::get_villas($city);
        if(!$des)
        {
            echo 'No villas found';
        }
        if($des)
        {
        return View::make('destination.city')
            ->with('bedroom',Destinations::view_bedroom())
            ->with('destinations',$des)
            ->with('city',$city)
            ->with('locations',Locations::cities(false));
        }

        
        
    }

    public function get_villa($id)
    {
        $villa_images=array();
        $cover_image=array();
        $album_id=Destinations::villa_album_id_by_villa_id($id);

        $villa=Destinations::villaDetail($id);
       /*Check if villa exist or not*/
        if($villa)
        {
            $villa_album=Images::getphoto($album_id);
        }
        if(!empty($villa_album) && is_array($villa_album))
        {
            foreach($villa_album as $key)
            {
                $data=array('image_id' => $key->image_id,
                    'image_album_id' => $key->image_album_id,
                    'image_description' =>$key->image_description,
                    'image_name' => $key->image_name,
                    'image_title' => $key->image_title,
                    'image_filename' =>$key->image_filename
                );
                array_push($villa_images,$data);
            }
            /*Setting cover image*/
            $cover_image=$villa_images[1];
        }
        if(empty($villa_album))
        {
            $data=array('image_id' => 2,
                'image_album_id' => 1,
                'image_description' => 'yuy',
                'image_name' => 'gu',
                'image_title' => 'uy',
                'image_filename' => 'HiRaDDl.jpg');
            array_push($villa_images,$data);
            $cover_image=$villa_images;
        }

     if($villa)
     {
        return View::make('destination.villa_detail')
                ->with('images',$villa_images)
                ->with('cover_image',$cover_image)
                ->with('villa',$villa);

     }
     else
     {
        return Response::error('404');
     }

    }

    public function get_state($state)
    {
        return View::make('destination.state')
                ->with('name',$state);
    }

    public function get_getVillas($city)
    {

        $res=Destinations::get_villas($city,true);
        return $res;
    }

    public function post_getImages()
    {
       $input=Input::json();
       $dest_id=$input->dest_id;
       $res=Images::ofVilla($dest_id,true);
       return $res;
    }

    public function post_villa_images()
    {
        $id=Input::get('villa_id');
        $album=Destinations::villa_album_id_by_villa_id($id);
        $images=Images::getByID_album($album);
    }
    public function post_getCoverImage()
    {
        $input=Input::json();
        $villa_id=$input->villa_id;

        $res=libvilla::villa_cover_image_by_id($villa_id);
        return $res->image_filename;
    }

    public function post_getFacility()
    {
        $input=Input::json();
        $dest_id=$input->dest_id;
        $res=Destinations::get_facility($dest_id,true);
        return $res;
    }

    public function post_getVillaDetail()
    {
        $input=Input::json();
        $villa_id=$input->villa_id;
        $res=Destinations::villaDetail($villa_id,true);
        return $res;
    }

    public function post_villas_with_filter()
    {
        $input=Input::json();


        $filter=array(
            'price'=>array('min_price'=>$input->min_price,'max_price'=>$input->max_price)
        );


        $res=Destinations::villas_with_filter($input->city,$filter,true);
        return $res;
    }

    public function post_sendBookingForm()
    {
        $cust_name=Input::get('full_name','');
        $cust_mobile=Input::get('mobile','');
        $cust_email=Input::get('email','');
        $cust_checkin=Input::get('checkin','');
        $cust_checkout=Input::get('checkout','');
        $villa_name=Input::get('villa_name','');
        $no_of_guest=Input::get('no_of_guest','');
        $no_of_child=Input::get('no_of_child');
        $text=Input::get('message','');


        /*Send mail to admin about villa booking*/
        $message="Villa Name: ".$villa_name;
        $message.="\nCustomer Name: ".$cust_name;
        $message.="\nCustomer Mobile: ".$cust_mobile;
        $message.="\nCustomer Email:". $cust_email;
        $message.="\nNo. of Guest:".$no_of_guest;
        $message.="\nNo. of Child:".$no_of_child;
        $message.="\nCheckin:".$cust_checkin;
        $message.="\nCheckout:".$cust_checkout;
        $message.="\nSpecial Reuest:".$text;
        $mail=mail('bookings@ezzvillas.com','Booking',$message);
        if($mail)
        {
            
            return 'We will revert back to you within 2 hours confirming the availability with the Holiday Villa / Home Stay / Resort Management.   We advise sending requests to 3 or 4 more rentals that interest you most. As soon as you receive a positive answer, you should book immediately; waiting for other replies increases the chances that available rentals will be booked by someone else as the number of Holiday Villas and  Home Stays in the location are limited and are high in demand.';


        }
        else
        {
            return 'Unable send request at this time.Please try again later';
        }

    }

    public function get_villa_cover_image($villa_id)
    {
        $images=Images::Get_image_by_album_id($villa_id);

        $cover_image=$images[0];
        return $cover_image;
    }
    public function get_villaName()
    {
        $all= array();
        $res=Destinations::GetVillaName($json=false);
        foreach($res as $value)
        {
            array_push($all,$value->dest_name);
         }
        $location_name=Locations::onlyCities($json=false);
        foreach($location_name as $value)
        {
            array_push($all,$value->loc_name);
        }
//        array_push($all,$location_name);
        return json_encode($all);
    }


}