<?php

class Projects extends Eloquent
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
	

}
 ?>