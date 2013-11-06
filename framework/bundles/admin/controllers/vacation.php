<?php


    class Admin_Vacation_Controller extends Admin_Base_Controller {
        public $restful=true;
        public function get_vacation_category()
        {
            return View::make('admin::vacation.vacation_category')
                ->with('cat',Vacations::getcategory())
                ->with('all',Vacations::getall_category());
        }
        public function post_add_category()
        {
            $data=array(
                'cat_name'=>Input::get('cat_name'));
            if(Vacations::add($data))
            {
                return View::make('admin::vacation.vacation_category')
                    ->with('cat',Vacations::getcategory())
                    ->with('all',Vacations::getall_category());
            }
            else
            {
                return "fail";
            }
        }
        public function post_addsub_cat()
        {
            $data=array(
                'cat_pid'=>Input::get('cat_pid'),
                'cat_name'=>Input::get('cat_name'),
                 'cat_description'=>Input::get('cat_description'));
            if(Vacations::addsub_cat($data))
            {
                return View::make('admin::vacation.vacation_category')
                    ->with('cat',Vacations::getcategory())
                    ->with('all',Vacations::getall_category());
            }
            else
            {
                return "fail";
            }

        }

    }