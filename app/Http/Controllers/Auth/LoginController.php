<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;



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
  // protected $redirectTo = '/home';
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct(Request $request)
  {
    // Original method
      // $this->middleware('guest')->except('logout');
      $this->request = $request;
      // New MultiAuth method
      $this->middleware('guest', ['except' => ['logout', 'userLogout']]);
  }



  public function redirectTo()
  {
      if ($this->request->has('previous'))
      {
          $this->redirectTo = $this->request->get('previous');
      }
       return $this->redirectTo ?? '/';
  }




  public function userLogout()
  {
    Auth::guard('web')->logout();
    return redirect('/');
  }







}
