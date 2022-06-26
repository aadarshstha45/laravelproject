<?php

namespace App\Http\Controllers;
use App\Models\Room;
use Exception;

use Illuminate\Http\Request;

class ShowRoomController extends Controller
{
    public function __construct()
    {
        $this->model = new Room();

    }

    public function showrooms(){
        $rooms = [];
        $rooms['rows'] = $this->model->get();
        return view('frontend.rooms',compact('rooms'));
    }


    public function room_details($id){
        $room_details = [];
        $room_details = Room::where('id',$id)->get();
        return view('frontend.booking',compact('room_details'));
    }





}



