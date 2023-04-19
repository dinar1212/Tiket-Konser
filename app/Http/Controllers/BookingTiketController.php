<?php

namespace App\Http\Controllers;

use App\Models\Booking_tiket;
use Illuminate\Http\Request;

class BookingTiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking_tiket::latest()->get();
        return view('welcome', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('welcome');
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
            'nama' => 'required|unique:bookings',
        ]);

        $bookings = new Booking_tiket();
        $bookings->nama = $request->nama;
        $bookings->save();
        return redirect()
            ->route('welcome')->with('success', 'Data has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking_tiket  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Booking_tiket $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking_tiket  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bookings = Booking_tiket::findOrFail($id);
        return view('admin.payment.edit', compact('bookings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking_tiket  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $bookings = Booking_tiket::findOrFail($id);

        if ($request->nama != $bookings->nama) {
            $rules['nama'] = 'required';
        }

        $validasiData = $request->validate($rules);

        $bookings->nama = $request->nama;
        $bookings->save();
        return redirect()
            ->route('payment.index')->with('success', 'Data has been edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking_tiket  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bookings = Booking_tiket::findOrFail($id);
        $bookings->delete();
        return redirect()
            ->route('payment.index')->with('success', 'Data has been deleted');
    }
}
