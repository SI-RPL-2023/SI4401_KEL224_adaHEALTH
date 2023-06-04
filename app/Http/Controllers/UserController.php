<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use DB;

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
            $user = User::find($id);

            if (!$user) {
                return redirect()->back()->with('error', 'User not found.');
            }
        
            // Validasi input
            // $validatedData = $request->validate([
            //     'name' => 'required',
            //     'date_birth' => 'required',
            //     'gender' => 'required',
            //     'address' => 'required',
            //     'email' => 'required|email',
            //     'phone' => 'required',
            //     'password' => 'required',
            // ]);
            if($request->hasFile('photo')) {
                $imageName = $request->file('photo');
                $imageName->store('upload/profile', ['disk' => 'public_uploads']);
    
                //delete gambar image
                if($user->photo != null) {
                    $path = public_path('upload/profile/'.$user->photo);
                    if(file_exists($path)) {
                        unlink($path);
                    } else {
                        $user->photo = $imageName->hashName();
                        // return response()->json(['message' => 'File not found.'], 404);
                    }
                }
    
                // Simpan nama gambar yang baru ke dalam database
                $user->photo = $imageName->hashName(); // atau $imageName->getClientOriginalName()
            }
            // Update field pada model User
            $user->name = $request->input('name');
            $user->date_birth = $request->input('date_birth');
            $user->gender = $request->input('gender');
            $user->address = $request->input('address');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            if(!empty($request->password)){
                $user->password = Hash::make($request->password);
            }


            
            $user->save();

            return redirect('/')->with('success', 'Edit Success');
        }

        function riwayat_konsultasi() {
            $konsultasi = DB::table('konsultasi as a')
                        ->join('users as b', 'a.id_dokter', '=', 'b.id')
                        ->join('users as c', 'a.id_pasien', '=', 'c.id')
                        ->join('dokters as d', 'b.email', '=', 'd.email')
                        ->select('a.*', 'b.name as nama_dokter', 'c.name as nama_pasien', 'd.spesialis')
                        ->where('a.id_pasien', '=', Auth::user()->id)
                        ->get();
            return view('riwayat-konsultasi-pasien-view', compact('konsultasi'));
        }
}
