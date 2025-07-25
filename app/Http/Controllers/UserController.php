<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile() {
        return view('user.profile');
    }

    public function bookings() {
        return view('user.bookings');
    }

    public function notifications() {
        return view('user.notifications');
    }

    public function settings() {
        return view('user.settings');
    }

    public function logout(Request $request) {
        auth()->logout();
        return redirect('/');
    }

}
