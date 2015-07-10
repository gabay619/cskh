<?php




class AdminUsersController extends \BaseController {

    public function getLogin()
    {
        return View::make('admin.users.login');

    }
    public function getLogout()
	{
		Auth::logout();
		return Redirect::route('admin.get-login');
	}
     public function getRegister()
    {
        return View::make('admin.users.register');

    }
    public function postLogin()
    {

        $validator = Validator::make(Input::all(), User::$rulesLogin,  User::$error);
        if ($validator->fails())
        {
            return Redirect::route('admin.get-login')->withErrors($validator)->withInput();
        }
        else
        {
            $field = filter_var(Input::get('username'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
            $userdata = array(
				$field => Input::get('username'),
				'password' => Input::get('password'),
                'status'=>'1'

			);
			$remember = Input::has('remember') ? true : false;
			 $authdata= Auth::attempt($userdata, $remember);

            if($authdata)
			{

                //return Redirect::intended('/');
                return Redirect::route('admin.get-dashboard');
			}
			else
			{

				return Redirect::route('admin.get-login')->withInput()->with('messageNo', 'Tên tài khoản hoặc mật khẩu không đúng.');

			}
        }
        return Redirect::route('admin.get-login')->with('messageNo', 'Đăng nhập không thành công.');


    }

    public function postRegister()
    {

        $rules=array(

            'email' => 'required|email|max:80|unique:users',
            'username' => 'required|min:3|max:16|unique:users|regex:/^([A-Za-z0-9])+$/i',
            'password' => 'required|min:6|max:32',
            'password_confirmation' => 'required|same:password',
        );
        $error= array(
            'username.min'		=> 'Tên tài khoản ít nhất 3 ký tự.',
            'password.min'		=> 'Mật khẩu phải ít nhất 6 ký tự.',
            'email.max'		=> 'Địa chỉ email không quá 80 ký tự.',
            'username.max'		=> 'Tên tài khoản không quá 16 ký tự.',
            'password.max'		=> 'Mật khẩu không vượt quá 32 ký tự.',
            'email.required' => 'Bạn không được để trống trường này.',
            'username.required' => 'Bạn không được để trống trường này.',
            'password.required' => 'Bạn không được để trống trường này.',
            'password_confirmation.required' => 'Bạn không được để trống trường này.',
            'email.email'	=> 'Địa chỉ email không đúng định dạng.',
            'username.regex'	=> 'Tên tài khoản không ký tự đặc biệt.',
            'email.unique'	=> 'Địa chỉ email đã được sử dụng.',
            'username.unique'	=> 'Tên tài khoản đã được sử dụng.',
            'password_confirmation.same'=> 'Mật khẩu xác nhận không đúng.',
        );


        $validator=Validator::make(Input::all(),$rules,$error);
        if($validator->fails())
        {
            //echo "fails";
            //return Redirect::to('login')->withErrors($validator)->withInput();
            //return Redirect::route('register')->withErrors($validator)->withInput();
            return "chứng thực sai";
            return Redirect::route('admin.get-register')->withErrors($validator)->withInput();
        }
        else
        {

            $email= Input::get('email');
            $username=Str::lower(Input::get('username'));
            $password=Hash::make(Input::get('password'));

            $dataUser = User::create(array(
                'username' => $username,
                'email' => $email,
                'password' => $password,

            ));

            if($dataUser)
            {
//                Mail::send(
//                    "admin.users.active",
//                    array(
//                        'link'=>'http://localhost',
//                        'username'=>$username
//
//                    ),function($message) use ($dataUser)
//                    {
//                        $message->to($dataUser->email,$dataUser->username)->subject('Activate your account...');
//                    }); send mail
//                if(Auth::attempt(array('username'=>$username,'password'=>Input::get('password')))){
//                    return Redirect::to('/');
//                }else{
//                    return 'Đăng ky thất bại!';
//                }
                Auth::attempt(array('username'=>$username,'password'=>$password,'status'=>1));
                echo "Đăng ký thành công";

            }
            else{
                echo "Đăng ký fails";
            }
        }
    }











//$dataUser

	/**
	 * Display a listing of the resource.
	 * GET /users
	 *
	 * @return Response
	 */
	public function index()
	{

		$users = User::orderBy('created_at','desc');
        if(Input::has('id'))
        {
            $users->where('id',Input::get('id'));
        }
        if(Input::has('username'))
        {
            $field = filter_var(Input::get('username'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

            $users->where($field,'LIKE','%'.Input::get('username').'%');
        }

        if(Input::has('idrole'))
        {

            $users->where('idrole','=',Input::get('idrole'));
        }

        if(Input::has('start_date'))
        {
            $users->where('created_at','>=',date('y-m-d H:i:s',strtotime(Input::get('start_date'))));
        }
        if(Input::has('end_date'))
        {
            $users->where('created_at','<=',date('y-m-d H:i:s',strtotime(Input::get('end_date'))));
        }

        if(Input::has('status'))
        {
            $users->where('status','=',Input::get('status'));
        }
        $users= $users->paginate(15);

		return View::make('admin.users.index')->with('users',$users);
	}

	/**
	 * Show the form for creating a new news
	 *
	 * @return Response
	 */
	public function create()
	{
      return View::make('admin.users.create');
	}

	/**
	 * Store a newly created news in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$validator = Validator::make($data = Input::all(), User::$rules,User::$error);


		if ($validator->fails())
		{

			return Redirect::back()->withErrors($validator)->withInput();
		}
        User::create($data);
		return Redirect::route('admin.news.index')->with('success','Thêm mới thành công !');;
	}

	/**
	 * Display the specified news.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$users = User::findOrFail($id);

		return View::make('admin.users.show', compact('users'));
	}

	/**
	 * Show the form for editing the specified news.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

		$users = User::find($id);
        if($users!=null)
        {
            return View::make('admin.users.edit')->with('users',$users);
        }
        else
        {
            return Redirect::route('admin.users.index')->with('fail','Không tìm thấy dữ liệu !');
        }

	}

	/**
	 * Update the specified news in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		$users = User::findOrFail($id);

		$validator = Validator::make($data = Input::all(), User::getRulesUpdate($id),User::$error);

		if ($validator->fails())
		{

            //return "fail";
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$users->update($data);

		return Redirect::route('admin.users.index')->with('success','Sửa thành công !');
	}

	/**
	 * Remove the specified news from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

        if(!is_numeric($id))
        {
                return Redirect::route('admin.users.index')->with('fail','Không tìm thấy dữ liệu !');
        }
        $item = User::find($id);

        if($item==null)
        {
                return Redirect::route('admin.users.index')->with('fail','Không tìm thấy dữ liệu !');

        }
		User::destroy($id);
		return Redirect::route('admin.users.index')->with('success','Xóa thành công !');
	}


}