<?php 
class Admin_User_Controller extends Admin_Base_Controller
{
    public $restful=true;

	public function get_index()
	{
		return View::make('admin::user.index');
	}

	public function get_add_user()
	{
		return View::make('admin::user.add_user');
	}
    public function post_add_user()
    {
    $error=array();
    $add_user=array(
        'user_name'=>Input::get('user_name'),
        'user_email'=>Input::get('user_email'),
        'user_gender'=>Input::get('user_gender'),
        'user_city'=>Input::get('user_city'),
        'user_address'=>Input::get('user_address'),
        'user_organisation'=>Input::get('user_organisation'),
        'user_mobile'=>Input::get('user_mobile'),
        'user_dob'=>Input::get('user_dob')

    );

        $res=Users::add_user($add_user);
        if(!$res) array_push($error,'Sorry Not Uploaded');
        if($res) array_push($error,'Uploaded Success');
            return Redirect::to_route('UserAdd')
                ->with('status',$error);
            }
    public function get_getuser()
    {
        $e=Users::get_all_user();
        return View::make('admin::user.view_user')
            ->with('users',$e);



    }

    public function post_login()
    {
        $username=Input::get('username');
        $password=Input::get('password');
        $credential=array('username'=>$username,'password'=>$password);

        if(Auth::attempt($credential))
        {
              return Redirect::to_route('home1');
        }
        else
        {
           
            return Redirect::to_route('login')
                ->with('status','Username/Password Authentication Failure');
        }

    }
}

?>
