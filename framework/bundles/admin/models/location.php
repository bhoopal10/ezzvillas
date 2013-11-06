<?php
//
//class Location extends Eloquent
//{
//    public static $table="locations";
//    public static $timestamp=false;
//
//    public static function save_city($data)
//    {
//        $res=DB::table(self::$table)
//            ->insert($data);
//    }
//
//    public static function save_state($data)
//    {
//        $res=DB::table(self::$table)
//            ->insert($data);
//
//    }
//
//    public static function get_states($json=false)
//    {
//        $res=DB::table('locations')
//            ->where('loc_parent_id','=','0')
//            ->get();
//        if($json==false)return $res;
//        elseif($json==true) return json_encode($res);
//    }
//
//}
