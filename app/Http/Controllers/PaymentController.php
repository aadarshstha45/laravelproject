<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    protected $view_path = 'admin.payment.';

    public function __construct()
    {
        $this->model = new Payment();

    }

    public function index(){

        $data = [];

        $data['rows'] = $this->model->latest()->get();

        return view($this->view_path.'index',compact('data'));
    }
    public function show($id){

        $data = [];

        $data['row'] = $this->model->where('id',$id)->first();

        return view('admin.payment.show',compact('data'));
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
