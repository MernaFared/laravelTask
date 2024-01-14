<?php

namespace App\Http\Controllers;
use App\Traits\Common;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\ExploreItem;

class ExploreItemController extends Controller
{
    use Common;
    public function index()
    {
        $exploreItems = ExploreItem::get();
        return view('place', compact('exploreItems'));
    }
    public function create()
    {
        return view('add-places');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'title' => 'required|string',
            'rating' => 'required|numeric',
            'price' => 'required|numeric',  
            'description' => 'required|string',
        ]);

        $fileName = $this->uploadFile($request->file('image'), 'assets/images/places');
        
        $exploreItem = ExploreItem::create([
            'image' => $fileName,
            'title' => $request->input('title'),
            'rating' => $request->input('rating'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'is_featured' => $request->has('is_featured'),
        ]);

       return('done');
     }
     public function destroy(string $id)
     {
        ExploreItem::where('id', $id)->delete();
         return redirect('place');
     }
 
     public function getTrashed()
     {
         $trashedPlaces = ExploreItem::onlyTrashed()->get();
         return view('trashedPlaces', compact('trashedPlace'));
     }
 
     public function restore(string $id) :RedirectResponse
     {
        ExploreItem::where('id', $id)->restore();
         return redirect('place ');
     }
 
     public function deleteforce(string $id) :RedirectResponse
     {
        ExploreItem::where('id', $id)->forceDelete();;
         return redirect('place ');
     }
}
