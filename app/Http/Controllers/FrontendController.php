<?php

namespace App\Http\Controllers;
use App\Models\Room;
use App\Models\Booking;
use Auth;
use Carbon\Carbon;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function __construct()
    {
        $this->model = new Room();

    }

    public function showrooms(){
        $rooms = [];
        $rooms['rows'] = $this->model->latest()->get();
        return view('frontend.rooms',compact('rooms'));
    }

    public function room_details($id){
        $room_details = [];
        $room_details = Room::where('id',$id)->first();

        return view('frontend.booking',compact('room_details'));


    }


    public function bookroom(Request $request){

        $start=Carbon::parse($request['checkinDate']);
        $end=Carbon::parse($request['checkoutDate']);

        $result = $start->diffInDays($end);


        $request->validate([
            'checkinDate' => 'required|date|after_or_equal:today',
            'checkoutDate' => 'required|date|after:today',
        //     'noOfAdults' => 'required|integer',
        //     'noOfChildren' => 'integer'
        ],[
            'checkinDate.required' => 'Checkin Date cannot be empty'
        ]);
            // $data = [];
            // $data['roomNo'] = Room::pluck('roomNo','id');

          $request->request->add(['user_id' => auth()->user()->id]);
            $request->request->add(['roomNo' => $request['roomNo']]);
            $request->request->add(['charge' => $request['charge']*$result]);
            Booking::create($request->all());
             return redirect()->route('mybookings');

    }

    public function mybookings(){
    $id = Auth::user()->id;
    $data = [];

    // $data['rooms'] = Room::get();
    $data['books'] = Booking::where('user_id',$id)->get();
    return view('frontend.mybookings',compact('data'));

    }

    public function delete($id){

        $data['row'] = Booking::where('id',$id)->first();

        $data['row']->delete();



        return redirect()->route('frontend.fronthome');

    }

}


