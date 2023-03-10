<?php
namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
trait Uploading
{
    public function uploadOne(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null)
    {
        $name = !is_null($filename) ? $filename : Str::random(25);

        $file = $uploadedFile->storeAs( $folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);

        return $file;
    }

    public function resizeImagePost($request, $path)
    {
        if ($request->hasFile('image')) {

            $file = $request->file('image');

            if ($file->isValid()) {

                $image_name  = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '.' . $file->getClientOriginalExtension();

                $image = Image::make($file->getRealPath());

                $image->resize(50, 50);

                $image_path = $path . $image_name;

                $image->save(storage_path( 'app/public/'. $image_path));

                return $image_path;
            }
        }

    }
}
