<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\ProductRequest;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductImage;
use App\Models\ProductSpecification;
use App\Models\Specification;
use App\Models\Subcategory;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use function PHPUnit\Framework\isEmpty;

class ProductController extends BackendBaseController
{

    protected $panel = 'Product';
    protected $title;
    protected $base_route = 'backend.product';
    protected $view_path = 'backend.product';
    protected $file_path = 'backend'.DIRECTORY_SEPARATOR.'images' . DIRECTORY_SEPARATOR.'product' .DIRECTORY_SEPARATOR;
    protected $image_dimensions = [
            [
                'width' => 112,
                'height' => 150
            ],
            [
                'width' => 600,
                'height' => 800
            ],
            [
                'width' => 600,
                'height' => 550
            ],
            [
                'width' => 75,
                'height' => 100
            ],
            [
                'width' => 475,
                'height' => 100
            ]
        ];


    public function __construct(){
        //declaring respective model for their respective database table
        $this->model = new Product();
    }


    public function index()
    {
        //setting the title of the page to list
        $this->title = 'List';
        //fetching data from respective table from the database eloquent query to show it on the index view page
        $data['rows'] = $this->model->all();
        //calling __loadDataToView function to return data and other variables to respective view page
        return view($this->__loadDataToView($this->view_path.'.index'),compact('data'));

    }

    public function create()
    {
        $data['categories'] = Category::pluck('name','id');
        $data['subcategories'] = Subcategory::pluck('name','id');
        $data['tags'] = Tag::pluck('name','id');
        $data['attributes'] = Attribute::pluck('name','id');
//        return $data['specifications'];
        return view($this->__loadDataToView($this->base_route . '.create'),compact('data'));
    }


    public function store(ProductRequest $request)
    {

        //adding created by value and assigning the quantity as stock for the product
        $request->request->add(['created_by'=> Auth::user()->id]);

        //adding rest of the values to product model
        $record= $this->model->create($request->all());

        if($record){
            //calling the tags function from the Product model to attach the data on the product_tags pivot table
            //using if condition to check if tag_id is not null
            if(!($request->tag_id == [null])){
                $record->tags()->attach($request->tag_id);

            }
            //inserting attribute
            $attribute_id = $request->attribute_id;
            $attribute_values = $request->attribute_value;

            for ($i=0; $i<count($attribute_id); $i++){
//                return 'inside loop';
                if(!empty($attribute_id[$i]) && !empty($attribute_values[$i])){
                    //making sure the user has entered both attributes and their values
                    ProductAttribute::create([
                        'product_id'=>$record->id,
                        'attribute_id' => $attribute_id[$i],
                        'attribute_value' => $attribute_values[$i]

                    ]);
                }
            }


            $specification_id = $request->specification_id;
            $specification_values = $request->specification_value;

            for ($i=0; $i<count($specification_id); $i++){
//                return 'inside loop';
                if(!empty($specification_id[$i]) && !empty($specification_values[$i])){
                    //making sure the user has entered both attributes and their values
                    ProductSpecification::create([
                        'product_id'=>$record->id,
                        'attribute_id' => $specification_id[$i],
                        'specification_value' => $specification_values[$i]
                    ]);
                }
            }

            //code to store images with multiple resolutions
            $titles = $request->input('image_title');
            $images = $request->file('image_file');

            for ($i = 0; $i < count($titles); $i ++){
                //making sure to upload image if only both the image title and image are present
                if (!empty($titles[$i] && !empty($images[$i]))){
                    //assigning name of the image to save it on the storage and on the database
                    $iname = date('YmdHis'). '_' . $images[$i]->getClientOriginalName();
//                    $images[$i]->move('images/backend/product/', $iname);
                    $images[$i]->move('images/backend/product/', $iname);

                    foreach ($this->image_dimensions as $dimension){
                        //using image intervention to resize the images with previously defined dimensmions
                        $img = Image::make('images/backend/product/'.$iname)->resize($dimension['width'], $dimension['height']);
                        //saving each image with different dimensions with unique name and height and width
                        $img->save('images/backend/product/'. $dimension['width'] . '_'. $dimension['height']. '_'. $iname);
                    }

                    ProductImage::create([
                        'product_id'=>$record->id,
                        'image_name' => $iname,
                        'image_title' => $titles[$i],
                        'status' => 1
                    ]);

                }
            }
            //if condition to send success message if the query successfully executes
            $request->session()->flash('success_message', $this->panel. ' created successfully!');
        }else{
            //setting flash to  failure message
            $request->session()->flash('error_message', $this->panel . ' creation failed');
        }

        //redirecting route to index route to return to the index page
        return redirect()->route($this->base_route.'.index');

    }


