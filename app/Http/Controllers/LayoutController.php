<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LayoutController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        return $user;
    }
}
