<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bhoo
 * Date: 27/08/13
 * Time: 09:35
 * To change this template use File | Settings | File Templates.
 */

class Search_Controller extends Base_Controller {
public $restful=true;
    public function get_search()
    {
        return view::make('search.search')
            ->with('states',Locations::get_states())
            ->with('cities',Locations::cities());
    }
    public function post_searchValue()
    {
        $bedroom=Input::get('bedroom');
        $rates=Input::get('rate');
        $charge=explode(",",$rates);
        return view::make('');

    }
    public function post_searchLocation()
    {
        $loc_id=Input::get('loc_id');
        $location=Locations::city($loc_id);
        $charge=Input::get('rate');
        $bedroom=Input::get('bedroom');
        echo $loc_id;
        $res=Destinations::villa_search_by_location_id($loc_id);
        return View::make('search.search_by_location')
            ->with('villa',$res)
            ->with('location',$location);
    }
    public function get_searchVilla()
    {
        $villa=Input::get('search');
        $res=Destinations::VillaSearchByVillaName($villa);
        if($res) return View::make('search.search_villa')
                            ->with('villa',$res)
                            ->with('bedroom',Destinations::view_bedroom());
        else return View::make('search.search_villa')
                                ->with('villa','')
                                ->with('bedroom',Destinations::view_bedroom());

    }
}