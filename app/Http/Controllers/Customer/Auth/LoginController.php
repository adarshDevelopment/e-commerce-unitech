<?php

namespace App\Http\Controllers\Customer\Auth;

use App\Http\Controllers\Frontend\FrontendBaseController;
use App\Models\Category;
use App\Models\Setting;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;

class LoginController extends FrontendBaseController
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating customer users for the application and
    | redirecting them to your customer dashboard.
    |
    */

    /**
     * This trait has all the login throttling functionality.
     */
    use ThrottlesLogins;

    /**
     * Max login attempts allowed.
     */
    public $maxAttempts = 5;

    /**
     * Number of minutes to lock the login.
     */
    public $decayMinutes = 3;

    /**
     * Only guests for "customer" guard are allowed except
     * for logout.
     *
     * @return void
     */
    public function __construct()
    {
        //it stops logged in people accessing routes that are designed for guests only. ie, You don't want an already logged in user accessing the login route
        $this->middleware('guest:customer')->except('logout');
    }

    /**
     * Show the login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
//        return 'returning from showloginform customer';
        $categories = Category::all()->where('status', 1);
        $navCategories = Category::where('status',1)->orderby('rank','asc')->limit(5)->get();
        $settings = Setting::all()->first();
        return view('customer.login',[
            'title' => 'Customer Login',
            'loginRoute' => 'customer.login',
            'forgotPasswordRoute' => 'customer.password.request',
        ], compact('categories', 'navCategories', 'settings'));
    }

    /**
     * Login the customer.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
//        return $request;
        $this->validator($request);

        //check if the user has too many login attempts.
//        if ($this->hasTooManyLoginAttempts($request)){
//            //Fire the lockout event
//            $this->fireLockoutEvent($request);
//
//            //redirect the user back after lockout.
//            return $this->sendLockoutResponse($request);
//        }


        //attempt login.
        if(\Illuminate\Support\Facades\Auth::guard('customer')->attempt($request->only('email','password'),$request->filled('remember'))){
            //Authenticated, redirect to the intended route
//reutr
            return redirect()->route('customer.home');
            //if available else customer dashboard.
            return redirect()
                ->intended(route('customer.home'))
                ->with('status','You are Logged in as Customer!');
        }
        //keep track of login attempts from the user.
//        $this->incrementLoginAttempts($request);

        //Authentication failed, redirect back with input.
        return $this->loginFailed();
    }

    /**
     * Logout the customer.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::guard('customer')->logout();
        return redirect()
            ->route('frontend.index')
            ->with('status','Customer has been logged out!');
    }

    /**
     * Validate the form data.
     *
     * @param \Illuminate\Http\Request $request
     * @return
     */
    private function validator(Request $request)
    {
        //validation rules.
        $rules = [
            'email'    => 'required|email|exists:customers|min:5|max:191',
            'password' => 'required|string|min:4|max:255',
        ];

        //custom validation error messages.
        $messages = [
            'email.exists' => 'These credentials do not match our records.',
        ];

        //validate the request.
        $request->validate($rules,$messages);
    }

    /**
     * Redirect back after a failed login.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    private function loginFailed(){
        request()->session()->flash('failure_message', 'Invalid credentials');
        return redirect()
            ->back()
            ->withInput()
            ->with('error','Login failed, please try again!');
    }


    public function username(){
        return 'email';
    }
}
