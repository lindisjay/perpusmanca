<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
Use alert;
use RealRashid\SweetAlert\Facades\Alert as FacadesAlert;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=\App\User::all();
        return view('admin.user.user',['user'=>$user]);
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
        $tambah_anggota=new \App\User;
        $tambah_anggota->id = $request->addid;
        $tambah_anggota->name = $request->addname;
        $tambah_anggota->kelas = $request->addkelas;
        $tambah_anggota->email = $request->addemail;
        $tambah_anggota->roles_id = $request->addroles_id;
        $tambah_anggota->jenis_kelamin = $request->addjenis_kelamin;
        $tambah_anggota->no_hp = $request->addno_hp;
        $tambah_anggota->save();
        Alert::success('Pesan ','Data berhasil disimpan');
        return redirect('/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.user.user',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name')->all();
        $userRole = $user->roles->pluck('name')->all();
        return view('admin.user.editUser',compact('user','roles','userRole'));
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
        $user = User::find($id);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->input('role'));
        $user->name=$request->get('addname');
        $user->kelas=$request->get('addkelas');
        $user->jenis_kelamin=$request->get('addjenis_kelamin');
        $user->no_hp=$request->get('addno_hp');
        $user->save();

        return redirect()->route( 'user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = \App\User::findOrFail($id);
        $hapus->delete();
        $hapus->removeRole('admin','user');
        return redirect()->route('user.index');
    }
}