    public function show($id)
    {
        $this->title='View';
        $data['row'] = $this->model->find($id);
        if(!$data){
            request()->session()->flash('error_message', 'Invalid request');
            return redirect()->route($this->base_route.'.index');
        }else{
            return view($this->__loadDataToView($this->view_path.'.show'),compact('data'));
        }
    }



    public function edit($id)
    {
        $data['row'] = $this->model->find($id);
//        return $data;
        if(!$data['row']){
            request()->session()->flash('error_message', 'Invalid request');
            return redirect()->route($this->base_route.'.index');
        }else{
            $this->title = 'Edit';
            $data['categories'] = Category::pluck('name','id');
            $data['subcategories'] = Subcategory::pluck('name','id');
            $data['tags'] = Tag::pluck('name','id');
            $data['attributes'] = Attribute::pluck('name','id');
            return view($this->__loadDataToView($this->view_path.'.edit'), compact('data'));
        }
    }



    public function update(ProductRequest $request, $id)
    {
        $specification_id = $request->specification_id;
        $specification_values = $request->specification_value;
        $attribute_id = $request->attribute_id;
        $attribute_values = $request->attribute_value;
        $data = $this->model->find($id);
        if(!$data){
            //throwing error message if the entered data is not found
            request()->session()->flash('error_message', 'The product you are trying to edit does not exist');
        }else{
            if($data->update($request->all())){
                //only update to other tables if product table is updated
                //tags table is updated through sync function
                $data->tags()->sync($request->tag_id);
                //if attribute_id array exists, only then continue forward
                if($attribute_id){
                    //deleting each row of data one after anouther through foreach loop with the help of eloquent relationship function defined in Model
                    foreach ($data->productAttributes as $attribute){
                        $attribute->delete();
                    }
                    //creating new sets of data after deleting the old ones
                    for ($i=0; $i<count($attribute_id); $i++){
                        if(!empty($attribute_id[$i]) && !empty($attribute_values[$i])){
                            ProductAttribute::create([
                                'product_id'=>$data->id,
                                'attribute_id' => $attribute_id[$i],
                                'attribute_value' => $attribute_values[$i]
                            ]);
                        }
                    }
                }
                //same logic used for updating product_attributes table
                if($specification_id){
                    foreach ($data->specifications as $specification){
                        $specification->delete();
                    }
                    for ($i=0; $i<count($specification_id); $i++){
                        if(!empty($specification_id[$i]) && !empty($specification_values[$i])){
                            ProductSpecification::create([
                                'product_id'=>$data->id,
                                'attribute_id' => $specification_id[$i],
                                'specification_value' => $specification_values[$i]
                            ]);
                        }
                    }
                }

                //only update image if request has a image_file
                if($request-> hasFile('image_file')){
                    //if image_file exists on request, delete old images from directory
                    foreach ($data->productImage as $prodImage){
                        //delete the files if the file with the same name as the one stored in the product_images table exists
                        if(file_exists('images/backend/product/'. $prodImage->image_name)){
//                            return 'exists';
                            unlink('images/backend/product/'. $prodImage->image_name);
//                            return 'unlinked';
                        }
                        //delete the rest of the files with different dimensions
                        foreach ($this->image_dimensions as $dimension){
//                            return $dimension['width'].'_'.$dimension['height'].'_'.$data;
                            if(file_exists('images/backend/product/'. $dimension['width'] . '_'. $dimension['height']. '_'. $prodImage->image_name)){
                                unlink('images/backend/product/'. $dimension['width'] . '_'. $dimension['height']. '_'. $prodImage->image_name);
//                                return 'working';
                            }
                        }
                    }
                    //deleting the rows in product_images table which have the same id
                    foreach ($data->productImage as $image){
                        $image->delete();
                    }
                    //assigning image_files and image_titles in arrays
                    $titles = $request->input('image_title');
                    $images = $request->file('image_file');
                    //creating new images. extracting each element of the array using for loop
                    for ($i = 0; $i < count($titles); $i ++){
                        //making sure to upload image if only both the image title and image are present
                        if (!empty($titles[$i] && !empty($images[$i]))){
                            //assigning name of the image to save it on the storage and on the database
                            $iname = date('YmdHis'). '_' . $images[$i]->getClientOriginalName();
                            $images[$i]->move('images/backend/product/', $iname);

                            foreach ($this->image_dimensions as $dimension){
                                //using image intervention to resize the images with previously defined dimensmions
                                $img = Image::make('images/backend/product/'.$iname)->resize($dimension['width'], $dimension['height']);
                                //saving each image with different dimensions with unique name and height and width
                                $img->save('images/backend/product/'. $dimension['width'] . '_'. $dimension['height']. '_'. $iname);
                            }
                            ProductImage::create([
                                'product_id'=>$data->id,
                                'image_name' => $iname,
                                'image_title' => $titles[$i],
                                'status' => 1
                            ]);
                        }
                    }

                }

                //success message in session if everything is updated
                request()->session()->flash('success_message', $this->panel. ' successfully updated');
            }else{
                request()->session()->flash('error_message', 'Invalid request');
            }
            //redirect back to index page regardless of the outcome
            return redirect()->route($this->base_route.'.index');
        }
    }


