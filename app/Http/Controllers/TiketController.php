<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use Illuminate\Http\Request;
use DB;

class TiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tikets = Tiket::latest()->get();
        return view('tiket.admin', compact('tikets'));
    }

    public function index2()
    {
        $tikets = Tiket::latest()->get();
        return view('tiket.index', compact('tikets'));
    }

    public function index3()
    {
        $tikets = Tiket::latest()->get();
        return view('tiket.laporan', compact('tikets'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tiket.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'no_telpon' => 'required',
            'jumlah' => 'required',
            'jenis' => 'required',
        ]);

        $tikets = new Tiket();
        $kode_peminjamans = DB::table('tikets')->select(DB::raw('MAX(RIGHT(kode_peminjam,3)) as kode'));
        if ($kode_peminjamans->count() > 0) {
            foreach ($kode_peminjamans->get() as $kode_peminjam) {
                $x = ((int) $kode_peminjam->kode) + 1;
                $kode = sprintf("%03s", $x);
            }
        } else {
            $kode = "001";
        }
        $tikets->kode_peminjam = 'KONSER-' . date('dmy') . $kode;
        $tikets->nama = $request->nama;
        $tikets->no_telpon = $request->no_telpon;
        $tikets->jumlah = $request->jumlah;
        $tikets->jenis = $request->jenis;
        $tikets->save();

        return back()->withInput();
        // return redirect()
        //     ->route('tiket.index')->with('success', 'Data has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tiket  $tiket
     * @return \Illuminate\Http\Response
     */
    public function show(Tiket $tiket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tiket  $tiket
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tikets = Tiket::findOrFail($id);
        return view('tiket.edit', compact('tikets'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tiket  $tiket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        $validated = $request->validate([
        'nama' => 'required',
        'no_telpon' => 'required',
        'jumlah' => 'required',
        'jenis' => 'required',
 ]);
        
        $tikets = Tiket::findOrFail($id);
        $tikets->nama = $request->nama;
        $tikets->no_telpon = $request->no_telpon;
        $tikets->jumlah = $request->jumlah;
        $tikets->jenis = $request->jenis;
        $tikets->save();
        return redirect()
            ->route('tiket.index')->with('success', 'Data has been edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tiket  $tiket
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tikets = Tiket::findOrFail($id);
        $tikets->delete();
        return redirect()
            ->route('tiket.index')->with('success', 'Data has been deleted');
    }
}
