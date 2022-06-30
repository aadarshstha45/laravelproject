<?php
namespace App\Http\Controllers;
use App\Models\Room;
use App\Models\Booking;
use App\Models\User;
use Auth;
use Exception;

use Illuminate\Http\Request;

class BookingsController extends Controller
{


    public function bookingslist(){
        $data = [];
        $data['books'] = Booking::get();
        return view('admin.bookings.index',compact('data'));

        }

        public function details($id){

            $data = [];
            $data['books'] = Booking::where('id',$id)->first();
            return view('admin.bookings.show',compact('data'));
        }
    }


