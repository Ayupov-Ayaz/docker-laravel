<?php

namespace App\Http\Controllers;

use App\Entities\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function users()
    {
        return view('users.index', [
            'users' => User::all()
        ]);
    }

    public function getUser(int $id)
    {
        return view('users.index', [
            'user' => User::find($id)
        ]);
    }
}
