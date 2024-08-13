<?php

namespace App\Http\Controllers\Backend;

use App\Models\Checkout;
use Illuminate\Http\Request;

class OrderController extends BackendBaseController
{

    protected $panel = 'Order';
    protected $title;
    protected $base_route = 'backend.order';
    protected $view_path = 'backend.order';

    public function __construct(){
        //declaring respective model for their respective database table
        $this->model = new Checkout();
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



    public function show($id)
    {

        $this->title='View';
        $data['row'] = $this->model->find($id);
        //return $data;
        if(!$data){
            request()->session()->flash('error_message', 'Invalid request');
            return redirect()->route($this->base_route.'.index');
        }else{
            return view($this->__loadDataToView($this->view_path.'.show'),compact('data'));
        }
    }





}
