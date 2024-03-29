<?php
namespace App\Traits;
use Illuminate\Support\Str;
use Storage;

trait StorageImageTrait{
    public function StoreImageUpload($request, $fieldName, $directory){
        if ($request-> hasFile($fieldName)){
            $fiel = $request->$fieldName;
            $fileNameOringin = $fiel->getClientOriginalName();
            $fileNameHash = str::random(20) . '.' . $fiel->getClientOriginalName();
            $filepath = $request->file($fieldName)->storeAs('public/' . $directory . '/' . auth()->id(), $fileNameHash);
            $dataupload = [
                'file_name' => $fileNameOringin,
                'file_path' => Storage::url($filepath)
                ];
            return $dataupload;

        }

        return  null;


    }
    public function StorageImageuploadMultiple($file, $directory){

            $fileNameOringin = $file->getClientOriginalName();
            $fileNameHash = str::random(20) . '.' . $file->getClientOriginalName();
            $filepath = $file->storeAs('public/' . $directory . '/' . auth()->id(), $fileNameHash);
            $dataupload = [
                'file_name' => $fileNameOringin,
                'file_path' => Storage::url($filepath)
            ];
            return $dataupload;

    }

}
