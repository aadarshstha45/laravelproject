<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarBrand;
use Exception;
use Illuminate\Http\Request;

class CarController extends Controller
{
    private $model;
    protected $view_path = 'admin.car.';

    public function __construct()
    {
        $this->model = new Car();

    }

    public function index(){

        $data = [];

        $data['rows'] = $this->model->latest()->get();

        return view($this->view_path.'index',compact('data'));
    }

    public function create(){

        $data = [];
        $data['car_brands'] = CarBrand::pluck('brand','id');

        return view('admin.car.create',compact('data'));
    }

    public function store(Request $request){

        $request->validate([
            'car_brand_id'   => 'required|integer',
            'car_name' => 'required|string|max:255',
            'plate_no' => 'required|string|max:255|unique:cars',
            'image_field' => 'nullable|image|max:2048',
        ]);

        // Image Upload
        if ($request->hasFile('image_field')) {
            $image = $request->file('image_field');
            $image_name = time().'_'.$image->getClientOriginalName();
            $image->move('images/cars', $image_name);
            $request->request->add(['logo' => $image_name]);
        }

        try{
            $request->request->add(['created_by' => auth()->user()->id]);
            $this->model->create($request->all());
           session()->flash('success_message','Data Inserted Successfully');
        }
        catch(\Exception $e){
          session()->flash('error_message','Something Went Wrong!!');
        }

        return redirect()->route('car.index');

    }

    public function show($id){

        $data = [];

        $data['row'] = $this->model->where('id',$id)->first();

        return view('admin.car.show',compact('data'));
    }

    public function edit($id){


        $data = [];

        $data['car_brands'] = CarBrand::pluck('brand','id');

        $data['row'] = $this->model->where('id',$id)->first();

        return view('admin.car.edit',compact('data'));
    }

    public function update(Request $request,$id){

        //validation
        $request->validate([
            'car_brand_id'   => 'required|integer',
            'car_name' => 'required|string|max:255',
            'plate_no' => 'required|string|max:255|unique:cars',
        ]);
        if ($request->hasFile('image_field')) {
            $image = $request->file('image_field');
            $image_name = time().'_'.$image->getClientOriginalName();
            $image->move('images/cars', $image_name);
            $request->request->add(['logo' => $image_name]);
        }
        try{
            $data['row'] = $this->model->where('id',$id)->first();
            $data['row']->update($request->all());
            session()->flash('success_message','Data Updated Successfully');
        }
        catch(\Exception $e){
            session()->flash('error_message','Something Went Wrong!!');
        }

        return redirect()->route('car.index');

    }

    public function delete($id){

        $data['row'] = $this->model->where('id',$id)->first();

        $data['row']->delete();

        session()->flash('success_message','Data Deleted Successfully');

        return redirect()->route('car.index');

    }
}
