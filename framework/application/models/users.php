<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bhoo
 * Date: 01/08/13
 * Time: 14:28
 * To change this template use File | Settings | File Templates.
 */

class Users extends Eloquent
{
    public static $table="user";
    public static $timestamp=false;
    public static function add_user($data)
    {
    $add_user=DB::table('user')
        ->insert($data);
        return $add_user;
     }
    public static function get_all_user($json=false)
    {
        $users=DB::table('user')
            ->get();
        if($json==true) return json_encode($users);
        else return $users;
    }

    public  static function get_user($id,$json=false)
    {
        $users=DB::table('user')
            ->where('user_id','=',$id)
            ->first();
        if($json==true) return json_encode($users);
        else return $users;
    }

}