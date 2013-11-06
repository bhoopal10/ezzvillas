<?php
    class Vacations Extends Eloquent{
        public $restful=true;
        public static $table='category';
        public static function add($data)
        {
            $res=DB::table(self::$table)
                ->insert_get_id($data);
            return $res;
        }
        public static function getcategory()
        {
            $res=DB::table(self::$table)
                ->where('cat_pid','=','0')
                ->get();
            return $res;
        }
        public static function getsubcategory()
        {
            $res=DB::table(self::$table)
                ->where('cat_pid','!=','0')
                ->get();
            return $res;
        }
        public static function GetCategoryByID($id)
        {
            $res=DB::table(self::$table)
                ->where('cat_id','=',$id)
                ->first();
            return $res;
        }
        public static function addsub_cat($data)
        {
            $res=DB::table(self::$table)
                ->insert_get_id($data);
            return $res;
        }
        public static function add_villa_category($data)
        {
            $res=DB::table('villa_category')
                ->insert_get_id($data);
            return $res;
        }
        public static function update_villa_category($id,$data)
        {
            $res=DB::table('villa_category')
                ->where('vc_villa_id','=',$id)
                ->update($data);
            return $res;
        }
        public static function getall_category()
        {
            $res=DB::table(self::$table)
                ->get();
            return $res;
        }
        public static function get_villa_id_by_cat_id($id)
        {
            $res=DB::table('villa_category')
                ->where('vc_category_id','=',$id)
                ->get();
            if($res) return $res;
            else return false;
        }

        public static function subcategory_with_villa($sub_id)
        {
            $res=DB::table('villa_category')
                    ->where('vc_category_id','=',$sub_id)
                    ->join('destinations','destinations.dest_id','=','villa_category.vc_villa_id')
                    ->paginate(6);

            if($res) return $res;
            else return false;
        }
        public static function subcategory_with_villa_search($loc_id,$sub_id,$min,$max,$bedroom)
        {

            $sql='SELECT DISTINCT d.dest_id,d.dest_name,d.dest_charge FROM villa_category v,destinations d,facility f,locations l';
            $where='WHERE v.vc_villa_id=d.dest_id AND f.fac_dest_id=d.dest_id AND l.location_id=d.dest_location';
            if($loc_id!=NULL)
            {
            $where=$where.' AND l.location_id ='.$loc_id;
            }

            if($sub_id!=NULL)
            {
            $where=$where.' AND v.vc_category_id ='.$sub_id;
            }
            $min==NULL?$min=0:$min=$min;
            $max==NULL?$max=50000:$max=$max;
            $where=$where.' AND d.dest_charge BETWEEN '.$min.' AND '.$max;
            if($bedroom!=NULL){
                $where=$where. ' AND f.fac_bedroom ='.$bedroom;
            }
            $res=$sql.' '.$where;
            return DB::query($res);

//            $res=DB::table('villa_category')
//                    ->where('vc_category_id','=',$sub_id)
//                    ->join('facility','facility.fac_dest_id','=','villa_category.vc_villa_id')
//                    ->where('fac_bedroom','>',$bedroom)
//                    ->join('destinations','destinations.dest_id','=','villa_category.vc_villa_id')
//                    ->where('dest_location','=',$loc_id)
//                    ->where('dest_charge','>',$min)
//                    ->where('dest_charge','>',$max)
//                    ->get();
//            if($res) return $res;
//            else return false;
        }


    }