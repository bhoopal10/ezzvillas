<?php

class User_Controller extends Controller {
public $restful=true;
    public function get_allUser()
    {
        $user=Users::get_all_user(true);
        return $user;
    }
    public function post_user()
    {
        $input=Input::json();
        $uid=$input->user_id;
        Users::get_user($uid);
    }
    public function get_user()
    {
        $user=User::get_user(true);
        return $user;
    }
}