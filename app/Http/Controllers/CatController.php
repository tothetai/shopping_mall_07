<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CatController extends Controller
{
    public function getlist()
    {
        return view('backend.category.list');
    }

    public function getadd()
    {
        return view('backend.category.add');
    }

    public function getedit()
    {
        return view('backend.category.edit');
    }
}
