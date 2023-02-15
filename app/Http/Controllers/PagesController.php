<?php

namespace App\Http\Controllers;
use App\Models\Advertenties;
use Illuminate\Http\Request;



class PagesController extends Controller
{
    
    public function index(){
        return view('index');
    }
  

}
