<?php
namespace App\Http\Controllers;
use App\Models\Room;
use App\Models\Booking;
use App\Models\User;
use Auth;
use Exception;

use Illuminate\Http\Request;

class MyBookingsController extends Controller
{


    public function mybookings(){

        $id = Auth::user()->id;
        $data = [];

        $data['rooms'] = Room::get();
        $data['books'] = Booking::where('user_id',$id)->get();
        return view('frontend.mybookings',compact('data'));

        }

        public function delete($id){

            $data['row'] = Booking::where('id',$id)->first();

            $data['row']->delete();



            return redirect()->route('frontend.fronthome');

        }

}



