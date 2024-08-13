<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Frontend\FrontendBaseController;
use App\Models\Category;
use App\Models\Checkout;
use App\Models\CheckoutDetail;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class HomeController extends FrontendBaseController
{
    /**
     * Only Authenticated users for "customer" guard
     * are allowed.
     *
     * @return void
     */

    protected $title;
    public function __construct()
    {
//        $this->middleware('auth:customer');
//        $this->middleware('guest:customer')->except('logout');
//        $this->middleware('auth:customer');
    }

    /**
     * Show Customer Dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $this->title = 'Customer Dashboard';
//        return 'working';
//        dd(auth());
//        dd(Auth::guard('customer')->user());
        return view($this->__loadDataToView('customer.home'));
//        $categories = Category::all()->where('status', 1);
//        return view('customer.home',compact('categories'));
    }

    public function viewOrder(){
        $this->title = 'Orders';
        $data['orders'] = Checkout::where('customer_id',Auth::guard('customer')->user()->id)->get();
//        foreach ($data['orders'] as $item) {
//            return $item->orderDetails;
//        }
//        return $data['orders'];
        return view($this->__loadDataToView('customer.orders'),compact('data'));
//        return view('customer.orders',compact('categories'));
    }

    public function showOrder($order_id){
        $this->title = 'Order Details';
        $data['order_details'] = CheckoutDetail::where('checkout_id',$order_id)->get();
        return view($this->__loadDataToView('customer.show_orders'),compact('data'));
//        return view('customer.orders',compact('categories'));
    }

    public function editCustomerInfo(){
        $this->title = 'Edit Personal Details';
        $cid = Auth::guard('customer')->user()->id;
        $data['details'] = Customer::find($cid);
//        return $data;
        return view($this->__loadDataToView('customer.edit_info'),compact('data'));
//        return view('customer.orders',compact('categories'));
    }

    public function updateCustomerInfo(Request $request){
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'address'=>'required',
        ]);
        $data['row'] = Customer::find($request->id);

        if($data['row']->update($request->all())){
            request()->session()->flash('success_message', 'Customer info successfully updated');
        }else{
            request()->session()->flash('error_message', 'Invalid request');
        }
        return redirect()->route('customer.home');
//        return view('customer.orders',compact('categories'));
    }

    public function editPass(){
        $this->title = 'Change Password';
        $cid = Auth::guard('customer')->user()->id;
        $data['details'] = Customer::find($cid);
//        return $data;
        return view($this->__loadDataToView('customer.edit_pass'),compact('data'));
//        return view('customer.orders',compact('categories'));
    }

    public function updatePass(Request $request){

        $request->validate([
            'new_password'=>'required|min:6|max:100',
            'old_password'=>'required|min:6|max:100',
            'confirm_password'=>'required|same:new_password',
        ]);

        $pass = Hash::make($request->old_password);

        $data = Customer::find($request->id);

        if(Hash::check($request->old_password, $data->password)){
            $pass = Hash::make($request->new_password);
            $data->update([
                'password'=>$pass
            ]);
            request()->session()->flash('success_message', 'Password successfully changed');
        }else{
            request()->session()->flash('error_message', 'Failure changing password');
        }

        return redirect()->route('frontend.customer.edit_pass');
//        return view('customer.orders',compact('categories'));
    }



}