    public function destroy($id)
    {
        $data = $this->model->find($id);
//        return $data['row']->productAttributes;

//        return$data['row']->productAttributes;
        //returning error message if the entered sn not found on the database
        if(!$data){
            request()->session()->flash('error_message', 'Invalid request');
            return redirect()->route($this->base_route.'.index');
        }else {

        }
            foreach ($data->productImage as $prodImage){
                if(file_exists('images/backend/product/'. $prodImage->image_name)){
//                            return 'exists';
                    unlink('images/backend/product/'. $prodImage->image_name);
//                            return 'unlinked';
                }
                foreach ($this->image_dimensions as $dimension){
//                            return $dimension['width'].'_'.$dimension['height'].'_'.$data;
                    if(file_exists('images/backend/product/'. $dimension['width'] . '_'. $dimension['height']. '_'. $prodImage->image_name)){
                        unlink('images/backend/product/'. $dimension['width'] . '_'. $dimension['height']. '_'. $prodImage->image_name);
//                                return 'working';
                    }
                }


            if($data->delete()){
                request()->session()->flash('success_message', $this->panel. ' successfully deleted');
            }else{
                request()->session()->flash('error_message', 'Error deleting ' . $this->panel. '.');
            }
        }
        return redirect()->route($this->base_route.'.index');
    }


    /*
        public function assign_price(Request $request){

    //        return $request;
            //storing the arrays from the request to local variables
            $attribute_ids = $request->attribute_id;
            $prices = $request->price;
            $attribute_names = $request->attribute_name;


            for ($i=0; $i<count($attribute_ids); $i++){
    //                return 'inside loop';
                if(!empty($attribute_ids[$i]) && !empty($attribute_names[$i])){
                    //making sure the user has entered both attributes and their values
                    ProductPrice::create([
                        'product_id'=>$request->product_id,
                        'attribute_name' => $attribute_names[$i],
                        'attribute_id' => $attribute_ids[$i] ,
                        'price' => $prices[$i]
                    ]);
                }
            }

            $request->session()->flash('success_message', 'Price successfully assigned!');
            return redirect()->route($this->base_route.'.index');

        }
    */


//    public function assignProductPrice($id){
//        $this->title = 'Assign Price';
//        $data['product'] = Product::find($id);
//        $data['attributes'] = ProductAttribute::all()->where('product_id',$id);
//
////        $data[attribute_name] = $data['product'];
//
//
////        return $data['attributes']->id;
//
//        $attributes = [];
////        return $data['attributes'];
//
////        foreach($data['attributes'] as $att){
////            $attributes[$att->id].push($att->attrbute_value);
////            foreach($att as $attribute){
////                $attributes[$att->id].push($att->attrbute_value);
////            }
////        }
////        return $data;
//        return view($this->__loadDataToView($this->view_path.'.price_assign_form'),compact('data'));
//        return $data['attributes'];
//        $attributes = $data['attributes']->attribute_value;
//        return $attributes;
//
////        return $data['attributes'];
//        $attValue = explode(',', $data['attributes']->attribute_value);
//        return $attValue;
//
//    }




}
