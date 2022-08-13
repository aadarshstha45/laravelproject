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


    public function khaltipayment(Request $request){

        $amount = $request->amount;
        $token = $request->token;
        $test_secret_key = config('app.khalti_secret_key');
        $args = http_build_query(array(
            'token' => $token,
            'amount'  => $amount
        ));

        $url = "https://khalti.com/api/v2/payment/verify/";

        # Make the call using API.
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$args);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $headers = ["Authorization: Key $test_secret_key"];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // Response
        $response = curl_exec($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        $token = json_decode($response, TRUE);

        if (isset($token['idx'])&& $status_code == 200)
        {
    $payment =new Payment;
    $payment->transactionId=$token['idx'];
    $payment->amount=$token['amount'];
    $payment->paidBy=auth()->user()->id;
    $payment->paidFor=$token['product_identity'];
    $payment->status='Completed';
    $payment->save();
       return $response;
    }
}
    public function khaltipaymentstore(){

    }

}
