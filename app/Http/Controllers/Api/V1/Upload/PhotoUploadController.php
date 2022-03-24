<?php

namespace App\Http\Controllers\Api\V1\Upload;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Photo; 
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\AppBaseController;
use Illuminate\Support\Facades\Storage;

class PhotoUploadController extends AppBaseController
{
    public function upload_profile(Request $request) 
    { 
        $validator = Validator::make($request->all(),[ 
              'file' => 'required|mimes:png,jpg,jpeg,gif|max:9305',
        ]);   
  
        if($validator->fails()) {          
            return $this->sendError($validator->errors()->first(), 400);                      
         }  
  
   
        if ($file = $request->file('file')) {
            $path = $file->store('public/files');
            $name = $file->getClientOriginalName();
               
            User::where('id', Auth::user()->id)->update([
                'photo_url' => $path,
            ]);

            return $this->sendResponse(url(Storage::url($path)), __('upload.file_successfully_uploaded'));
   
        }
  
   
    }

    public function upload_images(Request $request) 
    { 
        $validator = Validator::make($request->all(),[ 
              'file' => 'required|mimes:png,jpg,jpeg,gif|max:9305',
        ]);   
  
        if($validator->fails()) {          
             
            return response()->json(['error'=>$validator->errors()], 401);                        
         }  
  
   
        if ($file = $request->file('file')) {
            $path = $file->store('public');
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
