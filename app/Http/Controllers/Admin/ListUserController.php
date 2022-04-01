<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DetailUserKelas;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ListUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        $today = Carbon::now()->isoFormat('dddd');
        $tanggal = Carbon::now()->format('j F Y');

        $user = DetailUserKelas::join('users', 'tb_detail_user_kelas.id','users.id')
        ->selectRaw('name, email, COUNT(id_kelas) as jumlah_kelas')->groupBy('name')
        ->get();
       

        return view('admin.detailkelas.listuser.index', compact('user','today','tanggal'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        // $item = DetailUserKelas::with('Kelas','User')->find($id_detail_kelas);

        $item = DetailUserKelas::with('Kelas','User')->join('users','tb_detail_user_kelas.id','users.id')->where('name', $name)->get();

        // return $item;
     
        
        return view('admin.detailkelas.listuser.detail', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
