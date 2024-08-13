<?php
namespace App\Http\Controllers\Customer\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Frontend\FrontendBaseController;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Setting;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends FrontendBaseController
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;


    protected $redirectTo = RouteServiceProvider::HOME;


    public function __construct()
    {
        $this->middleware('guest:customer')->except('logout');
//        $this->middleware('guest');
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:customers'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function showRegisterForm(){
        $categories = Category::all()->where('status', 1);
        $navCategories = Category::where('status',1)->orderby('rank','asc')->limit(5)->get();
        $settings = Setting::all()->first();
        return view('customer.register',[
            'title' => 'Customer Login',
            'loginRoute' => 'customer.login',
            'forgotPasswordRoute' => 'customer.password.request',
        ], compact('categories','settings', 'navCategories'));
    }


    protected function register(Request $request){
//        return $request;
        $request->request->add(['status' => 1]);
        $request->validate([
            'email'=>'required|unique:customers',
            'phone'=>'required',
            'address'=>'required',
            'password' => 'required'
        ]);
        $pass = Hash::make($request->password);

        $request->request->add(['password' => $pass]);
//        $validatedData = $request->validate([
//            'email' => ['required|unique:customers'],
//            'phone' => ['required'],
//            'address' => ['required'],
//            'password' => ['required'],
//        ]);
//        if($validatedData){
//            return 'working';
//        }else{
//            return 'duplicate data';
//        }
//        return 'check status';
        $record = Customer::create($request->all());
        if(!$record){
            $request->session()->flash('error_message','Error creating account!');
            return redirect()->route('register.create');
        }
        $request->session()->flash('success_message','User successfully registered.');
        return redirect()->route('customer.login');

    }

    protected function create(array $data)
    {
        return $data;

        return Customer::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
