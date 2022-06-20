<?php

namespace App\Http\Controllers;

use App\Models\CarBrand;
use Illuminate\Http\Request;

class CarBrandController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new CarBrand();

    }

    public function index(){

        $data = [];

        $data['rows'] = $this->model->latest()->get();

        return  view('admin.carbrand.index',compact('data'));
    }

    public function create(){

        return  view('admin.carbrand.create');
    }

    public function store(Request $request){

        //validation
        $request->validate([
            'brand' => 'required',
        ]);

        try{
            $this->model->create($request->all());
            session()->flash('success_message','Data Inserted Successfully');
        }
        catch(\Exception $e){
            session()->flash('error_message','Something Went Wrong!!');
        }

        return redirect()->route('carbrand.index');

    }

    public function show($id){

        $data = [];

        $data['row'] = $this->model->findOrFail($id);

        return  view('admin.carbrand.show',compact('data'));
    }

    public function edit($id){

        $data = [];

        $data['row'] = $this->model->findOrFail($id);

        return  view('admin.carbrand.edit',compact('data'));
    }

    public function update(Request $request,$id){

        //validation
        $request->validate([
            'brand' => 'required',
        ]);

        try{
            $data['row'] = $this->model->find($id);
            $data['row']->update($request->all());
            session()->flash('success_message','Data Updated Successfully');
        }
        catch(\Exception $e){
            session()->flash('error_message','Something Went Wrong!!');
        }

        return redirect()->route('carbrand.index');

    }

    public function delete($id){

        $data['row'] = $this->model->find($id);

        $data['row']->delete();

        session()->flash('success_message','Data Deleted Successfully');

        return redirect()->route('carbrand.index');

    }
}
