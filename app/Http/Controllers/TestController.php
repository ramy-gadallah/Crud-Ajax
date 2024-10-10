<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Traits\offerTrait;
use Illuminate\Http\Request;

class TestController extends Controller
{

    use offerTrait;


    public function create()
    {
        return view('create');
    }
   

    public function test_store(Request $request)
    {

        if ($request->hasFile('photo'))
            $path = $this->saveImage($request->photo, 'web/test');
        else
            $path = null;

        $test = Test::create([
            'title' => $request->title,
            'description' => $request->description,
            'photo' => $path,
        ]);

        if ($test)
            return response()->json([
                'status' => 'true',
                'success' => 'تم الحفظ بنجاح',
                'redirect' => route('index'),
            ]);
        else
            return response()->json([
                'status' => 'false',
                'message' => 'فشل الحفظ',
            ]);
    }

    public function index()
    {
        $tests = Test::select('id', 'title', 'description', 'photo')->get();
        return view('index', compact('tests'));
    }

      public function edit($id){

        $test=Test::select('id', 'title', 'description', 'photo')->find($id);
        return view('edit',compact('test')); 
    }

    public function update(Request $request)
    {
        $test = Test::find($request->id);

        if ($request->hasFile('photo')) {
            $path = $this->saveImage($request->photo, 'web/test');
        } else {
            $path = $test->photo;
        }
        $test->update([
            'title' => $request->title,
            'description' => $request->description,
            'photo' => $path,
        ]);

        if ($test)
            return response()->json([
                'status' => 'true',
                'success' => 'تم التعديل بنجاح',
                'error'=>'فشل التعديل',
                'redirect' => route('index'),
            ]);
        else
            return response()->json([
                'status' => 'false',
                'message' => 'فشل التعديل',
            ]);
    }

    public function delete(Request $request)
    {
        
       $offers=Test::find($request->id);
       $offers->delete();
       return response()->json([
        'id'=>$request->id,
        'status'=>'200',    
        'success'=>'تم الحذف بنجاح نعم',
        'unsuccess'=>'فشل الحذف',
        'redirect'=>route('index'),
    ]);
    }

  
}
