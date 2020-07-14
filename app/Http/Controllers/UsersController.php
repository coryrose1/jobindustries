<?php

namespace App\Http\Controllers;

use App\Industry;
use App\User;
use Illuminate\Support\Facades\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::with('industries')
            ->when(Request::input('industry'), function ($query, $industry) {
                return $query->whereHas('industries', function($q) use ($industry) {
                    $q->where('industry_id', $industry);
                });
            })
            ->paginate(15);
        $industries = Industry::orderBy('name')->get();

        return view('welcome', compact('users', 'industries'));
    }
}
