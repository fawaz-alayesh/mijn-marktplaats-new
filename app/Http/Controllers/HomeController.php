<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Advertenties;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Helper;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Spatie\SiteSearch\Search;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {  
        
           
         
            $ads =  Advertenties::where('user_id', auth()->user()->id)->get();
            
            return view('home',compact('ads'));
            
    
    }
    

    
}
