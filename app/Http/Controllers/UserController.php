<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\User;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->id=='1'){
            $data = Users::all();
            return view('backend.user.view_user', ['data' => $data]);
    } else {
        $user = Auth::user()->id;
        $data = Anggota::where('user_id', $user)->get();
        return view('backend.user.view_user', ['data' => $data]);
    }
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $anggota = DB::table('users')->get();
        return view('backend.user.add_user', compact('anggota'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Users();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();

        //return redirect()->route('datpen.view');
        return redirect()->route('user.view')->with('message', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $editpanitia = Users::find($id);
        $editanggota = Anggota::find($id);
        return view('backend.user.edit_user', compact('editpanitia', 'editanggota'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Users::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = $request->password;
        $data->update();

        foreach ($request->user as $key => $users) {
            $user = new Anggota;
            $user -> user_id = $users;
            $user -> users_id = $data->id;
            $user->update();
    }
    return redirect()->route('user.view');
    }

    public function editbuktiuser($id){
        $databukti = Users::find($id);
        $dataguru = Anggota::find($id);
        return view('backend.user.bukti_user', compact('databukti', 'dataguru'));
}

public function updatebuktiuser(Request $request, $id){
    $data = Users::find($id);
    //$data->harga = $request->harga;
    //$data->nama = $request->nama;
    //$data->name = $request->name;
    //$data->email = $request->email;
    $data->password = bcrypt($request->password);
    //$data->tgl_pinjam = $request->tgl_pinjam;
    //$data->tgl_selesai = $request->tgl_selesai;
    $data->save();
    //return redirect()->route('datpen.view');
    return redirect()->route('user.view')->with('message', 'Data Berhasil Diedit');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleteData = Users::find($id);
        $deleteData->delete();
        //return redirect()->route('datpen.view');
        return redirect()->route('user.view')->with('message', 'Data Berhasil Dihapus');
    }
}
