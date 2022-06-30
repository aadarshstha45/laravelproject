<?php

namespace App\Http\Controllers;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Profile;
use Auth;
use App\Models\User;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FrontendController extends Controller
{
    public function __construct()
    {
        $this->model = new Room();

    }

    public function showrooms(){
        // $id = Auth::user()->id;
          $data = [];
        //  $data['row'] = User::where('id',$id)->first();
        $data['rows'] = Room::get();

        return view('frontend.rooms',compact('data'));
    }

    public function room_details($id){
         $user = Auth::user()->id;
          $data = [];
         $data['row'] = User::where('id',$user)->first();
         $room_details = [];
        $room_details = Room::where('id',$id)->first();

        return view('frontend.booking',compact('room_details','data'));


    }


    public function bookroom(Request $request){

        $checkin=Carbon::parse($request['checkinDate']);
        $checkout=Carbon::parse($request['checkoutDate']);


        $result = $checkin->diffInDays($checkout);


        $request->validate([
            'checkinDate' => 'required|date|after_or_equal:today',
            'checkoutDate' => 'required|date|after:checkinDate',
            'noOfAdults' => 'required|numeric|min:0|not_in:0',
        //     'noOfChildren' => 'integer'
        ],[
            'checkinDate.required' => 'Checkin Date cannot be empty',
            'checkoutDate.required' => 'Checkout Date cannot be empty',
            'noOfAdults.required' => 'There should be atleast 1 person',
            'checkinDate.after_or_equal' => 'Checkin Date cannot be set in past',
            'checkoutDate.after' => 'Checkot Date must be after checkinDate',
            'noOfAdults.min' => 'There should be atleast 1 person'


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
    // $data['row'] = Booking::where('id',$id)->first();
    $data['books'] = Booking::where('user_id',$id)->get();
    return view('frontend.mybookings',compact('data'));

    }

    public function cancel($id){


        $data['row'] = Booking::where('id',$id)->first();
        $data['row']->delete();

        return redirect()->route('mybookings');

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
        $user = User::find($id);
        // $request = request();
        if ($request->hasFile('image')) {
            $old = 'images/'.$user->images;
            if(File::exists($old)){
                File::delete($old);
            }
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $image->move('images/', $image_name);
            $user->update(['images' => $image_name]);


        }

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
    public function home(){

        $data = [];
        //  $data['row'] = User::where('id',$id)->first();
        $data['rows'] = Room::get();
        // $data['row'] = User::where('id',$id)->first();
        return view('frontend.fronthome',compact('data'));

    }

public function aboutus(){

    // $id = Auth::user()->id;
    // $data = [];
    // $data['row'] = User::where('id',$id)->first();
    // return view('frontend.aboutus',compact('data'));
    return view('frontend.aboutus');

}

public function contactus(){

    // $id = Auth::user()->id;
    // $data = [];

    // // $data['rooms'] = Room::get();
    // $data['row'] = User::where('id',$id)->first();
    // return view('frontend.contactus',compact('data'));
    return view('frontend.contactus');

}
}
