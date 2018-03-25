<?php

namespace App\Http\Controllers;

use App\Entities\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function users()
    {
        return view('users.index', [
            'users' => User::all()
        ]);
    }

    public function getUser(User $user)
    {
        return view('users.index', [
            'user' => $user
        ]);
    }
}
