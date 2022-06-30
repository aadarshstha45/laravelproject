<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $view_path = 'admin.user.';

    public function __construct()
    {
        $this->model = new User();

    }

    public function index(){

        $data = [];

        $data['rows'] = $this->model->latest()->get();

        return view($this->view_path.'index',compact('data'));
    }
    public function show($id){
        $data = [];

        $data['row'] = $this->model->where('id',$id)->first();

        return view('admin.user.show',compact('data'));
    }

    public function dashboard(){
  if (Auth::user()->user_type == 'admin'){
        return view('admin.dashboard');
    }else{
        abort(403);
    }
}
}
