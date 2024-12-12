<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

trait HasImage
{
    //Begin::Image Actions
    public static function storeImage($data, $width=null, $height=null, $name_image_in_data='image', $name_image_in_DB='image_path')
    {
        $image = $data[$name_image_in_data];

        if ($image && is_null($width)){
            $image_path = $image->store(static::$imageFolder, static::$imageDisk);
            $data[$name_image_in_DB] = $image_path;
        }elseif($image){
            $image_name = hexdec(uniqid()) .'.'. $image->getClientOriginalExtension();
            $image_path = static::$imageFolder.'/'.$image_name;
            $manager = new ImageManager(new Driver());
            $image = $manager->read($image)->resize($width, $height);
            Storage::disk('media')->put($image_path, (string) $image->encode());
            $data[$name_image_in_DB] = $image_path;
        }

        return $data;
    }

    public static function updateImage($data, $oldImage, $width=null, $height=null, $name_image_in_data='image', $name_image_in_DB='image_path')
    {
        $image = $data[$name_image_in_data];
        if ($image) {
            $data = static::storeImage($data, $width, $height, $name_image_in_data, $name_image_in_DB);
            static::deleteImage($oldImage);
        }
        return $data;
    }

    public static function deleteImage($old_image_url)
    {
        $path = parse_url($old_image_url, PHP_URL_PATH);
        $diskPath = str_replace('/storage/media/', '', $path);
        if (Storage::disk('media')->exists($diskPath) && $diskPath != 'no_image.jpg') {
            return Storage::disk('media')->delete($diskPath);
        } else {
            return false;
        }
//        // Extract the path from the URL
//        $path = parse_url($image_url, PHP_URL_PATH);
//        // Remove leading slashes
//        $diskPath = ltrim($path, "/storage/".static::$imageDisk."/");
//        // Delete the file if it exists
//        if (Storage::disk(static::$imageDisk)->exists($diskPath)) {
//            return Storage::disk(static::$imageDisk)->delete($diskPath);
//        } else {
//            return false;
//        }
    }
    //End::Image Actions

    //Begin::GetImageUrl
    public function getImageUrlAttribute(): string
    {
        if (!$this->image_path){
            return asset('storage/media/no_image.jpg');

        }elseif (Str::startsWith($this->image_path, ['http://', 'https://'])) {
            return $this->image_path;
        }else {
            return asset('storage/media/' . $this -> image_path);
        }
    }
    // Define a method to return the append attributes defined in the trait
    public function getTraitAppends(): array
    {
        return ['image_url'];
    }
    public function getArrayableAppends(): array
    {
        // Get the trait's $appends array
        $traitAppends = $this->getTraitAppends();

        // Get the parent's $appends array
        $parentAppends = parent::getArrayableAppends();

        // Merge the trait's $appends array with the parent's $appends array
        return array_merge($traitAppends, $parentAppends);
    }
    //End::GetImageUrl

}
