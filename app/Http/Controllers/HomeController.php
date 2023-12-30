<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Food;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    function index(){
        $food=Food::all();
        $count=Cart::where('user_id',Auth::id())->count();
        return view('frontend.index',[
            'foods'=>$food,
            'count'=>$count
        ]);
    }
    function redirects(){
        $user_type=Auth::user()->user_type;
        if($user_type=='1'){
            return view('admin.admin');
        }
        else{
            $food=Food::all();
            $count=Cart::where('user_id',Auth::id())->count();
            return view('frontend.index',[
                'foods'=>$food,
                'count'=>$count
            ]);
        }
    }
    function artocart_store(Request $request,$id){
        if(Auth::id()){
            $user_id=Auth::id();
            $food_id=$id;
            $quantity=$request->quantity;
            $cart=new Cart();
            $cart->user_id=$user_id;
            $cart->food_id=$food_id;
            $cart->quantity=$quantity;
            $cart->save();

            return redirect()->route('index');
        }
        else{
            return redirect('/login');
        }
    }
    function cart_list($id){
        $cart=Cart::where('user_id',$id)->get();
        return view('frontend.cart_list',[
            'cart'=>$cart
        ]);
    }
    function order(Request $request){
       foreach($request->foodname as $key=>$foodname){
        $data=new Order();
        $data->foodname=$foodname;
        $data->price=$request->price[$key];
        $data->quantity=$request->quantity[$key];
        $data->name=$request->name;
        $data->phone=$request->phone;
        $data->address=$request->address;
        $data->save();


       }
    }
}
