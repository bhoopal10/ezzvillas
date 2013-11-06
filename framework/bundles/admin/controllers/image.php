<?php
    class Admin_Image_Controller extends Admin_Base_Controller
    {
        public $restful=true;

        public function get_createAlbum()
        {
            return View::make('admin::album.album')
                ->with('album',Images::get_album());
        }
        public function post_saveAlbum()
        {
            $error=array();
            $album_name=Input::get('album_name');
            $data=array(
                'album_name'=>$album_name
            );
            $res=Images::add_album($data);
            if($res) array_push($error,'Success');
            else array_push($error,'Fail');
            return Redirect::to_route('CreateAlbum')
                          ->with('status',$error);

        }
        /*Upload images under selected albums
         *
         * @method: POST
         * */
        public function post_upload_album_image()
        {
            $tmps=Input::file('album_photo.tmp_name');
            $names=Input::file('album_photo.name');
            $album_id=Input::get('album_id');
            $error=array();
            $uploaded_image_id=array(); /*Array to keep record of all ID's of uploaded image*/

            $i=0;
            /*Loop for every uploaded image*/
            while($i<=count($names)-1)
            {
                /*Renaming uploaded image*/
                $new_name[$i]=Str::random(7,'alpha').'.'.File::extension($names[$i]);

                /*Uploading images*/
                $upload_response=move_uploaded_file($tmps[$i],path('public').Config::get('admin::admin_config.image_path').$new_name[$i]);
                if(!$upload_response) array_push($error,array('tmp_name'=>$tmps[$i],'err_msg'=>'Unable to upload image'));

                if($upload_response)
                {
                    /*Preparing image data to be inserted into database*/
                    $image_data=array(
                        'image_album_id'    =>  $album_id,
                        'image_filename'    =>  $new_name[$i],
                    );

                    /*Inserting image data one by one to database*/
                    $image_return_id=Images::add_image_to_album($image_data);

                    if(!$image_return_id) array_push($error,array('image_no'=>$i,'$image_name'=>$names[$i],'err_msg'=>'Unable to insert image'));
                    else array_push($uploaded_image_id,$image_return_id);
                }
                $i++;
            }/*End while*/

            return View::make('admin::album.edit_uploaded_image')
                ->with('images',Images::get_images_by_id($uploaded_image_id))
                ->with('album_id',$album_id)
                ->with('status',$error);
        }

        /*Upload Data to Image_ids Rows*/

        public function post_update_image_data()
        {
            /*Initialize all Input values from form*/
            $image_id=Input::get('pic_id');
            $image_title=Input::get('pic_title');
            $image_name=Input::get('pic_name');
            $image_description=Input::get('pic_description');
            $i=0;
            $error=array();
            while($i<=count($image_id)-1)
            {
                /*Preparing to insert Data to Image id rows*/

                $data=array(
                    'image_title'=>$image_title[$i],
                    'image_name'=>$image_name[$i],
                    'image_description'=>$image_description[$i]
                );

                /*To insert Data One by one*/
                $res=Images::update_data_to_album($image_id[$i],$data);
                if($res) array_push($error,$image_name[$i].' as been Updated Successful');
                else array_push($error,'Values Insert is Failure');
                $i++;
            }
            return Redirect::to_route('CreateAlbum')
                ->with('status',$error);
        }

        /*TO Retrieve All Albums to View */
        public function get_view_album()
        {
            return View::make('admin::album.view_album')
                ->with('album',Images::Get_album_name_image());
        }

        /*To Display Images By using Album_id*/
        public function get_displayAlbumImage($album_id)
        {
            return View::make('admin::album.display_album_image')
                ->with('image',Images::Get_image_by_album_id($album_id));
        }

        /* To Edit Data to image table by using image_id*/
        public function get_editAlbumImage($image_id)
        {

            return View::make('admin::album.edit_album_image')
                ->with('image',Images::get_image_data_by_id($image_id));
        }

        /* Post Edited Image Data*/
        public function post_editImageData()
        {
            $image=Input::file('image.tmp_name');
            $image_id=Input::get('pic_id');
            $album_id=Input::get('album_id');
            $error=array();
            $image_data=array(
                'image_title'       => Input::get('pic_title'),
                'image_name'        => Input::get('pic_name'),
                'image_description' => Input::get('pic_description')
            );

            if($image)
            {
                $name=Input::file('image.name');
                $image_file=Input::get('image_file');
                $new_name=Str::Random(6,'alpha').'.'.File::extension($name);
                $upload=move_uploaded_file($image,path('public').Config::get('admin::admin_config.image_path').$new_name);
                if(!$upload) array_push($error,"Image Upload Failed");
                else $upload_image=array(
                    'image_filename'    => $new_name
                );
                File::delete(path('public').Config::get('admin::admin_config.image_path').$image_file);
                $res=array_merge($image_data,$upload_image);

            }
            else
            {
                $res=$image_data;
            }

            $result=Images::UpdateImageByID($image_id,$res);
            if($result) {
                array_push($error,'Changes Successfully Updated');
                return View::make('admin::album.display_album_image')
                    ->with('image',Images::Get_image_by_album_id($album_id))
                    ->with('status',$error);

            }
            else
                return View::make('admin::album.display_album_image')
                ->with('image',Images::Get_image_by_album_id($album_id))
                ->with('status',$error);
        }
        /*To Delete Image*/
        public function get_deleteImage($image_id,$image_filename)
        {
            $res=Images::DeleteImage($image_id);
            if($res){
                File::delete(path('public').Config::get('admin::admin_config.image_path').$image_filename);
                return Redirect::back();
            }
            else return "fail";
        }
        /*Delete Album using Album_id*/
        public function get_deleteAlbum($album_id)
        {
            $res=Images::Get_image_by_album_id($album_id);
           if($res!=0){
            foreach($res as $image)
            {
                File::delete(path('public').Config::get('admin::admin_config.image_path').$image->image_filename);
            }
           }

            $del=Images::DeleteAlbum($album_id);
            if($del) return Redirect::back();
            else return Redirect::back();
        }

    }