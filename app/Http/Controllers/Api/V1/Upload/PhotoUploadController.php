<?php

namespace App\Http\Controllers\Api\V1\Upload;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Photo; 
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class PhotoUploadController extends Controller
{
    public function upload_profile(Request $request) 
    { 
        $validator = Validator::make($request->all(),[ 
              'file' => 'required|mimes:png,jpg,jpeg,gif|max:2305',
        ]);   
  
        if($validator->fails()) {          
             
            return response()->json(['error'=>$validator->errors()], 401);                        
         }  
  
   
        if ($file = $request->file('file')) {
            $path = $file->store('public/files');
            $name = $file->getClientOriginalName();
               
            User::where('id', Auth::user()->id)->update([
                'photo_url' => $path,
            ]);

            return response()->json([
                "success" => true,
                "message" => "File successfully uploaded",
                "file" => $file
            ]);
   
        }
  
   
    }

    public function upload_images(Request $request) 
    { 
        $validator = Validator::make($request->all(),[ 
              'file' => 'required|mimes:png,jpg,jpeg,gif|max:2305',
        ]);   
  
        if($validator->fails()) {          
             
            return response()->json(['error'=>$validator->errors()], 401);                        
         }  
  
   
        if ($file = $request->file('file')) {
            $path = $file->store('public/files');
            $name = $file->getClientOriginalName();
  
            //store your file into directory and db
            $save = new Photo();
            $save->name = $name;
            $save->path= $path;
            $save->user_id = Auth::user()->id;
            $save->type= '1';
            $save->save();
               
            return response()->json([
                "success" => true,
                "message" => "File successfully uploaded",
                "file" => $file
            ]);
   
        }
    }
}
