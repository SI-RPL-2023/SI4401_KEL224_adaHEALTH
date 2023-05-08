<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Storage;
use Session;
session_start();
use App\Models\Hospital;
use App\Models\Apotek;
use App\Models\Obat;
use Carbon\Carbon;


class AdminController extends Controller
{
    public function index(Request $request)
    {
        echo 'Ini adalah halaman berandanya Administrator';       
    }

    // DOKTER CRUD
    public function dokter_view() {
        $dokter = Dokter::all();
        return view('dokter', compact('dokter'));
    }
    public function form_tambah() {
        return view('dokter-form-tambah');
    }

    public function form_save(Request $request)
    {
        $params = $request->all();
        // validate the input data
        $validatedData = $request->validate([
            'nama_dokter' => 'required',
            'email' => 'required|email|unique:dokters',
            'password' => 'required',
            'foto' => 'required'
        ]);

        $image = $request->file('foto');
        $image->store('upload/dokter', ['disk' => 'public_uploads']);

        // create a new dokter instance with the validated data
        $dokter = new Dokter([
            'nama_dokter' => $validatedData['nama_dokter'],
            'spesialis' => $params['spesialis'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'foto' => $image->hashName(),
            'alamat' => $params['alamat'],
            'no_telp' => $params['no_telp'],
            'gender' => $params['gender'],
            'tanggal_lahir' => $params['tanggal_lahir'],
            'role' => 'dokter',
            'jam_buka' => $params['jam_buka'],
            'jam_tutup' => $params['jam_tutup']
        ]);

        // save the dokter instance to the database
        $dokter->save();

        // return a response indicating success
        // return response()->json(['message' => 'User created successfully'], 201);
        return redirect()->to('dokter')->with('success', 'Data berhasil ditambahkan');
    }

    public function form_edit($id) {
        $id = Crypt::decryptString($id);

        $dokter = Dokter::findOrFail($id);
        if($dokter){
            return view('dokter-form-edit', compact('dokter'));
        }
    }

    public function form_update(Request $request, User $user, $id) {
        $id = Crypt::decryptString($id);

        $dokter = Dokter::findOrFail($id);
        $params = $request->all();
        if($dokter) {
            // validate the input data
            $validatedData = $request->validate([
                'nama_dokter' => 'required',
                'email' => 'required|email|unique:dokters'.',id,'.$user->id,
            ]);

            if($request->hasFile('foto')) 
            {
                $image = $request->file('foto');
                // $image->store('upload/dokter', ['disk' => 'public']);
                $image->store('upload/dokter', ['disk' => 'public_uploads']);

                //delete old image
                if($dokter->foto != null)
                {
                    // $path = storage_path('app/public/upload/dokter/'.$dokter->foto);
                    $path = public_path('upload/dokter/'.$dokter->foto);
                    if(file_exists($path)) 
                    {
                        unlink($path);

                        // Storage::delete('public/upload/dokter/'.$dokter->foto);
                    } else {
                        return response()->json(['message' => 'File not found.'], 404);
                    }
                }

                $res = Dokter::where('id', $id)->update([
                    'nama_dokter' => $validatedData['nama_dokter'],
                    'spesialis' => $params['spesialis'],
                    'email' => $validatedData['email'],
                    'foto' => $image->hashName(),
                    'alamat' => $params['alamat'],
                    'no_telp' => $params['no_telp'],
                    'gender' => $params['gender'],
                    'tanggal_lahir' => $params['tanggal_lahir'],
                    'role' => 'dokter',
                    'jam_buka' => $params['jam_buka'],
                    'jam_tutup' => $params['jam_tutup']
                ]);
            } else {
                $res = Dokter::where('id', $id)->update([
                    'nama_dokter' => $validatedData['nama_dokter'],
                    'spesialis' => $params['spesialis'],
                    'email' => $validatedData['email'],
                    'alamat' => $params['alamat'],
                    'no_telp' => $params['no_telp'],
                    'gender' => $params['gender'],
                    'tanggal_lahir' => $params['tanggal_lahir'],
                    'role' => 'dokter',
                    'jam_buka' => $params['jam_buka'],
                    'jam_tutup' => $params['jam_tutup']
                ]);
            }

            return redirect()->to('dokter')->with('success', 'Data berhasil diubah');
        }
    }

    public function form_delete($id) {
        $id = Crypt::decryptString($id);

        $dokter = Dokter::findOrFail($id);
        if($dokter) {
            //delete old image
            if($dokter->foto != null)
            {
                // $path = storage_path('app/public/upload/dokter/'.$dokter->foto);
                $path = public_path('upload/dokter/'.$dokter->foto);
                if(file_exists($path)) 
                {
                    unlink($path);

                    // Storage::delete('public/upload/dokter/'.$dokter->foto);
                } else {
                    return response()->json(['message' => 'File not found.'], 404);
                }
            }
            
            $res = Dokter::where('id', $id)->delete();
            
            return redirect()->to('dokter')->with('success', 'Data berhasil dihapus');
        }
    }
    // END OF DOKTER CRUD
        // Kalender
        $date = Carbon::now(); // tanggal saat ini
        $month = $request->get('month') ?? $date->month; // ambil bulan dari parameter url, atau gunakan bulan saat ini
        $year = $request->get('year') ?? $date->year; // ambil tahun dari parameter url, atau gunakan tahun saat ini
        $daysInMonth = Carbon::create($year, $month)->daysInMonth; // jumlah hari dalam bulan tersebut
        //Kalender

        $totalUsers = User::count();
        $totalHospital = Hospital::count();
        $totalApotek = Apotek::count();
        $totalObat = Obat::count();
        $dokter = User::where('roles', '2')->get();

        $totalNew = User::whereDate('created_at', Carbon::today())->count();

        return view('admin.dashboard',[
        'totalUsers' => $totalUsers,
        'totalHospital' =>  $totalHospital,
        'totalApotek' =>  $totalApotek,
        'totalObat' =>  $totalObat,
        'dokter' =>  $dokter,
        'days' => $date,
        'month' => $month,
        'year' => $year,
        'daysInMonth' => $daysInMonth
        // 'totalNew' => $totalNew

        ]);
    }


}
