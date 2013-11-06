<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bhoo
 * Date: 23/08/13
 * Time: 12:01
 * To change this template use File | Settings | File Templates.
 */

class libvilla
{
    public static function villa_cover_image_by_id($villa_id)
    {
        $album_id=Destinations::villa_album_id_by_villa_id($villa_id);
        $images=Images::Get_image_by_album_id($album_id);
        if($images){

            $cover_image=$images[0];
//            $cover_image="http://t2.gstatic.com/images?q=tbn:ANd9GcSEUzYpB_WmWxQrA5F9HM2sp-nSTQpMV6ZFP0_Ah2t5fyYS6cAP87uAsg";

            return $cover_image;
        }
        else
        {
            $cover_image="http://t2.gstatic.com/images?q=tbn:ANd9GcSEUzYpB_WmWxQrA5F9HM2sp-nSTQpMV6ZFP0_Ah2t5fyYS6cAP87uAsg";
            return $cover_image;
        }
    }
    public static function album_cover_image_by_id($album_id)
    {
        $images=Images::Get_image_by_album_id($album_id);
        if($images){

            $cover_image=$images[0];
//            $cover_image="http://t2.gstatic.com/images?q=tbn:ANd9GcSEUzYpB_WmWxQrA5F9HM2sp-nSTQpMV6ZFP0_Ah2t5fyYS6cAP87uAsg";

            return $cover_image;
        }
        else
        {
            $cover_image="http://t2.gstatic.com/images?q=tbn:ANd9GcSEUzYpB_WmWxQrA5F9HM2sp-nSTQpMV6ZFP0_Ah2t5fyYS6cAP87uAsg";
            return $cover_image;
        }

    }

    public static function category()
    {
        $category=Vacations::getcategory();
        return $category;
    }
    public static function subcategory()
    {
        $subcategory=Vacations::getsubcategory();
        return $subcategory;
    }
    public static function cities()
    {
        $res=Locations::cities();
            return $res;
    }
    public static function get_city_by_id($loc_id)
    {
        $res=Locations::city($loc_id);
        return $res;


    }
    public static function get_facility($dest_id)
    {
        $res=Destinations::get_facility($dest_id);
        return $res;
    }
  
}
