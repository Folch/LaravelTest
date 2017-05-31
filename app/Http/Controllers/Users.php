<?php

namespace App\Http\Controllers;

class Users extends Controller
{
    public function getAll()
    {
        return User::orderBy('id', 'asc')->get();
    }
}
