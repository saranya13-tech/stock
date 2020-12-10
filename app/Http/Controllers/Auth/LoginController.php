<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Cookie;
use DB;
use Request;
use Ixudra\Curl\Facades\Curl;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function showLoginForm()
    {
        return view('login');
    }
    public function login(Request $request)
    {
         if (!empty(request()->input('username')) && !empty(request()->input('password'))) {
            
            $results = DB::select('SELECT * FROM `usersinfo`  WHERE username="' . request()->input('username') . '"and password="' . request()->input('password') . '" ');

            foreach ($results as $v) {
                $id = $v->user_id;
                $branch_id=$v->branch_id;
                $type=$v->user_type;

            }
            if (!empty($results)) {
                Cookie::queue(Cookie::forget('user_id'));

                Cookie::queue('user_id', $id);
                Cookie::queue('branch_id', $branch_id);
                Cookie::queue('type', $type);
                request()->session()->regenerate();
                request()->session()->put('id', $id);
                if (request()->input('remember')) {
                    Cookie::queue('user_id', $id);
                }
                return redirect()->route('home');

            } else {
                return view('login')->with('message', 'Invalid Username or password');
            }
        } else {
           return view('login')->with('message', 'Invalid Username or password');

        }
    }
    public function logout()
    {
        Cookie::queue(Cookie::forget('user_id'));
        return view('login');
    }
    
}
