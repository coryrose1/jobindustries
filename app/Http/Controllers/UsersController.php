<?php

namespace App\Http\Controllers;

use App\Industry;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        dump($request->all());
        $users = User::with('industries')
            ->when($request->has('industry'), function ($query) use ($request) {
                return $query->whereHas('industries', function($q) use ($request) {
                    $q->where('industry_id', $request->get('industry'));
                });
            })
            ->paginate(15);
        $industries = Industry::orderBy('name')->get();

        return view('welcome', compact('users', 'industries'));
    }
}
