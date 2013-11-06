<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bhoo
 * Date: 31/08/13
 * Time: 23:42
 * To change this template use File | Settings | File Templates.
 */

class Posts extends Eloquent{
    public $restful=true;
    public static $table="posts";
    public static function getposts()
    {
        $res=DB::table(self::$table)
               ->first();
        return $res;
    }
    public static function UpdatePosts($data)
    {
        $res=DB::table(self::$table)
            ->where('post_id','=',1)
           ->update($data);
        return $res;
    }

}