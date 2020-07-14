<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::with('industries')
            ->paginate(15);
        return view('welcome', compact('users'));
    }
}
