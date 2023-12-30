<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Reservatiom;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function user(){
        $users=User::all();
        return view('user.user',[
            'users'=>$users
        ]);
    }
    function user_remove($id){
        User::find($id)->delete();
    }
    function food(){
        $food=Food::all();
        return view('admin.food',[
            'foods'=>$food,
        ]);
    }
    function food_store(Request $request){
       $image=$request->image;
       $extension=$image->extension();
       $file_name=time().'.'.$extension;
       $image->move(public_path('upload/food/'), $file_name);
       $data=new Food();
       $data->title=$request->title;
       $data->price=$request->price;
       $data->image=$file_name;
       $data->description=$request->desp;
       $data->save();


    }
    function reservation_store(Request $request){
       $data=new Reservatiom();
       $data->name=$request->name;
       $data->email=$request->email;
       $data->phone=$request->phone;
       $data->guest=$request->guests;
       $data->time=$request->time;
       $data->date=$request->date;
       $data->message=$request->message;
       $data->save();
    }
}
