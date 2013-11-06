<?php

    class Images extends Eloquent
    {
        public static $table="images";

        public static function update($id,$data)
        {
            $res=DB::table(self::$table)
                ->where('image_dest_id','=',$id)
                ->update($data);
            return $res;
        }

        public static function ofVilla($dest_id,$json=false)
        {
            $res=DB::table(self::$table)
                ->where('image_dest_id','=',$dest_id)
                ->get();

            if($json==false)return $res;
            elseif($json==true) return json_encode($res);

        }

        /**
         * Inserting uploaded image under album to image table
         *
         * @param array $image_data -> Image data that also contain album_id
         * @return mixed
         */
        public static function add_image_to_album($image_data)
        {
            $res=DB::table(self::$table)
                ->insert_get_id($image_data);
            return $res;
        }

        /**
         * Retrieve images data by their ids
         *
         * @param array $image_ids : id of the images to retrieve
         * @return mixed
         */
        public static function get_images_by_id($image_ids)
        {
            $res=DB::table(self::$table)
                ->where_in('image_id',$image_ids)
                ->get();
            return $res;
        }

        /**
         * To Update Data to Image_ids Row
         *
         * @param $image_ids : id of image_id to update data
         * @param array $data: image title,name,Descriptions
         * @return mixed
         */
        public static function update_data_to_album($image_ids,$data)
        {
            $res=DB::table(self::$table)
                ->where('image_id','=',$image_ids)
                ->update($data);
            return $res;
        }

        /**
         * To retrieve Album Name and Images
         * by Join albums and images table
         *
         * @return mixed
         */
        public static function Get_album_name_image()
        {
            $perpage=1;
             $res=DB::table('albums')
               ->paginate(4);

            return $res;
        }

        /**
         * To retrieve all the images from Selected Album
         *
         * @param $album_id
         * @return mixed
         */
        public static function Get_image_by_album_id($album_id)
        {
            $res=DB::table(self::$table)
                ->where('image_album_id','=',$album_id)
                ->join('albums','albums.album_id','=','images.image_album_id')

                ->get();
            if($res) return $res;
            else return $res=0;
        }
        public static function Get_image_by_album_name($album_name)
        {
            $res=DB::table('albums')
                ->where('album_name','=',$album_name)
                ->join('images','images.image_album_id','=','albums.album_id')
                ->get();
            return $res;

        }
        public static function get_image_by_villa_id($villa_id)
        {

        }

        /**
         * To Retrieve image data by using image_id
         *
         * @param $image_id
         * @return mixed
         */
        public static function get_image_data_by_id($image_id)
        {
            $res=DB::table(self::$table)
                ->where('image_id','=',$image_id)
                ->get();
            return $res;
        }

        public static function updatedByID($id,$data)
        {
            $res=DB::table(self::$table)
                ->where('pic_id','=',$id)
                ->update($data);
            return $res;
        }
        public static function add_album($data)
        {
            $res=DB::table('albums')
                ->insert_get_id($data);
           if($res) return true;
            else return false;
        }
        public static function get_album()
        {
            $res=DB::table('albums')
                ->get();
            return $res;
        }
        public static function getByID_album($id)
        {
            $res=DB::table('albums')
                ->where('album_id','=',$id)
                ->get();
            return $res;

        }
        public static function updateAlbumByID($data)
        {
            $res=DB::table('albums')
                ->insert_get_id($data);
            return $res;
        }
        public static function getphoto($id)
        {
            $res=DB::table(self::$table)
                ->where('image_album_id','=',$id
                )
                ->join('albums','albums.album_id','=','images.image_album_id')
                ->get();
            return $res;

        }
        public static function UpdateImageByID($image_id,$image_data)
        {

            $res=DB::table(self::$table)
                ->where('image_id','=',$image_id)
                ->update($image_data);
            return $res;
        }

        public static function DeleteImage($image_id)
        {
            $res=DB::table(self::$table)
                ->where('image_id','=',$image_id)
                ->delete();
            return $res;
        }

        public static function DeleteAlbum($album_id)
        {
            $res=DB::table(self::$table)
                ->where('image_album_id','=',$album_id)
                ->delete();
                 $res1=DB::table('albums')
                     ->where('album_id','=',$album_id)
                     ->delete();
                 return $res1;
             }




    }