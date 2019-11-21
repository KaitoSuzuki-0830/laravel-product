<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;

class PaymentController extends Controller
{
    public function pay(Request $request){
        Stripe::setApiKey('STRIPE_SECRET');

        $charge = Charge::create(array(
            'amount'=>100,
            'currency'=>'jpy',
            'source'=>request()->stripeToken,
        ));
        return back();
    }
}
