<?php

namespace App\Http\Controllers;
use App\Models\Tiket;
use App\Models\Checkin;
use Illuminate\Http\Request;

class CheckinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $checkins = Tiket::get()->all();
        return view('checkin.index', compact('checkins'));
    }

    public function index2(){
        $checkins = Tiket::get()->all();
        return view('checkin.laporan', compact('checkins'));
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
     * @param  \App\Models\Checkin  $checkin
     * @return \Illuminate\Http\Response
     */
    public function show(Checkin $checkin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Checkin  $checkin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $checkins = Tiket::findOrFail($id);
        return view('checkin.edit', compact('checkins'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Checkin  $checkin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Checkin $checkin)
    {
        $checkins = Tiket::findOrFail($id);

        if ($request->name != $checkins->name) {
            $rules['nama'] = 'required';
            $rules['no_telpon'] = 'required';
            $rules['jumlah'] = 'required';
            $rules['jenis'] = 'required';
        }

        $validasiData = $request->validate($rules);

        $checkins->nama = $request->nama;
        $checkins->no_telpon = $request->no_telpon;
        $checkins->jumlah = $request->jumlah;
        $checkins->jenis = $request->jenis;
        $checkins->save();
        return redirect()
            ->route('checkin.index')->with('success', 'Data has been edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Checkin  $checkin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $checkins = Tiket::findOrFail($id);
        $checkins->delete();
        // return redirect()
        //     ->route('checkin.index')->with('success', 'Data has been deleted');
        return back()->withInput();
    }
}
