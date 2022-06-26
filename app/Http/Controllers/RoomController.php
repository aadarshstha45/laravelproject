<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomCategory;
use Exception;
use Illuminate\Http\UploadedFile;

use Illuminate\Http\Request;

class RoomController extends Controller
{
    private $model;
    protected $view_path = 'admin.room.';

    public function __construct()
    {
        $this->model = new Room();

    }

    public function index(){

        $data = [];

        $data['rows'] = $this->model->get();
        return view($this->view_path.'index',compact('data'));
    }

    public function create(){

        $data = [];
        $data['room_categories'] = RoomCategory::pluck('category','id');
        return view('admin.room.create',compact('data'));
    }

    public function store(Request $request){

        $request->validate([
            'roomNo' => 'required|unique:rooms',
            'room_categories_id'   => 'required|integer',
            'status' => 'required|string'

        ],
    [
        'roomNo.required' => 'Enter Room Number',
        'room_categories_id.required' => 'Select Room Category',
        'status.required' => 'Select Room Status'
    ]);

        //Image Upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name =$image->getClientOriginalName();
            $image->move('images/', $image_name);
            $request->request->add(['images' => $image_name]);
        }


     //   try{
            $request->request->add(['addedBy' => auth()->user()->id]);

            $this->model->create($request->all());
        //    session()->flash('success_message','Data Inserted Successfully');
        // }
        // catch(Exception $e){
        //   session()->flash('error_message','Something Went Wrong!!');
        // }

        return redirect()->route('room.index');

    }

    public function show($id){

        $data = [];

        $data['row'] = $this->model->where('id',$id)->first();
        return view('admin.room.show',compact('data'));
    }

    public function edit($id){


        $data = [];

        $data['room_categories'] = RoomCategory::pluck('category','id');


        $data['row'] = $this->model->where('id',$id)->first();
        return view('admin.room.edit',compact('data'));
    }

    public function update(Request $request,$id){

        //validation
        $request->validate([
            'roomNo' => 'required|integer',
            'room_categories_id'   => 'required|integer',

        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name =$image->getClientOriginalName();
            $image->move('images/', $image_name);
            $request->request->add(['images' => $image_name]);
        }
        try{
            $data['row'] = $this->model->where('id',$id)->first();
            $data['row']->update($request->all());
            session()->flash('success_message','Data Updated Successfully');
        }
        catch(Exception $e){
            session()->flash('error_message','Something Went Wrong!!');
        }

        return redirect()->route('room.index');

    }

    public function delete($id){

        $data['row'] = $this->model->where('id',$id)->first();

        $data['row']->delete();

        session()->flash('success_message','Data Deleted Successfully');

        return redirect()->route('room.index');

    }
}
