<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\MainCategory;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use App\Models\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    // ------------------------------------------------
                    // Custom Method
    // ------------------------------------------------
    public function category()
    {
        $products = Product::all()->random(3);
        $categories = MainCategory::all();
        return view('front.home.categories', compact('categories', 'products'));
    }
    public function product()
    {
        $products = Product::latest()->get();
        return view('front.home.product', compact('products'));
    }
    public function productView($id)
    {
        $product = Product::FindOrFail($id);
        return view('front.home.product-details', compact('product'));
    }
    public function addCartStore(Request $request, $id)
    {
        $user = Auth::user();
        $product = Product::find($id);
        $cart = new Cart();
        $cart->user_id = $user->id;
        $cart->product_id = $product->id;
        $cart->quantity = $request->quantity;
        $cart->save();
        return redirect()->route('home.addCart')->with('success', 'An item is added in your cart successfuly!');
    }
    public function wishList(){
        $user = Auth::user();
        $wishLists = WishList::Where('user_id', $user->id)->get();
        return view('front.home.wish-list', compact('wishLists', 'user'));
    }
    public function wishListStore(Product $product)
    {
        $user = Auth::user();
        $wishList = new WishList();
        $wishList->user_id = $user->id;
        $wishList->product_id = $product->id;
        $wishList->save();
        return back()->with('success', 'A new product added in your wish list!');
    }
    public function wishListDestroy($id)
    {
        $wishList = WishList::findOrFail($id);
        $wishList->delete();
        return back()->with('success', 'A new product delated from your wish list!');
    }
    public function homeAddCart(){
        $user = Auth::user();
        $addCarts = Cart::Where('user_id', $user->id)->get();
        return view('front.home.add-cart', compact('addCarts', 'user'));
    }
    public function choseOrder(Request $request){
        if($request->input('delivery_type') == 'national_card'){
            return redirect()->route('home.payment');
        }elseif($request->input('delivery_type') == 'international_card'){
            return redirect()->route('stripe.index');
        }elseif($request->input('delivery_type') == 'cash_on_delivery'){
            return redirect()->route('home.cash_on_delivery');
        }
        return back()->with('error', 'অনুগ্রহ করে পেমেন্ট ধরন নির্বাচন করুন!');
    }
    public function myDeal(){
        $user = Auth::user();
        $orders = Order::Where('user_id', $user->id)->latest()->get();
        return view('front.home.my_deal', compact('orders'));
    }
    public function myDealView($id){
        $user = Auth::user();
        $order_items = OrderItem::Where('order_id', $id)->get();
        $order = Order::find($id);
        return view('front.home.my_deal_details', compact('user', 'order_items', 'order'));
    }
    public function cashOnDelivery(){
        $user = Auth::user();
        $carts  = Cart::Where('user_id', $user->id)->get();
        if(count($carts)< 1){
            return redirect('/')->with('error', 'Please add some product in your cart and then pay !!');
        }
        return view('payment.cashOnDelivery', compact('carts', 'user'));
    }
    public function cashOnDeliveryStore(Request $request){
        
        $user = Auth::user();
        $post_data['tran_id'] = uniqid();
        $order = new Order();
        $order->name = $request->name;
        $order->email = $request->email;
        $order->user_id = $user->id;
        $order->phone = $request->phone;
        $order->amount = $request->total;
        $order->status = 'Pending';
        $order->address = $request->address;
        $order->transaction_id = $post_data['tran_id'];
        $order->currency = 'BDT';
        $order->delivery_type = 'Cash On Delivery';
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
        return redirect('/')->with('success', 'Your Order Placed successfuly!');
    }
    public function profile(){
        $user = Auth::user();
        return view('front.home.profile', compact('user'));
    }
    public function changePassword(Request $request){
        
        // $hashedPassword = Auth::user()->password;
        // if(!(Hash::check($request->oldPassword, $hashedPassword))){
        //     return back()->with('error', 'Your Old Password not Matched!');
        // }elseif(!$request->newPassword || ($request->newPassword !== $request->confirmPassword)){
        //     return back()->with('error','Both Password Should be same!');
        // }
        // $user = User::find(auth()->id());
        // $newPassword = Hash::make($request->newpassword);
        // $user->password = $newPassword;
        // $user->save();
        // return back()->with('success', 'Your Password Changed Successfuly!');

        $request->validate([
            'newPassword' => 'required|min:8',
        ]);
        if(!$request->newPassword || (!$request->newPassword == $request->confirmPassword)){
            return back()->with('error', 'Both password should be same!');
        }
        else{
            $matchedOldPassword = Hash::check($request->oldPassword, auth()->user()->password);
            if(!$matchedOldPassword){
                return back()->with('error', 'Old password not matched!');
            }else{
                $hashNewPassword = Hash::make($request->newPassword);
                $user = User::find(auth()->id());
                $user->password = $hashNewPassword;
                $user->save();
                return back()->with('success', 'The password changed successfuly!');
            }
        }
       
    }
    public function contact(){
        return view('front.home.contact');
    }
    public function contactStore(Request $request){
        return $request->all();
    }
}
