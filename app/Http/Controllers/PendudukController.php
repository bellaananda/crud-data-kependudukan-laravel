<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use Illuminate\Http\Request;
use App\Http\Requests\StorePendudukRequest;
use App\Http\Requests\UpdatePendudukRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penduduk = DB::table('penduduks')->select('*')->get();
        $data = ['penduduk' => $penduduk];
        return view('penduduk.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penduduk.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePendudukRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|min:16|max:16',
            'name' => 'required|min:3|max:255',
            'gender' => 'required',
            'marital_status' => 'required',
            'profession' => 'required|max:255',
            'citizenship' => 'required',
            'birthplace' => 'required',
            'birthdate' => 'required',
            'bloodtype' => 'required',
            'address' => 'required',
            'upload_image' => 'required',
        ]);

        $nik = $request->old('nik');
        $name = $request->old('name');
        $gender = $request->old('gender');
        $marital_status = $request->old('marital_status');
        $profession = $request->old('profession');
        $citizenship = $request->old('citizenship');
        $birthplace = $request->old('birthplace');
        $birthdate = $request->old('birthdate');
        $bloodtype = $request->old('bloodtype');
        $address = $request->old('address');
        $upload_image = $request->old('upload_image');
        
        
        $image = $request->file('upload_image');
        // $image_name = $image->getClientOriginalName();
        $folder = 'uploads';
        $extension = $image->getClientOriginalExtension();
        $image_newname = Str::uuid().".".$extension;
        $image->move($folder, $image_newname);

        $penduduk = new Penduduk();
        $penduduk->nik = $request->nik;
        $penduduk->name = ucwords($request->name);
        $penduduk->gender = $request->gender;
        $penduduk->marital_status = $request->marital_status;
        $penduduk->profession = ucwords($request->profession);
        $penduduk->citizenship = $request->citizenship;
        $penduduk->birthplace = ucwords($request->birthplace);
        $penduduk->birthdate = $request->birthdate;
        $penduduk->bloodtype = $request->bloodtype;
        $penduduk->address = $request->address;
        $penduduk->image = $image_newname;
        $penduduk->save();

        return redirect('/penduduk')->with('success_message', 'Data penduduk berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function show(Penduduk $penduduk)
    {
        $data = ['warga' => $penduduk];
        return view('penduduk.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function edit(Penduduk $penduduk)
    {
        $data = ['warga' => $penduduk];
        return view('penduduk.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePendudukRequest  $request
     * @param  \App\Models\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penduduk $penduduk)
    {
        $request->validate([
            'nik' => 'required|min:16|max:16',
            'name' => 'required|min:3|max:255',
            'gender' => 'required',
            'marital_status' => 'required',
            'profession' => 'required|max:255',
            'citizenship' => 'required',
            'birthplace' => 'required',
            'birthdate' => 'required',
            'bloodtype' => 'required',
            'address' => 'required'
        ]);

        $nik = $request->old('nik');
        $name = $request->old('name');
        $gender = $request->old('gender');
        $marital_status = $request->old('marital_status');
        $profession = $request->old('profession');
        $citizenship = $request->old('citizenship');
        $birthplace = $request->old('birthplace');
        $birthdate = $request->old('birthdate');
        $bloodtype = $request->old('bloodtype');
        $address = $request->old('address');
        $upload_image = $request->old('upload_image');
        
        
        $image = $request->file('upload_image');
        if ($image != null) {
            $folder = 'uploads';
            $extension = $image->getClientOriginalExtension();
            $image_newname = Str::uuid().".".$extension;
            $image->move($folder, $image_newname);
        }

        $penduduk->nik = $request->nik;
        $penduduk->name = ucwords($request->name);
        $penduduk->gender = $request->gender;
        $penduduk->marital_status = $request->marital_status;
        $penduduk->profession = ucwords($request->profession);
        $penduduk->citizenship = $request->citizenship;
        $penduduk->birthplace = ucwords($request->birthplace);
        $penduduk->birthdate = $request->birthdate;
        $penduduk->bloodtype = $request->bloodtype;
        $penduduk->address = $request->address;
        if ($image != null) {
            $penduduk->image = $image_newname;
        }
        $penduduk->save();

        return redirect('/penduduk')->with('success_message', 'Data penduduk berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penduduk $penduduk)
    {
        $penduduk->delete();
        return redirect('/penduduk')->with('success_message', 'Data penduduk berhasil dihapus!');
    }
}
