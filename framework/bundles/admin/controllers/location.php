<?php

class Admin_Location_Controller extends Admin_Base_Controller
{
    public $restful=true;

    public function get_add()
    {
        return View::make('admin::location.add_location')
                ->with('states',Locations::get_states());
    }

    public function post_save_state()
    {
        $data=array(
            'loc_parent_id'     => '0',
            'loc_name'          =>Input::get('state_name'),
            'loc_description'   =>Input::get('state_description')
        );
        Locations::save_state($data);
        return Redirect::to_route('LocationAdd');

    }

    public function post_save_city()
    {
        $data=array(
            'loc_parent_id'     =>Input::get('state_id'),
            'loc_name'          =>Input::get('city_name'),
            'loc_description'   =>Input::get('city_description')
        );

        Locations::save_city($data);
        return Redirect::to_route('LocationAdd');
    }

    public function get_states()
    {
        $res=Locations::get_states();
        return $res;
    }
    public function get_view_location()
    {
        return View::make('Admin::location.view_location');

    }
    public function get_edit_location($id)
    {
        return View::make('Admin::location.edit_city')
            ->with('id',$id);
    }

}


?>