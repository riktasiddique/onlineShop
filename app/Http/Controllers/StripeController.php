<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Session;
use Stripe;
use Stripe\Customer;

class StripeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        \Stripe\Stripe::setApiKey('sk_test_51KjT64LhCgQtJMPd1XFKWPnjy370vX3TvtiMfY86cgftqSMfBCJg16jaFA0ccXSySrZus41q9WhCokbztYSF6mpf00qmYFaxA8');
		$amount = 700;
		$amount *= 55;
        $amount = (int) $amount;
        $user = Auth::user();
        $payment_intent = \Stripe\PaymentIntent::create([
			'description' => 'Stripe Test Payment',
			'amount' => $amount,
			'currency' => 'USD',
			'description' => 'Payment From Codehunger',
			'payment_method_types' => ['card'],
        	]);
            $intent = $payment_intent->client_secret;
            $order = new Order();
            $order->name = $user->name;
            $order->email = $user->email;
            $order->user_id = $user->id;
            $order->phone = 01533511156;
            $order->address = 'bhanga faridpur';
            $order->user_id = $user->id;
            $order->transaction_id = $intent;
            $order->currency = $payment_intent->currency;
            $order->amount = $payment_intent->amount;
            $order->status = 'Proccessing';
            $order->id;
            $order->save();
            $carts = Cart::where('user_id', $user->id)->get();
            foreach($carts as $cart){
            $order_item = new OrderItem();
            $order_item->order_id = $order->id;
            $order_item->user_id = $user->id;
            $order_item->product_id = $cart->product->id;
            $order_item->quantity = $cart->quantity;
            $order_item->save();
            $cart->delete();
        }
        // return view('payment.stripe', compact('intent'));
        $user = Auth::user();
        return view('payment.stripe', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
    // -----------------------------------------------------
                        // Custom Method
    // -----------------------------------------------------
    public function stripeStore(Request $request){
        Stripe\Stripe::setApiKey('sk_test_51KjT64LhCgQtJMPd1XFKWPnjy370vX3TvtiMfY86cgftqSMfBCJg16jaFA0ccXSySrZus41q9WhCokbztYSF6mpf00qmYFaxA8');
        $name = $request->name;
        $email = $request->email; 
        $phone = $request->phone;
        $address = $request->address;
        $amount = $request->amount;
       $charge = Stripe\Charge::create ([
            "amount" => $amount * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" =>'name: ' . $name . ' ' .'email: '. $email. ' '.'phone: ' . $phone .' ' .'address: '. $address,
        ]);
        
        $user = Auth::user();
        $order = new Order();
        $order->name = $name;
        $order->email = $email;
        $order->user_id = $user->id;
        $order->phone = $phone;
        $order->address = $address;
        $order->user_id = $user->id;
        $order->transaction_id = $request->stripeToken;
        $order->currency = 'USD';
        $order->amount = $request->amount;
        $order->status = 'Proccessing';
        $order->id;
        $order->save();
        $carts = Cart::where('user_id', $user->id)->get();
        foreach($carts as $cart){
        $order_item = new OrderItem();
        $order_item->order_id = $order->id;
        $order_item->user_id = $user->id;
        $order_item->product_id = $cart->product->id;
        $order_item->quantity = $cart->quantity;
        $order_item->save();
        $cart->delete();
        }
        return back()->with('success', 'Payment successful!');
    }
}
