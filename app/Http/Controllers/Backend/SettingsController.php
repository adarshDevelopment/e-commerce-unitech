<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingsRequest;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends BackendBaseController
{

    protected $panel = 'Settings';
    protected $title;
    protected $base_route = 'backend.settings';
    protected $view_path = 'backend.settings';
    protected $image_path = 'images'.DIRECTORY_SEPARATOR.'backend' . DIRECTORY_SEPARATOR.'settings'.DIRECTORY_SEPARATOR;




    public function __construct(){
        //declaring respective model for their respective database table
        $this->model = new Setting();
    }

    public function index()
    {
        //setting boolean value to only show create settings if there are no rows
        $data['isEmpty'] = true;
        $data['row'] = $this->model::all();
        //redirecting to index page if a row already exists
        if(count($data['row']) > 0){
            $data['isEmpty'] = false;
        }
//        return $data['isEmpty'];
        //setting the title of the page to list
        $this->title = 'List';
        //fetching data from respective table from the database eloquent query to show it on the index view page
        $data['rows'] = $this->model->all();
        //calling __loadDataToView function to return data and other variables to respective view page
        return view($this->__loadDataToView($this->view_path.'.index'),compact('data'));

    }

    public function create()
    {
        $data['row'] = $this->model::all();

        if(count($data['row']) > 0){
            return redirect()->route($this->base_route.'.index');
        }else{
            //setting the title of the page to Create
            $this->title = 'Create';
            //calling __loadDataToView function to return create page with additional data
            return view($this->__loadDataToView($this->view_path.'.create'));
        }


    }


    public function store(SettingsRequest $request)
    {
        //uploading image if user has entered image
        if($request-> hasFile('favicon_file')){
            //initializing the image file
            $image = $request->file('favicon_file');
            //storing the name of the image file to a variable
            $image_name = date('YmdHis').'_'.$image->getClientOriginalName();
            //moving the image file
            $image->move($this->image_path, $image_name);
            $request->request->add(['fav_icon' => $image_name]);
        }

        if($request-> hasFile('logo_file')){
            //initializing the image file
            $image = $request->file('logo_file');
            //storing the name of the image file to a variable
            $image_name = date('YmdHis').'_'.$image->getClientOriginalName();
            //moving the image file
            $image->move($this->image_path, $image_name);
            $request->request->add(['logo' => $image_name]);
        }

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
        if(!$data['row']){
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


    public function update(SettingsRequest $request, $id)
    {
        $data['row'] = $this->model->find($id);

        if($data['row']){
            if($request-> hasFile('favicon_file')){
                //initializing the image file
                $image = $request->file('favicon_file');
                //storing the name of the image file to a variable
                $image_name = date('YmdHis').'_'.$image->getClientOriginalName();
                //moving the image file
                $image->move($this->image_path, $image_name);
                $request->request->add(['fav_icon' => $image_name]);

                //deleting previously stored image file
                if($data['row']->fav_icon){
                    if(file_exists($this->image_path. $data['row']->fav_icon)){
                        unlink($this->image_path. $data['row']->fav_icon);
                    }
                }
            }

            if($request-> hasFile('logo_file')){
                //initializing the image file
                $image = $request->file('logo_file');
                //storing the name of the image file to a variable
                $image_name = date('YmdHis').'_'.$image->getClientOriginalName();
                //moving the image file
                $image->move($this->image_path, $image_name);
                $request->request->add(['logo' => $image_name]);


                //deleting previously stored image file
                if($data['row']->logo){

                    if(file_exists($this->image_path. $data['row']->logo)){
                        unlink($this->image_path. $data['row']->logo);
                    }
                }
            }
            if($data['row']->update($request->all())){
                request()->session()->flash('success_message', $this->panel. ' successfully updated');
            }
        }else{
            request()->session()->flash('error_message', 'Invalid request');
        }
        return redirect()->route($this->base_route.'.index');


//        if($data['row']->update($request->all())){
//            //deleting image files
//            if($data['row']->fav_icon){
//
//                if(file_exists($this->image_path. $data['row']->fav_icon)){
//                    unlink($this->image_path. $data['row']->fav_icon);
//                }
//            }
//            if($data['row']->logo){
//
//                if(file_exists($this->image_path. $data['row']->logo)){
//                    unlink($this->image_path. $data['row']->logo);
//                }
//            }
//
//            //uploading image if user has entered image
//            if($request-> hasFile('favicon_file')){
//                //initializing the image file
//                $image = $request->file('favicon_file');
//                //storing the name of the image file to a variable
//                $image_name = date('YmdHis').'_'.$image->getClientOriginalName();
//                //moving the image file
//                $image->move($this->image_path, $image_name);
//                $request->request->add(['fav_icon' => $image_name]);
//            }
//
//            if($request-> hasFile('logo_file')){
//                //initializing the image file
//                $image = $request->file('logo_file');
//                //storing the name of the image file to a variable
//                $image_name = date('YmdHis').'_'.$image->getClientOriginalName();
//                //moving the image file
//                $image->move($this->image_path, $image_name);
//                $request->request->add(['logo' => $image_name]);
//            }
//
//
//            request()->session()->flash('success_message', $this->panel. ' successfully updated');
//        }else{
//            request()->session()->flash('error_message', 'Invalid request');
//        }
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
            //deleting image files
            if($data['row']->fav_icon){

                if(file_exists($this->image_path. $data['row']->fav_icon)){
                    unlink($this->image_path. $data['row']->fav_icon);
                }
            }
            if($data['row']->logo){

                if(file_exists($this->image_path. $data['row']->logo)){
                    unlink($this->image_path. $data['row']->logo);
                }
            }
            request()->session()->flash('success_message', $this->panel. ' successfully deleted');
        }else{
            request()->session()->flash('error_message', 'Error deleting ' . $this->panel. '.');
        }
        return redirect()->route($this->base_route.'.index');
    }
}
