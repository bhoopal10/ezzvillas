<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bhoo
 * Date: 13/08/13
 * Time: 03:07
 * To change this template use File | Settings | File Templates.
 */

class Vacation_Controller extends Base_Controller
{
public $restful=true;
    public function get_index()
    {
        return "ddd";
    }

    public function get_displayCategory($id)
    {
        return View::make('vacation.view_category')
            ->with('vacation',Vacations::GetCategoryByID($id))
            ->with('subcat',Vacations::getsubcategory());
    }
    public function get_displaySubCategory($id)
    {
       $res=Vacations::subcategory_with_villa($id);

        return View::make('vacation.view_subcategory')
                       ->with('bedroom',Destinations::view_bedroom())
                      ->with('villa',$res)
                       ->with('cat_description',Vacations::GetCategoryByID($id))
                       ->with('villa_featured',Destinations::GetVilla());


    }
    public function get_displaySubCategorySearch()
    {
        $cat_id=Input::get('category');
        $min=Input::get('min');
        $max=Input::get('max');
        $bedroom=Input::get('bedroom');
        $loc_id=Input::get('loc_id');
        $res=Vacations::subcategory_with_villa_search($loc_id,$cat_id,$min,$max,$bedroom);
        if($res)
        {
            return View::make('search.search_value')
                ->with('bedroom',Destinations::view_bedroom())
                ->with('villa',$res)
                ->with('cat_description',Vacations::GetCategoryByID($cat_id))
                ->with('location',Locations::city($loc_id));

        }
        else
        {
            return view::make('search.search_value')
                ->with('bedroom',Destinations::view_bedroom())
                ->with('villa','')
                ->with('location',Locations::city($loc_id))
                ->with('cat_description',Vacations::GetCategoryByID($cat_id));
        }
    }

}