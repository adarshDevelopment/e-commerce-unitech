<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Checkout;
use App\Models\Customer;
use App\Models\CheckoutDetail;
use App\Models\Product;
use App\Models\Specification;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use function PHPUnit\Framework\isEmpty;
use Illuminate\Support\Facades\Auth;

class ComparisonController extends FrontendBaseController
{
    protected $title;

    public function __construct(){
        //only put four products on comparison
        $this->productList = ['product1', 'product2', 'product3', 'product4'];
    }



    public function addToCompare($product_slug){
        //initiating a boolean value to check if the entered prodcut is not already on the list
        $duplicateProduct = false;
        //making sure the same product does not get added twice under different keys
        foreach(Session::all() as $key => $value) {
            if ($value == $product_slug) {
                $duplicateProduct = true;
            }
        }
        if($duplicateProduct){
            session()->flash('error_message', 'The selected item is already on the list.');
            return redirect()->back();
        }
        //return $duplicateProduct;
        $keyLeft = false;
        if(!$duplicateProduct){
            //making sure the key value always stays new from the list created in constructor
            foreach ($this->productList as $list){
                if(!(Session::has($list))){
                    Session::put($list,$product_slug);
                    $keyLeft = true;
                    break;
                }
            }
        }
        if($keyLeft){
            session()->flash('success_message', 'Product successfully added for comparison.');
        }else{
            session()->flash('error_message', 'The system can only compare four items  at once');
        }
        return redirect()->back();
    }



    public function index(){
        $this->title = "Compare Products";
//        return Session::all();
        //initializing a local array to store all the available session keys and values required for the comparison chart
        $newList = [];
        foreach ($this->productList as $list){
            if(Session::has($list)){
                $newList[$list] = Session::get($list);
            }
        }

        //initializing array to store all the product details
        $productList = [];
        foreach ($newList as $key=>$value){
            $productList[$key] = Product::where('slug',$value)->first();
        }
//        return $productList;
        $data['attributes'] = Attribute::all();
//        return $data['attributes'];
        return view($this->__loadDataToView('frontend.compare_products'),compact('productList','data'));

    }




    public function removeItem($product_slug){
        $keyValue ='';
        foreach(Session::all() as $key => $value) {
            if ($value == $product_slug) {
                $keyValue = $key;
            }
        }
        if($keyValue){
            Session::forget($keyValue);
            session()->flash('success_message', 'Item successfully removed from comparison table');
        }else{
            session()->flash('error_message', 'The selected item was already removed from the list');
        }

        return redirect()->back();
    }



}


//Cart::add(['id' => '293ad', 'name' => 'Product 1', 'qty' => 1, 'price' => 9.99, 'weight' => 550, 'options' => ['size' => 'large']]);
