<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategorysController extends Controller
{
    //
    public function getCate(){
    	return view('backend.category');
    }
    public function getEditCate(){
    	return view('backend.editcategory');
    }
}
