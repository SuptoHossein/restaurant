<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Food;
use App\Models\Cart;
use App\Models\Order;

class HomeController extends Controller
{
    public function index()
    {
        $foods = Food::all();
        $chefs = Chef::all();
        $userId = Auth::id();
        $count = Cart::where('user_id', $userId)->count();

        return view('home', compact(['foods', 'chefs', 'count']));
    }

    public function redirects()
    {
        $foods = Food::all();
        $chefs = Chef::all();

        $usertype = Auth::user()->usertype;

        if ($usertype == 1) {
            return view('admin.adminhome');
        } else {
            $userId = Auth::id();
            $count = Cart::where('user_id', $userId)->count();

            return view('home', compact(['foods', 'chefs', 'count']));
        }
    }

    public function addcart(Request $request, $id)
    {
        if (Auth::id()) {

            $userId = Auth::id();
            // $count = Cart::where('user_id', $userId)->count();
            $foodId = $id;
            $quantity = $request->quantity;


            $cart = new Cart();

            $cart->user_id = $userId;
            $cart->food_id = $foodId;
            $cart->quantity = $quantity;
            $cart->save();

            return redirect()->back();
        } else {
            return redirect('/login');
        }
    }

    public function showcart(Request $request, $id)
    {
        $count = Cart::where('user_id', $id)->count();
        $data = Cart::with('user', 'food')->where('user_id', $id)->get();

        return view('showcart', compact('count', 'data'));
    }


    public function orderconfirm(Request $request)
    {
        foreach ($request->foodname as $key => $foodname) {
            $data = new Order();
            $data->foodname = $foodname;
            $data->price = $request->price[$key];
            $data->quantity = $request->quantity[$key];
            $data->name = $request->name;
            $data->phone = $request->phone;
            $data->address = $request->address;
            $data->save();
        }

        return redirect()->back();
    }





    public function remove($id)
    {
        $data = Cart::find($id);
        $data->delete();
        return redirect()->back();
    }

}
