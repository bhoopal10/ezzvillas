<?php
class Admin_Posts_Controller extends Admin_Base_Controller
{
    public $restful=true;
    public function get_addposts()
    {
        return View::make('Admin::posts.addposts')
            ->with('posts',Posts::getposts());
    }
    public function post_updateposts()
    {
        $res=array(
            'post_box1'=>Input::get('post_box1'),
            'post_box2'=>Input::get('post_box2'),
            'post_box3'=>Input::get('post_box3'),
            'post_box4'=>Input::get('post_box4'),
            'post_box5'=>Input::get('post_box5'),
            'post_box6'=>Input::get('post_box6')
        );
        $update=Posts::UpdatePosts($res);
        if($update) return View::make('Admin::posts.addposts')
                                ->with('status',"Your Posts Updated Successfully")
                                 ->with('posts',Posts::getposts());
        else return View::make('Admin::posts.addposts')
                     ->with('status','Your not Edited Anything')
                     ->with('posts',Posts::getposts());
    }
}