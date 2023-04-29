<?php

namespace App\Http\Controllers;

use App\Models\Advertenties;
use Illuminate\Http\Request;



class PagesController extends Controller
{

    public function index()
    {
        return view('index');
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }
    public function privacy()
    {
        return view('privacy');
    }
}
