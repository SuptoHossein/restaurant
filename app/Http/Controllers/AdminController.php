<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Food;
use App\Models\Reservation;
use App\Models\Chef;
use App\Models\Order;

class AdminController extends Controller
{
    public function user()
    {
        $datas = User::all();
        return view('admin.users', compact('datas'));
    }

    public function deleteuser($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function foodmenu()
    {
        $data = Food::all();
        return view('admin.foodmenu', compact('data'));
    }

    public function upload(Request $request)
    {
        $data = new Food();

        $image = $request->image;
        $imageName = time(). '.' .$image->getClientOriginalExtension();
        $request->image->move('foodimage', $imageName);
        $data->image = $imageName;
        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description;
        $data->save();

        return redirect()->back();
    }

    public function updateview($id)
    {
        $data = Food::find($id);
        return view('admin.updateview', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Food::find($id);

        $image = $request->image;
        $imageName = time(). '.' .$image->getClientOriginalExtension();
        $request->image->move('foodimage', $imageName);
        $data->image = $imageName;
        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description;
        $data->save();

        return redirect()->back();
    }



    public function deletemenu($id)
    {
        $data = Food::find($id);


        if ($data) {
            if (file_exists(public_path('/foodimage/' . $data->image))) {
                unlink(public_path('/foodimage/' . $data->image ));
            }

            $data->delete();
        }

        return redirect()->back();
    }



    public function reservation(Request $request)
    {
        $data = new Reservation();

        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->guest = $request->guest;
        $data->date = $request->date;
        $data->time = $request->time;
        $data->message = $request->message;
        $data->save();

        return redirect()->back();
    }

    public function viewreservation()
    {
        $data = Reservation::all();
        return view('admin.adminreservation', compact('data'));
    }


    public function chefs()
    {
        $data = Chef::all();
        return view('admin.chefs', compact('data'));
    }

    public function chefstore(Request $request)
    {
        $data = new Chef();

        $image = $request->image;
        $imageName = time(). '.' .$image->getClientOriginalExtension();
        $request->image->move('chefImage', $imageName);
        $data->image = $imageName;
        $data->name = $request->name;
        $data->designation = $request->designation;
        $data->facebook = $request->facebook;
        $data->twitter = $request->twitter;
        $data->instagram = $request->instagram;
        $data->save();

        return redirect()->back();
    }

    public function chefEdit($id)
    {
        $data = Chef::find($id);
        return view('admin.chefEdit', compact('data'));
    }

    public function chefUpdate(Request $request, $id)
    {
        $data = Chef::find($id);

        $image = $request->image;
        $imageName = time(). '.' .$image->getClientOriginalExtension();
        $request->image->move('chefImage', $imageName);
        $data->image = $imageName;
        $data->name = $request->name;
        $data->designation = $request->designation;
        $data->facebook = $request->facebook;
        $data->twitter = $request->twitter;
        $data->instagram = $request->instagram;
        $data->save();

        return redirect()->back();

    }


    public function orders()
    {
        $data = Order::all();
        return view('admin.orders', compact('data'));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $data = Order::where('name', 'like', '%'.$search.'%')->get();
        // dd($data);

        return view('amdin.orders', compact('data'));
    }
}
