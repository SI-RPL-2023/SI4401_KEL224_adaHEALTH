<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    function index(){
        return view('LandingPage', ['title'=>'Home']);
    }

    function show($id){
        $user = User::find($id);

        $userdetail = User::where('user_id', $id);

        return view('editprofile', ['user' => $user], ['title'=>'Detail Profile',
        'userdetail' => $userdetail,
    ]);
    }

    public function edit(Request $request, $id)
        {
            $data = $request->all();

            $user = User::find($id);
            $user->email = $data['email'];
            $user->phone = $data['phone'];
            $user->password = bcrypt($data['password']);
            if ($request->hasFile('image')) {
                $img = Storage::disk('public')->put('img', $request->file('image'));
                $user->photo = $img;
            }
            $user->save();

            return redirect('/')->with('success', 'Edit Success');
        }
}
