<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Checkout;
use App\Models\Customer;
use App\Models\CheckoutDetail;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use MongoDB\Driver\Session;
use function PHPUnit\Framework\isEmpty;
use Illuminate\Support\Facades\Auth;

class CartController extends FrontendBaseController
{
    protected $title;
    function add(Request $request){
        $product = Product::find($request->product_id);
        if(!$product){
            $request->session()->flash('error_message','The selected product does not seem to exist.');
            return redirect()->route('frontend.index');
        }else {
            //if condtion to make sure customer does not send more items than that are available in the inventory
            if ($request->quantity > $product->quantity) {
                $request->session()->flash('error_message', 'Please enter a valid quantity.');
                return redirect()->back();
            } else {
                //initializing an empty string variable to store the row_id of the product to be added to make sure
                //the quantity stays less than what is available in the inventory
                $row_id = '';
                //if condition to find the row id of the prodcut if it has been added earlier but only if the cart is not empty so that the program does not loop through an empty list
                foreach (Cart::content() as $rowId => $item) {
                    if ($item->id == $request->product_id) {
                        //return $item->rowId;
                        //assigning the row_id to the earlier declared variable
                        $row_id = $item->rowId;
                    }
                }

                $attributes = [];
                foreach ($product->productAttributes as $attribute) {
                    $attributes += array($attribute->attribute_id => $attribute->attribute_value);
                    //            $attributes[$product->productAttributes->attribute_id] => $product->productAttributes->attribute_value;
                }
                //adding the passed arguments to the cart table along with updated pricing details
                Cart::add(['id' => $request->product_id,
                    'name' => $product->title,
                    'qty' => $request->quantity,
                    'price' => $product->price - (($product->discount / 100) * $product->price),
                    'weight' => 1,
                    'discount' => $product->discount,
                    'options' => $attributes
                ]);

                //if condition to
                if (!empty($row_id)) {
                    //if condition to set the quantity of the item in the cart to available quantity
                    $cart = Cart::get($row_id);
                    //        return $cart;
                    if (Cart::get($row_id)->qty > $product->quantity) {
                        Cart::update($row_id, $product->quantity);
                    }
                }

                //        return Cart::get($row_id);

                //storing success message on session
                $request->session()->flash('success_message', 'Item successfully added to cart.');
                //redirecting to the product page by passing slug parameter
                return redirect()->route('frontend.product', $product->slug);
            }
        }
    }


    function index(){
        $this->title = 'Cart Items';
        $data['carts'] = Cart::content();
        return view($this->__loadDataToView('frontend.cart.index'),compact('data'));
    }

    function update(Request $request){
//        return $request;

        Cart::update($request->rowId, $request->qty);
        $request->session()->flash('success_message','Cart successfully updated.');
        return redirect()->route('cart.index');
    }


    function checkout(){
        $this->title = 'Checkout';
        $data['carts'] = Cart::content();
        //making sure the cart is not empty
        if(count($data['carts']) <1){
            session()->flash('error_message','Cannot checkout with empty cart!');
            return redirect()->route('cart.index');
        }else{
            $user =  Auth::guard('customer')->user();
//        return $user;
            $categories = Category::all()->where('status', 1);
            return view($this->__loadDataToView('frontend.cart.checkout'),compact('data','user'));
//            return view('frontend.cart.checkout',compact('data','categories', 'user'));
        }

    }

