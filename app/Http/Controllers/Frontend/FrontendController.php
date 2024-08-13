<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CheckoutDetail;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\Subcategory;
use App\Models\UserComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class FrontendController extends FrontendBaseController
{

    protected $title;
    public function index(){
        $this->title = 'Home';
        $data['latest_products'] = Product::where('status',1)->orderby('created_at','desc')->limit(5)->get();
        $data['featured_products'] = Product::where('status',1)
            ->where('featured_product',1)->orderby('created_at','desc')->limit(5)->get();
        //        foreach ($data['latest_products'] as $prod) {
//            $image = $prod->productImage()->first();
//            return $image->image_name;
//
//        }
        return view($this->__loadDataToView('frontend.index'),compact('data'));
//        return view('frontend.index');
    }

    public function category($slug){

        $data['details'] = Category::where('slug', $slug)->first();
        $this->title = $data['details']->name;
        $catName = Category::where('slug',$slug)->first();
        $data['products'] = $data['details']->products()->get();
        if($data['details']){
            return view($this->__loadDataToView('frontend.category'),compact('data','catName'));
        }else{
            return redirect()->route('frontend.index');
        }
    }

    public function subcategory($slug){
        $data['details'] = Subcategory::where('slug', $slug)->first();
        $this->title = $data['details']->name;
        $subCat = Subcategory::where('slug',$slug)->first();
        $data['products'] = $data['details']->products()->get();
        if($data['details']){
            return view($this->__loadDataToView('frontend.subcategory'),compact('data','subCat'));
        }else{
            return redirect()->route('frontend.index');
        }
    }


    public function product($slug){
        $data['details'] = Product::where('slug', $slug)->first();

        if($data['details']){
            $this->title = $data['details']->title;
            return view($this->__loadDataToView('frontend.product'),compact('data'));
        }else{
            return redirect()->route('frontend.index');
        }
    }



    public function getPrice (Request $request){

//        dd($request->all());
$finalPrice = 0;

        $price = DB::table('product_attributes')
            ->where('product_id', $request->product_id)
            ->where('attribute_id',$request->attID)
            ->where('attribute_value', $request->spec)->first();
        dd($price);

        $initial_price = Product::all()->where('id', $request->product_id);
        $finalPrice = $initial_price-$price->price;
        return $initial_price;


    }


    public function searchItems(Request $request){

        $this->title = 'Search Result';
        $search = $request->search;
        if(!$request->search =="" ){
            $data['details'] = Product::where('title', 'LIKE' , '%'.$request['search'].'%')->get();
        }else{
            $data['details'] = [];
        }
        return view($this->__loadDataToView('frontend.search'),compact('data','search'));
    }

    public function postComment(Request $request){


        if(trim($request->comment) == "" ){
            $request->session()->flash('error_message', 'Cannot post an empty comment!');
            return redirect()->back();
        }else{
            $user_id = Auth::guard('customer')->user()->id;
            $request->request->add(['customer_id' => $user_id]);

            if(UserComment::create($request->all())){
                $request->session()->flash('success_message', 'Comment successfully posted');
            }else{
                $request->session()->flash('error_message', 'Error posting comment');
            }
            $product = Product::find($request->product_id);
            return redirect()->route('frontend.product', $product->slug);
        }
    }



}
