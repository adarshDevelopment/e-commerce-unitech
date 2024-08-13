<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressTypeRequest;
use App\Models\AddressType;
use App\Models\Tag;
use Illuminate\Http\Request;

class AddressTypeController extends BackendBaseController
{

    protected $panel = 'Address Type';
    protected $title;
    protected $base_route = 'backend.parent.address_type';
    protected $view_path = 'backend.parent.address_type';

    public function __construct(){
        //declaring respective model for their respective database table
        $this->model = new AddressType();
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
        //setting the title of the page to Create
        $this->title = 'Create';
        //calling __loadDataToView function to return create page
        return view($this->__loadDataToView($this->view_path.'.create'));
    }


    public function store(AddressTypeRequest $request)
    {
        // storing the id of the user to the created_by field
        $request->request->add(['created_by' => auth()->user()->id]);
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
            return view($this->__loadDataToView($this->view_path.'.edit'), compact('data'));
        }
    }


    public function update(AddressTypeRequest $request, $id)
    {
        $data['row'] = $this->model->find($id);
        if($data['row']->update($request->all())){
            request()->session()->flash('success_message', $this->panel. ' successfully updated');
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
