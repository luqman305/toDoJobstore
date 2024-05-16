<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function clearSession(Request $request)
    {
        session()->flush();

        return response()->json(['status' => 'Session cleared']);
    }
}
