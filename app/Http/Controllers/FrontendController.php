<?php

namespace App\Http\Controllers;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Profile;
use Auth;
use App\Models\User;
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
        $rooms['rows'] = $this->model->get();
        return view('frontend.rooms',compact('rooms'));
    }

    public function room_details($id){
        $room_details = [];
        $room_details = Room::where('id',$id)->first();

        return view('frontend.booking',compact('room_details'));


    }


    public function bookroom(Request $request){

        $checkin=Carbon::parse($request['checkinDate']);
        $checkout=Carbon::parse($request['checkoutDate']);

        $result = $checkin->diffInDays($checkout);


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
    public function myprofile(){

        $id = Auth::user()->id;
        $data = [];

        // $data['rooms'] = Room::get();
        $data['row'] = User::where('id',$id)->first();
        return view('frontend.myprofile',compact('data'));

    }

    public function myprofile_edit($id){

        $id = Auth::user()->id;
        $data = [];
        $data['row'] = User::where('id',$id)->first();
        return view('frontend.myprofileedit',compact('data'));
    }

    public function myprofile_update(Request $request,$id){

        try{
        $data['row'] = User::where('id',$id)->first();

            $data['row']->update($request->all());
            session()->flash('success_message','Profile Updated Successfully');
        }
        catch(\Exception $e){
            session()->flash('error_message','Something Went Wrong!!');

        }
        return redirect()->route('myprofile');

    }
}


