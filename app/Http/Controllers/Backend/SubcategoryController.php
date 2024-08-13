<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Http\Requests\SubcategoryRequest;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SubcategoryController extends BackendBaseController
{

    protected $panel = 'Subcategory';
    protected $title;
    protected $base_route = 'backend.parent.subcategory';
    protected $view_path = 'backend.parent.subcategory';
    protected $image_path = 'images'.DIRECTORY_SEPARATOR.'backend' . DIRECTORY_SEPARATOR.'parent'.DIRECTORY_SEPARATOR . 'subcategory'.DIRECTORY_SEPARATOR;

    protected $image_dimensions = [
        [
            'width' => 255,
            'height' => 271
        ],
        [
            'width' => 500,
            'height' => 500
        ],
        [
            'width' => 1000,
            'height' => 1000
        ]
    ];

    public function __construct(){
        //declaring respective model for their respective database table
        $this->model = new Subcategory();
    }

    public function index()
    {

        //setting the title of the page to list
        $this->title = 'List';
        //fetching data from respective table from the database eloquent query to show it on the index view page
        $data['rows'] = $this->model->all();
//        return $data;
        //calling __loadDataToView function to return data and other variables to respective view page
        return view($this->__loadDataToView($this->view_path.'.index'),compact('data'));

    }

    public function create()
    {
        //setting the title of the page to Create
        $this->title = 'Create';
        //fetching all fields where the status is set to 1 from the respective model
        $category = Category::all()->where('status', 1);
        //plucking only the id and the name value to display on the selection box on the view file
        $data['category'] = $category->pluck('name','id');
        //calling __loadDataToView function to return create page with additional data
        return view($this->__loadDataToView($this->view_path.'.create'),compact('data'));
    }


    public function store(SubcategoryRequest $request)
    {
        // storing the id of the user to the created_by field
        $request->request->add(['created_by' => auth()->user()->id]);
        if($request-> hasFile('image_file')){
            //initializing the image file
            $image = $request->file('image_file');
            //storing the name of the image file to a variable
            $image_name = date('YmdHis').'_'.$image->getClientOriginalName();
            //moving the image file
            $image->move($this->image_path, $image_name);
            $request->request->add(['image' => $image_name]);

            foreach ($this->image_dimensions as $dimension){
                //using image intervention to resize the images with previously defined dimensions
                $img = Image::make($this->image_path.$image_name)->resize($dimension['width'], $dimension['height']);
                //saving each image with different dimensions with unique name and height and width
                $img->save($this->image_path. $dimension['width'] . '_'. $dimension['height']. '_'. $image_name);
            }

        }

        //storing the data fetched from the view to the database by using the earlier declared model
        $record = $this->model->create($request->all());
        if($record){
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
        if(!$data['row']){
            request()->session()->flash('error_message', 'Invalid request');
            return redirect()->route($this->base_route.'.index');
        }else{
            $this->title = 'Edit';
            $category = Category::all()->where('status',1);
            $data['category'] = $category->pluck('name','id');
            return view($this->__loadDataToView($this->view_path.'.edit'), compact('data'));
        }
    }


    public function update(SubcategoryRequest $request, $id)
    {
        $data['row'] = $this->model->find($id);

        if($data['row']){
            //storing new image
            if($request-> hasFile('image_file')){
                //initializing the image file
                $image = $request->file('image_file');
                //storing the name of the image file to a variable
                $image_name = date('YmdHis').'_'.$image->getClientOriginalName();
                //moving the image file
                $image->move($this->image_path, $image_name);
                $request->request->add(['image' => $image_name]);

                foreach ($this->image_dimensions as $dimension){
                    //using image intervention to resize the images with previously defined dimensions
                    $img = Image::make($this->image_path.$image_name)->resize($dimension['width'], $dimension['height']);
                    //saving each image with different dimensions with unique name and height and width
                    $img->save($this->image_path. $dimension['width'] . '_'. $dimension['height']. '_'. $image_name);
                }

            }
            if($data['row']->image){
                if(file_exists($this->image_path. $data['row']->image)){
                    unlink($this->image_path. $data['row']->image);
                }
                foreach ($this->image_dimensions as $dimension){
                    if(file_exists($this->image_path. $dimension['width'] . '_'. $dimension['height']. '_'. $data['row']->image)){
                        unlink($this->image_path. $dimension['width'] . '_'. $dimension['height']. '_'. $data['row']->image);
                    }
                }

            }
            //updating the selected row from the database
            if($data['row']->update($request->all())){
                request()->session()->flash('success_message', $this->panel. ' successfully updated');
            }else{
                request()->session()->flash('error_message', 'Invalid request');
            }
        }else{
            request()->session()->flash('error_message', 'Invalid request');
        }




        return redirect()->route($this->base_route.'.index');
    }


    public function destroy($id)
    {
        $data['row'] = $this->model->find($id);
        //returning error message if the entered sn not found on the database
        if(!$data){
            request()->session()->flash('error_message', 'Invalid request');
            return redirect()->route($this->base_route.'.index');
        }
        if($data['row']->delete()){
            request()->session()->flash('success_message', $this->panel. ' successfully deleted');
        }else{
            request()->session()->flash('error_message', 'Error deleting ' . $this->panel. '.');
        }
        return redirect()->route($this->base_route.'.index');
    }
}
