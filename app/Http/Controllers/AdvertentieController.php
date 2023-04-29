<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advertenties;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Models\Category;

class AdvertentieController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = Advertenties::get();
        $ads = Advertenties::query();

        // Check if sort query parameter is present
        if (request()->has('sort')) {
            $sort = request()->query('sort');
            if ($sort === 'price_asc') {
                $ads->orderBy('price', 'asc');
            } else if ($sort === 'price_desc') {
                $ads->orderBy('price', 'desc');
            } else if ($sort === 'date_asc') {
                $ads->orderBy('created_at', 'asc');
            } else if ($sort === 'date_desc') {
                $ads->orderBy('created_at', 'desc');
            }
        }
        $ads = $ads->paginate(5);

        return view('advertentie.index', compact('ads', 'all'));
    }

    public function category(Category $category)
    {
        $all = Advertenties::get();
        $ads = $category->advertenties();
    
        // Check if sort query parameter is present
        if (request()->has('sort')) {
            $sort = request()->query('sort');
            if ($sort === 'price_asc') {
                $ads->orderBy('price', 'asc');
            } else if ($sort === 'price_desc') {
                $ads->orderBy('price', 'desc');
            } else if ($sort === 'date_asc') {
                $ads->orderBy('created_at', 'asc');
            } else if ($sort === 'date_desc') {
                $ads->orderBy('created_at', 'desc');
            }
        }
        $ads = $ads->paginate(5);
    
        return view('advertentie.category', [
            'ads' => $ads,
            'all' => $all,
            'category' => $category,
        ]);
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
            'filename' => 'required|mimes:jpeg,png',
        ]);

        $slug = Str::slug($request->title . '-' . uniqid(), '-');

        $img = $request->filename;


        if ($img) {
            $newImageName = uniqid() . '-' . $slug . '.' . $img->extension();
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
            'category_id' => $request->category,
            'lat' => $request->input('lat'),
            'lng' => $request->input('lng'),
            'user_id' => auth()->user()->id
        ]);

        // dd($slug);
        return redirect('advertentie/' . $slug)->with('message', 'Het advertentie is succesvol gemaakt');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {

        return view('advertentie.show')->with('ad', Advertenties::where('slug', $slug)->first());
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
            'filename' => 'mimes:jpeg,png'
        ]);

        $data = Advertenties::where('slug', $slug)
            ->update([
                'slug' => $slug,
                'title' => $request->input('title'),
                'city' => $request->input('city'),
                'state' => $request->input('state'),
                'description' => $request->input('description'),
                'price' => $request->input('price'),
                'category_id' => $request->category,
                'lat' => $request->input('lat'),
                'lng' => $request->input('lng'),
                'user_id' => auth()->user()->id
            ]);

        // wijzigen zonder nieuwe foto
        if ($request->file('filename')) {
            $file = $request->file('filename');
            $newImageName = uniqid() . '-' . $slug . '.' . $file->extension();
            $file->move(public_path('uploads'), $newImageName);
            $data = Advertenties::where('slug', $slug)
                ->update([
                    'filename' => $newImageName,
                ]);
        }

        return redirect('advertentie/' . $slug)
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
        $image_path = 'uploads/' . $ads->filename;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        Advertenties::where('slug', $slug)->delete();

        return redirect('advertentie')
            ->with('message', 'Het advertentie is succesvol Verwijderd');
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {

            $output = '';

            $ads_search = Advertenties::where('title', 'LIKE', '%' . $request->search . '%')
                ->orWhere('description', 'LIKE', '%' . $request->search . '%')
                ->orWhere('city', 'LIKE', '%' . $request->search . '%')
                ->orWhere('state', 'LIKE', '%' . $request->search . '%')
                ->orWhere('price', 'LIKE', '%' . $request->search . '%')
                ->get();

            if ($ads_search) {

                foreach ($ads_search as $searched) {

                    $output .=
                        '
                      <div class="divide-y divide-gray-100 dark:divide-gray-700">
                        <a href="advertentie/' . $searched->slug . '" class="flex py-3 px-4 hover:bg-gray-100 dark:hover:bg-gray-700">
                          <div class="flex-shrink-0 px-2">
                            <img class="w-10 h-10 rounded-full" src="uploads/' . $searched->filename . '" alt="">
                          </div>
                          <div class="pl-3 w-full">
                              <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400">' . $searched->title . '</div>
                              <div class="text-xs text-blue-600 dark:text-blue-500">' . '€' . number_format($searched->price, 0, '.', ',') . '</div>
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
