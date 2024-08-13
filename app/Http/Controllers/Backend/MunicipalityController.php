<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MunicipalityRequest;
use App\Models\District;
use App\Models\Municipality;

use Illuminate\Http\Request;

class MunicipalityController extends BackendBaseController
{

    protected $panel = 'Municipality';
    protected $title;
    protected $base_route = 'backend.parent.municipality';
    protected $view_path = 'backend.parent.municipality';

    public function __construct(){
        //declaring respective model for their respective database table
        $this->model = new Municipality();
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
        //fetching all fields where the status is set to 1 from the respective model
        $district = District::all()->where('status', 1);
        //plucking only the id and the name value to display on the selection box on the view file
        $data['district'] = $district->pluck('name','id');
        //calling __loadDataToView function to return create page with additional data
        return view($this->__loadDataToView($this->view_path.'.create'),compact('data'));
    }


    public function store(MunicipalityRequest $request)
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
            $district = District::all()->where('status',1);
            $data['district'] = $district->pluck('name','id');
            return view($this->__loadDataToView($this->view_path.'.edit'), compact('data'));
        }
    }


    public function update(MunicipalityRequest $request, $id)
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
