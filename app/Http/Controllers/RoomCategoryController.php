<?php

namespace App\Http\Controllers;

use App\Models\RoomCategory;
use Illuminate\Http\Request;

class RoomCategoryController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new RoomCategory();

    }

    public function index(){

        $data = [];

        $data['rows'] = $this->model->latest()->get();

        return  view('admin.roomcategory.index',compact('data'));
    }

    public function create(){

        return  view('admin.roomcategory.create');
    }

    public function store(Request $request){

        //validation
        $request->validate([
            'category' => 'required'
        ],
    [
        'category.required' => 'Please Select Category'
    ]);


        try{
            $this->model->create($request->all());
            session()->flash('success_message','Data Inserted Successfully');
        }
        catch(\Exception $e){
            session()->flash('error_message','Something Went Wrong!!');
        }

        return redirect()->route('roomcategory.index');

    }

    public function show($id){

        $data = [];

        $data['row'] = $this->model->findOrFail($id);

        return  view('admin.roomcategory.show',compact('data'));
    }

    public function edit($id){

        $data = [];

        $data['row'] = $this->model->findOrFail($id);

        return  view('admin.roomcategory.edit',compact('data'));
    }

    public function update(Request $request,$id){

        //validation
        $request->validate([
            'category' => 'required'

        ]);

        try{
            $data['row'] = $this->model->find($id);
            $data['row']->update($request->all());
            session()->flash('success_message','Data Updated Successfully');
        }
        catch(\Exception $e){
            session()->flash('error_message','Something Went Wrong!!');
        }

        return redirect()->route('roomcategory.index');

    }

    public function delete($id){

        $data['row'] = $this->model->find($id);

        $data['row']->delete();

        session()->flash('success_message','Data Deleted Successfully');

        return redirect()->route('roomcategory.index');

    }
}
