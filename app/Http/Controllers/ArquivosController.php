<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Files;

class ArquivosController extends Controller
{
    public function index()
    {
        return view('arquivos.index', [
            'arquivos' => Files::where('active', '=', '1')->get()
        ]);
    }

    /**
     * Image Upload Code
     *
     * @return void
     */
    public function filesStore(Request $request)
    { 
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('files'),$imageName);
        
        $imageUpload = new Files();
        $imageUpload->name = $imageName;
        $imageUpload->local = $imageName;
        $imageUpload->save();
        return response()->json(['success'=>$imageName, 'status' => 200]);
    }

        /**
     * Image Upload Code
     *
     * @return void
     */
    public function filesDelete($id)
    { 
        $file = Files::find($id);
        $file->active = 0;
        $file->save();

        return response()->json(['success'=>$imageName, 'status' => 200]);
    }
}
