<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('profile', ['user' => Auth::user()]);
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'user_description' => 'required'
        ]);
        User::where('id', Auth::user()->id)
            ->update(['description' => $request->user_description]);
        return back()->with('status', 'description has been updated');
    }
    public function delete(Request $request)
    {
        User::where('id', User::safelyDelete(Auth::user()->id));
        return view('welcome', ['status' => 'your account has been deleted']);
    }
}
