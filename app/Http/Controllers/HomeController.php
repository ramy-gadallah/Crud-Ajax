<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Traits\offerTrait;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use offerTrait;
    public function store(Request $request)
    {

        if($request->hasFile('photo'))
            $path = $this->saveImage($request->photo,'web/image');
        else
            $path = null;
                
          Post::create([
                'title' => $request->title,
                'description' => $request->description,
                'photo' => $path,
            ]);
         
            return redirect()->back();
       
    }


   
}

