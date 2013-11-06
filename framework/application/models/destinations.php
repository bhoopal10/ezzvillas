<?php
class Destinations extends Eloquent
{
    public static $table="destinations";
    public static $timestamp=false;
    public static function add($data)
    {
        $res=DB::table(self::$table)->insert_get_id($data);
        return $res;
    }

    public static function add_facility($data)
    {
        $res=DB::table('facility')->insert_get_id($data);
        return $res;
    }

    public static function get_facility($des_id,$json=false)
    {
        $res=DB::table('facility')
                ->where('fac_dest_id','=',$des_id)
                ->first();
        if($json==false)return $res;
        elseif($json==true) return json_encode($res);
    }

    public static function get_villas($city,$json=false)
    {
        $city_id=DB::table('locations')
                ->where('loc_name','=',$city)
                ->only('location_id');

        $res=DB::table('destinations')
                ->join('locations','locations.location_id','=','destinations.dest_location')
                ->where('dest_location','=',$city_id)
                ->join('facility','facility.fac_dest_id','=','destinations.dest_id')
                ->get();

        if($json==false)return $res;
        elseif($json==true) return json_encode($res);
    }

    public static function villaDetail($villa_id,$json=false)
    {
        $res=DB::table('destinations')
            ->join('locations','locations.location_id','=','destinations.dest_location')
            ->where('dest_id','=',$villa_id)
            ->join('facility','facility.fac_dest_id','=','destinations.dest_id')
            ->first();

        if($json==false)return $res;
        elseif($json==true) return json_encode($res);
    }

    public static function villas_with_filter($city,$filter,$json=false)
    {
        $min_price=$filter['price']['min_price'];
        $max_price=$filter['price']['max_price'];

        $city_id=DB::table('locations')
            ->where('loc_name','=',$city)
            ->only('location_id');

        $res=DB::table('destinations')
            ->join('locations','locations.location_id','=','destinations.dest_location')
            ->where('dest_charge','>',$min_price)
            ->where('dest_charge','<',$max_price)
            ->where('dest_location','=',$city_id)
            ->join('facility','facility.fac_dest_id','=','destinations.dest_id')
            ->get();
//        $res=DB::query('SELECT * FROM destinations INNER JOIN locations ON
//            locations.location_id = destinations.dest_location
//             INNER JOIN facility ON facility.fac_dest_id = destinations.dest_id
//             WHERE dest_location = ? AND dest_charge BETWEEN ? AND ?',array('4',$min_price,$max_price));

        if($json==false)return $res;
        elseif($json==true) return json_encode($res);

//        $query=SELECT * FROM `destinations` INNER JOIN `locations` ON `locations`.`location_id` = `destinations`.`dest_location` INNER JOIN `facility` ON `facility`.`fac_dest_id` = `destinations`.`dest_id` WHERE `dest_location` = 4 OR (`dest_charge` > `100` AND `dest_charge` < `1000`)
    }
    public static function GetVilla()
    {
        $res=DB::table(self::$table)
            ->join('facility','facility.fac_dest_id','=','destinations.dest_id')
            ->join('locations','locations.location_id','=','destinations.dest_location')
            ->get();
        return $res;
    }
    public static function ListVilla()
    {
        $res=DB::table(self::$table)
            ->join('facility','facility.fac_dest_id','=','destinations.dest_id')
            ->paginate(10);
        return $res;
    }


    /**
     * Retrieve villa Album Id by using villa Id
     *
     * @param $villa_id
     * @return mixed
     */
    public static function villa_album_id_by_villa_id($villa_id)
    {
        $res=DB::table(self::$table)
                ->where('dest_id','=',$villa_id)
                ->first();
        if($res) return $res->dest_album_id;
        else return false;
    }

    public static function get_villa_by_ids($villa_ids,$json=false)
    {
        $res=DB::table(self::$table)
             ->where_in('dest_id',$villa_ids)
            ->get();

        if($json==false)return $res;
        elseif($json==true) return json_encode($res);

    }
    public static function villas_with_search($loc_id,$vacation_id,$bedroom,$rates)
    {


        $city_id=DB::table('locations')
            ->where('location_id','=',$loc_id)
            ->only('location_id');
        $vacation_id=DB::table('villa_category')
            ->where('vc_category_id','=',$vacation_id)
            ->only('vc_villa_id');

        $bedroom=DB::table('facility')
            ->where('fac_bedroom','=',$bedroom)
            ->only('fac_dest_id');
        $res=DB::table('destinations')
            ->join('locations','locations.location_id','=','destinations.dest_location')
            ->where('dest_location','=',$city_id)
            ->join('facility','facility.fac_dest_id','=','destinations.dest_id')
            ->where('dest_id','=',$vacation_id)
//            ->where('dest_id','=',$bedroom)
//            ->where('dest_id','=',$vacation_id)

            ->get();
        return $res;

    }
    public static function view_bedroom()
    {
        $res=DB::table('facility')
            ->distinct('fac_bedroom')
            ->order_by('fac_bedroom','ASC')
            ->get('fac_bedroom');
        return $res;
    }
    public static function villa_search_by_location_id($loc_id)
    {
        $res=DB::table('destinations')
            ->join('locations','locations.location_id','=','destinations.dest_location')
            ->where('dest_location','=',$loc_id)
            ->join('facility','facility.fac_dest_id','=','destinations.dest_id')
            ->get();
        return $res;
    }
    public static function VillaSearchByVillaName($data)
    {
        $res=DB::table(self::$table)
            ->where('dest_name','LIKE','%'.$data.'%')
            ->or_where('dest_charge','<',$data)
            ->join('locations','locations.location_id','=','dest_location')
            ->or_where('loc_name','LIKE','%'.$data.'%')
            ->get();
        return $res;
    }
    public static function GetVillaName($json=false)
    {
        $res=DB::table(self::$table)
            ->get('dest_name');
        if($json==false) return $res;
        elseif($json==true) return json_encode($res);
    }

}
