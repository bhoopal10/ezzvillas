<?php
class Admin_Project_Controller extends Admin_Base_Controller
{
    public $restful=true;

    public function get_add_villa()
    {
        return View::make('admin::villa.add_villa')
            ->with('status','')
            ->with('locations',Locations::cities(false))
            ->with('category',Vacations::getsubcategory())
            ->with('album',Images::get_album());
    }

    public function get_home()
    {
        return View::make('admin::villa.list_villa')
            ->with('villa',Destinations::ListVilla());
    }
    public function get_edit_villa($id)
    {
        return View::make('admin::villa.edit_villa')
            ->with('locations',Locations::cities(false))
            ->with('category',Vacations::getsubcategory())
            ->with('villa',Destinations::get_all_villa_ByID($id));
    }
    public function get_villaAlbum()
    {
        return View::make('admin::villa.villa_album')
            ->with('villa',Destinations::GetVilla());
    }
    public function post_viewVillaAlbum()
    {
        $album_id=Input::get('villa_album');
        echo $album_id;exit;
        return View::make('admin::villa.villa_album')
            ->with('villa',Destinations::GetVilla())
            ->with('image',Images::Get_image_by_album_id($album_id));
    }


    public function post_save_villa()
    {
        $error=array();
        $dest_data=array();
        $i=0;

//            /*Getting random image for Cover Image*/
//            if(count($names)>=2)
//            {
//                $index= array_rand($files['name']);
//                $cover_image=date("Ymd").'_'.$files['name'][$index];
//                $dest_data=array_merge($dest_data,array('dest_cover_image'=>$cover_image));
//            }

        $dest_data=array(
            'dest_name'             =>Input::get('name',''),
            'dest_location'         =>Input::get('location_id',''),
            'dest_charge'           =>Input::get('charge',''),
            'dest_category'         =>Input::get('type',''),
            'dest_description'      =>Input::get('description',''),
            'dest_cust_rating'      =>Input::get('cust_rate',''),
            'dest_trav_rating'      =>Input::get('traveller_rating',''),
            'dest_full_description' =>Input::get('full_description',''),
            'dest_trip_adviser_widget'=>Input::get('trip_adviser_widget',''),
            'dest_map_code'         =>Input::get('dest_map_code',''),
            'dest_address'          =>Input::get('address',''),
            'dest_type'             =>'villa',
            'dest_album_id'      =>Input::get('image',''),
            'dest_at_glance'        =>Input::get('at_a_glance','')

        );

//            /*Merge Destination and Images*/
//            $dest_data=array_merge($dest_data,$dest_data1);

        /*Insert Destination data to database and get id of destination*/
        $des_id=Destinations::add($dest_data);

//            if(count($names)>=2)
//            {
//                while($i <= count($files['name'])-1)
//                {
//                    $image_name=date("Ymd").'_'.$files['name'][$i];
//                    $thumb=PHPImageWorkshop\ImageWorkshop::initFromPath($tmps[$i]);
//                    $thumb->resizeInPixel(250,250, false);
//
//                    $orignal=PHPImageWorkshop\ImageWorkshop::initFromPath($tmps[$i]);
//                    $orignal->resizeInPixel(700,420, false);
//
//                    $thumb->save(Config::get('admin::admin_config.image_thumb_path').'/', $image_name,'false', '', '100');
//                    $orignal->save(Config::get('admin::admin_config.image_path').'/', $image_name,'false', '', '100');
//                    $i++;
//
//                    /*Insert image to database*/
//                    $pic=array
//                    (
//                        'image_dest_id'       =>$des_id,
//                        'image_name'    =>$image_name,
//                        'image_title'   =>''
//                    );
//                    $im=Images::add($pic);
//                }
//            }

        if(!$des_id) array_push($error,'Unable to add Villa');

        $fac_data=array(
            'fac_dest_id'        =>$des_id,
            'fac_bedroom'       =>Input::get('bedroom',''),
//                'fac_sleeps'        =>$input->sleeps,
            'fac_transport'     =>Input::get('transport'),
            'fac_laundry'       =>Input::get('laundry',''),
            'fac_spa'          =>Input::get('spa',''),
            'fac_swimmingpool'  =>Input::get('swimmingpool','')

        );

        /*Inserting villa facilities to facility table*/
        $res=Destinations::add_facility($fac_data);
        $i=0;
        $cat_id=Input::get('category');

        while($i<=count($cat_id)-1)
        {
            $cat_data=array(
                'vc_villa_id'   =>$des_id,
                'vc_category_id'=>$cat_id[$i]
            );
            Vacations::add_villa_category($cat_data);
            $i++;
        }

        if(!$res) array_push($error,'Unable to add Villa Facilities');
        if($res && $des_id) array_push($error,'Villa has been added successfully');
        return Redirect::to_route('VillaAdd')
            ->with('status',$error);


    }
    public function post_update_villa($id)
    {
        $error=array();
        $files = Input::file('image');
        $names=$files['name'];
        $tmps=$files['tmp_name'];
        $pic=array();
        $i=0;

        /*Getting random image for Cover Image*/
        $index= array_rand($files['name']);
        $cover_image=date("Ymd").'_'.$files['name'][$index];
        $dest_data=array(
            'dest_name'             =>Input::get('name',''),
            'dest_location'         =>Input::get('location_id',''),
            'dest_charge'           =>Input::get('charge',''),
            'dest_category'         =>Input::get('category',''),
            'dest_description'      =>Input::get('description',''),
            'dest_cust_rating'      =>Input::get('cust_rate',''),
            'dest_trav_rating'      =>Input::get('traveller_rating',''),
            'dest_full_description' =>Input::get('full_description',''),
            'dest_trip_adviser_widget'=>Input::get('trip_adviser_widget',''),
            'dest_map_code'         =>Input::get('dest_map_code',''),
            'dest_address'          =>Input::get('address',''),
            'dest_type'             =>'villa'
        );

        $des_id=Destinations::update($id,$dest_data);
        if(count($names)>=2)
        {
            while($i <= count($files['name'])-1)
            {
                $image_name=date("Ymd").'_'.$files['name'][$i];
                $thumb=PHPImageWorkshop\ImageWorkshop::initFromPath($tmps[$i]);
                $thumb->resizeInPixel(250,250, false);

                $orignal=PHPImageWorkshop\ImageWorkshop::initFromPath($tmps[$i]);
                $orignal->resizeInPixel(700,420, false);

                $thumb->save(Config::get('admin::admin_config.image_thumb_path').'/', $image_name,'false', '', '100');
                $orignal->save(Config::get('admin::admin_config.image_path').'/', $image_name,'false', '', '100');
                $i++;

                /*Insert image to database*/
                $pic=array
                (
                    //  'image_dest_id'       =>$des_id,
                    'image_name'    =>$image_name,
                    'image_title'   =>''
                );
                $im=Images::update($id,$pic);
            }


            $image_update=array(
                'dest_album_id'        =>  $cover_image
            );
            $dest_data=array_merge($dest_data,$image_update);
        }
        // Addding to category table

        $cat1=Input::get('category_id');
        $ni=0;
        while($ni<=count($cat1)-1)
        {
            $category=array(
//                'vc_villa_id'=>$id,
                'vc_category_id'=>$cat1[$ni]
            );

            $ni++;
            $re=Vacations::update_villa_category($id,$category);
        }
        // if($re) array_push($error,'Unable to add Villa');
        $fac_data=array(
            //'fac_dest_id'        =>$des_id,
            'fac_bedroom'       =>Input::get('fac_bedroom',''),
//                'fac_sleeps'        =>$input->sleeps,
            'fac_transport'     =>Input::get('fac_transport',''),
            'fac_laundry'       =>Input::get('fac_laundry',''),
            'fac_spa'           =>Input::get('fac_spa',''),
            'fac_swimmingpool'  =>Input::get('fac_swimmingpool','')
        );

        $res=Destinations::update_facility($id,$fac_data);
        if(!$res) array_push($error,'Unable to Update Villa Facilities');
        if($res) array_push($error,'Villa has been Updated successfully');
        return Redirect::to_route('VillaHome')
            ->with('status',$error);

    }

}
?>