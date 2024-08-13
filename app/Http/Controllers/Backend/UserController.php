<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Http\Requests\UserRequest;
use App\Models\Category;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends BackendBaseController
{

    protected $panel = 'User';
    protected $title;
    protected $base_route = 'backend.user';
    protected $view_path = 'backend.user';

    public function __construct(){
        //declaring respective model for their respective database table
        $this->model = new User();
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
        $roles = Role::all()->where('status', 1);
        //plucking only the id and the name value to display on the selection box on the view file
        $data['roles'] = $roles->pluck('name','id');
        //calling __loadDataToView function to return create page with additional data
        return view($this->__loadDataToView($this->view_path.'.create'),compact('data'));
    }


    public function store(UserRequest $request)
    {
        //storing hashed password on the database
        $request->request->add(['password' => Hash::make($request->password)]);
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
            $roles = Role::all()->where('status',1);
            $data['roles'] = $roles->pluck('name','id');
            return view($this->__loadDataToView($this->view_path.'.edit'), compact('data'));
        }
    }


    public function update(UserRequest $request, $id)
    {

        $data['row'] = $this->model->find($id);
        //using if condition to hash password if the user has entered it, otherwise use the old password
        if(!empty($request->password)){
            $request->request->add(['password' => Hash::make($request->password)]);
        }else{
            $request->request->add(['password' => $data['row']->password]);
        }

        if($data['row']->update($request->all())){
            request()->session()->flash('failure_message', $this->panel. ' successfully updated');
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
