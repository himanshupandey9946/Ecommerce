<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\brandmodel;
use Auth;



class BrandController extends Controller
{
    
    public function list(){
        $data=brandmodel::all();
    return view('dashboard.brand.list',['data'=>$data]);
    }

    public function add(){
        return view('dashboard.brand.add');
    }
}
