<?php

class Locations extends Eloquent
{
    public static $table="locations";
    public static $timestamp=false;

    public static function save_city($data)
    {
        $res=DB::table(self::$table)
            ->insert($data);
    }

    /**
     * @param $data
     */
    public static function save_state($data)
    {
        $res=DB::table(self::$table)
            ->insert($data);

    }

    public static function get_states($json=false)
    {
        $res=DB::table('locations')
            ->where('loc_parent_id','=','0')
            ->get();
        if($json==false)return $res;
        elseif($json==true) return json_encode($res);
    }

    /**
     * @param int $state_id
     * @param bool $json
     * @return string
     */
    public static function location($state_id,$json=false)
    {
        /*Return all state*/

            $res=DB::table('locations')
                ->where('loc_parent_id','=','0')
                ->get();
        if($json==false)return $res;
        elseif($json==true) return json_encode($res);
    }

    public static  function cities($json=false)
    {
        $res=DB::table('locations')
            ->where('loc_parent_id','!=','0')
            ->get();
        if($json==false)return $res;
        elseif($json==true) return json_encode($res);
    }
    public static  function onlyCities($json=false)
    {
        $res=DB::table('locations')
            ->where('loc_parent_id','!=','0')
            ->get('loc_name');
        if($json==false)return $res;
        elseif($json==true) return json_encode($res);
    }
    public static function city($loc_id)
    {
        if($loc_id)
        {
        $res=DB::table('locations')
            ->where('location_id','=',$loc_id)
            ->first();
        return $res;
        }
        return NULL;
    }


}
