<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\News;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Redirect;
use App\Traits\Common;

class NewsController extends Controller
{
    use Common;

    private $columns = ['Title','content','author','published'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news =News ::get();

        return view('news',compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('add-news-form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
         $messages=[
            'title.required'=> 'Title is required',
            'content.required'=> 'Should be Text',
            'author.required'=> 'Should be Text',
            
         ];
       $data =  $request->validate([
            'title'=>'required|string',
            'content'=>'required|string|max:100',
            'author'=>'required|string|max:100',  
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ],$messages);
        $fileName = $this->uploadFile($request->image, 'assets/images');
        $data['image']= $fileName;
         $data['published'] = isset($request['published']) ;
         News:: create($data);
         return 'done' ;

    }

    /**
     * Display the specified resource.
     */
    public function showUpload( )
    {
       return view('uploadNews');
        //
    }
    public function upload(Request $request){
        $fileName = $this->uploadFile($request->image, 'assets/images');
        return $fileName;
 

    }
    public function show(string $id)
    {
        $news = News ::findOrFail($id);
        return view('newsDetails',compact('news'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $news = News::findOrFail( $id);
        return view('updateNews',compact('news'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->only($this->columns);
        $data['published'] = isset($data['published'])? true:false;

        News::where('id', $id)->update($data);

      
         return "Data Updated Successfully";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id):RedirectResponse 
    {
        news::where('id',$id)->delete();
        return Redirect('showNews') ;
    }

    public function delete(string $id):RedirectResponse
    {
        News::where('id',$id)->forceDelete();
        News::where('id',$id)->delete();
        return redirect('showNews');
         
    }


    public function trashed( ){
        $news = News::onlyTrashed()->get();
        return view('trashedNews',compact(('news')));
    }

    public function restore(String $id):RedirectResponse
    {
        News::where('id',$id)->restore();
        return redirect('showNews');
    }
}
