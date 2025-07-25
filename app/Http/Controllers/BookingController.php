<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = auth()->user()->bookings()->latest()->get();

        return view('user.bookings', compact('bookings'));

    }
    public function destroy(\App\Models\Booking $booking)
    {
        if ($booking->user_id !== auth()->id()) {
            abort(403);
        }

        $booking->delete();
        return redirect()->route('bookings.index')->with('status', 'Booking deleted.');
    }

}
