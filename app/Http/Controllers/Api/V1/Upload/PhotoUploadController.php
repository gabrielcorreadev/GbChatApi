<?php

namespace App\Http\Controllers\Api\V1\Upload;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\AppBaseController;
use Illuminate\Support\Facades\Storage;
use App\Repositories\Contracts\PhotoRepositoryInterface; 

class PhotoUploadController extends AppBaseController
{
            /** @var PhotoRepository */
            private $photoRepository;

            public function __construct(PhotoRepositoryInterface $photoRepo)
            {
                $this->photoRepository = $photoRepo;
            }

    public function upload_profile(Request $request) 
    { 
        $validator = Validator::make($request->all(),[ 
              'file' => 'required|mimes:png,jpg,jpeg,gif|max:9305',
        ]);   
  
        if($validator->fails()) {          
            return $this->sendError($validator->errors()->first(), 400);                      
         }  
  
        if ($request->file('file')) {

            $data = $this->photoRepository->uploadProfile($request);

            return $this->sendResponse(url(Storage::url($data)), __('upload.file_successfully_uploaded'));
   
        }
    }

    public function remove_profile() 
    { 
        $this->photoRepository->removeProfile();
        return $this->sendSuccess('Foto removida com sucesso');
    }

    public function upload_cover(Request $request) 
    { 
        $validator = Validator::make($request->all(),[ 
              'file' => 'required|mimes:png,jpg,jpeg,gif|max:9305',
        ]);   
  
        if($validator->fails()) {          
            return $this->sendError($validator->errors()->first(), 400);                      
         }  
  
        if ($request->file('file')) {

            $data = $this->photoRepository->uploadCover($request);
            return $this->sendResponse(url(Storage::url($data)), __('upload.file_successfully_uploaded'));
   
        }
    }

    public function remove_cover() 
    { 
        $this->photoRepository->removeCover();
        return $this->sendSuccess('Foto removida com sucesso');
    }
}
