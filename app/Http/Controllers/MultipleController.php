<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class MultipleController extends Controller
{
    public function index()
    {
        $username = 'CodeGym';
        $age = '26';

        return view('multiple_language', ['username' => $username, 'age' => $age]);
    }
}
