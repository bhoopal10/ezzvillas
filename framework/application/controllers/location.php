<?php
class Location_Controller extends Base_Controller
{
    public $restful=true;


    public function post_retLocations()
    {
        $input=Input::json();
        $state_id=$input->state_id;
        $res=Locations::location('0',true);
        return $res;
    }

    public function get_retCities()
    {
        $res=Locations::cities(true);
        return $res;
    }
}