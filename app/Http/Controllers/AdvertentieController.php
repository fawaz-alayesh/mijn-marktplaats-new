<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advertenties;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Helper;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Spatie\SiteSearch\Search;

class AdvertentieController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        // dd($Advertenties);
        $all = Advertenties::get();
        $ads = Advertenties::paginate(5);
        
        return view('advertentie.index',compact('ads','all'));
        
    }


 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('advertentie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'filename' => 'required',
        ]);

        $slug = Str::slug($request->title . '-' . uniqid() ,'-'); 
  
        $img = $request->filename; 
        
        
        if($img){
        $newImageName = uniqid(). '-' . $slug . '.' . $img->extension();
        $img->move(public_path('uploads'), $newImageName);
        }

        Advertenties::create([
            'slug' => $slug,
            'filename' => $newImageName,
            'title' => $request->input('title'),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'category' => $request->input('category'),
            'lat' => $request->input('lat'),
            'lng' => $request->input('lng'),
            'user_id' => auth()->user()->id
        ]);
       

        // dd($slug);
        
        return redirect('advertentie/'.$slug)->with('message', 'Het advertentie is succesvol gemaakt');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
       
        return view('advertentie.show')->with('ad',Advertenties::where('slug', $slug)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {

        return view('advertentie.edit')->with('ad', Advertenties::where('slug', $slug)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);


        $data = Advertenties::where('slug', $slug)
        ->update([
            'slug' => $slug,
            'title' => $request->input('title'),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'category' => $request->input('category'),
            'lat' => $request->input('lat'),
            'lng' => $request->input('lng'),
            'user_id' => auth()->user()->id
        ]);
        

     // wijzigen zonder nieuwe foto
       if($request->file('filename')){
        $file=$request->file('filename');
        $newImageName = uniqid(). '-' . $slug . '.' . $file->extension();
        $file->move(public_path('uploads'), $newImageName);
        $data = Advertenties::where('slug', $slug)
        ->update([
            'filename' => $newImageName,
        ]);
         }


        return redirect('advertentie/'.$slug)
        ->with('message', 'Het advertentie is succesvol gewijzigd');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    { 
  
        $ads = Advertenties::where('slug', $slug)->first();
        $image_path = 'uploads/'.$ads->filename;
         if(File::exists($image_path)) {
            File::delete($image_path);
        }
        Advertenties::where('slug', $slug)->delete();

        return redirect('advertentie')
        ->with('message', 'Het advertentie is succesvol Verwijderd');
        
    }


    public function search(Request $request)
    {
        
        if($request->ajax()) {

            $output = '';

            $ads_search = Advertenties::where('title', 'LIKE', '%'.$request->search.'%')
                            ->orWhere('description', 'LIKE', '%'.$request->search.'%')
                            ->orWhere('category', 'LIKE', '%'.$request->search.'%')
                            ->orWhere('slug', 'LIKE', '%'.$request->search.'%')
                            ->orWhere('price', 'LIKE', '%'.$request->search.'%')
                            ->get();
                            
            if($ads_search) {

                foreach($ads_search as $searched) {

                    $output .=
                    ' <!-- Dropdown menu -->
                      <div class="divide-y divide-gray-100 dark:divide-gray-700">
                        <a href="advertentie/'.$searched->slug.'" class="flex py-3 px-4 hover:bg-gray-100 dark:hover:bg-gray-700">
                          <div class="flex-shrink-0">
                            <img class="w-10 h-10 rounded-full" src="uploads/'.$searched->filename.'" alt="">
                            <div class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5  rounded-full border border-white dark:border-gray-800">
                            <div class="inline-flex overflow-hidden relative justify-center items-center w-full bg-amber-500 rounded-full dark:bg-gray-600">
                            <span class="text-xs font-thin text-gray-600 dark:text-gray-300">'.$firstStringCharacterfirstname = substr($searched->user->firstname, 0, 1) . $firstStringCharacterlastname = substr($searched->user->lastname, 0, 1).'</span>
                             </div>
                            </div>
                          </div>
                          <div class="pl-3 w-full">
                              <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400">'.$searched->title.'</div>
                              <div class="text-xs text-blue-600 dark:text-blue-500">'.'€'.number_format($searched->price, 0, '.', ',').'</div>
                          </div>
                        </a>
                        
                    </div>

                  ';

                }

                return response()->json($output);

            }
          
        }

        

    }


    
}
