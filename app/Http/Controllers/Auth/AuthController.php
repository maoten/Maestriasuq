<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Image;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:5',
            ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {


        return User::create([
            'cc' => $data['cc'],
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'profession' => $data['profession'],
            'college' => $data['college'],
            'type' => $data['type'],
            'password' => bcrypt($data['password']),
            ]);

      /*  $file=$data['image'];
        $name='maestriauq_' . time() . '.' . $file->getClientOriginalExtension();
        $path=public_path().'\imagenes\usuarios';
        $file->move($path,$name);
        
 
        $user=new User();
         $user->cc => $data['cc'],
             $user->name => $data['name'],
             $user->email => $data['email'],
             $user->phone => $data['phone'],
             $user->profession => $data['profession'],
             $user->college => $data['college'],
             $user->type => $data['type'],
             $user->password => bcrypt($data['password']),
        $user->save();
        
        $image=new Image();
        $image->name=$name;
        $image->user()->associate($user);
        $image->save();*/

    }
}