    function makeOrder(Request $request){
        $data['carts'] = Cart::content();
        //checking for products in the cart so that the system does not checkout with an empty cart
        if(count($data['carts']) <1){
            //making sure the system does not create an empty row on the database
            //redirecting the customer to the cart. the system will display the updated cart
            $request->session()->flash('error_message','Cannot checkout with empty cart Failed!');
            return redirect()->route('cart.index');
        }else{
            //initializing the initial discount, tax and subtotal value with 0
            $discount = 0;
            $tax = 0;
            $subtotal = 0;
            $total = 0;
            //assigning cart items to variable
            $cartItems = Cart::content();
            //adding discount and other attributes such as tax and subtotal to add the data to the checkouts table
            foreach($cartItems as $cartItem){
                //foreach loop to find the total discount for all the products in the cart
                $product = Product::find($cartItem->id);
                if(!$product){
                    //if condition to make sure that the system only checks out with products that are still available in the inventory
                    $request->session()->flash('error_message','One of the products in the cart does not seem to exist.');
                    //removing the unavailable product from the cart so that the customer does not again checks out with the same product in the cart
                    Cart::remove($cartItem->rowId);
                    return redirect()->route('cart.index');
                }else{
                    if($product->discount){
                        $discount = $discount + ((($product->discount/100) * $product->price) * $cartItem->qty);
                    }
                    $tax = $tax + ($cartItem->tax) * $cartItem->qty;
                    $subtotal = $subtotal + $cartItem->subtotal;
                }

            }

            $total = $subtotal +$tax;
            //adding discount and customer_id to request to add them to checkouts table
            $request->request->add(['discount' => $discount]);
            $request->request->add(['tax' => $tax]);
            $request->request->add(['subtotal' => $subtotal]);
            $request->request->add(['total' => $total]);
            $request->request->add(['customer_id' =>Auth::guard('customer')->user()->id ]);

            //inserting all values to checkouts table
            $data = Checkout::create($request->all());

            //if condition to make sure the system only inserts the rest of the purchase details on the checkout_details table
            if($data){
                $details['checkout_id'] = $data->id;
                foreach (Cart::content() as $rowId => $item){
//                $discount = 0;
                    $details['product_id'] = $item->id;
                    $details['quantity'] = $item->qty;
                    //finding individual product_id and inserrting the same value to item_id coloumn
                    $product = Product::find($item->id);
                    //separating comas from cart content to store as float
                    $priceNoComa = $var = floatval(preg_replace('/[^\d.]/', '', $product->price));
//                $ = $var = intval(preg_replace('/[^\d.]/', '', $product->price));

                    $details['price'] = $priceNoComa;
                    if($product->discount){
                        $details['discount'] = ((($product->discount/100) * $product->price) * $item->qty);
//                    $details['discount'] = ($product->discount/100) * $product->price;
                    }
                    $details['discounted_price'] = $item->price;
                    $details['tax'] = $item->tax * $item->qty;
                    $details['subtotal'] = $item->subtotal;
                    $details['total'] = $item->total;

                    //if condition to check if different users checkout at the same time with the same product
                    // if the quantity of the item on the cart exceeds that of the database table, it will redirect the user to previous page and remove the item from the cart
                    if($item->qty > $product->quantity){
//                        return 'working';
                        Cart::remove($rowId);
                        //deleting the earlier inserted data on the Checkouts table and redirecting back to cart page
                        $data->delete();
                        $request->session()->flash('error_message','One of the products quantity exceeds the available quantity.');
                        return redirect()->route('cart.index');
                    }else{
                        CheckoutDetail::create($details);
                        $product->quantity = $product->quantity - $item->qty;
                        $product->save();
                        Cart::remove($rowId);
                    }
                }
            }else{
                $request->session()->flash('error_message','Checkout Failed!');
            }
            $request->session()->flash('success_message','Checkout successful');
            return redirect()->route('cart.index');
        }
    }

    public function deleteRow($row_id){
        if(count(Cart::content()) > 0){
            foreach (Cart::content() as $item) {
                if($item->rowId == $row_id){
                    Cart::remove($row_id);
                    return redirect()->back();
                }else{
                    request()->session()->flash('error_message','The selected item was already removed from the cart!');
                }
            }
        }else{
//            return 'empty cart';
            request()->session()->flash('error_message','Cannot remove from an empty cart');
        }
        return redirect()->back();
    }

}


//Cart::add(['id' => '293ad', 'name' => 'Product 1', 'qty' => 1, 'price' => 9.99, 'weight' => 550, 'options' => ['size' => 'large']]);
